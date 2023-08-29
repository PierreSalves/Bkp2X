<div class="modal-dialog" style="width: auto;margin-top:2em">
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
						&nbsp;
						<?php echo $this->Html->link(
							__('<i class="glyphicon glyphicon-plus"></i> Adicionar Situação'),
							[
								'action' => 'add'
							],
							[
								'class' => 'btn btn-primary',
								'escape' => false,
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
					<h3 style="margin:0">Clientes</h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table cellpadding="0" cellspacing="0" class="table table-hover">
							<thead>
								<tr>
									<th scope="col" class="text-center"><?php echo __('Ações') ?></th>
									<th scope="col" class="text-center"><?php echo $this->Paginator->sort('sitcodigo', 'Código') ?></th>
									<th scope="col"><?php echo $this->Paginator->sort('sitreduzido', 'Descrição') ?></th>
									<th scope="col"><?php echo $this->Paginator->sort('sitdescricao', 'Descrição detalhada') ?></th>
									<th scope="col" class="text-center"><?php echo $this->Paginator->sort('sitsituacao', 'Situação') ?></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($listaClientes as $situacao) : ?>
									<tr>
										<td class="acoes text-center">
											<?php echo $this->Html->link(
												__('<i class="glyphicon glyphicon-search"></i>'),
												[
													'action' => 'view',
													$situacao['Situacao']['sitcodigo']
												],
												[
													'class' => 'btn btn-xs btn-success',
													'escape' => false,
												]
											) ?>
											<?php echo $this->Html->link(
												__('<i class="glyphicon glyphicon-edit"></i>'),
												[
													'action' => 'edit',
													$situacao['Situacao']['sitcodigo']
												],
												[
													'class' => 'btn btn-xs btn-warning',
													'escape' => false,
												]
											) ?>
											<?php echo $this->Form->postLink(
												__('<i class="glyphicon glyphicon-trash"></i>'),
												[
													'action' => 'delete',
													$situacao['Situacao']['sitcodigo']
												],
												[
													'class' => 'btn btn-xs btn-danger',
													'escape' => false,
													'confirm' => __(
														'Tem certeza que deseja Excluir a Situação ' . $situacao['Situacao']['sitreduzido'] . '?',

													)
												]
											) ?>
										</td>
										<td class="text-center"><?php echo $situacao['Situacao']['sitcodigo']; ?></td>
										<td><?php echo $situacao['Situacao']['sitreduzido']; ?></td>
										<td><?php echo $situacao['Situacao']['sitdescricao']; ?></td>
										<td class="text-center"><?php echo $situacao['Situacao']['sitsituacao']; ?></td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="modal-footer" style="text-align: left;">
			<div class="paginator">
				<p>
					<?php
					echo $this->Paginator->counter(array(
						'format' => __('Página {:page} de {:pages}')
					));
					?>
				</p>
				<div class="pagination pagination-sm" style="margin:0">
					<li><?php echo $this->Paginator->prev('<' . __(' Anterior '), array(), null, array('class' => 'prev disabled')); ?></li>
					<li><?php echo $this->Paginator->numbers(array('separator' => '')); ?></li>
					<li><?php echo $this->Paginator->next(__(' Próximo ') . ' >', array(), null, array('class' => 'next disabled')); ?></li>

				</div>

			</div>
		</div>
	</div>
</div>
