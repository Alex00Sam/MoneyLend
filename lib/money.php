<?php
class Money extends \atk4\data\Model {
	public $table = 'money';	
	function init() {
		parent::init();
		$this->addField('type',['enum'=>['+'=>'new lend','-'=>'new return']]);
		$this->addField('amount');
		$this->addField('date',['type'=>'date']);
		$this->hasOne('Friends', new Friends());
	}
}
