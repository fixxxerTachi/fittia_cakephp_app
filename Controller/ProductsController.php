<?php
class ProductsController extends AppController{
	public $name='Products';
	public $scaffold;
	public $paginate=array(
		'Product'=>array(
			'limit'=>12,
			'order'=>array('created'=>'desc'),
		)
	);
	public $helpers=array('Js');
	public $uses=array('Product','Brand','Target','Sex','Types','Member','Payment','User','Address','Lens','NoLens','LeveledLens','SendLens','EnkinLens','LensInfo');
	public $layout='fittia';
	public $components=array('Auth');

	public function beforeRender(){
		$sexes=$this->Sex->find('list');
		$this->set(compact('sexes'));
		$targets=$this->Target->find('list');
		$this->set(compact('targets'));
		$types=$this->Types->find('list');
		$this->set(compact('types'));
		$payments=$this->Payment->find('list');
		$this->set(compact('payments'));
		$select_lens=$this->SendLens->find('list');
		$this->NoLens->displayField='name';
		$no_lens=$this->NoLens->find('list');
		$this->LeveledLens->displayField='name';
		$leveled_lens=$this->LeveledLens->find('list');
		$enkin_lens=$this->EnkinLens->find('list');
		$this->set('lens_options',array('s'=>$select_lens,'n'=>$no_lens,'l'=>$leveled_lens,'e'=>$enkin_lens));
		$this->NoLens->displayField='price';
		$this->LeveledLens->displayField='price';
		$no_price=$this->NoLens->find('list');
		$leveled_price=$this->LeveledLens->find('list');
		$this->set('lens_price',array('n'=>$no_price,'l'=>$leveled_price));




		$user=$this->Auth->user() ? $this->Auth->user('family_name') : '';
		$this->set(compact('user'));
			
	}

	public function beforeFilter(){
		$this->Auth->allow('catalogue');
		$this->Auth->allow('brand');
		$this->Auth->allow('description');
		$this->Auth->allow('cartInsert');
		$this->Auth->allow('showCart');
		$this->Auth->allow('emptyCart');
		$this->Auth->allow('delItem');
		$this->Auth->allow('inputSelect');
		$this->Auth->allow('customerInfo');
		$this->Auth->allow('changeInfo');
		$this->Auth->allow('confirmCart');
		$this->Auth->allow('payment');
		$this->Auth->allow('lastConfirm');
	}

	public function catalogue(){
		//$lists = $this->paginate();
			$data=array();
			if($this->request->isPost() && !empty($this->request->data['Product'])){
				
				$data=$this->request->data['Product'];
				$this->Session->write('conditions',$data);
			}else if($this->request->isPost() && empty($this->request->data['Product'])){
				$this->Session->delete('conditions');
			}

			$data=$this->Session->read('conditions');
			$order=array();
			$types=array();
			$targets=array();
			$sexes=array();
			$colors=array();
			$conditions=array();
			if(!empty($data['type'])){
					if(in_array('wellington',$data['type'])){array_push($types,'1');}
					if(in_array('oval',$data['type'])){array_push($types,'2','3');}
					if(in_array('square',$data['type'])){array_push($types,'4','5','6');}
					array_push($conditions,array('Product.type_id'=>$types));
			}

			if(!empty($data['target'])){
					if(in_array('adults',$data['target'])){array_push($targets,'2');}
					if(in_array('kids',$data['target'])){array_push($targets,'1');}
					array_push($conditions,array('Brand.target_id'=>$targets));
			}

			if(!empty($data['sex'])){
					if(in_array('male',$data['sex'])){array_push($sexes,'1','3');}
					if(in_array('female',$data['sex'])){array_push($sexes,'2','3');}
					array_push($conditions,array('Brand.sex_id'=>$sexes));
			}
			if(!empty($data['color'])){
				if(in_array('black',$data['color'])){array_push($colors,'2');}
				if(in_array('blue',$data['color'])){array_push($colors,'1','11');}
				if(in_array('brown',$data['color'])){array_push($colors,'4','9');}
				if(in_array('green',$data['color'])){array_push($colors,'3');}
				if(in_array('lime',$data['color'])){array_push($colors,'7');}
				if(in_array('red',$data['color'])){array_push($colors,'5');}
				if(in_array('pink',$data['color'])){array_push($colors,'8');}
				if(in_array('purple',$data['color'])){array_push($colors,'6','10');}
				array_push($conditions,array('Product.color_id'=>$colors));
			}

			
			/*
			$order='created';
			$direction='desc';
			if(!empty($data['order'])){
				if($data['order']=='new'){$order='created';$direction='desc';}
				if($data['order']=='price'){$order='price';$direction='asc';}
			}
			*/
			if(!empty($data['order'])){
				if($data['order'][0]=='new'){$order=array('created'=>'desc');}
				if($data['order'][0]=='price'){$order=array('price'=>'asc');}
				$this->paginate=array(
					'limit'=>12,
					'order'=>$order
				);
			}

			$lists=$this->paginate($conditions);

			
			/*
			$lists=$this->paginate(array(
					'Product.type_id'=>array('1','2'),//wellington or oval1
					'Brand.target_id'=>array('2'),    //adult
					'Brand.sex_id'=>array('2'),		  //female
			));
			*/
		$conditions=$this->Session->read('conditions');
			
			
		$this->set(compact('lists'));
		$this->set(compact('data'));
	}
	
/*
	private function _getList($key,$conditions){
		$data[$key]=array();
		foreach($conditions[$key] as $val){
			array_push($data,$val);
		}
		return $data;
	}
*/

