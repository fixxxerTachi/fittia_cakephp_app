<?php
class Lens extends AppModel{
	public $name='Lens';
	public $useTable='lens';
	public $belongsTo=array('NoLens','SendLens','EnkinLens','LeveledLens');

}
