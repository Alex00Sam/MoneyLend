<?php
class Friends extends \atk4\data\Model {
	public $table = 'friends';
	function init() {
		parent::init();
		$sum=$this->hasMany('Money', new Money())->addCondition('type', 'new lend')->addField('total', ['aggregate'=>'sum', 'field'=>'amount']);
		$this->addFields(['name','email','phone']);



	}
}
