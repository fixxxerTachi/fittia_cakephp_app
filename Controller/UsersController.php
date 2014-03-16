<?php
class UsersController extends AppController{
	public $name='Users';
	public $uses=array('User','Address','Order','Shipped','Returned','Canceled');
	public $components=array(
		'Auth'=>array(
			'authenticate'=>array(
				'all'=>array(
					'fields'=>array(
						'username'=>'email',
						'password'=>'password',
					),
				),
				'Form'=>array(
					'userModel'=>'User'
				),
			),
		),
	);
	public $scaffold;
	public $layout='fittia';
	public function beforeFilter(){
		$this->Auth->allow('add');
	}
	public function beforeRender(){
		$shipped=$this->Shipped->find('list');
		$this->set(compact('shipped'));
		$returned=$this->Returned->find('list');
		$this->set(compact('returned'));
		$canceled=$this->Canceled->find('list');
		$this->set(compact('canceled'));
		$user=$this->Auth->user() ? $this->Auth->user('family_name'): '';
		$this->set(compact('user'));
	}

	public function add(){
		if($this->request->isPost()){
			if($this->User->save($this->request->data)){
				$this->Session->setFlash('ユーザー登録しました');
				//$id=$this->User->getLastInsertId();
				//$this->Session->write('user',$id);
				//$this->Session->delete('member');
				$this->redirect(array('controller'=>'Users','action'=>'login'));
				return;
			}else{
				$this->Session->setFlash('入力に誤りがあります');
			}
		}
	}
	public function login(){
		if($this->request->isPost()){
			if($this->Auth->login()){
				//情報がをいれたあとでログインする場合があるので消去
				$this->Session->delete('member');
				$this->Session->delete('sendTo');
				//$this->redirect(array('controller'=>'products','action'=>'confirmCart'));
				$url=$this->Auth->redirect();
				echo $url;
				if(strstr($url,'login')){
					$this->redirect(array('controller'=>'products','action'=>'confirmCart'));
					return;
				}
				$this->redirect($url);
			
			}else{
				$this->Session->setFlash('メールアドレスかパスワードが間違っています');
			}
		}
	}

	public function logout(){
		$this->Auth->logout();
		$this->Session->delete('user');
		$this->Session->delete('user_name');
		$this->Session->delete('sendTo');
		$this->Session->delete('mainAddress');
		$this->redirect(array('controller'=>'Products','action'=>'catalogue'));
	}
	
	public function myPage(){
		$this->User->recursive=3;
		$id=$this->Auth->user('id');
		$infos=$this->User->findById($id);
		/*
		$infos=$this->User->find('first',array(
			'conditions'=>array(
				'User.id'=>$id
			),
		));
		*/
		$mainAddress=$this->Address->find('first',array(
			'conditions'=>array(
				array('Address.flag' => 1),
				array('Address.user_id'=>$id),
			)
		));
		$this->Session->write('mainAddress',$mainAddress); //addressに配送先が指定してあればそのデータをなければfalse
		$this->set(compact('infos'));

	}

	public function changeAddress($flag=null){
		if(!$flag){
			$this->Session->setFlash('不正な画面遷移です');
			return;
		}
		if($flag=='main'){ 			//基本住所を配送先にしたいのでAddressのflagを0にする
			$this->Address->updateAll(array('Address.flag'=>0),array('Address.flag'=>1));
		}else{
			if($this->Session->read('mainAddress')){		//mainAddressがtrueということはAddressのflag=1がある　その中身
				$this->Address->id=$flag;	//選択アドレスのflag=1
				$this->Address->saveField('flag',1);
				$flaged=$this->Session->read('mainAddress');
				$this->Address->id=$flaged['Address']['id'];
				$this->Address->saveField('flag',0);
			}else{											//mainAddressがfalse Addressのflag=0
				$this->Address->id=$flag;
				$this->Address->saveField('flag',1);
			}
		}
		$this->redirect(array('action'=>'myPage'));
	}
	
	public function changeInfo(){
		$this->render('login');
		$user=$this->User->findById($this->Auth->user('id'));
		if($this->request->isPost()){
			if($this->request->data['User']['email']==$this->Auth->user('email')&&
				AuthComponent::password($this->request->data['User']['password'])==$user['User']['password']){
				$user_id=$this->Auth->user('id');
				$this->request->data=$this->User->findById($user_id);
				$this->render();
			}
			else{
				$this->Session->setFlash('間違っています');
			}
		}
	}

	public function changeInput(){
		if($this->request->isPost() || $this->request->isPut()){
			$this->User->id=$this->Auth->user('id');
			if($this->User->save($this->request->data)){
				$this->redirect(array('action'=>'myPage'));
			}
		}
	}

}
	
