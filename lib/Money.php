<?php
class money extends \atk4\data\Model {
	public $table = 'money';	
	function init() {
		parent::init();
		$this->addFields(['type','amount','date']);
		$this->hasOne('friends_id', new friends);
	}
}