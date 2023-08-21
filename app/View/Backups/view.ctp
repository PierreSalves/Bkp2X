<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bkp000 $bkp000
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Bkp000'), ['action' => 'edit', $bkp000->bktcodigo]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Bkp000'), ['action' => 'delete', $bkp000->bktcodigo], ['confirm' => __('Are you sure you want to delete # {0}?', $bkp000->bktcodigo)]) ?> </li>
        <li><?= $this->Html->link(__('List Bkp000'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bkp000'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="bkp000 view large-9 medium-8 columns content">
    <h3><?= h($bkp000->bktcodigo) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Bktnomearquivo') ?></th>
            <td><?= h($bkp000->bktnomearquivo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bktsituacao') ?></th>
            <td><?= h($bkp000->bktsituacao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bktcodigo') ?></th>
            <td><?= $this->Number->format($bkp000->bktcodigo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Btkclncodigo') ?></th>
            <td><?= $this->Number->format($bkp000->btkclncodigo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bktsitcodigo') ?></th>
            <td><?= $this->Number->format($bkp000->bktsitcodigo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bktusercodigo') ?></th>
            <td><?= $this->Number->format($bkp000->bktusercodigo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bktdatasituacao') ?></th>
            <td><?= h($bkp000->bktdatasituacao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Bktdatacriacao') ?></th>
            <td><?= h($bkp000->bktdatacriacao) ?></td>
        </tr>
    </table>
</div>
