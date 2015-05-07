<div class="usersonlines form">
<?php echo $this->Form->create('Usersonline'); ?>
	<fieldset>
		<legend><?php echo __('Add Usersonline'); ?></legend>
	<?php
		echo $this->Form->input('ip');
		echo $this->Form->input('brower');
		echo $this->Form->input('time');
		echo $this->Form->input('status');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Usersonlines'), array('action' => 'index')); ?></li>
	</ul>
</div>
