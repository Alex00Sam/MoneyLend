<?php
class Friends extends \atk4\data\Model {
	public $table = 'friends';	
	function init() {
		parent::init();
		$this->addFields(['name','email']);
		$this->hasMany('Money', new Money());
	}
}
