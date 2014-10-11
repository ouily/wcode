<h1>Ajouter un article</h1>
<hr>
<?php echo $form->create('Article'); ?>
<div class="form-group"><?php echo $form->input('name', array('label' => "Nom")); ?></div>
<div class="form-group"><?php echo $form->input('content', array('label' => 'Contenu')); ?></div>
<div class="form-group"><?php echo $form->submit('Publier', array('class' => 'btn btn-primary')); ?></div>
<?php echo $form->end(); ?>