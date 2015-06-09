<?php

class BlogController extends Controller{

	public $layout = 'defaultBlog';		
	

	public function index(){
		$perPage=2;
		$this->loadModel('news');
		$condition = array('online' => 1, 'type' => 'page');
		// var_dump($this->request->page);
		$d['news'] = $this->news->find(array(
			'fields' => 'idNews, title, content ,(select count(*) from news as n where news.date > n.date ) +1 as position',
			'conditions' => $condition,
			'limit' => ($perPage*($this->request->page - 1)) .', ' .$perPage,
			'order' => 'date'

			));
		if(isset($this->request->data['page'])){
			$page = $this->request->data['page'];
		} else {

			$page = null;
		}
		// $d['news'] = $this->news->db->get($page);
		$d['total'] = $this->news->db->numberOfNews;
		$d['pages']= ceil(intval($d['total']) / $perPage);
		// debug($d);
		if(empty($d['news'] )){
			$this->e404('Page introuvable');
		}else{
			$this->set($d);
		}

		// debug($_SESSION['User']);
		// debug($this->session->isLogged());
		// $admin = $this->isAdmin();
		// debug($admin);

	}

	public function view($number=null){
		$this->loadModel('news');
		// var_dump($this->news);
		//$conditions = array('idNews'=>$id,'online' => 1, 'type' => 'page'
		//	);

		$news = $this->news->db->getNewsByNumber($number);
		$news['totalNumber'] = $this->news->db->getNumberOfNews();
		// debug($news);
		$news['date']= $this->getFormatDate($news['date']);
		if(empty($news)){
			$this->e404('Page introuvable');
		}else{
			$this->set('news',$news);
		}

		// debug($news);
		// $this->set($news);
		// $this->render('view');
		// debug($this->vars);
	}

	public function  viewall(){
		$this->loadModel('news');
		$news = $this->news->find(array(
			'conditions'=> array('online' => 1, 'type' => 'page')
			));
		if(empty($news)){
			$this->e404('Page introuvable');
		}else{
			$this->set('news',$news);
		}
		$this->render('viewall');
	}

	public function admin_index(){
		$perPage=10;
		$this->loadModel('news');
		$condition = array( 'type' => 'page');
		// var_dump($this->request->page);
		$d['news'] = $this->news->find(array(
			'fields' => 'idNews,title,online',
			'conditions' => $condition,
			'limit' => ($perPage*($this->request->page - 1)) .', ' .$perPage
			));
		$d['total'] = $this->news->findCount($condition);
		$d['pages']= ceil(intval($d['total']) / $perPage);
		// var_dump($d);
		if(empty($d['news'] )){
			$this->e404('Page introuvable');
		}else{
			$this->set($d);
		}
		// debug($_SESSION['User']);
		// debug($this->session->isLogged());
		//$admin = $this->isAdmin();
		// debug($admin);
	}

	public function admin_delete($id){
		$this->loadModel('news');
		$this->news->delete($id);
		$this->session->setFlash('Contenu supprimé','success');
		$this->redirect(REFFERER.DS.ADMIN.DS.'blog/index');
	}

	public function admin_edit($id=null){
		$this->loadModel('news');

		$d['id'] = '';
		// var_dump($this->news->validate);
		if($this->request->data){
		// 	var_dump($this->news->validate);
			if($this->validates($this->news->validate,$this->request->data)){
				$id= $this->news->id;
				$this->news->save($this->request->data);
				$this->session->setFlash('Le contenu a bien été modifié','success');
			} else {
				$this->session->setFlash('Contient des erreurs veuillez vérifier ','danger');
				//var_dump($this->errors);
			}
		
				//$this->redirect(REFFERER.DS.ADMIN.DS.'blog/index');
			
		}
		if($id){
			$this->request->data = $this->news->findFirst(array(
			'fiedls' => 'idnews,titlte,content,online',
			'conditions' => array('idNews' => $id)
			));
			$d['id'] = $id;
		}
		$this->set($d);
		//var_dump($this->request->data);
	}



}