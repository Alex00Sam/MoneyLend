<?php
class Friends extends \atk4\data\Model {
	public $table = 'friends';
	function init() {
		parent::init();
		$borrowed=$this->hasMany('Money', (new Money($this->persistence))->addCondition('type', 'new lend'))->addField('total_borrowed', ['aggregate'=>'sum', 'field'=>'amount']);
		$returned=$this->hasMany('Money', (new Money($this->persistence))->addCondition('type', 'new return'))->addField('total_returned', ['aggregate'=>'sum', 'field'=>'amount']);
		$this->addFields(['name','email','phone']);



	}
}
