<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'media-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'media_name'); ?>
		<?php echo $form->textField($model,'media_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'media_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'media_url'); ?>
		<?php echo $form->textField($model,'media_url',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'media_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'media_created'); ?>
		<?php echo $form->textField($model,'media_created',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'media_created'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'media_modified'); ?>
		<?php echo $form->textField($model,'media_modified',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'media_modified'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'media_description'); ?>
		<?php echo $form->textField($model,'media_description',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'media_description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sub_category_id'); ?>
		<?php echo $form->textField($model,'sub_category_id'); ?>
		<?php echo $form->error($model,'sub_category_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->