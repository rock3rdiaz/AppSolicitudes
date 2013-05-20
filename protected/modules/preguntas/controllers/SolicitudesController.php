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
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array(Yii::app()->getSession()->get('login')),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete', 'downloadAdjunto'),
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
		$model_solicitudes = new Solicitudes();

		if($model_solicitudes->getNumSolicitudePorPuntuar(Yii::app()->getSession()->get('id')) <= 3){

			$model_empleados = new Empleados();
			$posibles_destinatarios = $model_empleados->getAllPosiblesDestinatarios();

			$model = new Solicitudes();

			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);

			if(isset($_POST['Solicitudes']))
			{
				$model->attributes = $_POST['Solicitudes'];
				$model->fecha_envio = date('Y-m-d H:i:s');
				$model->estado = 'pendiente';
				$model->idUsuario_origen = Yii::app()->getSession()->get('id');
				$file = CUploadedFile::getInstance($model, 'adjunto');
				$model->adjunto = $file;	
				
				if($model->save()){
					if($model->adjunto != NULL){
						$file->saveAs(Yii::app()->basePath.'/data/adjuntos_solicitudes/'.$file);
					}				
					$this->redirect(array('view','id'=>$model->idSolicitud));
				}
			}

			$this->render('create',array(
				'model'=>$model,			
				'listado_usuarios'=>$posibles_destinatarios,
			));
		}
		else{
			$this->redirect(array('default/error'));
		}		
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$listado_prioridades = CHtml::listData(Prioridades::model()->findAll(array('order'=>'descripcion asc')), 'idPrioridad', 'descripcion');
		$listado_categorias  = CHtml::listData(Categorias::model()->findAll(array('order'=>'descripcion asc')), 'idCategoria', 'descripcion');
		$listado_areas       = CHtml::listData(Areas::model()->findAll(array('order'=>'nombre asc')), 'idArea', 'nombre');

		$model_empleados = new Empleados();
		$posibles_destinatarios = $model_empleados->getAllPosiblesDestinatarios();

		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Solicitudes']))
		{
			$model->attributes=$_POST['Solicitudes'];
			
			$file = CUploadedFile::getInstance($model, 'adjunto');
			
			$model->adjunto = $file;	
			if($model->save()){
				if($model->adjunto != NULL){
					$file->saveAs(Yii::app()->basePath.'/data/adjuntos_solicitudes/'.$file);
				}
				$this->redirect(array('view','id'=>$model->idSolicitud));
			}

				
		}

		$this->render('update',array(
			'model'=>$model,
			'listado_prioridades'=>$listado_prioridades,
			'listado_categorias'=>$listado_categorias,
			'listado_areas'=>$listado_areas,
			'listado_usuarios'=>$posibles_destinatarios,
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
		if(isset($_GET['Solicitudes']))
			$model->attributes=$_GET['Solicitudes'];

		$this->render('admin',array(
			'model'=>$model,
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
	 * @summary: Accion que permite realizar la descarga del archivo que ha sido adjuntado por el usuario
	 * @param  [string] $path [String que contiene la ruta completa en el servidor para acceder al archivo]
	 * @return [img]       [Imagen]
	 */
	public function actionDownloadAdjunto($path){			
		header("Content-disposition: attachment; filename=$path");
		header("Content-Type: application/force-download");
		readfile($path);
	}
}
