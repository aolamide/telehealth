<?php
App::uses('Component', 'Controller');
class DezComponent extends Component {
	public function CleanFilePath($filename) {
		$filename = str_replace(' ', '', $filename); // Replaces all spaces with hyphens.
		 //$filename=preg_replace('/[^A-Za-z0-9\-]/', '', $filename); // Removes special chars.
		 $filename=preg_replace('/[^a-zA-Z0-9\.]/', '', $filename);
		 $filename=strtolower($filename);
        return $filename;
    }
    public function slugGenerate($posttitle, $editid='') {
		$slug = str_replace(' ', '-', $posttitle); // Replaces all spaces with hyphens.
		 $slug=preg_replace('/[^A-Za-z0-9\-]/', '', $slug); // Removes special chars.
		// $filename=preg_replace('/[^a-zA-Z0-9\.]/', '', $filename);
		 $slug=strtolower($slug);
		 $RequestAccessory = ClassRegistry::init('RequestAccessory');
		 if($editid!='')
		 { 
		 $AccessoryRes= $RequestAccessory->find('all',array('conditions' => array('RequestAccessory.slug LIKE'=>''.$slug.'%', 'RequestAccessory.part_id !=' => $editid),'order' => array('RequestAccessory.slug' => 'desc')));
		   $accRes= $RequestAccessory->find('first',array('conditions' => array('RequestAccessory.slug LIKE'=>''.$slug.'%', 'RequestAccessory.part_id !=' => $editid),'order' => array('RequestAccessory.slug' => 'desc')));
		   $accessCount=count($AccessoryRes)+1;
		 // pr($accRes);exit;
		 }
		 else
		 {
			$AccessoryRes= $RequestAccessory->find('all',array('conditions' => array('RequestAccessory.slug LIKE'=>''.$slug.'%'),'order' => array('RequestAccessory.slug' => 'desc')));
				$accRes= $RequestAccessory->find('first',array('conditions' => array('RequestAccessory.slug LIKE'=>''.$slug.'%'),'order' => array('RequestAccessory.slug' => 'desc'))); 
				$accessCount=count($AccessoryRes);
		 }
		 if(count($AccessoryRes)>0)
		 {
			 if($accessCount==1)
			 {
				 $incNo=1;
			 }
			 else
			 {
				$dbSlug=$accRes['RequestAccessory']['slug'];
				$slugarr=explode($slug.'-',$dbSlug);
				if(isset($slugarr[1]) && is_numeric($slugarr[1]))
				{
					if(!empty($slugarr))
					{
						
						$slugno=$slugarr[1];
						$incNo=$slugno+1;
						
					}
					else
					{
						$incNo=1;
					}
				}
				else
				{
					$incNo=rand(10, 10000);
					//str_shuffle($slug);
				}
			 }
			$slug=$slug.'-'.$incNo;
			//echo $slug;
			//exit;
		 }
        return $slug;
    }
	
