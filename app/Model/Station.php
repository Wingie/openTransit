<?php
App::uses('AppModel', 'Model');
/**
 * Station Model
 *
 * @property Route $Route
 */
class Station extends AppModel {
var $order = 'name';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Route' => array(
			'className' => 'Route',
			'foreignKey' => 'station_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
