<?php
class MyUsersController extends AppController{
	public $name = 'MyUsers';
	public $uses = array('MyUser');
	public $components = array('Auth');	
	public function index(){
		$userData = $this->MyUser->find('all');
		$this->set(compact('userData'));

	}

	public function add(){
		if($this->request->isPost() || $this->request->isPut()){
			if(!empty($this->request->data)){
				if($this->MyUser->save($this->data)){
					$this->Session->setFlash('保存しました');
					$this->redirect(array('action'=>'index'));
					return;
				}
			}
			$this->Session->setFlash('保存に失敗しました');
		}
	}

	public function edit($id){
		if($this->request->isPost() || $this->request->isPut()){
			if(!empty($this->request->data)){
				if($this->MyUser->save($this->data)){
					$this->Session->setFlash('保存しました');
					$this->redirect(array('action'=>'index'));
					return;
				}
			}
			$this->Session->setFlash('保存に失敗しました');
		}else{
			if(!is_null($id)){
				$this->data = $this->MyUser->findById($id);
			}
		}
	}

	public function testerror(){
		throw new NotFoundException();
	}

	public function delete($id){
		if($this->request->isDelete()){
			if(!empty($this->data)){
				if($this->MyUser->delete(
					$this->data[$this->MyUser->alias]['id'])){
						$this->Session->setFlash('削除しました');
						$this->redirect(array('action'=>'index'));
						return;
				}
			}
			$this->Session->setFlash('削除に失敗しました');
			$this->redirect(array('action'=>'index'));
			return ;
		}else{
			$this->data = $this->MyUser->findById($id);
			if(empty($this->data)){
				$this->Session->setFlash('データが存在しません');
				$this->redirect(array('action'=>'index'));
				return;
			}
		}
	}


}

