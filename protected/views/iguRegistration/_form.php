<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'igu-registration-form',
	'enableAjaxValidation' => false,
));
?>
<table width='60%'>
<tr>
<td colspan=2><p class="note">
		<?php echo Yii::t('app', 'Ahari aka'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'musabwe kuhuzuza'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?></td>
</tr>
<tr>
<td>
<div class="row">
		<?php echo $form->labelEx($model,'firstname'); ?>
		<?php echo $form->textField($model, 'firstname', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'firstname'); ?>
		</div><!-- row -->
</td>
<td>
<div class="row">
		<?php echo $form->labelEx($model,'lastname'); ?>
		<?php echo $form->textField($model, 'lastname', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'lastname'); ?>
		</div><!-- row -->
</td>
</tr>
<tr>
<td>
<div class="row">
		<?php echo $form->labelEx($model,'telephone'); ?>
		<?php echo $form->textField($model, 'telephone', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'telephone'); ?>
		</div><!-- row -->
</td>
<td>
<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model, 'email', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'email'); ?>
		</div><!-- row -->

		
</td>
</tr>
<tr>
<td>
<div class="row">
		<?php echo $form->labelEx($model,'nameofcooperative'); ?>
		<?php echo $form->textField($model, 'nameofcooperative', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'nameofcooperative'); ?>
		</div><!-- row -->		
</td>
<td>
<div class="row">
		<?php echo $form->labelEx($model,'idcompanytype'); ?>
		<?php echo $form->dropDownList($model, 'idcompanytype', GxHtml::listDataEx(IguCompanytype::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'idcompanytype'); ?>
		</div><!-- row -->
		
</td>
</tr>
<tr>
<td>
<div class="row">
		<?php echo $form->labelEx($model,'numberofmembers'); ?>
		<?php echo $form->textField($model, 'numberofmembers'); ?>
		<?php echo $form->error($model,'numberofmembers'); ?>
		</div><!-- row -->
		
</td>
<td>
	    <div class="row">
		<?php echo $form->labelEx($model,'identite'); ?>
		<?php echo $form->textField($model, 'identite', array('maxlength' => 16)); ?>
		<?php echo $form->error($model,'identite'); ?>
		</div><!-- row -->	
</td>
</tr>
<tr>
<td>

 
  
<div class="row">
		<?php echo $form->labelEx($model,'iddistrict'); ?>
		<?php
        $uturere = CHtml::listData(IguDistrict::model()->findAll(array('order'=>'district')), 'id', 'district');
		echo CHtml::activeDropDownList($model, 'iddistrict', $uturere, array('id'=>'id_district','prompt'=>'Hitamo Akarere')); 
		?>
		<?php echo $form->error($model,'iddistrict'); ?>
		</div><!-- row -->
</td>
<td>
<div class="row">
		<?php echo $form->labelEx($model,'idumurenge'); ?>
		<?php 
		$imirenge = CHtml::listData(Imirenge::model()->findAll('iddistrict=:iddistrict', array(':iddistrict'=>$model->iddistrict)), 'id', 'umurenge'); 
		echo CHtml::activeDropDownList($model, 'idumurenge', $imirenge, array('id'=>'id_umurenge','prompt'=>'Hitamo Umurenge')); 
		ECascadeDropDown::master('id_district')->setDependent('id_umurenge',array('dependentLoadingLabel'=>'Loading Imirenge ...'),'site/citydata'); 
		?>
		<?php echo $form->error($model,'idumurenge'); ?>
		</div><!-- row -->
</td>

</tr>
<tr>
<td>
<div class="row">
		<?php echo $form->labelEx($model,'akagali'); ?>
		<?php echo $form->textField($model, 'akagali', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'akagali'); ?>
		</div><!-- row -->
</td>
<td>
<div class="row">
		<?php echo $form->labelEx($model,'umudugudu'); ?>
		<?php echo $form->textField($model, 'umudugudu', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'umudugudu'); ?>
		</div><!-- row -->
</td>

</tr>
<tr>
<td>
	<div class="row">
	<?php 
	if(!$model->datedinscription)
	echo $form->hiddenField($model, 'datedinscription',array('value'=>date('Y-m-d'))); 
	else
	echo $form->hiddenField($model, 'datedinscription',array('value'=>$model->datedinscription)); 
	?>
	</div><!-- row -->
</td>
<td>
<div class="row">
		    <?php 
			if(isset($_GET['iduser']))
				echo $form->hiddenField($model,'iduser',array('size'=>21,'value'=>$_GET['iduser'])); 
			else
			    echo $form->hiddenField($model,'iduser',array('size'=>21,'value'=>Yii::app()->session['iduser']));
			?>
</div><!-- row -->
</td>
</tr>
</table>	
	
		
		
		

		<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->