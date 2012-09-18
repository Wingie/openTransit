<?php
App::uses('AppModel', 'Model');
/**
 * Bus Model
 *
 * @property Route $Route
 */
class Bus extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Route' => array(
			'className' => 'Route',
			'foreignKey' => 'bus_id',
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
