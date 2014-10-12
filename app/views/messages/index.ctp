<h2>Liste des messages</h2>
<hr>
<?php if(!empty($messages)) { ?>
<table class="table table-condensed">
	<thead>
		<tr>
			<td>Objet</td>
			<td>Expéditeur</td>
			<td>Date</td>
			<td>Action</td>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($messages as $message) { ?>
			<tr>
				<td><?php echo $message['Message']['title']; ?></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
		<?php } ?>
	</tbody>
</table>
<?php } else { ?>
<p>Aucun mesage reçu.</p>
<?php } ?>