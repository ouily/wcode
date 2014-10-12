<?php

class MessagesController extends AppController {

	/**
	* Liste des messages
	**/

	public function index() {
		$messages = $this->Message->find('all');
		$this->set(compact('messages'));
	}

	/**
	* create
	* Création d'un nouveau message
	* Il va nous falloir récupérer la liste des utilisateurs et l'afficher dans un champ de type "select"
	**/

	public function create() {

		$user_id = $this->Auth->user('id');
		$this->loadModel('User');

		$recipients = $this->User->find('list', array(
			'conditions' => array('not' => array('User.id' => $user_id)),
			'fields' => array('id', 'username')
		));
		$this->set(compact('recipients'));

		if($this->RequestHandler->isPost()) {
			$d = $this->data;
			$d['Message']['sender_id'] = $user_id;
			$d['Message']['date'] = date("Y-m-d H:i:s");
			if(!array_key_exists($d['Message']['recipient_id'], $recipients)) { // sécurité
				$this->cakeError('error500');
			};
			if($this->Message->save($d)) {
				$this->Session->setFlash('Message envoyé', 'flash/alert_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('Une erreur est survenue. Merci de vérifier que les champs ont correctement été complétés.', 'flash/alert_error');
			}
		}

	}

	/**
	* delete
	* Suppression d'un message
	**/
	public function delete() {

	}

}

?>