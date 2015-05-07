<?php //pr($category) ?>
<?php //pr($books) ?>
<div>
	<?php if (!empty('books')): ?>
		<?php echo $this->element('books',array('books'=>$books,'titles'=>$category['Category']['name'])) ?>
	<?php endif; ?>
	<!-- Phan trang books -->
	<?php echo $this->element('paginate',array('object'=>'quyển sách')) ?>	
</div>
