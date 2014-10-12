<?php

class MessagesController extends AppController {

	/**
	* Liste des messages
	* @param $type sent | received
	**/

	public function index($type = null) {
		if($type === null || $type == 'received') {
			$label = "Messages reçus";
			$conditions = array(
				'conditions' => array(
					'recipient_id' => $this->Auth->user('id'),
					'r_state < 2'
				)
			);
		} else if($type == 'sent') {
			$label = "Messages envoyés";
			$conditions = array(
			'conditions' => array(
				'sender_id' => $this->Auth->user('id'),
				's_state < 1'
				)
			);
		}

		$messages = $this->Message->find('all', $conditions);
		$this->set(compact('messages', 'label'));
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
	* @param $id ID du message
	*
	* Il y a deux types de suppression:
	* - la suppression physique
	* - la suppression virtuelle
	* Qu'on soit l'expéditeur ou le destinataire on ne supprime le message physiquement que si l'autre l'a déjà fait
	**/
	public function delete($id = null) {
		if($id) {
			$user_id = $this->Auth->user('id');
			$this->Message->id = $id;
			$message = $this->Message->read();
			$recipient_id = $message['Message']['recipient_id'];
			$sender_id = $message['Message']['sender_id'];
			$r_state = $message['Message']['r_state']; // état du message pour le receveur
			$s_state = $message['Message']['s_state']; // état du message pour l'expéditeur
			$deleted = false;
			if($user_id == $recipient_id) { // on est le destinataire
				$deleted = true;
				if($s_state == 1) { // l'expéditeur l'a supprimé
					$this->Message->delete();
				} else {
					$this->Message->saveField('r_state', 2); // on supprime le message virtuellement
				}
				$this->Session->setFlash('Message supprimé', 'flash/alert_success');
				$this->redirect(array('action' => 'index'));
			}
			if($user_id == $sender_id) { // on est l'expéditeur
				$deleted = true;
				if($r_state == 2) { // si le destinataire l'a supprimé
					$this->Message->delete();
				} else {
					$this->Message->saveField('s_state', 1); // on supprime le message virtuellement
				}
			}
			if($deleted) {
				$this->Session->setFlash('Message supprimé', 'flash/alert_success');
			} else {
				$this->Session->setFlash("Vous n'êtes pas autorisé à supprimer ce message", 'flash/alert_error');
			}
			$this->redirect(array('action' => 'index'));

		} else {
			$this->cakeError('error404');
		}
	}

}

?>