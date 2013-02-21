<?php
/* @var $this ProfileController */
/* @var $profile Profile */
/* @var $form CActiveForm */
?>

<div class="form" style="margin-left:30px;">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'profile-create-form',
    'enableAjaxValidation'=>false,
)); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary($profile); ?>

    <div class="row">
        <?php echo $form->labelEx($profile,'skype_name'); ?>
        <?php echo $form->textField($profile,'skype_name'); ?>
        <?php echo $form->error($profile,'skype_name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($profile,'mobile_phone'); ?>
        <?php echo $form->textField($profile,'mobile_phone'); ?>
        <?php echo $form->error($profile,'mobile_phone'); ?>
    </div>

    <div class="row">
        <?php echo $form->hiddenField($profile,'user_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($profile,'bachelors_education'); ?>
        <?php echo $form->textField($profile,'bachelors_education'); ?>
        <?php echo $form->error($profile,'bachelors_education'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($profile,'masters_education'); ?>
        <?php echo $form->textField($profile,'masters_education'); ?>
        <?php echo $form->error($profile,'masters_education'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($profile,'city'); ?>
        <?php echo $form->textField($profile,'city'); ?>
        <?php echo $form->error($profile,'city'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($profile,'state'); ?>
        <?php echo $form->textField($profile,'state'); ?>
        <?php echo $form->error($profile,'state'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($profile,'country'); ?>
        <?php echo $form->textField($profile,'country'); ?>
        <?php echo $form->error($profile,'country'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($profile,'company_name'); ?>
        <?php echo $form->textField($profile,'company_name'); ?>
        <?php echo $form->error($profile,'company_name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($profile,'company_location'); ?>
        <?php echo $form->textField($profile,'company_location'); ?>
        <?php echo $form->error($profile,'company_location'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($profile,'company_desingation'); ?>
        <?php echo $form->textField($profile,'company_desingation'); ?>
        <?php echo $form->error($profile,'company_desingation'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($profile,'company_notes'); ?>
        <?php echo $form->textField($profile,'company_notes'); ?>
        <?php echo $form->error($profile,'company_notes'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($profile,'prev_company_name'); ?>
        <?php echo $form->textField($profile,'prev_company_name'); ?>
        <?php echo $form->error($profile,'prev_company_name'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($profile,'prev_company_desingation'); ?>
        <?php echo $form->textField($profile,'prev_company_desingation'); ?>
        <?php echo $form->error($profile,'prev_company_desingation'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($profile,'prev_company_notes'); ?>
        <?php echo $form->textField($profile,'prev_company_notes'); ?>
        <?php echo $form->error($profile,'prev_company_notes'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($profile,'mission_statement'); ?>
        <?php echo $form->textField($profile,'mission_statement'); ?>
        <?php echo $form->error($profile,'mission_statement'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($profile,'bachelors_education_from'); ?>
        <?php echo $form->textField($profile,'bachelors_education_from'); ?>
        <?php echo $form->error($profile,'bachelors_education_from'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($profile,'bachelors_education_to'); ?>
        <?php echo $form->textField($profile,'bachelors_education_to'); ?>
        <?php echo $form->error($profile,'bachelors_education_to'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($profile,'masters_education_from'); ?>
        <?php echo $form->textField($profile,'masters_education_from'); ?>
        <?php echo $form->error($profile,'masters_education_from'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($profile,'masters_education_to'); ?>
        <?php echo $form->textField($profile,'masters_education_to'); ?>
        <?php echo $form->error($profile,'masters_education_to'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($profile,'company_name_from'); ?>
        <?php echo $form->textField($profile,'company_name_from'); ?>
        <?php echo $form->error($profile,'company_name_from'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($profile,'company_name_to'); ?>
        <?php echo $form->textField($profile,'company_name_to'); ?>
        <?php echo $form->error($profile,'company_name_to'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($profile,'prev_company_from'); ?>
        <?php echo $form->textField($profile,'prev_company_from'); ?>
        <?php echo $form->error($profile,'prev_company_from'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($profile,'prev_company_to'); ?>
        <?php echo $form->textField($profile,'prev_company_to'); ?>
        <?php echo $form->error($profile,'prev_company_to'); ?>
    </div>


    <div class="row buttons">
        <?php echo CHtml::submitButton('Submit'); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->