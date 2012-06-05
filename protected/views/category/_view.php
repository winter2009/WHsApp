<div class="view">

<!--	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />-->

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_name')); ?>:</b>
	<?php // echo CHtml::encode($data->category_name); ?>
    <?php echo CHtml::link(CHtml::encode($data->category_name), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_description')); ?>:</b>
	<?php echo CHtml::encode($data->category_description); ?>
	<br />


</div>