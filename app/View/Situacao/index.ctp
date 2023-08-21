<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bkp003[]|\Cake\Collection\CollectionInterface $bkp003
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Bkp003'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bkp003 index large-9 medium-8 columns content">
    <h3><?= __('Bkp003') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('sitcodigo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sitdescricao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sitreduzido') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sitsituacao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sitdatasituacao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('sitdatacriacao') ?></th>
                <th scope="col"><?= $this->Paginator->sort('situsercodigo') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bkp003 as $bkp003): ?>
            <tr>
                <td><?= $this->Number->format($bkp003->sitcodigo) ?></td>
                <td><?= h($bkp003->sitdescricao) ?></td>
                <td><?= h($bkp003->sitreduzido) ?></td>
                <td><?= h($bkp003->sitsituacao) ?></td>
                <td><?= h($bkp003->sitdatasituacao) ?></td>
                <td><?= h($bkp003->sitdatacriacao) ?></td>
                <td><?= $this->Number->format($bkp003->situsercodigo) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $bkp003->sitcodigo]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bkp003->sitcodigo]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bkp003->sitcodigo], ['confirm' => __('Are you sure you want to delete # {0}?', $bkp003->sitcodigo)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
