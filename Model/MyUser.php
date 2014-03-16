<?php
class MyUser extends AppModel{
	public $name = 'MyUser';
	public $useTable = 'users';
	public $validate = array(
		'username'=>array(
			array(
				'rule'=>'notEmpty',
				'message'=>'入力してください'
			),
			array(
				'rule'=>'isUnique',
				'message'=>'すでに登録されています'
			)
		),
		'password'=>array(
			array(
				'rule'=>'notEmpty',
				'message'=>'入力してください'
			)
		)
	);
	public function beforeSave($options = array()){
		if(!empty($this->data[$this->alias]['password'])){
			$this->data[$this->alias]['password'] = AuthComponent::password(
				$this->data[$this->alias]['password']);
		}
		return true;
	}
	

}

