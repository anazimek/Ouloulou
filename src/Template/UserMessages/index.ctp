<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User Message'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userMessages index large-9 medium-8 columns content">
    <h3><?= __('User Messages') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userMessages as $userMessage): ?>
            <tr>
                <td><?= $this->Number->format($userMessage->id) ?></td>
                <td><?= $userMessage->has('user') ? $this->Html->link($userMessage->user->id, ['controller' => 'Users', 'action' => 'view', $userMessage->user->id]) : '' ?></td>
                <td><?= h($userMessage->created) ?></td>
                <td><?= h($userMessage->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $userMessage->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userMessage->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userMessage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userMessage->id)]) ?>
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
