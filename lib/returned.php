<?php
class Returned extends \atk4\data\Model {
	public $table = 'returned';
	function init() {
		parent::init();
		$this->addField('amount', ['type'=>'money']);
		$this->addField('date',['type'=>'date']);
		$this->hasOne('friends_id', new Friends());
	}
}
