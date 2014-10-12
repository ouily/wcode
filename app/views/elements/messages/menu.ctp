<ul class="nav nav-pills">
  <li><?php echo $this->Html->link('Nouveau message', array('action' => 'create')); ?></li>
  <li><?php echo $this->Html->link('Messages reçus', array('action' => 'index')); ?></li>
  <li><?php echo $this->Html->link('Messages envoyés', array('action' => 'index', 'sent')); ?></li>
</ul>