<div class="users form">
<h3>User Login</h3>
<?= $this->Flash->render('auth') ?>
<?= $this->Form->create() ?>
<fieldset>
	<legend><?= __('Please enter username and password') ?></legend>
	<?= $this->Form->input('username') ?>
	<?= $this->Form->input('password') ?>
	<?= $this->Form->button(__('Login')) ?>
</fieldset>
<?= $this->Form->end() ?>
</div>