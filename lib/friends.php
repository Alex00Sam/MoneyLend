<?php
class Friends extends \atk4\data\Model {
	public $table = 'friends';
	function init() {
		parent::init();
		$sum=$this->hasMany('Money', new Money())->addCondition('type', '+'))->addField('total', ['aggregate'=>'sum', 'field'=>'amount']);
		$this->addFields(['name','email','phone']);
	//этого я не понял :(  	$friend->addParagraph('total', ['aggregate'=>'sum', 'field'=>'amount']);


	}
}
$u->hasMany('PaidOrders', (new Model_Order()))
    ->addField('paid_amount', ['aggregate'=>'sum', 'field'=>'amount']);