	public function brand($code){
		$lists=$this->paginate(array('Brand.code'=>$code));
		$this->set(compact('lists'));
	}


	public function description($id){
		$this->_checkNum($id);
		$megane=$this->Product->findById($id);
		$this->set(compact('megane'));
	}
	public function cartInsert($id){
		$this->_checkNum($id);
		$megane=$this->Product->findById($id);

		$cart_items=array();
		if($this->Session->read('cart')){
			$cart_items=$this->Session->read('cart');
			array_push($cart_items,array('pid'=>$id));
		}else{
			array_push($cart_items,array('pid'=>$id));
		}
		$this->Session->write('cart',$cart_items);
		$this->redirect('showCart');
	}

	public function showCart(){
		$cart_items=$this->Session->read('cart');
		if(empty($cart_items)){
			return;
		}
		$ci_products=array(); //productの内容の受け皿
		$total=0;
		//lensの価格
		$this->NoLens->displayField='price';
		$this->LeveledLens->displayField='price';
		$no_price=$this->NoLens->find('list');
		$leveled_price=$this->LeveledLens->find('list');

		foreach($cart_items as $ci){
			$p=$this->Product->findById($ci['pid']);
			array_push($ci_products,$p);
			$total += $p['Product']['price'];	//totalと割引の計算
			//レンズの値段
			if(isset($ci['Lens'])){
				if($ci['Lens']['is_leveled']=='1'){
					$l_price=$no_price[$ci['Lens']['no_lens_id']];
				}else{	
					$l_price=$leveled_price[$ci['Lens']['leveled_lens_id']];
				}
				//ユーザーでレンズデータ入力なら
				//if($this->Auth->user() && $ci['Lens']['send_lens_id']=='1'){
				if($this->Auth->user()){
					$lensinfo=$this->LensInfo->find('first',array(
						'conditions'=>array(
							'LensInfo.user_id'=>$this->Auth->user('id')
						)
					));
					//レンズデータ登録済みならデータを表示する
					if($lensinfo){
						$message="<a href='../Users/myPage/' id='show_lens_data'>レンズデータを表示</a>";
					}else{
						$message="<a href='../Lens/addInfo'>レンズデータを登録</a>";
					}
				//メンバーでレンズデータ入力なら
				}elseif(!$this->Auth->user()){
					$message=$this->_showMessage();		
				}
			$total += $l_price;
			}else{
				if(!$this->Auth->user()){
					$message=$this->_showMessage();
				}else{
					$message='レンズを選択してください';
				}
			}
			$this->Session->write('total',$total);
		}

		$this->set('cart_items',$ci_products);
		$this->set(compact('total'));
		$this->set(compact('discount'));
		$this->set(compact('message'));
	}

	private function _isData(){
		if(!$this->Auth->user()){
			$infos=$this->Session->read('cart');
			foreach($infos as $info){
				if(!isset($info['Lens'])){
					return '2';
				}
				if($info['Lens']['send_lens_id']=='1'){
					return '1';
				}
				if(count($info)<2){
					return '2';
				}
			}
		}else{
			return False;
		}		
	}

