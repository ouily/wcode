<?php

class ArticlesController extends AppController {

	public function beforeFilter() {
		$this->Auth->allow('index', 'show');
	}

	/**
	* index
	* On affiche la liste de tous les articles
	**/

	public function index() {
		$articles = $this->Article->find('all');
		$this->set('articles', $articles);
	}


	/**
	* show
	* On affiche l'article
	* @param $id
	**/

	public function show($id = null) {
		if($id) {
			$article = $this->Article->find('first', array('conditions' => array('Article.id' => $id)));
			$this->set(compact('article'));
		}
	}

}

?>