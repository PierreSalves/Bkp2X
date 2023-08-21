<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bkp000 $bkp000
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $bkp000->bktcodigo],
                ['confirm' => __('Are you sure you want to delete # {0}?', $bkp000->bktcodigo)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Bkp000'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="bkp000 form large-9 medium-8 columns content">
    <?= $this->Form->create($bkp000) ?>
    <fieldset>
        <legend><?= __('Edit Bkp000') ?></legend>
        <?php
            echo $this->Form->control('btkclncodigo');
            echo $this->Form->control('bktnomearquivo');
            echo $this->Form->control('bktsitcodigo');
            echo $this->Form->control('bktsituacao');
            echo $this->Form->control('bktdatasituacao');
            echo $this->Form->control('bktdatacriacao');
            echo $this->Form->control('bktusercodigo');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>