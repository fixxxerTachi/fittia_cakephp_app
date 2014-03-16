<?php
class Order extends AppModel{
	public $name='Order';
	public $hasAndBelongsToMany=array('Product');
	public $belongsTo=array('Member','Address','Payment','User');
	public $hasMany=array('Lens');	
}

