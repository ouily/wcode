<?php

class AppController extends Controller {
	
	  var $components = array('Auth');

	  /**
	  * beforeFilter
	  **/

	  public function beforeFilter() {
	  }

	  /**
	  * beforeRender
	  * Fonction appelée avant de rendre la vue
	  **/

	  public function beforeRender() {
	  	if($this->Auth->user('id')) {
	  		$this->set('username', $this->Auth->user('username'));
	  		$this->set('authentified', true);
	  	}
	  }


}

?>