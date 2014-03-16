<?php
class AddressesController extends AppController{
	public $name='Addresses';
	public $uses=array('Address');
	public $components=array('Auth');
//	public $layout='fittia';
	
	public function addAddress(){
		if($this->request->isPost()){
			$this->request->data['Address']['user_id']=$this->Auth->user('id');
			$this->Address->save($this->data);
			$this->redirect(array('controller'=>'users','action'=>'myPage'));
		}
	}



/*
	public function registerAddress(){
		if($this->request->isPost()){
			$data=$this->request->data;
			$data['Address']['member_id']=$this->Session->read('member');
			
			$datacount=$this->Address->find('count',array(
				'conditions'=>array(
					'member_id'=>$data['Address']['member_id']
				)
			));
			if($datacount > 0){
				$this->Address->updateAll(
					array('main'=>0),array('member_id'=>$data['Address']['member_id'])
				);
			}
			if($this->Address->save($data)){
				$sendTo=array(
					'zip'=>$data['Address']['zip_first'] . '-' . $data['Address']['zip_last'],
					'prefecture'=>$data['Address']['prefecture'],
					'address'=>$data['Address']['address'],
					'address2'=>$data['Address']['address2'],
					'address_id'=>$this->Address->getLastInsertId()
				);
				$this->Session->write('sendTo',$sendTo);
				$this->Session->setFlash('配送先を変更しました');
				$lastId=$this->Address->getLastInsertId();
				$this->redirect(array('controller'=>'Products','action'=>'confirmCart'));
			}else{
				$this->Session->setFlash('登録に失敗しました');
				$this->redirect(array('controller'=>'Products','action'=>'catalogue'));
			}
		}
	}
*/
}

