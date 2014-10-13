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
	*
	* On vérifie que le slug est le bon
	**/

	public function show($id = null, $slug = null) {
		if($id) {
			$article = $this->Article->find('first', array('conditions' => array('Article.id' => $id)));
			if(!$article) {
				$this->cakeError('error404');
			}
			if($article['Article']['slug'] != $slug) {
				$this->redirect($article['Article']['url']);
			}
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