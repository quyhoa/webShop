<div class="votes form">
<?php echo $this->Form->create('Vote'); ?>
	<fieldset>
		<legend><?php echo __('Edit Vote'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('book_id');
		echo $this->Form->input('votes');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Vote.id')), array(), __('Are you sure you want to delete # %s?', $this->Form->value('Vote.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Votes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Books'), array('controller' => 'books', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Book'), array('controller' => 'books', 'action' => 'add')); ?> </li>
	</ul>
</div>
