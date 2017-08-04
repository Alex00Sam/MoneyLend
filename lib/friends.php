<?php
class Friends extends \atk4\data\Model {
	public $table = 'friends';
	function init() {
		parent::init();
		$this->hasMany('Borrowed',new Borrowed())->addField('total_borrowed', ['aggregate'=>'sum', 'field'=>'amount']);//aggregate makes a certain operation(f.e. summary) with all field's values
		$this->hasMany('Returned',new Returned())->addField('total_returned', ['aggregate'=>'sum', 'field'=>'amount']);
		$this->addFields(['name','email','phone']);
	}
}
