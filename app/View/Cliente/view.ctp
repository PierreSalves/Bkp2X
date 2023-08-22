<div class="modal-dialog" style="width:auto;margin-top:2em">
    <div class="modal-content">
        <div class="modal-header">
            <div class="modal-title">
                <div class="row">
                    <div class="col-md-12">
                        <legend><?php echo __('Adicionando Cliente') ?></legend>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $this->Form->create(
            'Cliente',
            [
                'url' => [
                    'controller' => 'Cliente',
                    'action' => 'add',
                ],
                'type' => 'post'
            ]
        ) ?>
        <div class="modal-body">

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
