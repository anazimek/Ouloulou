<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User Image'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="userImages index large-9 medium-8 columns content">
    <h3><?= __('User Images') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('user_id') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userImages as $userImage): ?>
            <tr>
                <td><?= $this->Number->format($userImage->id) ?></td>
                <td><?= $userImage->has('user') ? $this->Html->link($userImage->user->id, ['controller' => 'Users', 'action' => 'view', $userImage->user->id]) : '' ?></td>
                <td><?= h($userImage->description) ?></td>
                <td><?= h($userImage->created) ?></td>
                <td><?= h($userImage->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $userImage->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $userImage->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $userImage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userImage->id)]) ?>
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
