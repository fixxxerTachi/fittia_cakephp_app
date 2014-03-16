<?php
class Brand extends AppModel{
	public $name='Brand';
	public $belongsTo=array('Sex','Target');

}

