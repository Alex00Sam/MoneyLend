<?php
class Friends extends \atk4\data\Model {
	public $table = 'friends';
	function init() {
		parent::init();
		$borrowed=$this->hasMany('Borrowed', (new Money($this->persistence))->addCondition('type', 'new lend'))->addField('total', ['aggregate'=>'sum', 'field'=>'amount']);
		$returned=$this->hasMany('Returned', (new Money($this->persistence))->addCondition('type', 'new return'))->addField('total', ['aggregate'=>'sum', 'field'=>'amount']);
		$this->addFields(['name','email','phone']);



	}
}
