<div class="list-group-item" id="item_<?php echo $i; ?>">
	<div class="row">
		<div class="col-md-11">
			<?php echo $this->Form->input(
				"Cliente.Backups.$i.bktnomearquivo",
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
					'class' => 'btn btn-sm btn-danger',
					'title' => 'Remover Backup',
					'style' => 'margin-top:25px;',
					'onclick' => 'removeElements(\'#item_' . $i . '\')'
				)
			); ?>
		</div>
	</div>
</div>
