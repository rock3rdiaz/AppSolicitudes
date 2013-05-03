<?php

class SolicitudesController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array(Yii::app()->getSession()->get('login')),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'ajaxActualizarSolicitud'),
				'users'=>array(Yii::app()->getSession()->get('login')),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array(Yii::app()->getSession()->get('login')),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Solicitudes;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Solicitudes']))
		{
			$model->attributes=$_POST['Solicitudes'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idSolicitud));
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
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Solicitudes']))
		{
			$model->attributes=$_POST['Solicitudes'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idSolicitud));
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
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
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
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Solicitudes');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Solicitudes('search');
		$model->unsetAttributes();  // clear any default values

		/*$model_empleados = new Empleados();
		$posibles_destinatarios = $model_empleados->getAllPosiblesDestinatarios();*/		

		if(isset($_GET['Solicitudes']))
			$model->attributes=$_GET['Solicitudes'];

		$this->render('admin',array(
			'model'=>$model,
			//'listado_usuarios'=>$posibles_destinatarios
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Solicitudes::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='solicitudes-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

	/**
	 * @summary: Metodo ajax que permite actualizar de manera facil y rapida alguna solicitud. Solo se pueden actuañzar los campos indicados en el trozo de codigo contenido dentro del metodo.
	 * @return [string] [Mensaje de exito o fracaso en la ejecucion de las acciones dentro del metodo]
	 */
	public function actionAjaxActualizarSolicitud(){
		$json_data = CJSON::decode($_POST['data']);//Decodificamos el objeto json enviado desde el cliente (via javascript)
		
		$model = $this->loadModel($json_data['idSolicitud']);//Cargamos el modelo a actualizar

		/*Modificamos los atributos del modelo deseados*/
		$model->idPrioridad       = $json_data['idPrioridad'];
		$model->idCategoria       = $json_data['idCategoria'];
		$model->idUsuario_destino = $json_data['idUsuario_destino'];

		/*Actualizamos solo los campos seleccionados.*/
		if($model->update(array('idPrioridad', 'idCategoria', 'idUsuario_destino'))){
			echo "success";
		}
	}
}
