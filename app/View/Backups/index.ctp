<div class="row">
	<?php foreach ($bkp001 as $cliente) : ?>
		<div class="col-md-3">
			<div class="panel <?php echo 'verde-primary'; ?>">
				<div class="panel-heading panel-title <?php echo 'verde-primary'; ?>">
					<?php echo $cliente['Cliente']['clndescricaoreduzido'] ?>
				</div>
				<div class="panel-body <?php echo 'verde-secondary'; //SITUAÇÃO DO CARTÃO
										?>">
					<?php echo $cliente['Cliente']['clndescricao'] ?>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>
