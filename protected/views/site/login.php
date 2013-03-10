<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

?>

  <img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/mesh/views/images/login_logo.png" />   
<div id='login' class="animate form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	 'action'=>$this->createUrl('site/login'),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

                        
	<p>
		<?php echo $form->textField($model,'username',array('placeholder'=>'username/email')); ?>
                                               <img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/mesh/views/images/login_mass_icon.png">
 
		<?php echo $form->error($model,'username'); ?>
	</p>

	<p>
		<?php echo $form->passwordField($model,'password',array('placeholder'=>'password')); ?>
                                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/mesh/views/images/login_pass_icon.png">
        
		<?php echo $form->error($model,'password'); ?>
	</p>

	
		  <div class="login-space"><p> 
				<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<span style="float:right; font-family:Arial, Helvetica, sans-serif; font-size:9px; color:#9D9D9D; margin-top:0px;"><a href="<?php echo $this->createAbsoluteUrl('site/retrievepassword') ?>">Forgot Password?</a></span>
                      </p></div>
	
	<span>
		<?php echo CHtml::submitButton('Login', array('class'=>'btn inf')); ?>
		<p><?php echo CHtml::link('Signup','#toregister',array('class'=>'btn success'))?></p>
		
	</span>

<?php $this->endWidget(); ?>
</div><!-- form -->
<?php echo $registerform ?>