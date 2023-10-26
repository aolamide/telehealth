<?php
/**
 * easy image resize function
 * @param  $file - file name to resize
 * @param  $string - The image data, as a string
 * @param  $width - new image width
 * @param  $height - new image height
 * @param  $proportional - keep image proportional, default is no
 * @param  $output - name of the new file (include path if needed)
 * @param  $delete_original - if true the original image will be deleted
 * @param  $use_linux_commands - if set to true will use "rm" to delete the image, if false will use PHP unlink
 * @param  $quality - enter 1-100 (100 is best quality) default is 100
 * @return boolean|resource
 */
  function smart_resize_image($file,
                              $string             = null,
                              $width              = 0, 
                              $height             = 0, 
                              $proportional       = false, 
                              $output             = 'file', 
                              $delete_original    = true, 
                              $use_linux_commands = false,
  							  $quality = 100
  		 ) {
      
    if ( $height <= 0 && $width <= 0 ) return false;
    if ( $file === null && $string === null ) return false;

    # Setting defaults and meta
    $info                         = $file !== null ? getimagesize($file) : getimagesizefromstring($string);
    $image                        = '';
    $final_width                  = 0;
    $final_height                 = 0;
    list($width_old, $height_old) = $info;
	$cropHeight = $cropWidth = 0;

    # Calculating proportionality
    if ($proportional) {
      if      ($width  == 0)  $factor = $height/$height_old;
      elseif  ($height == 0)  $factor = $width/$width_old;
      else                    $factor = min( $width / $width_old, $height / $height_old );

      $final_width  = round( $width_old * $factor );
      $final_height = round( $height_old * $factor );
    }
    else {
      $final_width = ( $width <= 0 ) ? $width_old : $width;
      $final_height = ( $height <= 0 ) ? $height_old : $height;
	  $widthX = $width_old / $width;
	  $heightX = $height_old / $height;
	  
	  $x = min($widthX, $heightX);
	  $cropWidth = ($width_old - $width * $x) / 2;
	  $cropHeight = ($height_old - $height * $x) / 2;
    }

    # Loading image to memory according to type
    switch ( $info[2] ) {
      case IMAGETYPE_JPEG:  $file !== null ? $image = imagecreatefromjpeg($file) : $image = imagecreatefromstring($string);  break;
      case IMAGETYPE_GIF:   $file !== null ? $image = imagecreatefromgif($file)  : $image = imagecreatefromstring($string);  break;
      case IMAGETYPE_PNG:   $file !== null ? $image = imagecreatefrompng($file)  : $image = imagecreatefromstring($string);  break;
      default: return false;
    }
    
    
    # This is the resizing/resampling/transparency-preserving magic
    $image_resized = imagecreatetruecolor( $final_width, $final_height );
    if ( ($info[2] == IMAGETYPE_GIF) || ($info[2] == IMAGETYPE_PNG) ) {
      $transparency = imagecolortransparent($image);
      $palletsize = imagecolorstotal($image);

      if ($transparency >= 0 && $transparency < $palletsize) {
        $transparent_color  = imagecolorsforindex($image, $transparency);
        $transparency       = imagecolorallocate($image_resized, $transparent_color['red'], $transparent_color['green'], $transparent_color['blue']);
        imagefill($image_resized, 0, 0, $transparency);
        imagecolortransparent($image_resized, $transparency);
      }
      elseif ($info[2] == IMAGETYPE_PNG) {
        imagealphablending($image_resized, false);
        $color = imagecolorallocatealpha($image_resized, 0, 0, 0, 127);
        imagefill($image_resized, 0, 0, $color);
        imagesavealpha($image_resized, true);
      }
    }
    imagecopyresampled($image_resized, $image, 0, 0, $cropWidth, $cropHeight, $final_width, $final_height, $width_old - 2 * $cropWidth, $height_old - 2 * $cropHeight);
	
	
    # Taking care of original, if needed
    if ( $delete_original ) {
      if ( $use_linux_commands ) exec('rm '.$file);
      else @unlink($file);
    }

    # Preparing a method of providing result
    switch ( strtolower($output) ) {
      case 'browser':
        $mime = image_type_to_mime_type($info[2]);
        header("Content-type: $mime");
        $output = NULL;
      break;
      case 'file':
        $output = $file;
      break;
      case 'return':
        return $image_resized;
      break;
      default:
      break;
    }
    
    # Writing image according to type to the output destination and image quality
    switch ( $info[2] ) {
      case IMAGETYPE_GIF:   imagegif($image_resized, $output);    break;
      case IMAGETYPE_JPEG:  imagejpeg($image_resized, $output, $quality);   break;
      case IMAGETYPE_PNG:
        $quality = 9 - (int)((0.9*$quality)/10.0);
        imagepng($image_resized, $output, $quality);
        break;
      default: return false;
    }

    return true;
  }

class Watermark {
  
  /**
   * 
   * Erros
   * @var array
   */
  public $errors = array();

  /**
   * 
   * Image Source
   * @var img
   */
  private $imgSource = null;

  /**
   * 
   * Image Watermark
   * @var img
   */
  private $imgWatermark = null;

