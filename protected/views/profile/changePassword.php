<h1>Change Password</h1>
	<hr align="left" />
	<div>Just enter your old password and verify your new password.</div><br/>
		
	<?php if(Yii::app()->user->hasFlash('success')):?>
	  <div class="flashSuccess">
		<?php echo Yii::app()->user->getFlash('success'); ?>
	     </div>
	<?php endif; ?>
	
	<?php $form=$this->beginWidget('CActiveForm', array(
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>false,
			),
	)); ?>
			
	<div>
		<?php echo $form->label($model,'password'); ?><br />
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div><br/>
	
	<div>
		<?php echo $form->label($model,'newPassword'); ?><br />
		<?php echo $form->passwordField($model,'newPassword',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'newPassword'); ?>
	</div><br/>
		
	<div>
		<?php echo $form->label($model,'newPassword_repeat'); ?><br />
		<?php echo $form->passwordField($model,'newPassword_repeat',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'newPassword_repeat'); ?>
	</div><br/>
			
    <?php echo CHtml::submitButton('Change'); ?>
	<?php $this->endWidget(); ?>
  </div>

