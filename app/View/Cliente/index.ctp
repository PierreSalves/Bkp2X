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
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 style="margin:0">Usuários</h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table cellpadding="0" cellspacing="0" class="table table-hover">
							<thead>
								<tr>
									<th scope="col" class="text-center"><?php echo __('Ações') ?></th>
									<th scope="col"><?php echo $this->Paginator->sort('clncodigo') ?></th>
									<th scope="col"><?php echo $this->Paginator->sort('clnbkpcaminho') ?></th>
									<th scope="col"><?php echo $this->Paginator->sort('clndescricao') ?></th>
									<th scope="col"><?php echo $this->Paginator->sort('clndescricaoreduzido') ?></th>
									<th scope="col"><?php echo $this->Paginator->sort('clnsituacao') ?></th>
									<th scope="col"><?php echo $this->Paginator->sort('clndatasituacao') ?></th>
									<th scope="col"><?php echo $this->Paginator->sort('clnchavelogin') ?></th>
									<th scope="col"><?php echo $this->Paginator->sort('clnchavepwd') ?></th>
									<th scope="col"><?php echo $this->Paginator->sort('clndatacriacao') ?></th>
									<th scope="col"><?php echo $this->Paginator->sort('clnusercodigo') ?></th>
								</tr>
							</thead>
							<tbody>
								<?php foreach ($listaClientes as $cliente) : ?>
									<tr>
										<td></td>
										<td><?php echo $cliente['Cliente']['clncodigo']; ?></td>
										<td><?php echo $cliente['Cliente']['clnbkpcaminho']; ?></td>
										<td><?php echo $cliente['Cliente']['clndescricao']; ?></td>
										<td><?php echo $cliente['Cliente']['clndescricaoreduzido']; ?></td>
										<td><?php echo $cliente['Cliente']['clnsituacao']; ?></td>
										<td><?php echo $cliente['Cliente']['clndatasituacao']; ?></td>
										<td><?php echo $cliente['Cliente']['clnchavelogin']; ?></td>
										<td><?php echo $cliente['Cliente']['clnchavepwd']; ?></td>
										<td><?php echo $cliente['Cliente']['clndatacriacao']; ?></td>
										<td><?php echo $cliente['Cliente']['clnusercodigo']; ?></td>
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
					?> </p>
				<div class="paging">
					<?php
					echo $this->Paginator->first('<< Inicio  ');
					echo $this->Paginator->prev('< ' . __(' Anterior '), array(), null, array('class' => 'prev disabled'));
					echo $this->Paginator->numbers(array('separator' => ' | '));
					echo $this->Paginator->next(__(' Próximo ') . ' >', array(), null, array('class' => 'next disabled'));
					echo $this->Paginator->last('  Ultima >>');
					?>
				</div>
			</div>
		</div>
	</div>
</div>
