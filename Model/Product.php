<?php
class Product extends AppModel{
	public $name='Product';
	public $belongsTo=array('Brand','Type','Color');
	public $hasAndBelongsToMany=array('Order');
}
