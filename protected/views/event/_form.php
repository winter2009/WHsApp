<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'event-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'event_name'); ?>
		<?php echo $form->textField($model,'event_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'event_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'event_date'); ?>
		<?php echo $form->textField($model,'event_date',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'event_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'event_venue'); ?>
		<?php echo $form->textField($model,'event_venue',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'event_venue'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'event_image'); ?>
		<?php echo $form->textField($model,'event_image',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'event_image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'event_detail'); ?>
		<?php echo $form->textArea($model,'event_detail',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'event_detail'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'event_created'); ?>
		<?php echo $form->textField($model,'event_created'); ?>
		<?php echo $form->error($model,'event_created'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->