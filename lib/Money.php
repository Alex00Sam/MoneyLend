<?php
class money extends \atk4\data\Model {
	public $table = 'money';	
	function init() {
		parent::init();
		$this->addField('type',['type'=>'boolean']);
		$this->addField('amount');
		$this->addField('date',['type'=>'date']);
		$this->hasOne(['friends_id', new friends]);
	}
}