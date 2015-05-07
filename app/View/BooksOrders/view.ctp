<div class="booksOrders view">
<h2><?php echo __('Books Order'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($booksOrder['BooksOrder']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Book'); ?></dt>
		<dd>
			<?php echo $this->Html->link($booksOrder['Book']['title'], array('controller' => 'books', 'action' => 'view', $booksOrder['Book']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Order'); ?></dt>
		<dd>
			<?php echo $this->Html->link($booksOrder['Order']['id'], array('controller' => 'orders', 'action' => 'view', $booksOrder['Order']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Books Order'), array('action' => 'edit', $booksOrder['BooksOrder']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Books Order'), array('action' => 'delete', $booksOrder['BooksOrder']['id']), array(), __('Are you sure you want to delete # %s?', $booksOrder['BooksOrder']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Books Orders'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Books Order'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Books'), array('controller' => 'books', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Book'), array('controller' => 'books', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Orders'), array('controller' => 'orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Order'), array('controller' => 'orders', 'action' => 'add')); ?> </li>
	</ul>
</div>
