<?php if ($model !== null):?>
<table border="1">

	<tr>
		<th width="80px">
		      id		</th>
 		<th width="80px">
		      firstname		</th>
 		<th width="80px">
		      lastname		</th>
 		<th width="80px">
		      telephone		</th>
 		<th width="80px">
		      datedinscription		</th>
 		<th width="80px">
		      email		</th>
 		<th width="80px">
		      iddistrict		</th>
 		<th width="80px">
		      sector		</th>
 		<th width="80px">
		      identite		</th>
 		<th width="80px">
		      idcompanytype		</th>
 		<th width="80px">
		      numberofmembers		</th>
 		<th width="80px">
		      nameofcooperative		</th>
 		<th width="80px">
		      iduser		</th>
 	</tr>
	<?php foreach($model as $row): ?>
	<tr>
        		<td>
			<?php echo $row->id; ?>
		</td>
       		<td>
			<?php echo $row->firstname; ?>
		</td>
       		<td>
			<?php echo $row->lastname; ?>
		</td>
       		<td>
			<?php echo $row->telephone; ?>
		</td>
       		<td>
			<?php echo $row->datedinscription; ?>
		</td>
       		<td>
			<?php echo $row->email; ?>
		</td>
       		<td>
			<?php echo $row->iddistrict; ?>
		</td>
       		<td>
			<?php echo $row->sector; ?>
		</td>
       		<td>
			<?php echo $row->identite; ?>
		</td>
       		<td>
			<?php echo $row->idcompanytype; ?>
		</td>
       		<td>
			<?php echo $row->numberofmembers; ?>
		</td>
       		<td>
			<?php echo $row->nameofcooperative; ?>
		</td>
       		<td>
			<?php echo $row->iduser; ?>
		</td>
       	</tr>
     <?php endforeach; ?>
</table>
<?php endif; ?>
