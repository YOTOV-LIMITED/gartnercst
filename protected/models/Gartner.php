<?php

/**
 * This is the model class for table "gartner_userinfo".
 *
 * The followings are the available columns in table 'gartner_userinfo':
 * @property string $Id
 * @property string $FirstName
 * @property string $LastName
 * @property string $Email
 * @property integer $Department
 * @property integer $DietaryRequirements
 * @property string $OtherDietaryRequirements
 * @property string $GuestFirstName
 * @property string $GuestLastName
 * @property integer $GuestDietaryRequirements
 * @property string $GuestOtherDietaryRequirements
 * @property integer $Static
 * @property string $CreateTime
 * @property string $UpdateTime
 */
class Gartner extends CActiveRecord {
	
	const BACKEND_LIST_SIZE = 10;
	
	public $optionsRadios;
	public $countDiet;
	public $countGuestDiet;
	public $countDepartment;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Gartner the static model class
	 */
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
		return 'gartner_two';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('FirstName, LastName, Email', 'required'),
			array('Department, DietaryRequirements, GuestDietaryRequirements, Static', 'numerical', 'integerOnly'=>true),
			array('FirstName, LastName, GuestFirstName, GuestLastName', 'length', 'max'=>40),
			array('Department', 'match', 'pattern' => '/^(1[0-9]|[1-9])$/is', 'on' =>'Accepted', 'message' => 'Department cannot be blank.'),
			array('Department', 'required', 'on' => 'Accepted'),
		//	array('optionsRadios', 'required', 'on' => 'Accepted', 'message' => 'Please indicate if you are bringing a guest.'),
			array('Email', 'length', 'max'=>100),
			array('Email', 'email'),
			array('Email','unique','message' => 'Email already registered.'),
			array('DeclineReason, OtherDietaryRequirements, GuestOtherDietaryRequirements', 'length', 'max'=>200),
			array('CreateTime, UpdateTime', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('Id, FirstName, LastName, Email, Department, DietaryRequirements, OtherDietaryRequirements, GuestFirstName, GuestLastName, GuestDietaryRequirements, GuestOtherDietaryRequirements, Static, CreateTime, UpdateTime', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array(
			'Id' => 'ID',
			'FirstName' => 'First Name',
			'LastName' => 'Last Name',
			'Email' => 'Email',
			'Department' => 'Department',
			'DietaryRequirements' => 'Dietary Requirements',
			'OtherDietaryRequirements' => 'Other Dietary Requirements',
			'GuestFirstName' => 'Guest First Name',
			'GuestLastName' => 'Guest Last Name',
			'GuestDietaryRequirements' => 'Guest Dietary Requirements',
			'GuestOtherDietaryRequirements' => 'Guest Other Dietary Requirements',
			'Static' => 'Static',
			'DeclineReason' => 'Decline Reason',	
			'CreateTime' => 'Create Time',
			'UpdateTime' => 'Update Time',
			'optionsRadios' => 'Options Radios'		
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search() {
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('Id',$this->Id,true);
		$criteria->compare('FirstName',$this->FirstName,true);
		$criteria->compare('LastName',$this->LastName,true);
		$criteria->compare('Email',$this->Email,true);
		$criteria->compare('Department',$this->Department);
		$criteria->compare('DietaryRequirements',$this->DietaryRequirements);
		$criteria->compare('OtherDietaryRequirements',$this->OtherDietaryRequirements,true);
		$criteria->compare('GuestFirstName',$this->GuestFirstName,true);
		$criteria->compare('GuestLastName',$this->GuestLastName,true);
		$criteria->compare('GuestDietaryRequirements',$this->GuestDietaryRequirements);
		$criteria->compare('GuestOtherDietaryRequirements',$this->GuestOtherDietaryRequirements,true);
		$criteria->compare('Static',$this->Static);
		$criteria->compare('CreateTime',$this->CreateTime,true);
		$criteria->compare('UpdateTime',$this->UpdateTime,true);
		$criteria->compare('optionsRadios',$this->optionsRadios);
		

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public static function getDepartments() {
		$departments = array(
			0 => '',	
			1 => 'Consulting',            
			2 => 'Corporate Legal',       
			3 => 'CPG',                   
			4 => 'EUP',                   
			5 => 'Events',                
			6 => 'EXP',                   
			7 => 'Finance',               
			8 => 'HTTP and Marketing',    
			9 =>  'Human Resources',      
			10 => 'Research',             
			11 => 'Sales Major Accounts',  
			12 => 'Sales SAO',            
			13 => 'Sales SMB',            
			14 => 'STG',				            
			15 => 'Other' 
			
		);
		return $departments;
	}
	
	public static function getDietaryRequirements() {
		$requirements = array(
				0 => 'None',
				1 => 'Nut Allergy',
				2 => 'Vegetarian',
				3 => 'Vegan',
				4 => 'Gluten Free',
				9 => 'Other'
		);
		return $requirements;
	}
	
	public static function getDietCount() {
		$where= new CDbCriteria();
		$where->select = "count(*) as countDiet, DietaryRequirements";
		$where->condition = "Static = 1 and DietaryRequirements != 0"; 
		$where->group = 'DietaryRequirements';
		return self::model()->findAll($where);
	}
	public static function getGuestDietCount() {
		$where= new CDbCriteria();
		$where->select = "count(*) as countGuestDiet, GuestDietaryRequirements";
		$where->condition = "GuestDietaryRequirements != '' and Static = 1";
		$where->group = 'GuestDietaryRequirements';
		return self::model()->findAll($where);
	}
	
	public static function getDepartmentCount() {
		$where= new CDbCriteria();
		$where->select = "count(*) as countDepartment, Department";
		$where->condition = "Department != 0 and Static = 1";
		$where->group = 'Department';
		return self::model()->findAll($where);
	}
	
	public static function getCountDepartmentForDiet() {
		$where= new CDbCriteria();
		$where->select = "count(*) as countDepartment, Department, DietaryRequirements";
		$where->condition = "Department != 0 and Static = 1 and DietaryRequirements != 0";
		$where->group = 'Department, DietaryRequirements';
		return self::model()->findAll($where);
	}
	
	public static function getCountGuestDepartmentForDiet() {
		$where= new CDbCriteria();
		$where->select = "count(*) as countDepartment, Department, GuestDietaryRequirements";
		$where->condition = "Department != 0 and Static = 1 and GuestDietaryRequirements != 0";
		$where->group = 'Department, GuestDietaryRequirements';
		return self::model()->findAll($where);
	}
	
	public static function getAllCountDepartmentForDiet() {
		$where= new CDbCriteria();
		$where->select = "count(*) as countDepartment, Department";
		$where->condition = "Department != 0 and Static = 1";
		$where->group = 'Department';
		return self::model()->findAll($where);
	}
	
	public static function getAllCountGuestDepartmentForDiet() {
		$where= new CDbCriteria();
		$where->select = "count(*) as countDepartment, Department";
		$where->condition = "Department != 0 and Static = 1 and ((GuestFirstName != '') or (GuestLastName != ''))";
		$where->group = 'Department';
		return self::model()->findAll($where);
	}
	public static function combinationAllDepartmentDiet($sorts, $guestSorts) {
		$count = count($guestSorts);
		if(!empty($guestSorts)) {
			if(!empty($sorts)) {
				foreach($sorts as  $v=>$sort) {
					foreach($guestSorts as  $key=> $guestSort) {
						if((intval($sort['Department']) == intval($guestSort['Department']))){
							$sort['countGuestDiet'] = intval($guestSort['countDepartment']);
							unset($guestSorts[$key]);
						}
	
					}
				}
			}
		}
		$sorts = array_merge($sorts, $guestSorts);
		$sorts = self::sort_objs($sorts, 'Department');
		return $sorts;
	}
	
	public static function combinationDepartmentDiet($sorts, $guestSorts) {
		$count = count($guestSorts);
		if(!empty($guestSorts)) {
			if(!empty($sorts)) {
				foreach($sorts as  $v=>$sort) {
					foreach($guestSorts as  $key=> $guestSort) {				
						if((intval($sort['Department']) == intval($guestSort['Department'])) and (intval($sort['DietaryRequirements']) == intval($guestSort['GuestDietaryRequirements']))){
							$sort['countDepartment'] = intval($sort['countDepartment']) + intval($guestSort['countDepartment']); 
							unset($guestSorts[$key]);
						}
						
					}
				}
			}
		}
		if(!empty($guestSorts)) {
			foreach($guestSorts as $value) {
			$value['DietaryRequirements'] = $value['GuestDietaryRequirements'];
			}
		}
		$sorts = array_merge($sorts, $guestSorts);
		$sorts = self::sort_objs($sorts, 'Department');
		return $sorts;
	}
	
	function sort_objs($list,$key,$order='asc') {
		if(empty($list) || !isset($list[0]->{$key}))
			return $list;
	
		$alist = array();
		$c = count($list);
		$format0 = "%020s";
		$format1 = "%0".strlen($c)."s";
		for($i=0;$i<$c;$i++)
		{
		$skey = sprintf($format0,$list[$i]->{$key})."_".sprintf($format1,$i);
		$alist[$skey] = $list[$i];
	}
	$order=="asc" ? ksort($alist) : krsort($alist);
	return array_values($alist);
	}
	
	
	public static function getAllReports() {
		$reports = '';
		$criteria = new CDbCriteria();
		$criteria->condition = "Static = 1";
		$where = new CDbCriteria();
		$where->condition = "Static = 0";
		$count = self::model()->count($criteria);
		$reports['Accepted'] = $count;
		$counts = self::model()->count($where);
		$reports['Declined'] = $counts;
		$reports['Total'] = $count + $counts;
		return $reports;
	}
	
	public static function sendLocalMail($email) {
		$content = self::emailContent();
		// 当发送 HTML 电子邮件时，请始终设置 content-type
		$headers = "MIME-Version: 1.0" . "\r\n";
		$headers .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
		// 更多报头
		$headers .= 'From: Corporate Events<'.Yii::app()->params['Email']['address'].'>' . "\r\n";
		//$headers .= 'Cc:'.Yii::app()->params['Email']['fromname'] . "\r\n";
		
//		mail($email, Yii::app()->params['Email']['subject'], $content, $headers);
	}
	
	public static function sendMail($email) {
		$content = self::emailContent();
		$mailer = Yii::createComponent('application.extensions.mailer.EMailer');
		$mailer->Host = Yii::app()->params['Email']['host'];
		$mailer->IsSMTP();
		$mailer->SMTPAuth = true;
		$mailer->From = Yii::app()->params['Email']['address'];
		$mailer->AddReplyTo(Yii::app()->params['Email']['address']);
		$mailer->AddAddress($email);
		$mailer->FromName = Yii::app()->params['Email']['fromname'];
		$mailer->Username = Yii::app()->params['Email']['username'];    //这里输入发件地址的用户名
		$mailer->Password = Yii::app()->params['Email']['password'];    //这里输入发件地址的密码
		$mailer->SMTPDebug = false;   //设置SMTPDebug为true，就可以打开Debug功能，根据提示去修改配置
		$mailer->CharSet = 'UTF-8';
		$mailer->IsHTML(true);
		$mailer->Subject = Yii::t('demo', Yii::app()->params['Email']['subject']);
		$mailer->Body = $content;
		$mailer->Send();
	}
	
	public static function emailContent() {
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
