<?php

	class UsersController extends AppController {

		/**
		* beforeFilter
		**/

		public function beforeFilter() {
			parent::beforeFilter();
			$this->Auth->flashElement = 'flash/auth';
			$this->Auth->loginError = "Connexion refusée. Merci de vérifier votre nom d'utilisateur et/ou votre mot de passe.";
		}

		/**
		* login
		* Permet à l'utilisateur de se connecter
		**/

		public function login() {
		}

		/**
		* logout
		* Permet à l'utilisateur de se déconnecter
		**/

		public function logout() {
			$this->Auth->logout();
			$this->redirect('/');
		}


		/**
		* show
		* @param $id
		**/

		public function show($id = null) {
			if(!$id) {
				$id = $this->Auth->user('id');
			}
			$user = $this->User->find('first', array('conditions' => array('id' => $id)));
			$this->set(compact('user'));
		}

	}

?>