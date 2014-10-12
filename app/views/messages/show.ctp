<?php echo $this->element('messages/menu'); ?>
<h2><?php echo $message['Message']['title']; ?></h2>
<i>Envoyé le <?php echo date('d/m/Y à H:i:s', strtotime($message['Message']['date'])); ?> par <?php echo $message['Sender']['username']; ?> à <?php echo $message['Recipient']['username']; ?></i>
<hr>
<p><?php echo $message['Message']['content']; ?></p>