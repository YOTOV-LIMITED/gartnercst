<?php
/**
 * 配置参数
 * @author li.da@brightac.com.cn
 * @createTime 2012-10-31 17:00
 * @Modified li.da@brightac.com.cn
 * @updateTime 2012-10-31 17:00
 */

$paramsConfig = array (
    'params' => array (
    	'Email' => array(
    		'host' => 'smtp.163.com', //'smtp.163.com'
    		'fromname' => 'Corporate Events',
    		'subject' => 'Thank you for registering to attend the Gartner Stamford and Trumbull Associates Holiday Party',	
    		'address' => 'corporateevents@gartner.com', 
    		'username' => 'corporateevents',
    		'password' => ''				
    	),
    	'ses'=>array(
				'accessKey'=>'AKIAIPH65IQ3TFH6FVKA',
				'secretKey'=>'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',
				'replyTo'=>'corporateevents@gartner.com',
				'returnPath'=>'corporateevents@gartner.com',
				'from'=>'Gartner Corporate Events<corporateevents@gartner.com>',
		),
    )
);

return $paramsConfig;
