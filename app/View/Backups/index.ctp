<?php echo $this->Flash->render('flash') ?>
<div class="row">
	<?php foreach ($bkp001 as $cliente) : ?>
		<div class="col-md-3">
			<div class="panel" style="background-color: #e5e5e5;">
				<div class="panel-heading panel-title" style="background-color: #e5e5e5;">
					<?php echo $cliente['Cliente']['clndescricaoreduzido'] ?>
				</div>
				<div class="panel-body card-body" style="background-color: #fff;">
					<?php echo $cliente['Cliente']['clndescricao'] ?>
					<?php foreach ($cliente['Backups'] as $key => $backup) : ?>
						<div class="list-group-item" style="background-color: <?php echo $sitBackup[$backup['bktsitcodigo']]['Situacao']['sitcorprimaria'] ?>; color: <?php echo '#000' ?>">
							<?php echo $backup['bktnomearquivo']; ?>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>
