<?php
App::uses('AppModel', 'Model');
/**
 * Chat Model
 *
 */
class Chat extends AppModel {

/**
 * Primary key field
 *
 * @var string
 */
	public $primaryKey = 'y';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'chat_message';

}
