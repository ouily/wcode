<?php echo $session->flash('auth'); ?>
<?php echo $form->create('User', array('action' => 'login')); ?>
<div class="form-group"><?php echo $form->input('username', array('label' => "Nom d'utilisateur")); ?></div>
<div class="form-group"><?php echo $form->input('password', array('label' => 'Mot de passe')); ?></div>
<div class="form-group"><?php echo $form->submit('Se connecter', array('class' => 'btn btn-primary')); ?></div>
<?php echo $form->end(); ?>