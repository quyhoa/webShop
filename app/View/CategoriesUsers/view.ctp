<div class="categoriesUsers view">
<h2><?php echo __('Categories User'); ?></h2>
	<dl>
		<dt><?php echo __('Category'); ?></dt>
		<dd>
			<?php echo $this->Html->link($categoriesUser['Category']['name'], array('controller' => 'categories', 'action' => 'view', $categoriesUser['Category']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('User'); ?></dt>
		<dd>
			<?php echo $this->Html->link($categoriesUser['User']['id'], array('controller' => 'users', 'action' => 'view', $categoriesUser['User']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Categories User'), array('action' => 'edit', $categoriesUser['CategoriesUser']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Categories User'), array('action' => 'delete', $categoriesUser['CategoriesUser']['id']), array(), __('Are you sure you want to delete # %s?', $categoriesUser['CategoriesUser']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories Users'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Categories User'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Categories'), array('controller' => 'categories', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Category'), array('controller' => 'categories', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Users'), array('controller' => 'users', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User'), array('controller' => 'users', 'action' => 'add')); ?> </li>
	</ul>
</div>