	private function _showMessage(){
		$data=$this->Session->read('member_lens_info');
		if($this->_isData()=='2'){ //レンズデータがない
			$message='レンズの種類を選択してください';
		}
		if($this->_isData()=='1' && isset($data)){
			$message='member_lens_data';
		}
		if($this->_isData()=='1' && !isset($data)){
			$message='レンズデータを入力してください<a href="../lens/addInfo">レンズデータ入力</a>';
		}
		if(!$this->_isData()){
			$message='レンズデータ不要';
		}
		return $message;
	}

	public function emptyCart(){
		$this->Session->delete('cart');
		$this->Session->delete('total');
		$this->Session->delete('member_lens_info');
		$this->Session->setFlash('カートを空にしました');
		$this->redirect(array('action'=>'showCart'));
	}
	
	public function delItem($key){
		$this->_checkNum($key);
		$cartItems=$this->Session->read('cart');
		unset($cartItems[$key]);
		$this->Session->write('cart',$cartItems);
		$this->redirect(array('action'=>'showCart'));

	}
	
	private function _checkNum($num){
		if(is_null($num) || !is_numeric($num)){
			$this->Session->setFlash('不正なアクションです');
			$this->redirect(array('action'=>'catalogue'));
		}
	}

	public function inputSelect(){
		if($this->Auth->user()){
			$this->redirect(array('action'=>'confirmCart'));
			return;
		}
		$this->layout='input_fittia';
		$this->_memberCheck();	
	}

	private function _memberCheck(){
		if($this->Session->read('member')){
			$this->redirect(array('action'=>'confirmCart'));
			return ;
		}
	}

	public function customerInfo($flag,$member_id=null){
		$this->layout='input_fittia';
		//$this->_memberCheck();
		if($this->request->isPost()){
			$data=$this->request->data;
			/*
			$data['Member']['tel']=$this->request->data['Member']['tel1'] . '-' .
				$this->request->data['Member']['tel2'] . '-' . 
				$this->request->data['Member']['tel3'];
			*/
			if($flag=='non'){
				$data['Member']['password']=='none';
			}
			if($this->Member->save($data)){
				$id=$this->Member->getLastInsertId();
				$this->Session->write('member',$id);
				$this->Session->write('member_info',$data);
				$this->redirect(array('action'=>'confirmCart'));
			}else{
				$this->Session->setFlash('入力に誤りがあります');
				//$this->set('errors',$this->Member->invalidFields());
			}
		}
	}
	
	public function changeInfo($id=null){
		$this->layout='input_fittia';
			if(!$this->Auth->user()){
				if($this->request->isPost() || $this->request->isPut()){
					$this->request->data['Member']['password']=='none';
					if($this->Member->save($this->request->data)){
						$this->Member->delete($id);
						$id=$this->Member->getLastInsertId();
						$this->Session->write('member',$id);
						$this->Session->write('member_info',$this->request->data);
						$this->redirect(array('action'=>'confirmCart'));
					}else{
						$this->Session->setFlash('入力に誤りがあります');
					}
				}else if($id!==null){
					$this->request->data=$this->Member->findById($id);
				}else{
					$this->Session->setFlash('不正な画面遷移です');
				}
			}else{ 				//会員の場合は登録住所を選択
				$this->redirect(array('controller'=>'users','action'=>'myPage'));
				$this->Session->setFlash('配送先を変更してください');
			}
		$this->render('customerInfo');
	}

	public function confirmCart(){
		$this->layout='input_fittia';
		$this->showCart();
		if(!$this->Auth->user()){
			$member=$this->Member->findById($this->Session->read('member'));
		}else{
		$member['Member']=$this->Auth->user();
			
			//別に配送先がある場合の処理
			$another_address=$this->Address->find('first',array(
				'conditions'=>array(
					array('Address.user_id'=>$member['Member']['id']),
					array('Address.flag'=>1),
				),
			));
			$this->Session->write('sendTo',$another_address['Address']); //orderに登録するため
		}
		$this->set(compact('member'));
		$this->set('lens',$this->Lens->find('first'));	
	}
	
	public function payment(){
		$this->layout='input_fittia';
		if($this->request->isPost()){
			if(empty($this->request->data['payment'])){
				$this->Session->setFlash('選択されていません');
			}else{
				$this->Session->write('payment',$this->request->data['payment']);
				$this->redirect(array('action'=>'lastConfirm'));
			}
		}
		$payments=$this->Payment->find('list');
		$this->set(compact('payments'));
	}
	
	public function lastConfirm(){
		$this->confirmCart();
		
	}
	
	public function login(){
		$this->redirect(array('action'=>'confirmCart'));
	}

}
