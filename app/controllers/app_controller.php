<?php

/** 
* AppController
* Controlleur principal
**/

class AppController extends Controller {

	  /**
	  * Composants
	  * RequestHandler permet d'obtenir des informations supplémentaires sur la requête
	  **/
	
	  var $components = array('Auth', 'Session', 'RequestHandler');

	  /**
	  * beforeFilter
	  * Fonction apppelée avant le controlleur
	  **/

	  public function beforeFilter() {
	  	$role = $this->Auth->user('role');
	  	if(isset($this->params['prefix']) && $this->params['prefix'] == "admin") {
	  		if($role == "user") {
	  			$this->Session->setFlash('Erreur');
	  			$this->redirect('/');
	  		}
	  	}
	  }

	  /**
	  * beforeRender
	  * Fonction appelée avant de rendre la vue
	  **/

	  public function beforeRender() {
	  	if($this->Auth->user('id')) {
	  		$this->set('username', $this->Auth->user('username'));
	  		$this->set('role', $this->Auth->user('role'));
	  		$this->set('authentified', true);
	  	}
	  }


}

?>