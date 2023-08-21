<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bkp002 $bkp002
 */
?>
<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Bkp002'), ['action' => 'index']) ?></li>
    </ul>
</nav> -->
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <div class="modal-title">
                <div class="row">
                    <div class="col-md-12">
                        <legend><?= __('Adicionando Usuário') ?></legend>
                    </div>
                </div>
            </div>
        </div>
        <?= $this->Form->create($bkp002) ?>
        <div class="modal-body">
            <div class="row">
                <div class="col-md-6">
                    <?php echo $this->Form->control(
                        'usernome',
                        [
                            'label' => 'Nome',
                            'type' => 'text',
                            'class' => 'form-control',
                            'required'
                        ]
                    ); ?>
                </div>
                <div class="col-md-6">
                    <?php echo $this->Form->control(
                        'useremail',
                        [
                            'label' => 'Email',
                            'type' => 'text',
                            'class' => 'form-control',
                            'required'
                        ]
                    ); ?>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <?php echo $this->Form->control(
                        'userlogin',
                        [
                            'label' => 'Login',
                            'type' => 'text',
                            'class' => 'form-control',
                            'required'
                        ]
                    ); ?>
                </div>
                <div class="col-md-6">
                    <?php echo $this->Form->control(
                        'userpassword',
                        [
                            'label' => 'Senha',
                            'type' => 'password',
                            'class' => 'form-control',
                            'required'
                        ]
                    ); ?>
                </div>
                <div class="col-md-4">
                    <?php echo $this->Form->control(
                        'usersituacao',
                        [
                            'label' => 'Situação',
                            'type' => 'select',
                            'options' => ['A' => 'Ativo', 'I' => 'Inativo'],
                            'empty' => false,
                            'class' => 'form-control',
                            'required'
                        ]
                    ); ?>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <?= $this->Form->button(
                __('<i class="glyphicon glyphicon-floppy-disk"></i> Salvar'),
                [
                    'type' => 'submit',
                    'class' => 'btn btn-primary',
                ]
            ) ?>

            <?= $this->Html->link(
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
        <?= $this->Form->end() ?>
    </div>
</div>
