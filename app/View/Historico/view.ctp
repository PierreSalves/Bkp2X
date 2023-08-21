<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bkp004 $bkp004
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Bkp004'), ['action' => 'edit', $bkp004->hiscodigo]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Bkp004'), ['action' => 'delete', $bkp004->hiscodigo], ['confirm' => __('Are you sure you want to delete # {0}?', $bkp004->hiscodigo)]) ?> </li>
        <li><?= $this->Html->link(__('List Bkp004'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bkp004'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="bkp004 view large-9 medium-8 columns content">
    <h3><?= h($bkp004->hiscodigo) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Hiscodigo') ?></th>
            <td><?= $this->Number->format($bkp004->hiscodigo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hisclncodigo') ?></th>
            <td><?= $this->Number->format($bkp004->hisclncodigo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hissitcodigo') ?></th>
            <td><?= $this->Number->format($bkp004->hissitcodigo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hisbktcodigo') ?></th>
            <td><?= $this->Number->format($bkp004->hisbktcodigo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Hisdata') ?></th>
            <td><?= h($bkp004->hisdata) ?></td>
        </tr>
    </table>
</div>
