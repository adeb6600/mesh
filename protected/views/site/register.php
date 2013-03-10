<?php

/* @var $this SiteController */
/* @var $model2 RegisterForm */
/* @var $form CActiveForm  */

?>

<div id='register'  class="animate form" style="position:relative; top:-306px;">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'register-form',
	 'action'=>$this->createUrl('site/register'),
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p>
		<?php echo $form->textField($model2,'first_name',array('placeholder'=>'First Name')); ?>   
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/mesh/views/images/login_username_icon.png">
		<?php echo $form->error($model2,'first_name'); ?>
	</p>
	   <p style="position: relative; top: -10px;"> 
		<?php echo $form->textField($model2,'last_name',array('placeholder'=>'Last Name')); ?>
     <img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/mesh/views/images/login_username_icon.png">
			
	<?php echo $form->error($model2,'last_name'); ?>
	</p>
	 <p style="position: relative; top: -30px;"> 
		<?php echo $form->emailField($model2,'email',array('placeholder'=>'Email')); ?>
     <img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/mesh/views/images/login_username_icon.png">
		
		<?php echo $form->error($model2,'email'); ?>
	</p>
	   <p  style="position: relative; top: -50px;"> 
		<?php echo $form->passwordField($model2,'password',array('placeholder'=>'Password')); ?>
	                                   <img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/mesh/views/images/login_pass_icon.png">
        	<?php echo $form->error($model2,'password'); ?>
	</p>
	 <p style="position: relative; top: -70px;"> 
		<?php echo $form->passwordField($model2,'cpassword',array('placeholder'=>'Confirm Password')); ?>
	                                   <img src="<?php echo Yii::app()->request->baseUrl; ?>/themes/mesh/views/images/login_pass_icon.png">
        	<?php echo $form->error($model2,'cpassword'); ?>
	</p>

	   <p id="register_date" style="position: relative; top: -80px;"> 
    <?php echo $form->dropDownList($model2,'month',$model2->monthNames); ?>
    
    <?php echo $form->dropDownList($model2,'bdate',$model2->dates); ?>
    
    <?php echo $form->dropDownList($model2,'year',$model2->validYears); ?>
    
  </p>
       <div class="login-space" style="position: relative; top: -60px;"><p> 
									<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
									<label for="loginkeeping">By sign up you agree to Meshness terms and
Privacy Policies</label></p></div>
	
	<p class='signin button'style="position: relative; top: -70px;">
	   <?php echo CHtml::submitButton('SIGN UP')?>
	</p>
	
	<p class='change_link' style="position: relative; top: -80px;">
	<?php echo CHtml::link('Log-in','#tologin',array('class'=>'to_register'))?>
		
	</p>

<?php $this->endWidget(); ?>
</div><!-- form -->
