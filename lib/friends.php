<?php
class Friends extends \atk4\data\Model {
	public $table = 'friends';
	function init() {
		parent::init();
		$this->hasMany('Borrowed',new Borrowed());
		$this->hasMany('Returned',new Returned());
		$this->addFields(['name','email','phone']);
	}
}
