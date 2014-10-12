<?php

class Message extends AppModel {

	var $validate = array(
		"title" => array(
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

}

?>