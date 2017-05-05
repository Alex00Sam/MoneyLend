<?php
class friends extends \atk4\data\Model {
	public $table = 'friends';	
	function init() {
		parent::init();
		$this->addField('name');
		$this->addField('email');
		$this->hasMany('money');
	}
}