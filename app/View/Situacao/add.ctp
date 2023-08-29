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
