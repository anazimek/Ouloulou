<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Sex'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="sexes index large-9 medium-8 columns content">
    <h3><?= __('Sexes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('description') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sexes as $sex): ?>
            <tr>
                <td><?= $this->Number->format($sex->id) ?></td>
                <td><?= h($sex->description) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $sex->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $sex->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $sex->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sex->id)]) ?>
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
