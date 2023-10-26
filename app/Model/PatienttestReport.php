<?php
App::uses('AppModel', 'Model');
/**
 * PatienttestReport Model
 *
 */
class PatienttestReport extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'patienttest_reports';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'test_result';

}
