<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();
	public $mail = 'amazon';//sendmail ,amazon
	
	/**
	 * sendmail
	 */
	public function sendMail($to,$title,$cc="") {
		$content = $this->emailContent();
		if($this->mail == 'sendmail'){
		// 当发送 HTML 电子邮件时，请始终设置 content-type
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
		// 更多报头
		$headers .= 'From: Corporate Event Team<corporateevents@gartner.com>' . "\r\n";
		
		if($view == 'email'){
			//$headers .= "Bcc: Charlene.Johnson-Crooks@gartner.com\n";
		}
		$body = $content;
		mail($to, $title, $body, $headers);
		
		}elseif($this->mail == 'amazon'){
			require_once Yii::app()->basePath . '/extensions/ses/ses.php';
			$ses = new SimpleEmailService('AKIAIPH65IQ3TFH6FVKA', '4s2od9vs813+GH2EUgBVceR7+sxNxIQdSJf/NrDn');
			$m = new SimpleEmailServiceMessage();
			$m->addReplyTo('corporateevents@gartner.com');
			$m->setReturnPath('corporateevents@gartner.com');
			$m->addTo($to);
			$m->setFrom('Gartner Corporate Events<corporateevents@gartner.com>');
			$m->setSubject($title);
			$m->setMessageFromString(NULL, $content);
	
			// 再这里设置标题和内容编码
			$m->setSubjectCharset('UTF-8');
			$m->setMessageCharset('UTF-8');
	
			$result = $ses->sendEmail($m);
			Yii::log("ses sending email\t" . $to . "\t" . CJSON::encode($result),'error');
		}else{
			$mailer = Yii::app()->mailer;
			$mailer->From = 'test@brightac.com.cn';
			$mailer->Host = 'smtp.exmail.qq.com';
			$mailer->Username = 'test@brightac.com.cn';    //这里输入发件地址的用户名
			$mailer->Password = 'brightac2204';    //这里输入发件地址的密码
			$mailer->SMTPDebug = true;   //设置SMTPDebug为true，就可以打开Debug功能，根据提示去修改配置
			//$mailer->setPathViews('application.views.user');
			$mailer->IsSMTP();
			$mailer->SMTPAuth = true;
			if($cc!="" && $cc!=null){
				$mailer->AddCC($cc);
			}
			
			//$mailer->AddReplyTo('corporateevents@gartner.com');
			$mailer->AddAddress($to);
			$mailer->FromName = 'Gartner Corporate Events';
			$mailer->CharSet = 'UTF-8';
			$mailer->Subject = $title;
			$mailer->IsHTML(true);
			$mailer->Body = $content;
			$mailer->Send();
		}
	}
	public function emailContent() {
		$content = "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">";
	$content .= '<html xmlns="http://www.w3.org/1999/xhtml">
	<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>
	<style type="text/css">
	body, div, dl, dt, dd, ul, ol, li, h1, h2, h3, h4, h5, h6, pre, form, fieldset, input, textarea, p, blockquote, th, td {
	margin:0;padding:0;
	}
	body{font-size:12px; font-family:Arial,Verdana;}
	</style>
	<body>
	<div style="width:800px;margin:auto;">
	<div style="height:100px;">
	<img src="https://app.magictony-se.com/gartnercst/images/XmasHeader10.jpg">
	</div>
	<br />
	<p>Thank you for registering to attend the Gartner Stamford and Trumbull Associates Holiday Party. We have pleasure in confirming your attendance at the event.</p>
	<p style="margin-top:5px;">
		<table align="center">
			<tr align="center"><td>Maritime Aquarium<br /></td></tr>
			<tr align="center"><td>10 North Water Street</td></tr>
			<tr align="center"><td>Norwalk,</td></tr>
			<tr align="center"><td>CT, 06854</td></tr>
			<tr align="center"><td>Thursday December, 19,2013 from 6:30pm</td></tr>
	   </table>
	 </p>
	<p style="color:#0065a4">How to Get There:</p>
	<p><span style="font-weight:bold">I-95 Northbound.</span> Exit 14 in Connecticut. Go straight at two stop signs and continue down the hill to stop light. Go straight at the light, under the RR overpass and follow the road as it bends to the right along the Norwalk River. At the first stop sign, you\'ll see the Aquarium straight ahead and the parking garage to your right.</p>
	<br />
	<p><span style="font-weight:bold">I-95 Southbound.</span> Exit 15. Exit ramp splits: stay to right following signs for South Norwalk. Left at light on to West Avenue. Turn left at second light. Go under the RR overpass and follow the road as it bends to the right along the Norwalk River. At the first stop sign, you\'ll see the Aquarium straight ahead and the parking garage to your right.</p>
	<br />
	<p style="font-weight:bold">Parking:</p>
	<p><span style="font-weight:bold">Maritime Garage</span> This facility is located directly across from the Aquarium on North Water Street between Ann and Marshall streets. You are encouraged to bring your parking ticket down with you to be validated upon entering/exiting the aquarium.</p>
	<p style="color:#0065a4">Please note that parking costs cannot be expensed.</p>
	<br />
	<p style="color:#0065a4">Dress Code:</p>
	<p>Cocktail Attire.</p>
	<br />
	<p style="color:#0065a4">Further Information:</p>
	<p>If you have any questions about the event, or need to make any changes to your registration above, please contact the Corporate Events team at:<a href="mailto:corporateevents@gartner.com">corporateevents@gartner.com</a></p>
	<br /><br /><br />
<div style="float:left;width:100%;height:100px;">
	<img src="https://app.magictony-se.com/gartnercst/images/XmasFooter10.jpg">
	</div>
	</div>
	</body>
</html>';
		return $content;
	}
}