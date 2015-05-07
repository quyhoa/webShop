<div class="usersonlines index">
	<h2><?php echo __('Usersonlines'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<thead>
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('ip'); ?></th>
			<th><?php echo $this->Paginator->sort('brower'); ?></th>
			<th><?php echo $this->Paginator->sort('time'); ?></th>
			<th><?php echo $this->Paginator->sort('status'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php foreach ($usersonlines as $usersonline): ?>
	<tr>
		<td><?php echo h($usersonline['Usersonline']['id']); ?>&nbsp;</td>
		<td><?php echo h($usersonline['Usersonline']['ip']); ?>&nbsp;</td>
		<td><?php echo h($usersonline['Usersonline']['brower']); ?>&nbsp;</td>
		<td><?php echo h($usersonline['Usersonline']['time']); ?>&nbsp;</td>
		<td><?php echo h($usersonline['Usersonline']['status']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $usersonline['Usersonline']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $usersonline['Usersonline']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $usersonline['Usersonline']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $usersonline['Usersonline']['id']))); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</tbody>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
		'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>
	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Usersonline'), array('action' => 'add')); ?></li>
	</ul>
</div>
