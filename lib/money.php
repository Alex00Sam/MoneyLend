<?php
class Money extends \atk4\data\Model {
	public $table = 'money';
	function init() {
		parent::init();
		$this->addField('type',['enum'=>['+'=>'new lend','-'=>'new return']]);
		$this->addField('amount', ['type'=>'money']);
		$this->addField('date',['type'=>'date']);
		$this->hasOne('friends_id', new Friends());
	}
}
