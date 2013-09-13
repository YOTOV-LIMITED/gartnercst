<span style="float:left;"><a href="/gartnercst/index.php?r=gartner/admin">Reporting</a></span>
<div class="span11">
	
	<div class="span7" style="margin-left:200px;">
	<table class="table table-bordered table-hover table-striped">
		<caption style="margin:26px 0px;">
			<h2>Attendee Dietary Report</h2>
		</caption>
		<thead>
			<tr>
				<th>Dietary Requirements</th><th>Number</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				if(!empty($diets)) {
					foreach($diets as $diet) {	
			?>
			<tr class="warning">
				<td><?php 
						if(!empty($requirements[$diet['DietaryRequirements']]) and isset($requirements[$diet['DietaryRequirements']])){
						echo $requirements[$diet['DietaryRequirements']];
						}
					?></td>
				<td><?php echo $diet['countDiet']; ?></td>
			</tr>
			<?php } } ?>
		</tbody>
	</table>
	</div>
		<div class="span7" style="margin-left:200px;">
	<table class="table table-bordered table-hover table-striped">
		<caption style="margin:26px 0px;">
			<h2>Guest Dietary Report</h2>
		</caption>
		<thead>
			<tr>
				<th>Dietary Requirements</th><th>Number</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				if(!empty($guestDiets)) {
					foreach($guestDiets as $guestDiet) {	
			?>
			<tr class="warning">
				<td><?php 
						if(!empty($requirements[$guestDiet['GuestDietaryRequirements']]) and isset($requirements[$guestDiet['GuestDietaryRequirements']])){
						echo $requirements[$guestDiet['GuestDietaryRequirements']];
						}
					?></td>
				<td><?php echo $guestDiet['countGuestDiet']; ?></td>
			</tr>
			<?php } } ?>
		</tbody>
	</table>
	</div>
</div>
<div style="height:460px;"></div>
<div>