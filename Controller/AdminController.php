<?php
class AdminController extends AppController{
	public $name='Admin';
	public $uses=array('Admin','Order','Product','Address','User','Payment','Shipped','Returned','Canceled','Color','Brand','Type');
	public $scaffold;
	public $paginate=array(
		'Order'=>array(
			'limit'=>10,
			'order'=>array('created'=>'desc'),
		)
	);
	public $components=array(
		'Auth'=>array(
			'loginAction'=>array(
				'controller'=>'Admin',
				'action'=>'login'
			),
			'authenticate'=>array(
				'Form'=>array(
					'userModel'=>'Admin'
				),
			),
		),
	);

	public function beforeFilter(){
		$this->Auth->loginError='失敗しました';
	}
	
	public function addMember(){
		if($this->request->isPost()){
			if($this->Admin->save($this->request->data)){
				$this->Session->setFlash('追加しました');
				$this->redirect(array('action'=>'login'));
			}else{
				$this->Session->setFlash('追加できません');
			}
		}
	}

	public function menu(){
	}

	public function login(){
		if($this->request->isPost()){
			if($this->Auth->login()){
				$this->redirect(array('action'=>'menu'));
			}else{
				$this->Session->setFlash('ログインに失敗しました');
			}

		}
		$this->render('addMember');
	}

	public function logout(){
		$this->Auth->logout();
		$this->redirect(array('action'=>'login'));
	}


	public function beforeRender(){
		$this->Color->displayField='code';
		$this->Brand->displayField='code';
		$colors=$this->Color->find('list');
		$brands=$this->Brand->find('list');
		$this->set(compact('colors'));
		$this->set(compact('brands'));
	}

	public function test(){
		$products=$this->Product->find('first');
		$this->set(compact('products'));
	}

	public function showOrders(){
		//$orders=$this->Order->find('all');
		$orders=$this->paginate('Order');
		$this->set(compact('orders'));
	
		$this->Canceled->displayField='admin_status';
		$this->Returned->displayField='admin_status';
		$shipped=$this->Shipped->find('list');
		$canceled=$this->Canceled->find('list');
		$returned=$this->Returned->find('list');
		$this->set('status',array('s'=>$shipped,'c'=>$canceled,'r'=>$returned));
	}	
	
	public function changeShipped(){
		if($this->request->isPost()){
			$oid=$this->request->data['Order']['id'];
			$op=$this->request->data['Order']['op'];
			$shipped_id=$this->request->data['Order']['shipped_id'];

			$this->Order->OrdersProduct->id=$op;
			$data=$this->Order->OrdersProduct->findById($op);
			$data['OrdersProduct']['shipped_id']=$shipped_id;
			$date=new DateTime();
			$data['OrdersProduct']['shipped_date']=$date->format('Y-m-d H:i:s');

			if($this->Order->OrdersProduct->save($data)){
				$this->Session->setFlash('保存しました');
				$this->redirect(array('action'=>'showOrders'));
			}else{
				$this->Session->setFlash('保存に失敗しました');
			}
		}
	}
	
	public function changeCanceled(){
		if($this->request->isPost()){
			$oid=$this->request->data['Order']['id'];
			$op=$this->request->data['Order']['op'];
			$canceled_id=$this->request->data['Order']['canceled_id'];
			$pid=$this->request->data['Order']['pid'];
		
			$this->Order->OrdersProduct->id=$op;
			if($this->Order->OrdersProduct->saveField('canceled_id',$canceled_id)){
				if($canceled_id=='3'){							//在庫処理
					$this->Product->id=$pid;
					$quantity=$this->Product->findById($pid);
					$this->Product->saveField('quantity',(int)$quantity['Product']['quantity'] + 1);
				}
				$this->Session->setFlash('保存しました');
				$this->redirect(array('action'=>'showOrders'));
			}else{
				$this->Session->setFlash('保存に失敗しました');
			}
		}
	}
	public function changeReturned(){
		if($this->request->isPost()){
			$op=$this->request->data['Order']['op'];
			$returned_id=$this->request->data['Order']['returned_id'];
			$pid=$this->request->data['Order']['pid'];
	

			$this->Order->OrdersProduct->id=$op;
			if($this->Order->OrdersProduct->saveField('returned_id',$returned_id)){
				if($returned_id=='4'){
					$this->Product->id=$pid;
					$quantity=$this->Product->findById($pid);
					$this->Product->saveField('quantity',(int)$quantity['Product']['quantity'] + 1);
				}

				$this->Session->setFlash('保存しました');
				$this->redirect(array('action'=>'showOrders'));
			}else{
				$this->Session->setFlash('保存に失敗しました');
			}
		}
	}
	
	public function showQuantities($id=null){
			if(!is_null($id)){
				$products=$this->Product->find('all',
					array('conditions'=>array(
						'Product.id'=>$id,
					))
				);
			}else{
				$products=$this->Product->find('all');
			}
		$this->set(compact('products'));
	}
	public function changeQuantity(){
		if($this->request->isPost()){
			$id=$this->request->data['Product']['id'];
			$this->Product->id=$id;
			if($this->Product->saveField('quantity',$this->request->data['Product']['quantity'])){
				$this->Session->setFlash('保存しました');
				$this->redirect(array('action'=>'showQuantities'));
			}else{
				$this->Session->setFlash('保存できませんでした');
			}
		}
	}

	public function arriveAction(){
	//	$this->layout='';
		if($this->request->isPost()||$this->request->isPut()){
			$product=$this->Product->findById($this->request->data['Product']['id']);
			$this->set(compact('product'));
		}
	}
	
	public function addQuantity(){
		if($this->request->isPost() || $this->request->isPut()){
			$id=$this->request->data['Product']['id'];
			$quantity=$this->request->data['Product']['quantity'];
			$arrival=$this->request->data['Product']['arrival'];
			$this->Product->id=$id;
			if($this->Product->saveField('quantity',$arrival + $quantity)){
				$this->Session->setFlash('追加しました');
				$this->redirect(array('action'=>'arriveAction'));
			}else{
				$this->Session->setFlash('追加に失敗しました');
				$this->redirect(array('action'=>'arriveAction'));
			}
		}
	}
	
	public function addProduct(){
		$this->Type->displayField='name';
		$types=$this->Type->find('list');
		if($this->request->isPost()){
			$data=$this->request->data['Product'];
			$this->Brand->displayField='code'; 
			$this->Color->displayField='code'; 
			$brands=$this->Brand->find('list'); 
			$colors=$this->Color->find('list');
			$number=$brands[$data['brand_id']] . '-' . $colors[$data['color_id']] . '-';
			$image=$brands[$data['brand_id']] . DS  . $types[$data['type_id']] . DS . $colors[$data['color_id']];
			$data['image']='';
			if($this->Product->save($data)){
				$this->Session->setFlash('保存しました');
				$id=$this->Product->getLastInsertId();
				$this->Product->saveField('number',$number . $id);
				$image=$image . '-'. $id . '.jpg';
				$this->Product->saveField('image',$image);
				if(move_uploaded_file($this->request->data['Product']['image']['tmp_name'],
					'/home/tachi/www/online_store/app/webroot/img/'. $image)){
					$this->Session->setFlash('移動しました');
				}else{
					$this->Session->setFlash('移動に失敗しました');
				}

			}else{
				$this->Session->setFlash('失敗しました');
			}
		}

		$uploaddir=$this->webroot;				
		$this->set('request_data',$uploaddir);
		$this->set('types',$types);
	}

}
