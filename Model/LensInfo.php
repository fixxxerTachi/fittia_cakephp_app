<?php
class LensInfo extends AppModel{
	public $name='LensInfo';
	public $useTable='lens_infos';
	public $validate=array(
		'level_r'=>array(
			array('rule'=>'notEmpty','message'=>'入力してください')
		),
		'level_l'=>array(
			array('rule'=>'notEmpty','message'=>'入力してください')
		),
		'astig_r'=>array(
			array('rule'=>'notEmpty','message'=>'入力してください')
		),
		'astig_l'=>array(
			array('rule'=>'notEmpty','message'=>'入力してください')
		)

	);
}
