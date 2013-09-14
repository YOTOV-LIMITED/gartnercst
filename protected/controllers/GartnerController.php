<?php
/**
 * WEBController
 * @author li.da@brightac.com.cn
 * @createTime 2012-10-31 10:40
 * @Modified li.da@brightac.com.cn
 * @updateTime 2012-10-31 10:40
 */

class GartnerController extends Controller {
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters() {
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules() {
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view', 'decline', 'join', 'back', 'login', 'error'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'logout'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete', 'logout', 'report', 'users', 'export', 'diet', 'department', 'sort', 'entire'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	public function actionLogin() {
		$model=new LoginForm;
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form'){
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		if(isset($_POST['LoginForm'])){
			$model->attributes=$_POST['LoginForm'];
			if($model->validate() && $model->login()) {
				$this->redirect(array("gartner/admin"));
			}
		}
		$this->render('login',array('model'=>$model));
	}
	
	public function actionLogout() {
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id) {
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate() {
		$model=new Gartner;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Gartner']))
		{
			$model->attributes=$_POST['Gartner'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->Id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id) {
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Gartner'])) {
			$model->attributes=$_POST['Gartner'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->Id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id) {
		if(Yii::app()->request->isPostRequest) {
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex() {	
		$dataProvider=new CActiveDataProvider('Gartner');
		$model = new Gartner();
		if(isset($_POST['Gartner'])){
			$model->attributes=$_POST['Gartner'];
			if(($_POST['showDietarys'] == 9) and ($_POST['showDietary'] == 0)) {
				$model->DietaryRequirements = $_POST['showDietary'];
			}else if(($_POST['showDietarys'] == 9) and ($_POST['showDietary'] != 0)) {
				$model->DietaryRequirements = $_POST['showDietary'];
			}else{
				$model->DietaryRequirements = $_POST['showDietarys'];
			}
			if(($_POST['showGuestRequires'] == 9) and ($_POST['showGuestRequire'] == 0)) {
				$model->GuestDietaryRequirements = $_POST['showGuestRequires'];
			}else if(($_POST['showGuestRequires'] == 9) and ($_POST['showGuestRequire'] != 0)) {
				$model->GuestDietaryRequirements = $_POST['showGuestRequire'];
			}else{
				$model->GuestDietaryRequirements = $_POST['showGuestRequires'];
			}
			$model->Static = 1; //join  0:decline
			$model->CreateTime = time();
			$model->UpdateTime = $model->CreateTime;
			$model->setScenario('Accepted');
			if($model->save()){
				//Gartner::sendLocalMail($model->Email);
				$this->sendMail($model->Email,Yii::app()->params['Email']['subject']);
				$this->redirect(array("gartner/join"));
			}
		}

		$departments = Gartner::getDepartments();
		$requirements = Gartner::getDietaryRequirements();
		$this->render('winner', array(
			'model' => $model,	
			'dataProvider'=>$dataProvider,
			'departments' => $departments,
			'requirements' => $requirements		
		));
	}
	
	/**
	 * decline
	 */
	public function actionDecline() {
		$model = new Gartner();
		if(isset($_POST['Gartner'])){
			$model->attributes=$_POST['Gartner'];
			$model->Static = 0; //decline 1:join 
			$model->CreateTime = time();
			$model->UpdateTime = $model->CreateTime;
			if($model->save()){
				$this->redirect(array("gartner/back"));
			}
		}
		$departments = Gartner::getDepartments();
		$requirements = Gartner::getDietaryRequirements();
		$this->render('decline', array(
			'model' => $model,
			'departments' => $departments,
			'requirements' => $requirements
				
		));
	}
	
	public function actionJoin() {
		$this->render('joinOk');
	}
	public function actionBack() {
		$this->render('joinError');
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin() {
		$model=new Gartner('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Gartner']))
			$model->attributes=$_GET['Gartner'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	/**
	 * Registration Report
	 */
	public function actionReport() {
		$reports = Gartner::getAllReports();
		$this->render('report', array('reports' => $reports));
	}
	
	/**
	 * view users
	 */
	public function actionUsers(){
		$criteria = new CDbCriteria();
		$criteria->order = 'CreateTime DESC';
		$countUser = Gartner::model()->count($criteria);
		$pager = new CPagination($countUser);
		$pager->pageSize = Gartner::BACKEND_LIST_SIZE;
		$pager->applyLimit($criteria);
		$pager->params = array();
		$users = Gartner::model()->findAll($criteria);
		$departmen = Gartner::getDepartments();
		$dietary = Gartner::getDietaryRequirements();
		$data = array(
			'pages' => $pager,
			'users' => $users,
			'dietary' => $dietary,	
			'departmen' => $departmen			
		);
		$this->render('users', $data);
	}
	
	/**
	 * Export user
	 */
	public function actionExport() {
		$requests = Gartner::model()->findAll(array('order' => 'CreateTime DESC'));
		$departmen = Gartner::getDepartments();
		$dietary = Gartner::getDietaryRequirements();	
		$this->layout = false;
		header('Content-type:application/vnd.ms-excel;charset=utf8'); //表示输出Excel文件
		header('Content-Disposition:attachment; filename=GartnerUserList.xls');//文件名
		$data = array(
			'dietary' => $dietary,
			'departmen' => $departmen,
			'requests' => $requests,
		);
		$this->render('export', $data);
	}
	
	/**
	 * Food & Drink
	 */
	public function actionDiet() {
		$diets = Gartner::getDietCount();
		$guestDiets = Gartner::getGuestDietCount();
		$requirements = Gartner::getDietaryRequirements();
		$data = array(
			'diets' => $diets,
			'guestDiets' => $guestDiets,	
			'requirements' => $requirements	
		);
		$this->render('diet', $data);
	}
	
	public function actionDepartment() {
		$diets = Gartner::getDepartmentCount();
		$requirements = Gartner::getDepartments();
		$data = array(
			'diets' => $diets,
			'requirements' => $requirements
		);
		$this->render('department', $data);
	}
	
	public function actionSort() {
		$sorts = Gartner::getCountDepartmentForDiet();
		$guestSorts = Gartner::getCountGuestDepartmentForDiet();
		$sorts = Gartner::combinationDepartmentDiet($sorts, $guestSorts);
		$department = Gartner::getDepartments();
		$requirements = Gartner::getDietaryRequirements();
		$data = array(
			'sorts' => $sorts,
			'department' => $department,	
			'requirements' => $requirements	
		);
		$this->render('sort', $data);
	}
	
	public function actionEntire() {
		$sorts = Gartner::getAllCountDepartmentForDiet();
		$guestSorts = Gartner::getAllCountGuestDepartmentForDiet();
		$sorts = Gartner::combinationAllDepartmentDiet($sorts, $guestSorts);
		//var_dump($sorts);exit;
		$department = Gartner::getDepartments();
		$requirements = Gartner::getDietaryRequirements();
		$data = array(
				'sorts' => $sorts,
				'department' => $department,
				'requirements' => $requirements
		);
		$this->render('entire', $data);
	}
	
	

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id) {
		$model=Gartner::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model) {
		if(isset($_POST['ajax']) && $_POST['ajax']==='gartner-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	public function actionError() {
		if($error=Yii::app()->errorHandler->error) {
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
}
