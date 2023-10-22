<div class="modal-dialog" style="width:auto;margin-top:2em">
	<div class="modal-content">
		<div class="modal-header">
			<div class="modal-title">
				<div class="row">
					<div class="col-md-12">
						<?php echo $this->Html->link(
							'<i class="glyphicon glyphicon-chevron-left"></i>&nbsp;Voltar',
							[
								'controller' => 'Relatorios',
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
					<h3 style="margin:0">Histórico de Situações Agrupadas no Período</h3>
				</div>
				<div class="panel-body">
					<?php echo $this->Form->create(
						'Filtros',
						[
							'url' => [
								'controller' => 'Relatorios',
								'action' => 'histPeriodo',
							],
							'type' => 'post',
							'target' => '_blank',
						]
					); ?>
					<div class="row">
						<div class="col-md-2">
							<?php echo $this->Form->input(
								'dataInicio',
								array(
									'label' => 'Data de Início',
									'type' => 'text',
									'maxlength' => 10,
									'placeholder' => 'dd/mm/yyyy',
									'class' => 'form-control',
									'required'
								)
							); ?>
						</div>
						<div class="col-md-2">
							<?php echo $this->Form->input(
								'dataFim',
								array(
									'label' => 'Data de Término',
									'type' => 'text',
									'maxlength' => 10,
									'placeholder' => 'dd/mm/yyyy',
									'class' => 'form-control',
									'required'
								)
							); ?>
						</div>
						<div class="col-md-2">
							<?php echo $this->Form->button(
								'<i class="glyphicon glyphicon-filter"></i> Filtrar',
								array(
									'type' => 'submit',
									'class' => 'btn btn-info',
									'style' => 'margin-top: 24px'
								)
							); ?>
						</div>
					</div>
					<?php echo $this->Form->end(); ?>
				</div>
			</div>
		</div>
		<div class="modal-footer">
		</div>
	</div>
</div>
