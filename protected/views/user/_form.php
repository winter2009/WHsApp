<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

    <div class="row">
		<?php echo $form->labelEx($model,'nick_name'); ?>
		<?php echo $form->textField($model,'nick_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'nick_name'); ?>
	</div>

    
	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password_repeat'); ?>
		<?php echo $form->passwordField($model,'password_repeat',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'password_repeat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'created'); ?>
		<?php echo $form->textField($model,'created',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'created'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modified'); ?>
		<?php echo $form->textField($model,'modified',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'modified'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'role_id'); ?>
		<?php echo $form->textField($model,'role_id'); ?>
		<?php echo $form->error($model,'role_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'salt'); ?>
		<?php echo $form->textField($model,'salt',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'salt'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->