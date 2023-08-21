<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bkp003 $bkp003
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Bkp003'), ['action' => 'edit', $bkp003->sitcodigo]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Bkp003'), ['action' => 'delete', $bkp003->sitcodigo], ['confirm' => __('Are you sure you want to delete # {0}?', $bkp003->sitcodigo)]) ?> </li>
        <li><?= $this->Html->link(__('List Bkp003'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Bkp003'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="bkp003 view large-9 medium-8 columns content">
    <h3><?= h($bkp003->sitcodigo) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Sitdescricao') ?></th>
            <td><?= h($bkp003->sitdescricao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sitreduzido') ?></th>
            <td><?= h($bkp003->sitreduzido) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sitsituacao') ?></th>
            <td><?= h($bkp003->sitsituacao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sitcodigo') ?></th>
            <td><?= $this->Number->format($bkp003->sitcodigo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Situsercodigo') ?></th>
            <td><?= $this->Number->format($bkp003->situsercodigo) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sitdatasituacao') ?></th>
            <td><?= h($bkp003->sitdatasituacao) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Sitdatacriacao') ?></th>
            <td><?= h($bkp003->sitdatacriacao) ?></td>
        </tr>
    </table>
</div>
