<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit User Message'), ['action' => 'edit', $userMessage->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete User Message'), ['action' => 'delete', $userMessage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $userMessage->id)]) ?> </li>
        <li><?= $this->Html->link(__('List User Messages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User Message'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="userMessages view large-9 medium-8 columns content">
    <h3><?= h($userMessage->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('User') ?></th>
            <td><?= $userMessage->has('user') ? $this->Html->link($userMessage->user->id, ['controller' => 'Users', 'action' => 'view', $userMessage->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($userMessage->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($userMessage->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($userMessage->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Message') ?></h4>
        <?= $this->Text->autoParagraph(h($userMessage->message)); ?>
    </div>
</div>
