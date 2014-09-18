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
		      iddistrict		</th>
 		<th width="80px">
		      sector		</th>
 		<th width="80px">
		      identite		</th>
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
			<?php echo $row->iddistrict; ?>
		</td>
       		<td>
			<?php echo $row->sector; ?>
		</td>
       		<td>
			<?php echo $row->identite; ?>
		</td>
       		<td>
			<?php echo $row->iduser; ?>
		</td>
       	</tr>
     <?php endforeach; ?>
</table>
<?php endif; ?>
