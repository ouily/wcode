<?php

class AppController extends Controller {
	
	  var $components = array('Auth');

	  public function beforeRender() {
	  	if($this->Auth->user('id')) {
	  		$this->set('authentified', true);
	  	}
	  }

}

?>