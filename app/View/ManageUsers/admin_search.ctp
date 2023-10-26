<div id='ManageUser_search'>
<?php 
echo $this->Form->create('ManageUser',array('action'=>'search'));
echo $this->Form->input("search_txt",array(""));
echo $this->end();
?>

</div>