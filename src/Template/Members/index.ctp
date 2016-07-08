<!-- <nav class="large-2 medium-2 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Member'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Countries'), ['controller' => 'Countries', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Country'), ['controller' => 'Countries', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List States'), ['controller' => 'States', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New State'), ['controller' => 'States', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Cities'), ['controller' => 'Cities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New City'), ['controller' => 'Cities', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav> -->
<?= $this->prepend('sidebar', 'This content goes on sidebar.'); ?>
<div class="members index large-10 medium-10 columns content">
    <h3>
        <?= __('Members') ?>
    </h3>

    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>                    
                <?= $this->Form->create($members, ['type' => 'get']) ?>
                <th>
                    <?= $this->Form->input('q') ?>
                </th>
                <th>
                    <?= $this->Form->input('Filter', ['type' => 'submit']) ?>
                </th>
                <th>
                    <?= $this->Html->link('Reset', ['action' => 'index']) ?>
                </th>
                <?= $this->Form->end() ?>
            </tr>
        </thead>
    </table>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('username') ?></th>
                <!-- <th><?= $this->Paginator->sort('password') ?></th> -->
                <th><?= $this->Paginator->sort('country_id') ?></th>
                <th><?= $this->Paginator->sort('state_id') ?></th>
                <th><?= $this->Paginator->sort('city_id') ?></th>
                <th><?= $this->Paginator->sort('created') ?></th>
                <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($members as $member): ?>
            <tr>
                <td><?= $this->Number->format($member->id) ?></td>
                   <td><?= h($member->username) ?></td>
                <!-- <td><?= h($member->password) ?></td> -->
                <td><?= $member->has('country') ? $this->Html->link($member->country->country, ['controller' => 'Countries', 'action' => 'view', $member->country->id]) : '' ?></td>
                <td><?= $member->has('state') ? $this->Html->link($member->state->state, ['controller' => 'States', 'action' => 'view', $member->state->id]) : '' ?></td>
                <td><?= $member->has('city') ? $this->Html->link($member->city->city, ['controller' => 'Cities', 'action' => 'view', $member->city->id]) : '' ?></td>
                <td><?= h($member->created) ?></td>
                <td><?= h($member->modified) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $member->id]) ?>
                    
                    <?php if(isset($session)): ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $member->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $member->id], ['confirm' => __('Are you sure you want to delete # {0}?', $member->id)]) ?>
                    <?php endif;?>
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
