<?php

	class PagesController extends Controller{

		function view2($name){
			// var_dump($name);
			if(!isset($name)){
				$name = 'index';
			}
			$this->set(array(
				'phrase'=> 'salut',
				'nom' => 'Tenji'
				));
			$this->render($name);
		}
		function index(){
			$this->loadModel('news');
		}

		function view($id){
			$this->loadModel('news');
			// var_dump($this->news);
			$news = $this->news->find(array(
				'conditions'=>array('idNews'=>$id,'online' => 1, 'type' => 'page'
				)));
			if(empty($news)){
				$this->e404('Page introuvable');
			}else{
				$this->set('news',$news);
			}


			// $this->set($news);
			// $this->render('index');
			// var_dump($this->vars);
		}

		function  viewall(){
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

		function example($name){
			//var_dump($name);
			$this->set(array(
				'phrase'=> 'salut',
				'nom' => 'Tenji'
				));

			$this->render('test');
		}

		public function getMenu(){
			$this->loadModel('news');
			$news = $this->news->find(array(
				'conditions'=> array('online' => 1, 'type' => 'page')
				));
			return $news;
		}
	}
?>