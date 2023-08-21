<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Bkp004[]|\Cake\Collection\CollectionInterface $bkp004
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Bkp004'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bkp004 index large-9 medium-8 columns content">
    <h3><?= __('Bkp004') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('hiscodigo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hisdata') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hisclncodigo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hissitcodigo') ?></th>
                <th scope="col"><?= $this->Paginator->sort('hisbktcodigo') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bkp004 as $bkp004): ?>
            <tr>
                <td><?= $this->Number->format($bkp004->hiscodigo) ?></td>
                <td><?= h($bkp004->hisdata) ?></td>
                <td><?= $this->Number->format($bkp004->hisclncodigo) ?></td>
                <td><?= $this->Number->format($bkp004->hissitcodigo) ?></td>
                <td><?= $this->Number->format($bkp004->hisbktcodigo) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $bkp004->hiscodigo]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $bkp004->hiscodigo]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bkp004->hiscodigo], ['confirm' => __('Are you sure you want to delete # {0}?', $bkp004->hiscodigo)]) ?>
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
