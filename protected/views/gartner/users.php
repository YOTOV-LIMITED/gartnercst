<div class="span11">
	<table class="table table-bordered table-hover table-striped">
		<a href="/gartnercst/index.php?r=gartner/admin">Reporting</a>
		<caption style="margin:10px 0px;">
			<h2>Attendee List</h2>
		</caption>
		<thead>
			<tr>
				<th>Status</th>
				<th>Decline Reason</th>
				<th>First Name</th>
				<th>Last name</th>
				<th>Department</th>
				<th>Email</th>
				<th>Dietary</th>
				<th>Dietary Other</th>
			  <th>Reg Time</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				if(!empty($users)) { 
					foreach($users as $user) {
			?>
			<tr class="">
				<td><?php if($user['Static'] == 1){echo '<span style="color:green;">Accepted</span>';}else {echo '<span style="color:red;">Declined</span>';}?></td>
				<td><?php echo $user['DeclineReason'];?></td>
				<td><?php echo $user['FirstName'];?></td>
				<td><?php echo $user['LastName'];?></td>
				<td><?php if(is_null($user['Department'])) {echo '';} else { echo $departmen[$user['Department']];}?></td>
				<td><?php echo $user['Email'];?></td>
				<td><?php if(is_null($user['DietaryRequirements'])) {echo '';} else{ echo $dietary[$user['DietaryRequirements']];}?></td>
				<td><?php echo $user['OtherDietaryRequirements'];?></td>				
				<td><?php echo date('Y-m-d H:i:s', $user['CreateTime']);?></td>
			</tr>
			<?php } } ?>
		</tbody>
	</table>
			<?php	
				$this->widget('CLinkPager',array(  
					'header'=>'',  
					'firstPageLabel' => 'First Page',  
					'lastPageLabel' => 'Last Page',  
					'prevPageLabel' => 'Prev Page',  
					'nextPageLabel' => 'Next Page',
					'pages' => $pages,
				)); 
			?>
</div>
<div>