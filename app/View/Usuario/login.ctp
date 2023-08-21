<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bkp002 $bkp002
 */
?>
<div class="row" style="height: 20vh;">
    <div class="col-md-3 col-xs-1">
    </div>
    <div class="col-md-6 col-xs-10">
        <?= $this->Flash->render('flash') ?>
    </div>
    <div class="col-md-3 col-xs-1">
    </div>
</div>
<div class="row">
    <div class="col-md-4 col-xs-1">
        &nbsp;&nbsp;&nbsp;
    </div>
    <div class="col-md-4 col-xs- 10">
        <?= $this->Form->create(
            'Login',
            [
                'url' => [
                    'controller' => 'Bkp002',
                    'action' => 'login',
                ],
                'name' => 'Login',
                'type' => 'post',
                'class' => 'form-horizontal panel azul-primary',
            ]
        ) ?>
        <div class="panel-heading text-center azul-primary">
            <div class="panel-title">
                <h1 class="text-white">Bkp Tracker</h1>
            </div>
        </div>

        <div class="panel-body azul-secondary">
            <div class="row">
                <div class="col-md-12">
                    <?php echo $this->Form->control(
                        'username',
                        [
                            'label' => false,
                            'type' => 'text',
                            'class' => 'form-control',
                            'placeholder' => 'Usuário',
                            'required'
                        ]
                    );
                    ?>
                </div>
                <div class="col-md-12">
                    <br>
                    <?php echo $this->Form->control(
                        'password',
                        [
                            'label' => false,
                            'type' => 'password',
                            'class' => 'form-control',
                            'placeholder' => 'Senha',
                            'required'
                        ]
                    );
                    ?>
                </div>
                <div class="col-md-12 text-right">
                    <?php echo $this->Form->button(
                        '<span class="glyphicon glyphicon-log-in"></span> Login',
                        [
                            'type' => 'submit',
                            'class' => 'btn btn-primary',
                            'style' => 'margin-top:20px'
                        ]
                    );
                    ?>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-xs-1">
            &nbsp;&nbsp;&nbsp;
        </div>
    </div>
