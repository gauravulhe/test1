
<div class="cities form large-9 medium-8 columns content">
	<fieldset>
        <legend><?= __('Contact Form') ?></legend>
		<?php
		echo $this->Form->create($contact);
		echo $this->Form->input('name');
		echo $this->Form->input('email');
		echo $this->Form->input('body');
		echo $this->Form->button('Submit');
		echo $this->Form->end();
		?>
	</fieldset>
</div>