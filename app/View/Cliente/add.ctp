<div class="modal-dialog" style="width:auto;margin-top:2em">
	<div class="modal-content">
		<div class="modal-header">
			<div class="modal-title">
				<div class="row">
					<div class="col-md-12">
						<legend><?php echo __('Adicionando Cliente') ?></legend>
					</div>
				</div>
			</div>
		</div>
		<?php echo $this->Form->create(
			'Cliente',
			[
				'url' => [
					'controller' => 'Cliente',
					'action' => 'add',
				],
				'type' => 'post'
			]
		) ?>
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
							'required' => true
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
							'required' => true
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
							'maxlength' => '100'
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
							'maxlength' => '100'
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
								<?php echo $this->Form->button(
									'<i class="glyphicon glyphicon-plus"></i>',
									array(
										'type' => 'button',
										'class' => 'btn btn-primary btn-sm',
										'title' => 'Adicionar Backup',
										'onclick' => 'addElements(\'' . $this->Html->url(array('controller' => 'Backups', 'action' => 'add')) . '\',\'#listBackups\')'
									)
								); ?>
							</div>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">

								</div>
							</div>
							<div class="list-group" id="listBackups">
								<div class="list-group-item" id="item_0">
									<div class="row">
										<div class="col-md-11">
											<?php echo $this->Form->input(
												"Cliente.Backups.0.bktnomearquivo",
												array(
													'label' => 'Nome do Arquivo',
													'type' => 'text',
													'class' => 'form-control input-sm',
													'maxlength' => '100',
													'required' => true
												)
											); ?>
										</div>
										<div class="col-md-1 text-right">
											<?php echo $this->Form->button(
												'<i class="glyphicon glyphicon-minus"></i>',
												array(
													'type' => 'button',
													'class' => 'btn btn-sm btn-danger disabled',
													'title' => 'Remover Backup',
													'style' => 'margin-top:25px;',
													'disabled' => 'disabled',
												)
											); ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer">
			<?php echo $this->Form->button(
				__('<i class="glyphicon glyphicon-floppy-disk"></i> Salvar'),
				[
					'type' => 'submit',
					'class' => 'btn btn-primary',
				]
			) ?>

			<?php echo $this->Html->link(
				__('<i class="glyphicon glyphicon-remove"></i> Cancelar'),
				[
					'action' => 'index'
				],
				[
					'class' => 'btn btn-danger',
					'escape' => false
				]
			) ?>
		</div>
		<?php echo $this->Form->end() ?>
	</div>
</div>
