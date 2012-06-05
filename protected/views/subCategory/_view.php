<div class="view">

<!--	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('subCategory/view', 'id'=>$data->id)); ?>
	<br />-->

	<b><?php echo CHtml::encode($data->getAttributeLabel('sub_category_name')); ?>:</b>
	<?php // echo CHtml::encode($data->sub_category_name); ?>
    <?php echo CHtml::link(CHtml::encode($data->sub_category_name), array('subCategory/view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sub_category_description')); ?>:</b>
	<?php echo CHtml::encode($data->sub_category_description); ?>
	<br />

	<b><?php echo CHtml::encode('Category'); ?>:</b>
	<?php echo CHtml::encode($data->category->category_name); ?>
	<br />


</div>