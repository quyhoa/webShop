<div class="usersonlines view">
<h2><?php echo __('Usersonline'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($usersonline['Usersonline']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Ip'); ?></dt>
		<dd>
			<?php echo h($usersonline['Usersonline']['ip']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Brower'); ?></dt>
		<dd>
			<?php echo h($usersonline['Usersonline']['brower']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Time'); ?></dt>
		<dd>
			<?php echo h($usersonline['Usersonline']['time']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Status'); ?></dt>
		<dd>
			<?php echo h($usersonline['Usersonline']['status']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Usersonline'), array('action' => 'edit', $usersonline['Usersonline']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Usersonline'), array('action' => 'delete', $usersonline['Usersonline']['id']), array(), __('Are you sure you want to delete # %s?', $usersonline['Usersonline']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Usersonlines'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Usersonline'), array('action' => 'add')); ?> </li>
	</ul>
</div>
