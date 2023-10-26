<?php  
class EmailComponent extends Object 
{ 
    /** 
     * PHPMailer object. 
     * 
     * @access private 
     * @var object 
     */ 
     var $m; 
     var $controller; 
    /** 
     * Creates the PHPMailer object and sets default values. 
     * Must be called before working with the component! 
     * 
     * @access public 
     * @return void 
     */ 
    function init() 
    {
        // Include the class file and create PHPMailer instance 
        //App::import('Vendor', 'PHPMailer', array('file' => 'phpmailer'.DS.'class'));
		App::import('Vendor', 'PhpMailer', array('file' => 'PhpMailer' . DS . 'class.phpmailer.php'));
        $this->m = new PHPMailer;

        // Set default PHPMailer variables (see PHPMailer API for more info) 
        //$this->From = 'verification@aevumdecessus.com'; 
        //$this->FromName ='Aevum Decessus Administration'; 
        // set more PHPMailer vars, for smtp etc. 

        $this->IsSMPT(); 
		$this->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
        //$this->SMTPAuth = true; 
        $this->Host = 'relay-hosting.secureserver.net'; 
        //$this->Username = 'verification'; 
        //$this->Password = 'aS$h0l3'; 
     } 
    function setBody($template, $layout) 
    { 
        $this->Body = $this->_render($template.'_html', $layout.'_html'); 
        $this->AltBody = $this->_render($template.'_text', $layout.'_text'); 
    } 

    function _render($template, $layout) 
    { 
        ob_start(); 
        $this->controller->autoRender = false; 
        $this->controller->render($template, $layout); 
        $this->controller->autoRender = 'auto'; 
        return ob_get_clean(); 
    } 
    function __set($name, $value) 
    { 
        $this->m->{$name} = $value; 
    } 

    function __get($name) 
    { 
        if (isset($this->m->{$name})) { 
            return $this->m->{$name}; 
        } 
    } 

    function __call($method, $args) 
    { 
        if (method_exists($this->m, $method)) { 
            return call_user_func_array(array($this->m, $method), $args); 
        } 
    } 
} 
?>