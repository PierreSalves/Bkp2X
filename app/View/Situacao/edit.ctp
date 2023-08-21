<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bkp003 $bkp003
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $bkp003->sitcodigo],
                ['confirm' => __('Are you sure you want to delete # {0}?', $bkp003->sitcodigo)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Bkp003'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="bkp003 form large-9 medium-8 columns content">
    <?= $this->Form->create($bkp003) ?>
    <fieldset>
        <legend><?= __('Edit Bkp003') ?></legend>
        <?php
            echo $this->Form->control('sitdescricao');
            echo $this->Form->control('sitreduzido');
            echo $this->Form->control('sitsituacao');
            echo $this->Form->control('sitdatasituacao');
            echo $this->Form->control('sitdatacriacao');
            echo $this->Form->control('situsercodigo');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
