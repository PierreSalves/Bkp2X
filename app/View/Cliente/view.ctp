<div class="modal-dialog" style="width:auto;margin-top:2em">
	<div class="modal-content">
		<div class="modal-header">
			<div class="modal-title">
				<div class="row">
					<div class="col-md-12">
						<legend><?php echo __('Visualizando Cliente') ?></legend>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-md-12">
					<?php echo $this->Form->input(
						'clndescricao',
						array(
							'label' => 'Descrição',
							'type' => 'textarea',
							'rows' => '1',
							'class' => 'form-control',
							'maxlength' => '500',
							'value' => $cliente['Cliente']['clndescricao'],
							'disabled' => 'disabled'
						)
					); ?>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
					<?php echo $this->Form->input(
						'clndescricaoreduzido',
						array(
							'label' => 'Descrição Reduzida',
							'type' => 'textarea',
							'rows' => '1',
							'class' => 'form-control',
							'maxlength' => '100',
							'value' => $cliente['Cliente']['clndescricaoreduzido'],
							'disabled' => 'disabled'
						)
					); ?>
				</div>
				<div class="col-md-6">
					<?php echo $this->Form->input(
						'clnbkpcaminho',
						array(
							'label' => 'Caminho Diretório',
							'type' => 'text',
							'class' => 'form-control',
							'maxlength' => '300',
							'value' => $cliente['Cliente']['clnbkpcaminho'],
							'disabled' => 'disabled'
						)
					); ?>
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
					<?php echo $this->Form->input(
						'clnchavelogin',
						array(
							'label' => 'Chave de Acesso Login',
							'type' => 'text',
							'class' => 'form-control',
							'maxlength' => '100',
							'value' => $cliente['Cliente']['clnchavelogin'],
							'disabled' => 'disabled'
						)
					); ?>
				</div>
				<div class="col-md-6">
					<?php echo $this->Form->input(
						'clnchavepwd',
						array(
							'label' => 'Chave de Acesso Senha',
							'type' => 'text',
							'class' => 'form-control',
							'maxlength' => '100',
							'value' => $cliente['Cliente']['clnchavepwd'],
							'disabled' => 'disabled'
						)
					); ?>
				</div>
			</div>
		</div>
		<div class="modal-body">
			<div class="row">
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<div class="panel-title">
								<h4>Backups do Cliente</h4>
							</div>
						</div>
						<div class="panel-body">
							<div class="list-group" id="listBackups">
								<?php foreach ($cliente['Backups'] as $key => $backup) : ?>
								<div class="list-group-item">
									<div class="row">
										<div class="col-md-11">
											<?php echo $this->Form->input(
												"Cliente.Backups.$key.bktnomearquivo",
												array(
													'label' => 'Nome do Arquivo',
													'type' => 'text',
													'class' => 'form-control input-sm',
													'maxlength' => '100',
													'value' => $backup['bktnomearquivo'],
													'disabled'
												)
											); ?>
										</div>
									</div>
								</div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<?php echo $this->Html->link(
				__('<i class="glyphicon glyphicon-remove"></i> Voltar'),
				[
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
