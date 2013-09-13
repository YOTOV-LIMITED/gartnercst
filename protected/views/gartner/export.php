<table>
<thead>
	<tr>
		<th>Id</th>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Email</th>
		<th>Department</th>
		<th>Dietary Requirements</th>
		<th>Other Dietary Requirements</th>
		<th>Guest First Name</th>
		<th>Guest Last Name</th>
		<th>Guest Dietary Requirements</th>
		<th>Guest Other Dietary Requirements</th>
		<th>Status</th>
		<th>DeclineReason</th>
		<th>Time</th>
	</tr>
</thead>
<tbody>
	<?php 
		if(!empty($requests)) {
			foreach($requests as $request) {
	?>
	<tr>
		<th><?php echo $request['Id'];?></th>
		<th><?php echo $request['FirstName'];?></th>
		<th><?php echo $request['LastName'];?></th>
		<th><?php echo $request['Email'];?></th>
		<th><?php if(!empty($departmen[$request['Department']])) {echo $departmen[$request['Department']];}?></th>
		<th><?php if(!empty($dietary[$request['DietaryRequirements']])) {echo $dietary[$request['DietaryRequirements']];}?></th>
		<th><?php echo $request['OtherDietaryRequirements'];?></th>
		<th><?php echo $request['GuestFirstName'];?></th>
		<th><?php echo $request['GuestLastName'];?></th>
		<th><?php  if(!empty($dietary[$request['GuestDietaryRequirements']])) {echo $dietary[$request['GuestDietaryRequirements']];}?></th>
		<th><?php echo $request['GuestOtherDietaryRequirements'];?></th>
		<td><?php if($request['Static'] == 1){echo '<span style="color:green;">Accepted</span>';}else {echo '<span style="color:red;">Declined</span>';}?></td>
		<th><?php echo $request['DeclineReason'];?></th>
		<td><?php echo date('Y-m-d H:i:s', $request['CreateTime']);?></td>
	</tr>
	<?php } } ?>
</tbody>
</table>