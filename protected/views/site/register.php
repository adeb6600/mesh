<?php

/* @var $this SiteController */
/* @var $model2 RegisterForm */
/* @var $form CActiveForm  */

?>

<div id='register'  class="animate form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'register-form',
	 'action'=>$this->createUrl('site/register'),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

    <img src="images/logo.png"/>
                                <h1> Sign up </h1> 


<p>
		<?php echo $form->textField($model2,'firstname',array('placeholder'=>'First Name')); ?>
		<?php echo $form->error($model2,'firstname'); ?>
	</p>

	
	<p>
		<?php echo $form->textField($model2,'lastname',array('placeholder'=>'Last Name')); ?>
		<?php echo $form->error($model2,'lastname'); ?>
	</p>
	<p>
		<?php echo $form->emailField($model2,'email',array('placeholder'=>'Email')); ?>
		<?php echo $form->error($model2,'email'); ?>
	</p>

	
	<p>
		<?php echo $form->passwordField($model2,'password',array('placeholder'=>'Password')); ?>
		<?php echo $form->error($model2,'password'); ?>
	</p>
	
	<p>
		<?php echo $form->passwordField($model2,'cpassword',array('placeholder'=>'Confirm Password')); ?>
		<?php echo $form->error($model2,'cpassword'); ?>
	</p>
	
	<p class='signin button'>
	   <?php echo CHtml::submitButton('SIGN UP')?>
	</p>
	
	<p class='change_link'>
	<?php echo CHtml::link('Log-in','#tologin',array('class'=>'to_register'))?>
		
	</p>

<?php $this->endWidget(); ?>
</div><!-- form -->
