<div class="span11">
	<table class="table table-bordered table-hover table-striped">
		<a href="/gartnercst/index.php?r=gartner/admin">Reporting</a>
		<caption style="margin:18px 0px;">
			<h2>Attendee List</h2>
		</caption>
		<thead>
			<tr>
				<th>First Name</th>
				<th>Last name</th>
				<th>Department</th>
				<th>Email</th>
				<th>Dietary</th>
				<th>Status</th>
				<th>Time</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				if(!empty($users)) { 
					foreach($users as $user) {
			?>
			<tr class="">
				<td><?php echo $user['FirstName'];?></td>
				<td><?php echo $user['LastName'];?></td>
				<td><?php echo $departmen[$user['Department']];?></td>
				<td><?php echo $user['Email'];?></td>
				<td><?php echo $dietary[$user['DietaryRequirements']];?></td>
				<td><?php if($user['Static'] == 1){echo '<span style="color:green;">Accepted</span>';}else {echo '<span style="color:red;">Declined</span>';}?></td>
				<td><?php echo date('Y-m-d H:i:s', $user['CreateTime']);?></td>
			</tr>
			<?php } } ?>
		</tbody>
	</table>
			<?php	
				$this->widget('CLinkPager',array(  
					'header'=>'',  
					'firstPageLabel' => '首页',  
					'lastPageLabel' => '末页',  
					'prevPageLabel' => '上一页',  
					'nextPageLabel' => '下一页',
					'pages' => $pages,
				)); 
			?>
</div>
<div>