<div class="view">

<!--	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('media/view', 'id'=>$data->id)); ?>
	<br />-->

	<b><?php echo CHtml::encode($data->getAttributeLabel('media_name')); ?>:</b>
	<?php // echo CHtml::encode($data->media_name); ?>
    <?php echo CHtml::link(CHtml::encode($data->media_name), array('media/view', 'id'=>$data->id)); ?>
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

	<b><?php echo CHtml::encode('Sub Category'); ?>:</b>
	<?php echo CHtml::encode($data->subCategory->sub_category_name); ?>
	<br />


</div>