<div class="usersonlines form">
<?php echo $this->Form->create('Usersonline'); ?>
	<fieldset>
		<legend><?php echo __('Edit Usersonline'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Usersonline.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Usersonline.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Usersonlines'), array('action' => 'index')); ?></li>
	</ul>
</div>
