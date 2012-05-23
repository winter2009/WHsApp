<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('event_name')); ?>:</b>
	<?php echo CHtml::encode($data->event_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('event_date')); ?>:</b>
	<?php echo CHtml::encode($data->event_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('event_venue')); ?>:</b>
	<?php echo CHtml::encode($data->event_venue); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('event_image')); ?>:</b>
	<?php echo CHtml::encode($data->event_image); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('event_detail')); ?>:</b>
	<?php echo CHtml::encode($data->event_detail); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('event_created')); ?>:</b>
	<?php echo CHtml::encode($data->event_created); ?>
	<br />


</div>