  /**
   * 
   * Positions watermark
   * 0: Centered
   * 1: Top Left
   * 2: Top Right
   * 3: Footer Right
   * 4: Footer left
   * 5: Top Centered
   * 6: Center Right
   * 7: Footer Centered
   * 8: Center Left
   * @var number
   */
  private $watermarkPosition = 0;
  
  /**
   * 
   * Check PHP GD is enabled
   */
  public function __construct(){
    if(!function_exists("imagecreatetruecolor")){
      if(!function_exists("imagecreate")){
        $this->error[] = "You do not have the GD library loaded in PHP!";
      }
    }
  }

  /**
   * 
   * Get function name for use in apply
   * @param string $name Image Name
   * @param string $action |open|save|
   */
  private function getFunction($name, $action = 'open') {
    if(preg_match("/^(.*)\.(jpeg|jpg)$/", $name)){
      if($action == "open")
        return "imagecreatefromjpeg";
      else
        return "imagejpeg";
    }elseif(preg_match("/^(.*)\.(png)$/", $name)){
      if($action == "open")
        return "imagecreatefrompng";
      else
        return "imagepng";
    }elseif(preg_match("/^(.*)\.(gif)$/", $name)){
      if($action == "open")
        return "imagecreatefromgif";
      else
        return "imagegif";
    }else{
      $this->error[] = "Image Format Invalid!";
    }
  }

  /**
   * 
   * Get image sizes
   * @param object $img Image Object
   */
  public function getImgSizes($img){
    return array('width' => imagesx($img), 'height' => imagesy($img));
  }

  /**
   * Get positions for use in apply
   * Enter description here ...
   */
  public function getPositions(){
    $imgSource = $this->getImgSizes($this->imgSource);
    $imgWatermark = $this->getImgSizes($this->imgWatermark);
    $positionX = 0;
    $positionY = 0;

    # Centered
    if($this->watermarkPosition == 0){
      $positionX = ( $imgSource['width'] / 2 ) - ( $imgWatermark['width'] / 2 );
      $positionY = ( $imgSource['height'] / 2 ) - ( $imgWatermark['height'] / 2 );
    }

    # Top Left
    if($this->watermarkPosition == 1){
      $positionX = 0;
      $positionY = 0;
    }

    # Top Right
    if($this->watermarkPosition == 2){
      $positionX = $imgSource['width'] - $imgWatermark['width'];
      $positionY = 0;
    }

    # Footer Right
    if($this->watermarkPosition == 3){
      $positionX = ($imgSource['width'] - $imgWatermark['width']) - 5;
      $positionY = ($imgSource['height'] - $imgWatermark['height']) - 5;
    }

    # Footer left
    if($this->watermarkPosition == 4){
      $positionX = 0;
      $positionY = $imgSource['height'] - $imgWatermark['height'];
    }

    # Top Centered
    if($this->watermarkPosition == 5){
      $positionX = ( ( $imgSource['height'] - $imgWatermark['width'] ) / 2 );
      $positionY = 0;
    }

    # Center Right
    if($this->watermarkPosition == 6){
      $positionX = $imgSource['width'] - $imgWatermark['width'];
      $positionY = ( $imgSource['height'] / 2 ) - ( $imgWatermark['height'] / 2 );
    }

    # Footer Centered
    if($this->watermarkPosition == 7){
      $positionX = ( ( $imgSource['width'] - $imgWatermark['width'] ) / 2 );
      $positionY = $imgSource['height'] - $imgWatermark['height'];
    }

    # Center Left
    if($this->watermarkPosition == 8){
      $positionX = 0;
      $positionY = ( $imgSource['height'] / 2 ) - ( $imgWatermark['height'] / 2 );
    }

    return array('x' => $positionX, 'y' => $positionY);
  }

  /**
   * 
   * Apply watermark in image
   * @param string $imgSource Name image source
   * @param string $imgTarget Name image target
   * @param string $imgWatermark Name image watermark
   * @param number $position Position watermark
   */
  public function apply($imgSource, $imgTarget,  $imgWatermark, $position = 0){
    # Set watermark position
    $this->watermarkPosition = $position;

    # Get function name to use for create image
    $functionSource = $this->getFunction($imgSource, 'open');
    $this->imgSource = $functionSource($imgSource);

    # Get function name to use for create image
    $functionWatermark = $this->getFunction($imgWatermark, 'open');
    $this->imgWatermark = $functionWatermark($imgWatermark);
    
    # Get watermark images size
    $sizesWatermark = $this->getImgSizes($this->imgWatermark);

    # Get watermark position
    $positions = $this->getPositions();

    # Apply watermark
    imagecopy($this->imgSource, $this->imgWatermark, $positions['x'], $positions['y'], 0, 0, $sizesWatermark['width'], $sizesWatermark['height']);

    # Get function name to use for save image
    $functionTarget = $this->getFunction($imgTarget, 'save');

    # Save image
    $functionTarget($this->imgSource, $imgTarget, 100);

    # Destroy temp images
    imagedestroy($this->imgSource);
    imagedestroy($this->imgWatermark);
  }
}
