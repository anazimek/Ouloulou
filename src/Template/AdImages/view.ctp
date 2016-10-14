<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Ad Image'), ['action' => 'edit', $adImage->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Ad Image'), ['action' => 'delete', $adImage->id], ['confirm' => __('Are you sure you want to delete # {0}?', $adImage->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Ad Images'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ad Image'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ads'), ['controller' => 'Ads', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ad'), ['controller' => 'Ads', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="adImages view large-9 medium-8 columns content">
    <h3><?= h($adImage->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Ad') ?></th>
            <td><?= $adImage->has('ad') ? $this->Html->link($adImage->ad->id, ['controller' => 'Ads', 'action' => 'view', $adImage->ad->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Description') ?></th>
            <td><?= h($adImage->description) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($adImage->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($adImage->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($adImage->modified) ?></td>
        </tr>
    </table>
</div>