	 public function SlugBYName($tblname,$posttitle, $editid='', $editname='adv_id') {
		$slug = str_replace(' ', '-', $posttitle); // Replaces all spaces with hyphens.
		 $slug=preg_replace('/[^A-Za-z0-9\-]/', '', $slug); // Removes special chars.
		// $filename=preg_replace('/[^a-zA-Z0-9\.]/', '', $filename);
		 $slug=strtolower($slug);
		 $TBL = ClassRegistry::init($tblname);
		 if($editid!='')
		 {
		 $AccessoryRes= $TBL->find('all',array('conditions' => array('slug LIKE'=>''.$slug.'%', $editname.' !=' => $editid),'order' => array('slug' => 'desc')));
		   $accRes= $TBL->find('first',array('conditions' => array('slug LIKE'=>''.$slug.'%', $editname.' !=' => $editid),'order' => array('slug' => 'desc')));
		   $accessCount=count($AccessoryRes)+1;
		 }
		 else
		 {
			$AccessoryRes= $TBL->find('all',array('conditions' => array('slug LIKE'=>''.$slug.'%'),'order' => array('slug' => 'desc')));
				$accRes= $TBL->find('first',array('conditions' => array('slug LIKE'=>''.$slug.'%'),'order' => array('slug' => 'desc'))); 
				$accessCount=count($AccessoryRes);
		 }
		 if(count($AccessoryRes)>0)
		 {
			 if($accessCount==1)
			 {
				 $incNo=1;
			 }
			 else
			 {
				$dbSlug=$accRes[$tblname]['slug'];
				$slugarr=explode($slug.'-',$dbSlug);
				if(isset($slugarr[1]) && is_numeric($slugarr[1]))
				{
					if(!empty($slugarr))
					{
						
						$slugno=$slugarr[1];
						$incNo=$slugno+1;
						
					}
					else
					{
						$incNo=1;
					}
				}
				else
				{
					$incNo=rand(10, 10000);
					//str_shuffle($slug);
				}
			 }
			$slug=$slug.'-'.$incNo;
		 }
        return $slug;
    }
	public function slug($tblname,$posttitle, $editid='',$editfield='') {
		$slug = str_replace(' ', '-', $posttitle); // Replaces all spaces with hyphens.
		 $slug=preg_replace('/[^A-Za-z0-9\-]/', '', $slug); // Removes special chars.
		// $filename=preg_replace('/[^a-zA-Z0-9\.]/', '', $filename);
		 $slug=strtolower($slug);
		 $TBL = ClassRegistry::init($tblname);
		 if($editid!='')
		 {
		 $AccessoryRes= $TBL->find('all',array('conditions' => array('slug LIKE'=>''.$slug.'%', ''.$editfield.' !=' => $editid),'order' => array('slug' => 'desc')));
		   $accRes= $TBL->find('first',array('conditions' => array('slug LIKE'=>''.$slug.'%', ''.$editfield.' !=' => $editid),'order' => array('slug' => 'desc')));
		 	$accessCount=count($AccessoryRes)+1;
		 }
		 else
		 {
			$AccessoryRes= $TBL->find('all',array('conditions' => array('slug LIKE'=>''.$slug.'%'),'order' => array('slug' => 'desc')));
				$accRes= $TBL->find('first',array('conditions' => array('slug LIKE'=>''.$slug.'%'),'order' => array('slug' => 'desc'))); 
				$accessCount=count($AccessoryRes);
		 }
		 if(count($AccessoryRes)>0)
		 {
			 if($accessCount==1)
			 {
				 $incNo=1;
			 }
			 else
			 {
				$dbSlug=$accRes[$tblname]['slug'];
				$slugarr=explode($slug.'-',$dbSlug);
				if(isset($slugarr[1]) && is_numeric($slugarr[1]))
				{
					if(!empty($slugarr))
					{
						
						$slugno=$slugarr[1];
						$incNo=$slugno+1;
						
					}
					else
					{
						$incNo=1;
					}
				}
				else
				{
					$incNo=rand(10, 10000);
					//str_shuffle($slug);
				}
			 }
			$slug=$slug.'-'.$incNo;
		 }
        return $slug;
    }
	//Plural To Singlar
	public function modelName($word)
	{
		$rules = array( 
			'ss' => false, 
			'os' => 'o', 
			'ies' => 'y', 
			'xes' => 'x', 
			'oes' => 'o', 
			'ies' => 'y', 
			'ves' => 'f', 
			's' => '');
		foreach(array_keys($rules) as $key){
		
			if(substr($word, (strlen($key) * -1)) != $key) 
				continue;
			if($key === false) 
				$word;
			$word=substr($word, 0, strlen($word) - strlen($key)) . $rules[$key]; 
		}
		
		$word=ucwords(str_replace("_", " ",$word));
		$word=str_replace(" ", "",$word);
		return $word;
	}
	public function BapCustUniTranslate($from_lan, $to_lan, $text){
    $json = json_decode(file_get_contents('https://ajax.googleapis.com/ajax/services/language/translate?v=1.0&q=' . urlencode($text) . '&langpair=' . $from_lan . '|' . $to_lan));
    $translated_text = $json->responseData->translatedText;

    return $translated_text;
}
}
?>