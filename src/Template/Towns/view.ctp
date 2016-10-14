<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Town'), ['action' => 'edit', $town->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Town'), ['action' => 'delete', $town->id], ['confirm' => __('Are you sure you want to delete # {0}?', $town->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Towns'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Town'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Ads'), ['controller' => 'Ads', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Ad'), ['controller' => 'Ads', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="towns view large-9 medium-8 columns content">
    <h3><?= h($town->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Town Name') ?></th>
            <td><?= h($town->town_name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($town->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($town->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($town->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Ads') ?></h4>
        <?php if (!empty($town->ads)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('User Id') ?></th>
                <th><?= __('Type Ad Id') ?></th>
                <th><?= __('For Rent') ?></th>
                <th><?= __('For Sale') ?></th>
                <th><?= __('Price') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Town Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($town->ads as $ads): ?>
            <tr>
                <td><?= h($ads->id) ?></td>
                <td><?= h($ads->user_id) ?></td>
                <td><?= h($ads->type_ad_id) ?></td>
                <td><?= h($ads->for_rent) ?></td>
                <td><?= h($ads->for_sale) ?></td>
                <td><?= h($ads->price) ?></td>
                <td><?= h($ads->description) ?></td>
                <td><?= h($ads->town_id) ?></td>
                <td><?= h($ads->created) ?></td>
                <td><?= h($ads->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Ads', 'action' => 'view', $ads->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Ads', 'action' => 'edit', $ads->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Ads', 'action' => 'delete', $ads->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ads->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
