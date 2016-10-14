<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User Image'), ['action' => 'edit', $userImage->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User Image'), ['action' => 'delete', $userImage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userImage->id)]) ?> </li>
        <li><?= $this->Html->link(__('List User Images'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Image'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="userImages view large-9 medium-8 columns content">
    <h3><?= h($userImage->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $userImage->has('user') ? $this->Html->link($userImage->user->id, ['controller' => 'Users', 'action' => 'view', $userImage->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($userImage->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($userImage->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($userImage->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($userImage->modified) ?></td>
        </tr>
    </table>
</div>
