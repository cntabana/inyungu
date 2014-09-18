<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'igu-client-product-form',
	'enableAjaxValidation' => false,
));
$idclient =Yii::app()->db->createCommand('SELECT id FROM igu_registration where  iduser='.Yii::app()->session['iduser'])->queryRow();
?>

	<p class="note">
		<?php echo Yii::t('app', 'Ahantu hose hari '); ?> <span class="required">*</span> <?php echo Yii::t('app', 'ningobwa kuhuzuza'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>
<table width='70%'>
    <tr>
	    <td>
		<div class="row">
		<?php echo $form->labelEx($model,'idproduct'); ?>
		<?php echo $form->dropDownList($model, 'idproduct', GxHtml::listDataEx(IguProducts::model()->findAllAttributes(null, true)),array('prompt'=>' Hitamo ibigurishwa')); ?>
		<?php echo $form->error($model,'idproduct'); ?>
		</div><!-- row -->
		</td>
		<td>
		<?php echo $form->hiddenField($model, 'idclient',array('value'=>$idclient['id'])); ?>
		<?php echo $form->hiddenField($model, 'creationdate',array('value'=>date('y-m-d'))); ?>
		<div class="row">
		<?php echo $form->labelEx($model,'currentprice'); ?>
		<?php echo $form->textField($model, 'currentprice'); ?>
		<?php echo $form->error($model,'currentprice'); ?>
		</div><!-- row -->
		</td>
	</tr>
	<tr>
	    <td>
		<div class="row">
		<?php echo $form->labelEx($model,'quantity'); ?>
		<?php echo $form->textField($model, 'quantity',array('style'=>'width: 100px;')); ?>
		<?php echo $form->dropDownList($model,'mesure',array('Kg'=>'Kg','T'=>'Toni','L'=>'Litilo'), array('prompt'=>'Hitamo','style'=>'width: 100px;')); ?>
		<?php echo $form->error($model,'quantity'); ?>
		</div><!-- row -->
		</td>
		<td>
		<div class="row">
		<?php echo $form->labelEx($model,'totalamount'); ?>
		<?php echo $form->textField($model, 'totalamount'); ?>
		<?php echo $form->error($model,'totalamount'); ?>
		</div><!-- row -->
		</td>
	</tr>	
	<tr>
	   <td colspan='2'>
		
		<?php echo $form->labelEx($model,'detail'); ?>
		<?php echo $form->textArea($model, 'detail',array('style'=>'width: 600px; height: 140px;','maxlength' => 600)); ?>
		<?php echo $form->error($model,'detail'); ?>
		<!-- row -->
    </td>
	</tr>
	
<tr>
    <td>	
<?php
echo GxHtml::submitButton(Yii::t('app', 'Amamaza'));
$this->endWidget();
?>
</td>
</tr>
</table>
</div><!-- form -->