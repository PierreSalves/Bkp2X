<?php echo $this->Flash->render('flash') ?>
<div class="row">
	<?php foreach ($bkp001 as $cliente) : ?>
		<div class="col-md-3">
			<div class="panel <?php echo 'verde-primary'; ?> ">
				<div class="panel-heading panel-title <?php echo 'verde-primary'; ?>">
					<?php echo $cliente['Cliente']['clndescricaoreduzido'] ?>
				</div>
				<div class="panel-body <?php echo 'verde-secondary'; ?> card-body">
					<?php echo $cliente['Cliente']['clndescricao'] ?>
					<?php foreach ($cliente['Backups'] as $key => $backup) : ?>
						<legend><?php echo $backup['bktnomearquivo']; ?></legend>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>
