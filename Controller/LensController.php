<?php
class LensController extends AppController{
	public $name='Lens';
	public $uses=array('Lens','NoLens','EnkinLens','LeveledLens','SendLens','LensInfo');
	public $scaffold;	
	public $components=array('Auth');
	public $layout='fittia';
	public function beforeFilter(){
		$this->Auth->allow('selectLens');
		$this->Auth->allow('select');
		$this->Auth->allow('editLens');
		$this->Auth->allow('addInfo');
	}


	public function beforeRender(){
		$no_lens=$this->NoLens->find('list');
		$this->set(compact('no_lens'));
		$enkin_lens=$this->EnkinLens->find('list');
		$this->set(compact('enkin_lens'));
		$leveled_lens=$this->LeveledLens->find('list');
		$this->set(compact('leveled_lens'));
		$send_lens=$this->SendLens->find('list');
		$this->set(compact('send_lens'));}

	public function selectLens(){
		$user=False;
		if($this->Auth->user()){
			$user=True;
		}else{
			$user=False;
		}
		if($this->request->isPost()){
			if($this->Lens->save($this->request->data)){
				$this->Session->setFlash('保存しました');
				$this->Session->write('lens',$this->Lens->getLastInsertId());
				$this->redirect(array('controller'=>'Products','action'=>'confirmCart'));
			}else{
				$this->Session->setFlash('保存できませんでした');
			}
		}
		$this->set(compact('user'));
	}
	
	public function select($key=null){
		if($this->Auth->user()){
			$user=True;
		}else{
			$user=False;
		}
		if($this->request->isPost()){
				$data=$this->request->data;
				$cart_items=$this->Session->read('cart');
				$new = array_merge($cart_items[$key],$data);
				$cart_items[$key]=$new;
				$this->Session->write('cart',$cart_items);
			/*
				$Info['LensInfo']['level_r']=$this->request->data['Lens']['level_r'];
				$Info['LensInfo']['level_l']=$this->request->data['Lens']['level_l'];
				$Info['LensInfo']['astig_r']=$this->request->data['Lens']['astig_r'];
				$Info['LensInfo']['astig_l']=$this->request->data['Lens']['astig_l'];
				$this->Session->write('member_lens_info',$Info);
			*/
			$this->redirect(array('controller'=>'Products','action'=>'showCart'));
			}
			$this->set(compact('user'));
			$this->render('select_lens');
		}



	public function editLens($id=nul){
		if($this->request->isPost() || $this->request->isPut()){
			$this->Lens->id=$id;
			$data=$this->request->data['Lens'];
			if($this->Lens->save($data)){
				$this->Session->setFlash('更新しました');
				$this->redirect(array('controller'=>'Products','action'=>'confirmCart'));
			}else{
				$this->Session->setFlash('更新できませんでした');
			}
		}else{
			$this->request->data=$this->Lens->findById($id);
		}
	}
	
	public function addInfo(){
		if($this->request->isPost()){
			$data=$this->request->data;
			if($this->Auth->user()){
				$data['LensInfo']['user_id']=$this->Auth->user('id');
				if($this->LensInfo->save($data)){
					$this->Session->setFlash('レンズデータを保存しました');
					$this->redirect(array('controller'=>'Users','action'=>'myPage'));
				}else{
					$this->Session->setFlash('レンズデータを保存できませんでした');
				}
			}else{
				$this->Session->write('member_lens_info',$data);
				$this->redirect(array('controller'=>'Products','action'=>'showCart'));
			}
			
		}
	}

	public function editInfo($id){
	/*
		$uid=$this->Auth->user('id');
		$this->request->data=$this->LensInfo->find('first',array(
			'conditions'=>array(
				'user_id'=>$uid)
			));
	*/
		if($this->request->isPost() || $this->request->isPut()){
			$this->LensInfo->id=$id;
			if($this->LensInfo->save($this->request->data)){
				$this->Session->setFlash('レンズデータを更新しました');
				$this->redirect(array('controller'=>'Users','action'=>'myPage'));
			}else{
				$this->Session->setFlash('レンズでーを更新できませんでした');
			}
		}
		$this->render('add_info');
	}

}

