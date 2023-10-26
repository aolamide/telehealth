<?php
echo $this->element('myadmin/header-dashboard');
?>
<?php echo $this->Session->flash(); ?>
<?php echo $this->fetch('content');?>
<?php
echo $this->element('myadmin/footer-dashboard');
?>