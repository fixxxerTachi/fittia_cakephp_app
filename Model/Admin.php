<?php
class Admin extends AppModel{
	public $name='Admin';
	public $useTable='admins';

	public function beforeSave(){
		if(!empty($this->data[$this->alias]['password'])){
			$this->data[$this->alias]['password']=AuthComponent::password(
				$this->data[$this->alias]['password']);
		}
		return true;
	}
}


