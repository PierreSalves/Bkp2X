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
								'action' => 'attBackups'
							],
							[
								'class' => 'btn btn-default',
								'escape' => false
							]
						) ?>
						&nbsp;
						<?php echo $this->Html->link(
							__('<i class="glyphicon glyphicon-plus"></i> Adicionar Usuário'),
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
					<h3 style="margin:0">Usuários</h3>
				</div>
				<div class="panel-body">
					<div class="table-responsive">
						<table cellpadding="0" cellspacing="0" class="table table-hover">
							<thead>
								<tr>
									<th scope="col" class="text-center"><?php echo __('Ações') ?></th>
									<th scope="col" class="text-center">id</th>
									<th scope="col">Nome</th>
									<th scope="col">Email</th>
									<th scope="col">Usuário</th>
									<th scope="col">Senha</th>
									<!-- <th scope="col" class="text-center">Situação</th> -->
								</tr>
							</thead>
							<tbody>
								<?php foreach ($listaUsuarios as $usuario) : ?>
									<tr>
										<td class="acoes text-center">
											<?php echo $this->Html->link(
												__('<i class="glyphicon glyphicon-search"></i>'),
												[
													'action' => 'view',
													$usuario['Usuario']['usercodigo']
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
													$usuario['Usuario']['usercodigo']
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
													$usuario['Usuario']['usercodigo']
												],
												[
													'class' => 'btn btn-xs btn-danger',
													'escape' => false,
													'confirm' => __(
														'Tem certeza que deseja Excluir o Usuário "' . $usuario['Usuario']['usernome'] . '"?',
													)
												]
											) ?>
										</td>
										<td class="text-center"><?php echo $this->Number->format($usuario['Usuario']['usercodigo']) ?></td>
										<td><?php echo h($usuario['Usuario']['usernome']) ?></td>
										<td><?php echo h($usuario['Usuario']['useremail']) ?></td>
										<td><?php echo h($usuario['Usuario']['userlogin']) ?></td>
										<td><?php echo md5($usuario['Usuario']['userpassword']) ?></td>
										<!-- <td class="text-center"><?php echo h($usuario['Usuario']['usersituacao']) ?></td> -->
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
