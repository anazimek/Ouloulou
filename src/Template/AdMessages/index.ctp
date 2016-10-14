<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Ad Message'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Ads'), ['controller' => 'Ads', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ad'), ['controller' => 'Ads', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="adMessages index large-9 medium-8 columns content">
    <h3><?= __('Ad Messages') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('ad_id') ?></th>
                <th><?= $this->Paginator->sort('first_name') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($adMessages as $adMessage): ?>
            <tr>
                <td><?= $this->Number->format($adMessage->id) ?></td>
                <td><?= $adMessage->has('ad') ? $this->Html->link($adMessage->ad->id, ['controller' => 'Ads', 'action' => 'view', $adMessage->ad->id]) : '' ?></td>
                <td><?= h($adMessage->first_name) ?></td>
                <td><?= h($adMessage->email) ?></td>
                <td><?= h($adMessage->created) ?></td>
                <td><?= h($adMessage->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $adMessage->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $adMessage->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $adMessage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adMessage->id)]) ?>
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
