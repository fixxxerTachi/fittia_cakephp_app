<?php class OrdersController extends AppController{
	public $name='Orders';
	public $uses=array('Order','Product','Sex','Target','Shipped','Canceled','Returned','Lens','LensInfo');
	public $scaffold;
	public $components=array('Auth');
	public function beforeFilter(){
		$this->Auth->allow('register');
	}

	public function beforeRender(){
		$sexes=$this->Sex->find('list');
		$this->set(compact('sexes'));
		$targets=$this->Target->find('list');
		$this->set(compact('targets'));
		$usr=$this->Auth->user() ? $this->Auth->user('family_name') : '';
		$this->set(compact('user'));
		/*
		$shipped=$this->Shipped->find('list');
		$this->set(compact('shipped'));
		$returned=$this->Returned->find('list');
		$this->set(compact('returned'));
		$canceled=$this->Canceled->find('list');
		$this->set(compact('canceled'));
		*/
	}


	public function test(){
		$cart=$this->Order->OrdersProduct->find('all',
			array('order'=>'created desc')
		);
		$cart=$this->Order->OrdersProduct->findById(59);
		$data['Product']['Lens']=array('77','88');
		$data['Product']['Prodcut']=array('33','44');
		$this->Order->save($data);
		$cart=$this->Order->OrdersProduct->getLastInsertId();
		$this->set('cart',$cart);
	}

	private function _reduceProducts($id){
		$product=$this->Product->findById($id);
		if($product['Product']['quantity'] > 0){
			$this->Product->id=$id;
			$this->Product->saveField('quantity',(int)$product['Product']['quantity']-1);
		}
	}

	public function register(){
		$this->layout='input_fittia';
		$sendTo=$this->Session->read('sendTo');
		$data['Order']=array(
			'member_id'=>$this->Session->read('member'),
			'user_id'=>$this->Auth->user('id'),
			'total'=>$this->Session->read('total'),
			'address_id'=>$sendTo['id'],
			'payment_id'=>$this->Session->read('payment'),
		);
		//$data['Product']['Product']=$this->Session->read('cart');
		$carts = $this->Session->read('cart');
		$pis=array();
		foreach($carts as $ci){
			array_push($pis,$ci['pid']);				
			$this->_reduceProducts($ci['pid']);
		}
		$data['Product']['Product']=$pis;	//ordersProduct product_idの配列

		if($this->Order->save($data)){
			$oid=$this->Order->getLastInsertId();
			foreach($carts as $ci){
				$data['Lens']=$ci['Lens'];
				$data['Lens']['product_id']=$ci['pid'];
				$data['Lens']['order_id']=$oid;
				$this->Lens->create();
				$this->Lens->save($data);
			}
			if($member_lens_info=$this->Session->read('member_lens_info')){
				$LensData=$member_lens_info;
				$LensData['LensInfo']['member_id']=$this->Session->read('member');
				$this->LensInfo->save($LensData);
			}
		
			$this->Session->delete('cart');
			$this->Session->delete('member');
			$this->Session->delete('total');
			$this->Session->delete('sendTo');
			$this->Session->delete('payment');
			$this->Session->delete('member_lens_info');
		}else{
			$this->Session->serFlash('保存できませんでした');

		}

		$user=$this->Auth->user() ? $this->Auth->user('family_name') : '';
		$this->set('user',$user);


	}

	public function returnAction($id){
		
		$this->layout='input_fittia';
		$ordered=$this->Order->OrdersProduct->findById($id);
		$order=$this->Order->findById($ordered['OrdersProduct']['order_id']);
		$product=$this->Product->findById($ordered['OrdersProduct']['product_id']);
		$this->set('megane',$product);
		$this->set(compact('order'));
		$this->set(compact('ordered'));
		if($this->request->isPost()){			
				$this->Order->OrdersProduct->id=$id;
				$ordered['OrdersProduct']['returned_id']='2';
				if($this->Order->OrdersProduct->save($ordered)){
					$this->Session->setFlash('返品を受け付けました');
					$this->redirect(array('controller'=>'Users','action'=>'myPage'));
				}
		}
	}	

	public function cancelAction($id){
		$this->layout='input_fittia';
		$ordered=$this->Order->OrdersProduct->findById($id);
		$order=$this->Order->findById($ordered['OrdersProduct']['order_id']);
		$product=$this->Product->findById($ordered['OrdersProduct']['product_id']);
		$this->set('megane',$product);
		$this->set(compact('order'));
		$this->set(compact('ordered'));
		if($this->request->isPost()){			
				$this->Order->OrdersProduct->id=$id;
				$ordered['OrdersProduct']['canceled_id']='2';
				$ordered['OrdersProduct']['shipped_id']='3';
				if($this->Order->OrdersProduct->save($ordered)){
					$this->Session->setFlash('キャンセルを受け付けました');
					$this->redirect(array('controller'=>'Users','action'=>'myPage'));
				}
		}

	}
	public function testAction(){
		$this->layout='input_fittia';
		$orders=$this->Product;
		$this->set(compact('orders'));
	}

}
