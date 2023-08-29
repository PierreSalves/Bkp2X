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
							__('<i class="glyphicon glyphicon-plus"></i> Adicionar Cliente'),
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
									<th scope="col" class="text-center"><?php echo $this->Paginator->sort('clncodigo', 'Código') ?></th>
									<th scope="col"><?php echo $this->Paginator->sort('clndescricao', 'Descrição') ?></th>
									<th scope="col"><?php echo $this->Paginator->sort('clndescricaoreduzido', 'Descrição Reduzida') ?></th>
									<th scope="col"><?php echo $this->Paginator->sort('clnbkpcaminho', 'Diretório') ?></th>
									<th scope="col"><?php echo $this->Paginator->sort('clnchavelogin', 'Chave Login Acesso') ?></th>
									<th scope="col"><?php echo $this->Paginator->sort('clnchavepwd', 'Chave Senha Acesso') ?></th>
									<th scope="col" class="text-center"><?php echo $this->Paginator->sort('clnsituacao', 'Situação') ?></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($listaClientes as $cliente) : ?>
									<tr>
										<td class="acoes text-center">
											<?php echo $this->Html->link(
												__('<i class="glyphicon glyphicon-search"></i>'),
												[
													'action' => 'view',
													$cliente['Cliente']['clncodigo']
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
													$cliente['Cliente']['clncodigo']
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
													$cliente['Cliente']['clncodigo']
												],
												[
													'class' => 'btn btn-xs btn-danger',
													'escape' => false,
													'confirm' => __(
														'Tem certeza que deseja Excluir o Cliente ' . $cliente['Cliente']['clndescricaoreduzido'] . '?',

													)
												]
											) ?>
										</td>
										<td><?php echo $cliente['Cliente']['clncodigo']; ?></td>
										<td><?php echo $cliente['Cliente']['clndescricao']; ?></td>
										<td><?php echo $cliente['Cliente']['clndescricaoreduzido']; ?></td>
										<td><?php echo $cliente['Cliente']['clnbkpcaminho']; ?></td>
										<td><?php echo $cliente['Cliente']['clnchavelogin']; ?></td>
										<td><?php echo $cliente['Cliente']['clnchavepwd']; ?></td>
										<td><?php echo $cliente['Cliente']['clnsituacao']; ?></td>
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
