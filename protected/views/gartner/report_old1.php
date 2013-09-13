<div class="container top">
	<div class="row">
		<a href="/gartnercst/index.php?r=gartner/admin">Reporting</a>
		<div class="span12" style="text-align:center;">
			<h1>Invite Acceptance Reports</h1>
			<p></p>
		</div>
	</div>
	<div class="row">
		<div style="width:300px;float:left;text-align:center;"><button style="width:160px;" class="btn btn-large btn-success">Accepted</button><p><?php if(!empty($reports)){echo $reports['Accepted'];}?></p></div>
		<div style="width:300px;float:left;text-align:center;"><button style="width:160px;" class="btn btn-large btn-danger">Declined</button><p><?php if(!empty($reports)){echo $reports['Declined'];}?></p></div>
		<div style="width:300px;float:left;text-align:center;"><button style="width:160px;" class="btn btn-large btn-info">Total</button><p><?php if(!empty($reports)){echo $reports['Total'];}?></p></div>
	</div>
	<div class="row">
		<div class="span8 offset2" id="pie" style="height:400px;text-align:center;">
			<canvas id="cvs" width="400" height="300">[No canvas support]</canvas>
		</div>
	</div>
</div>
<?php /*
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.7.2.min.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-transition.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-alert.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-modal.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-dropdown.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-scrollspy.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-tab.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-tooltip.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-popover.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-button.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-collapse.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-carousel.js"></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-typeahead.js"></script>
*/ ?>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/RGraph.common.core.js" ></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/RGraph.pie.js" ></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/RGraph.common.dynamic.js" ></script>
<script src="<?php echo Yii::app()->request->baseUrl; ?>/js/RGraph.common.tooltips.js" ></script>
<script type="text/javascript">
	window.onload = function () {
		var pie2 = new RGraph.Pie('cvs', [<?php if(!empty($reports)){echo $reports['Declined'];}?>,<?php if(!empty($reports)){echo $reports['Accepted'];}?>]);
        pie2.Set('chart.colors', [
                                 RGraph.RadialGradient(pie2, 150,150,0,150,150,150,'white', '#BD362F'),
                                 RGraph.RadialGradient(pie2, 150,150,0,150,150,150,'white', '#51A359'),
                                ]);
        pie2.Set('chart.exploded', 2);
         //pie2.Set('chart.shadow', true);
        pie2.Set('chart.labels', ['Declined','Accepted']);
        pie2.Set('chart.tooltips', [
                                    '<b>Declined</b><br />Declined achieved <?php if(!empty($reports)){echo $reports['Declined'];}?>',
                                    '<b>Accepted</b><br />Accepted achieved <?php if(!empty($reports)){echo $reports['Accepted'];}?>']);

        pie2.Draw();
    }
</script>
<div style="height:100px;"></div>
<div>