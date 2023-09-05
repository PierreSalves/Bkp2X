<div class="modal-dialog" style="width:auto;margin-top:2em">
	<div class="modal-content">
		<div class="modal-header">
			<div class="modal-title">
				<div class="row">
					<div class="col-md-12">
						<legend><?php echo __('Adicionando Situação') ?></legend>
					</div>
				</div>
			</div>
		</div>
		<?php echo $this->Form->create(
			'Situacao',
			[
				'url' => [
					'controller' => 'Situacao',
					'action' => 'add',
				],
				'type' => 'post'
			]
		) ?>
		<div class="modal-body">
			<div class="row">
				<div class="col-md-6">
					<?php echo $this->Form->input(
						'sitreduzido',
						[
							'label' => 'Descrição',
							'type' => 'text',
							'class' => 'form-control',
							'maxlength' => '100',
							'required'
						]
					); ?>
				</div>
				<div class="col-md-6">
					<?php echo $this->Form->input(
						'sitdescricao',
						[
							'label' => 'Descrição Detalhada',
							'type' => 'text',
							'class' => 'form-control',
							'maxlength' => '300',
							'required'
						]
					); ?>
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<?php echo $this->Form->label('sitcorprimary', 'Cor Primária'); ?>
					<div class="input-group">
						<?php echo $this->Form->input(
							'sitcorprimary',
							[
								'type' => 'text',
								'class' => 'form-control input-group-addon input-sm',
								'div' => false,
								'label' => false,
								'id' => 'sitcorprimary',
								'required',
								'readonly'
							]
						); ?>
						<div class="input-group-btn">
							<button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="caret"></span>
								<span class="sr-only">Toggle Dropdown</span>
							</button>
							<?php echo $this->Html->nestedList(
								array(
									'<a href="javascript:escolherCor(\'#e5e5e5\',\'sitcorprimary\')" class="cinza-claro">&nbsp;</a>',
									'<a href="javascript:escolherCor(\'#CBCBCB\',\'sitcorprimary\')" class="cinza">&nbsp;</a>',
									'<a href="javascript:escolherCor(\'#85C1E9\',\'sitcorprimary\')" class="azul-secondary">&nbsp;</a>',
									'<a href="javascript:escolherCor(\'#3498DB\',\'sitcorprimary\')" class="azul-primary">&nbsp;</a>',
									'<a href="javascript:escolherCor(\'#363636\',\'sitcorprimary\')" class="cinza-escuro">&nbsp;</a>',
									'<a href="javascript:escolherCor(\'#000000\',\'sitcorprimary\')" class="preto">&nbsp;</a>',
									'<a href="javascript:escolherCor(\'#58D68D\',\'sitcorprimary\')" class="verde-secondary">&nbsp;</a>',
									'<a href="javascript:escolherCor(\'#2ECC71\',\'sitcorprimary\')" class="verde-primary">&nbsp;</a>',
									'<a href="javascript:escolherCor(\'#F7DC6F\',\'sitcorprimary\')" class="laranja-secondary">&nbsp;</a>',
									'<a href="javascript:escolherCor(\'#F39C12\',\'sitcorprimary\')" class="laranja-primary">&nbsp;</a>',
								),
								array(
									'class' => 'dropdown-menu dropdown-menu-right pull-right',
									'style' => 'left:auto;padding:0'
								)
							);
							?>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<?php echo $this->Form->label('sitcorsecondary', 'Cor Secundária'); ?>
					<div class="input-group">
						<?php echo $this->Form->input(
							'sitcorsecondary',
							[
								'type' => 'text',
								'class' => 'form-control input-group-addon input-sm',
								'div' => false,
								'label' => false,
								'id' => 'sitcorsecondary',
								'required',
								'readonly'
							]
						); ?>
						<div class="input-group-btn">
							<button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="caret"></span>
								<span class="sr-only">Toggle Dropdown</span>
							</button>
							<?php echo $this->Html->nestedList(
								array(
									'<a href="javascript:escolherCor(\'#e5e5e5\',\'sitcorsecondary\')" class="cinza-claro">&nbsp;</a>',
									'<a href="javascript:escolherCor(\'#CBCBCB\',\'sitcorsecondary\')" class="cinza">&nbsp;</a>',
									'<a href="javascript:escolherCor(\'#363636\',\'sitcorsecondary\')" class="cinza-escuro">&nbsp;</a>',
									'<a href="javascript:escolherCor(\'#000000\',\'sitcorsecondary\')" class="preto">&nbsp;</a>',
									'<a href="javascript:escolherCor(\'#85C1E9\',\'sitcorsecondary\')" class="azul-secondary">&nbsp;</a>',
									'<a href="javascript:escolherCor(\'#3498DB\',\'sitcorsecondary\')" class="azul-primary">&nbsp;</a>',
									'<a href="javascript:escolherCor(\'#58D68D\',\'sitcorsecondary\')" class="verde-secondary">&nbsp;</a>',
									'<a href="javascript:escolherCor(\'#2ECC71\',\'sitcorsecondary\')" class="verde-primary">&nbsp;</a>',
									'<a href="javascript:escolherCor(\'#F7DC6F\',\'sitcorsecondary\')" class="laranja-secondary">&nbsp;</a>',
									'<a href="javascript:escolherCor(\'#F39C12\',\'sitcorsecondary\')" class="laranja-primary">&nbsp;</a>',
								),
								array(
									'class' => 'dropdown-menu dropdown-menu-right pull-right',
									'style' => 'left:auto;padding:0'
								)
							);
							?>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<?php echo $this->Form->label('sitcorfonte', 'Cor da Fonte'); ?>
					<div class="input-group">
						<?php echo $this->Form->input(
							'sitcorfonte',
							[
								'type' => 'text',
								'class' => 'form-control input-group-addon input-sm',
								'div' => false,
								'label' => false,
								'id' => 'sitcorfonte',
								'required',
								'readonly'
							]
						); ?>
						<div class="input-group-btn">
							<button type="button" class="btn btn-sm btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<span class="caret"></span>
								<span class="sr-only">Toggle Dropdown</span>
							</button>
							<?php echo $this->Html->nestedList(
								array(
									'<a href="javascript:escolherCor(\'#e5e5e5\',\'sitcorfonte\')" class="cinza-claro">&nbsp;</a>',
									'<a href="javascript:escolherCor(\'#CBCBCB\',\'sitcorfonte\')" class="cinza">&nbsp;</a>',
									'<a href="javascript:escolherCor(\'#363636\',\'sitcorfonte\')" class="cinza-escuro">&nbsp;</a>',
									'<a href="javascript:escolherCor(\'#000000\',\'sitcorfonte\')" class="preto">&nbsp;</a>',
									'<a href="javascript:escolherCor(\'#85C1E9\',\'sitcorfonte\')" class="azul-secondary">&nbsp;</a>',
									'<a href="javascript:escolherCor(\'#3498DB\',\'sitcorfonte\')" class="azul-primary">&nbsp;</a>',
									'<a href="javascript:escolherCor(\'#58D68D\',\'sitcorfonte\')" class="verde-secondary">&nbsp;</a>',
									'<a href="javascript:escolherCor(\'#2ECC71\',\'sitcorfonte\')" class="verde-primary">&nbsp;</a>',
									'<a href="javascript:escolherCor(\'#F7DC6F\',\'sitcorfonte\')" class="laranja-secondary">&nbsp;</a>',
									'<a href="javascript:escolherCor(\'#F39C12\',\'sitcorfonte\')" class="laranja-primary">&nbsp;</a>',
								),
								array(
									'class' => 'dropdown-menu dropdown-menu-right pull-right',
									'style' => 'left:auto;padding:0'
								)
							);
							?>
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
