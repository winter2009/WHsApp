<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sub_category_name')); ?>:</b>
	<?php echo CHtml::encode($data->sub_category_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sub_category_description')); ?>:</b>
	<?php echo CHtml::encode($data->sub_category_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parent_id')); ?>:</b>
	<?php echo CHtml::encode($data->parent_id); ?>
	<br />


</div>