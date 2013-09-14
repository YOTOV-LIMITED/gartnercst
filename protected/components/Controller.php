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
		$content = Gartner::emailContent();
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
			$ses = new SimpleEmailService(Yii::app()->params['ses']['accessKey'], Yii::app()->params['ses']['secretKey']);
			$m = new SimpleEmailServiceMessage();
			$m->addReplyTo(Yii::app()->params['ses']['replyTo']);
			$m->setReturnPath(Yii::app()->params['ses']['returnPath']);
			$m->addTo($to);
			$m->setFrom(Yii::app()->params['ses']['from']);
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
}