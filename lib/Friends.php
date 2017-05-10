<?php
class friends extends \atk4\data\Model {
	public $table = 'friends';	
	function init() {
		parent::init();
		$this->addField(['name','email']);
		$this->hasMany('money', new Money);
	}
}