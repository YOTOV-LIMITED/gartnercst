<span style="float:left;"><a href="/gartnercst/index.php?r=gartner/admin">Reporting</a></span>
<div class="span11">
	<div class="span7" style="margin-left:200px;">
	<table class="table table-bordered table-hover table-striped">
		<caption style="margin:26px 0px;">
			<h2>Department Dietary Report</h2>
		</caption>
		<thead>
			<tr>
				<th>Department</th>
				<th>Dietary Requirements</th>
				<th>Number</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				if(!empty($sorts)) {
					foreach($sorts as $value) {	
			?>
			<tr class="warning">
				<td><?php 
						if(!empty($department[$value['Department']]) and isset($department[$value['Department']])){
						echo $department[$value['Department']];
						}
					?></td>
				<td><?php 
						if(!empty($requirements[$value['DietaryRequirements']]) and isset($requirements[$value['DietaryRequirements']])){
						echo $requirements[$value['DietaryRequirements']];
						}
					?></td>
				<td><?php echo $value['countDepartment']; ?></td>
			</tr>
			<?php } } ?>
			<tr>
				<td colspan="3">Note: Guest Dietary Requirements are included already.</td>
			</tr>
		</tbody>
	</table>
	</div>
</div>
<div style="height:460px;"></div>
<div>