<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ad Message'), ['action' => 'edit', $adMessage->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ad Message'), ['action' => 'delete', $adMessage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adMessage->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ad Messages'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ad Message'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ads'), ['controller' => 'Ads', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ad'), ['controller' => 'Ads', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="adMessages view large-9 medium-8 columns content">
    <h3><?= h($adMessage->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Ad') ?></th>
            <td><?= $adMessage->has('ad') ? $this->Html->link($adMessage->ad->id, ['controller' => 'Ads', 'action' => 'view', $adMessage->ad->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('First Name') ?></th>
            <td><?= h($adMessage->first_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Email') ?></th>
            <td><?= h($adMessage->email) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($adMessage->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($adMessage->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($adMessage->modified) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Message') ?></h4>
        <?= $this->Text->autoParagraph(h($adMessage->message)); ?>
    </div>
</div>
