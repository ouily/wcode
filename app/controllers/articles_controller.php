<?php

class ArticlesController extends AppController {

	public function beforeFilter() {
		parent::beforeFilter();
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

	/**
	* admin_add
	**/

	public function admin_add() {
		if($this->RequestHandler->isPost()) {
			$d = $this->data;
			$d['Article']['user_id'] = $this->Auth->user('id');
			if($this->Article->save($d)) {
				$this->Session->setFlash('Article publié', 'flash/alert_success');
				$this->redirect('/');
			} else {
				$this->Session->setFlash('Une erreur est survenue. Merci de vérifier que les champs ont correctement été complétés.', 'flash/alert_error');
			}
		}
	}

}

?>