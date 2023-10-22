<div class="modal-dialog" style="width:auto;margin-top:2em">
	<div class="modal-content">
		<div class="modal-header">
			<div class="modal-title">
				<div class="row">
					<div class="col-md-12">
						<?php echo $this->Html->link(
							__('<i class="glyphicon glyphicon-home"></i>'),
							[
								'controller' => 'Backups',
								'action' => 'index'
							],
							[
								'class' => 'btn btn-default',
								'escape' => false
							]
						) ?>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-body">
			<?php echo $this->Flash->render('flash') ?>
			<div class="panel panel-default null-margin">
				<div class="panel-heading">
					<h3 style="margin:0">Relatórios</h3>
				</div>
				<div class="panel-body">
					<div class="list-group">
						<div class="list-group-item">
							<?php echo $this->Html->link(
								'<h4 class="null-margin">
									<i class="glyphicon glyphicon-chevron-right"></i>
									Histórico de Situações Agrupadas no Período
								</h4>
								',
								array(
									'controller' => 'Relatorios',
									'action' => 'histPeriodo'
								),
								array(
									'escape' => false
								)
							); ?>
						</div>
						<div class="list-group-item">
							<?php echo $this->Html->link(
								'<h4 class="null-margin">
									<i class="glyphicon glyphicon-chevron-right"></i>
									Resumo de Situações Agrupadas por Cliente
								</h4>
								',
								array(
									'controller' => 'Relatorios',
									'action' => 'index'
								),
								array(
									'escape' => false
								)
							); ?>
						</div>
						<div class="list-group-item">
							<?php echo $this->Html->link(
								'<h4 class="null-margin">
									<i class="glyphicon glyphicon-chevron-right"></i>
									Resumo de Situações no Período
								</h4>
								',
								array(
									'controller' => 'Relatorios',
									'action' => 'index'
								),
								array(
									'escape' => false
								)
							); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
		</div>
	</div>
</div>
