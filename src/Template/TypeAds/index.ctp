<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Type Ad'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ads'), ['controller' => 'Ads', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ad'), ['controller' => 'Ads', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="typeAds index large-9 medium-8 columns content">
    <h3><?= __('Type Ads') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('type_name') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($typeAds as $typeAd): ?>
            <tr>
                <td><?= $this->Number->format($typeAd->id) ?></td>
                <td><?= h($typeAd->type_name) ?></td>
                <td><?= h($typeAd->created) ?></td>
                <td><?= h($typeAd->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $typeAd->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $typeAd->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $typeAd->id], ['confirm' => __('Are you sure you want to delete # {0}?', $typeAd->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
