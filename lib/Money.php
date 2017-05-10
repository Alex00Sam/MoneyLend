<?php
class money extends \atk4\data\Model {
	public $table = 'money';	
	function init() {
		parent::init();
		$this->addField('type');
		$this->addField('amount');
		$this->addField('date');
		$this->hasOne('friends_id', new Friends);
	}
}