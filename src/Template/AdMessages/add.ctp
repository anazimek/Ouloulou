<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Ad Messages'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Ads'), ['controller' => 'Ads', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Ad'), ['controller' => 'Ads', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="adMessages form large-9 medium-8 columns content">
    <?= $this->Form->create($adMessage) ?>
    <fieldset>
        <legend><?= __('Add Ad Message') ?></legend>
        <?php
            echo $this->Form->input('ad_id', ['options' => $ads]);
            echo $this->Form->input('first_name');
            echo $this->Form->input('email');
            echo $this->Form->input('message');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
