<?php

class Article extends AppModel {

	var $belongsTo = array('User');

	var $validate = array(
		"name" => array(
			'rule1' => array(
                'rule' => 'notEmpty',
                'message' => "Le champ ne peut être vide"
                ),
			'rule2' => array(
                'rule' => array('minLength', '5'),
                'message' => "Le champ doit contenir au moins 5 caractères"
                )
			),
		"content" => array(
			'rule1' => array(
                'rule' => 'notEmpty',
                'message' => "Le champ ne peut être vide"
                )
			)
		);

	/**
	* beforeSave
	* Fonction appelée avant un "save"
	* @return boolean
	*
	* On créer un slug à partir du titre de l'article
	**/

	public function beforeSave() {
		if(isset($this->data[$this->alias]['name']) && !isset($this->data[$this->alias]['slug'])) {
			$this->data[$this->alias]['slug'] = strtolower(Inflector::slug($this->data[$this->alias]['name'], '-'));
		}
		return true;
	}

	/**
	* afterFind
	* Fonction appelée après un "find"
	* @param $results Tableau de résultats
	* On ajoute une entrée "url" contenant le tableau permettant de construire une URL interpretable par le router
	**/

	public function afterFind($results) {
		if(!empty($results)) {
			foreach ($results as $k => $result) {
				if(isset($result[$this->alias]['id']) && isset($result[$this->alias]['name'])) {

					$results[$k][$this->alias]['url'] = array(
						'controller' => 'articles',
						'action' => 'show',
						'id' => $result[$this->alias]['id'],
						'slug' => $result[$this->alias]['slug']
						);
				}
			}
		}
		return $results;
	}
	
}

?>