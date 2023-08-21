<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bkp004 $bkp004
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Bkp004'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="bkp004 form large-9 medium-8 columns content">
    <?= $this->Form->create($bkp004) ?>
    <fieldset>
        <legend><?= __('Add Bkp004') ?></legend>
        <?php
            echo $this->Form->control('hisdata');
            echo $this->Form->control('hisclncodigo');
            echo $this->Form->control('hissitcodigo');
            echo $this->Form->control('hisbktcodigo');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
