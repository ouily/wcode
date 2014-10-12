<?php echo $this->element('messages/menu'); ?>
<h2><?php echo $label; ?></h2>
<hr>
<?php if(!empty($messages)) { ?>
<table class="table table-condensed">
	<thead>
		<tr>
			<td>Objet</td>
			<td><?php echo ($type === null || $type == "received") ? "Expéditeur" : "Destinataire"; ?></td>
			<td>Date</td>
			<td>Action</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($messages as $message) { ?>
			<tr <?php echo (($type === null || $type == "received") && $message['Message']['r_state'] == 0) ? 'style="font-weight: bold;"' : ""; ?>>
				<td><?php echo $this->Html->link($message['Message']['title'], array('action' => 'show', $message['Message']['id'])); ?></td>
				<td><?php echo ($type === null || $type == "received") ? $message['Sender']['username'] : $message['Recipient']['username']; ?></td>
				<td><?php echo date('d/m/Y H:i:s', strtotime($message['Message']['date'])); ?></td>
				<td><?php echo $this->Html->link('Supprimer', array('action' => 'delete', $message['Message']['id']), null, "Confirmer la suppression?"); ?></td>
			</tr>
		<?php } ?>
	</tbody>
</table>
<?php } else { ?>
<p>Aucun message.</p>
<?php } ?>