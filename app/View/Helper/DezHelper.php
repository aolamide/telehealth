<?php
	class DezHelper extends AppHelper {
	public function warrantyDetails($userid)
	{
		App::import('Model','SalesWarranty');
		$SalesWarranty=new SalesWarranty();
		$warrantydetail=$SalesWarranty->find('first', array('conditions' => array('SalesWarranty.user_id' => $userid)));
		return ($warrantydetail);
	}
}
?>	