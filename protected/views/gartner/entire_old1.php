<span style="float:left;"><a href="/gartnercst/index.php?r=gartner/admin">Reporting</a></span>
<div class="span11">
	<div class="span7" style="margin-left:200px;">
	<table class="table table-bordered table-hover table-striped">
		<caption style="margin:26px 0px;">
			<h2>Attendee/Guest Report</h2>
		</caption>
		<thead>
			<tr>
				<th>Department</th>
				<th>Attendee</th>
				<th>Guest</th>
				<th>Total</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$D = 0;
			$G = 0;
			$T = 0;
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
					echo  $value['countDepartment'];
					$D +=  $value['countDepartment'];
					?></td>
				<td><?php
						echo $value['countGuestDiet'];
						$G += $value['countGuestDiet'];
					?></td>
				<td><?php   
						$total = intval($value['countDepartment']) +  intval($value['countGuestDiet']); 	
						echo $total;
						$T += $total;
					?></td>
			</tr>
			<?php } } ?>
			<tr>
				<td>Total</td>
				<td><?php echo $D;?></td>
				<td><?php echo $G;?></td>
				<td><?php echo $T;?></td>
			</tr>
		</tbody>
	</table>
	</div>
</div>
<div style="height:460px;"></div>
<div>