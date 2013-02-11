<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

?>

<div id='login' class="animate form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	 'action'=>$this->createUrl('site/login'),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

        <a href="index2.html"><img src="images/mesh.png" width="152" height="65"></a>                      
	<p>
		<?php echo $form->textField($model,'username',array('placeholder'=>'username/email')); ?>
		<?php echo $form->error($model,'username'); ?>
	</p>

	<p>
		<?php echo $form->passwordField($model,'password',array('placeholder'=>'password')); ?>
		<?php echo $form->error($model,'password'); ?>
	</p>

	
		  <div class="login-space"><p> 
							<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
		</p></div>
	
	<span>
		<?php echo CHtml::submitButton('Login', array('class'=>'btn inf')); ?>
		<p><?php echo CHtml::link('Signup','#toregister',array('class'=>'btn success'))?></p>
		
	</span>

<?php $this->endWidget(); ?>
</div><!-- form -->
<?php echo $registerform ?>