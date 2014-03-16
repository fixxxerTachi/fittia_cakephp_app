<?php
class Personal extends AppModel{
	public $name = 'Personal';
	public $validate = array(
		'name'=>array(
			array(
				'rule'=>'notEmpty',
				'message'=>'入力してください'
			)
		),
		'password'=>array(
			array(
				'rule'=>'notEmpty',
				'message'=>'入力してください'
			)
		)
	);

	public function checkNameAndPass($data){
		$n = $this->find('count',array(
			'conditions'=>array(
				'Personal.name' => $data['Personal']['name'],
				'Personal.password'=>$data['Personal']['password']
			)
		));
		return $n > 0 ? true: false;
	}
		

}

