<h2>Rédiger un nouveau message</h2>
<hr>
<?php echo $form->create('Message'); ?>
<div class="form-group"><?php echo $form->input('recipient_id', array('label' => "Destinataire")); ?></div>
<div class="form-group"><?php echo $form->input('title', array('label' => "Objet")); ?></div>
<div class="form-group"><?php echo $form->input('content', array('label' => 'Contenu')); ?></div>
<div class="form-group"><?php echo $form->submit('Envoyer', array('class' => 'btn btn-primary')); ?></div>
<?php echo $form->end(); ?>