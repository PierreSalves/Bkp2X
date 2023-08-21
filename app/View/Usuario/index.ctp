<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bkp002[]|\Cake\Collection\CollectionInterface $bkp002
 */
?>
<div class="modal-dialog" style="width: auto;">
    <div class="modal-content">
        <div class="modal-header">
            <div class="modal-title">
                <div class="row">
                    <div class="col-md-12">
                        <?= $this->Html->link(
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
                        <?= $this->Html->link(
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
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 style="margin:0">Usuários</h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table cellpadding="0" cellspacing="0" class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center"><?= __('Ações') ?></th>
                                    <th scope="col" class="text-center">id</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Usuário</th>
                                    <th scope="col">Senha</th>
                                    <th scope="col" class="text-center">Situação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($bkp002 as $bkp002) : ?>
                                    <tr>
                                        <td class="text-center">
                                            <?= $this->Html->link(
                                                __('<i class="glyphicon glyphicon-search"></i>'),
                                                [
                                                    'action' => 'view',
                                                    $bkp002->usercodigo
                                                ],
                                                [
                                                    'class' => 'btn btn-xs btn-success',
                                                    'escape' => false,
                                                ]
                                            ) ?>
                                            <?= $this->Html->link(
                                                __('<i class="glyphicon glyphicon-edit"></i>'),
                                                [
                                                    'action' => 'edit',
                                                    $bkp002->usercodigo
                                                ],
                                                [
                                                    'class' => 'btn btn-xs btn-warning',
                                                    'escape' => false,
                                                ]
                                            ) ?>
                                            <?= $this->Form->postLink(
                                                __('<i class="glyphicon glyphicon-trash"></i>'),
                                                [
                                                    'action' => 'delete', $bkp002->usercodigo
                                                ],
                                                [
                                                    'class' => 'btn btn-xs btn-danger',
                                                    'escape' => false,
                                                    'confirm' => __('Tem certeza que deseja Excluir o Usuário "{0}"?', $bkp002->usernome)
                                                ]
                                            ) ?>
                                        </td>
                                        <td class="text-center"><?= $this->Number->format($bkp002->usercodigo) ?></td>
                                        <td><?= h($bkp002->usernome) ?></td>
                                        <td><?= h($bkp002->useremail) ?></td>
                                        <td><?= h($bkp002->userlogin) ?></td>
                                        <td><?= h($bkp002->userpassword) ?></td>
                                        <td class="text-center"><?= h($bkp002->usersituacao) ?></td>
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
                <ul class="pagination" style="margin:0">
                    <?= $this->Paginator->first('<< ' . __('first')) ?>
                    <?= $this->Paginator->prev('< ' . __('previous')) ?>
                    <?= $this->Paginator->numbers() ?>
                    <?= $this->Paginator->next(__('next') . ' >') ?>
                    <?= $this->Paginator->last(__('last') . ' >>') ?>
                </ul>
                <p><?= $this->Paginator->counter(['format' => __('Página {{page}} de {{pages}}, exibindo {{current}} registro(s) de {{count}}')]) ?></p>
            </div>
        </div>
    </div>
</div>
