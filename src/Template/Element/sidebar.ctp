<!-- <nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New User'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Member'), ['controller' => 'Members','action' => 'index']) ?></li>
    </ul>
</nav> --> 
<?php if(isset($session)): ?>
<nav class="large-2 medium-2 columns" id="actions-sidebar">
        <h3 class="heading"><?= __('Actions') ?>&nbsp;
        <font style="font-size:15px;">[ <?= $this->Html->link(__('Logout'), ['controller' => 'Users', 'action' => 'logout']) ?> ]<br>[<?= $session;?>]</font></h3>
    <ul class="side-nav">
        <li><?= $this->Html->link(__('Add New'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('Member'), ['controller' => 'Members','action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Countries'), ['controller' => 'Countries', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('States'), ['controller' => 'States', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Cities'), ['controller' => 'Cities', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Logout'), ['controller' => 'Users', 'action' => 'logout']) ?></li>
    </ul>
</nav>
<?php endif;?>