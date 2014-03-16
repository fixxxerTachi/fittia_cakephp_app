<?php 
class User extends AppModel{
	public $name='User';
	public $hasMany=array('Address','Order');
	public $hasOne=array('LensInfo');

	public function beforeSave($options=array()){
		if(!empty($this->data[$this->alias]['password'])){
			$this->data[$this->alias]['password']=AuthComponent::password(
				$this->data[$this->alias]['password']);
		}
		return true;
	}
	public $validate=array(
		'first_name'=>array(
			array(
				'rule'=>array('checkNotEmpty','family_name','first_name'),
				'message'=>'必須入力です',
			),
		),
		'first_furigana'=>array(
			array(
				'rule'=>array('checkNotEmpty','family_furigana','first_furigana'),
				'message'=>'必須入力です',
			),
		),
		'zip_last'=>array(
			array(
				'rule'=>array('checkNotEmpty','zip_first','zip_last'),
				'message'=>'必須入力です',
			),
			array(
				'rule'=>array('checkNumeric','zip_first','zip_last'),
				'message'=>'半角数字で入力してください',
			),
		),
		'address2'=>array(
			array(
				'rule'=>array('checkNotEmpty2','prefecture','address','address2'),
				'message'=>'必須入力です',
			),
		),
		'tel3'=>array(
			array(
				'rule'=>array('checkNotEmpty2','tel1','tel2','tel3'),
				'message'=>'必須入力です',
			),
			array(
				'rule'=>array('checkNumeric2','tel1','tel2','tel3'),
				'message'=>'半角数字で入力してください',
			),
		),

		'email'=>array(
			array(
				'rule'=>'notEmpty',
				'message'=>'必須入力です',
			),
			array(
				'rule'=>'email',
				'message'=>'メールアドレスを入力してください',
			),
		),
		'password'=>array(
			array(
				'rule'=>'notEmpty',
				'message'=>'必須入力です',
			),
		),
	);

	public function checkNotEmpty($data,$first,$second){
		if(!empty($this->data[$this->alias][$first]) && !empty($this->data[$this->alias][$second])){
			return true;
		}else{
			return false;
		}
	}

	public function checkNotEmpty2($data,$first,$second,$third){
		if($this->checkNotEmpty($data,$first,$second) && !empty($this->data[$this->alias][$third])){
			return true;
		}else{
			return false;
		}
	}
	public function checkNumeric($data,$first,$second){
		$pattern='/^[0-9]+$/';
		if(preg_match($pattern,$this->data[$this->alias][$first]) && preg_match($pattern,$this->data[$this->alias][$second])){
			return true;
		}else{
			return false;
		}
	}
	public function checkNumeric2($data,$first,$second,$third){
		$pattern='/^[0-9]+$/';
		if($this->checkNumeric($data,$first,$second) && preg_match($pattern,$this->data[$this->alias][$third])){
			return true;
		}else{
			return false;
		}
	}

}
