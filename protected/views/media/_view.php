<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('media_name')); ?>:</b>
	<?php echo CHtml::encode($data->media_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('media_url')); ?>:</b>
	<?php echo CHtml::encode($data->media_url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('media_created')); ?>:</b>
	<?php echo CHtml::encode($data->media_created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('media_modified')); ?>:</b>
	<?php echo CHtml::encode($data->media_modified); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('media_description')); ?>:</b>
	<?php echo CHtml::encode($data->media_description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sub_category_id')); ?>:</b>
	<?php echo CHtml::encode($data->sub_category_id); ?>
	<br />


</div>