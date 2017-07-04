<?php
class Friends extends \atk4\data\Model {
	public $table = 'friends';
	function init() {
		parent::init();
		$this->hasMany('Money', new Money());
		$this->addFields(['name','email','phone']);
	//этого я не понял :(  	$friend->addParagraph('total', ['aggregate'=>'sum', 'field'=>'amount']);


	}
}
