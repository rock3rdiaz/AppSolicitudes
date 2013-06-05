<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		//$this->render('index');

		$this->redirect(array('site/login'));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];


			/*Para usuarios temporales, el numero de cedula ingresado debe ser completado por ceros a la izquierda. Motivo: valor del campo 'cedula' presente en la tabla 'temp'*/
			if($model->password >= 8000){
				$num_ceros = 11 - strlen($model->username);
				$model->username = str_repeat('0', $num_ceros).$model->username;
			}



			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login()){
				//$this->redirect(Yii::app()->user->returnUrl);

				/*Capturamos los datos del usuario que ha ingresado al sistema. (Usuario presente en la tabla 'empleados')*/
				$usuario = Empleados::model()->findByAttributes(array('NIT_M'=>$model->username, 'KEYNOM'=>$model->password));

				/*Usuarios registrados en la tabla 'empleados'*/
				if($usuario !== Null){
					/*Rol 'administrador'*/
					if(/*($usuario->KEYNOM == '0202') ||*/ ($usuario->KEYNOM == '1188')) {
						Yii::app()->getSession()->add('id', $usuario->KEYNOM);
						Yii::app()->getSession()->add('nombre', Empleados::model()->getNombreCompleto($usuario->KEYNOM));
						Yii::app()->getSession()->add('login', $usuario->NIT_M);
						$this->redirect(array('admin/default/index'));
					}

					/*Rol 'usuario interno'.Todos los usuarios del area de sistemas menos el jefe (KEYNOM = 0202) y la secretaria (KEYNOM = 0056)*/
					elseif(($usuario->GRUPO_DPTO_M == '12') /*&& ($usuario->KEYNOM != '0202') */ && ($usuario->KEYNOM != '0056')){
						Yii::app()->getSession()->add('id', $usuario->KEYNOM);
						Yii::app()->getSession()->add('nombre', Empleados::model()->getNombreCompleto($usuario->KEYNOM));
						Yii::app()->getSession()->add('login', $usuario->NIT_M);
						$this->redirect(array('respuestas/default/index'));
					}

					/*Rol 'secretaria'*/
					elseif($usuario->KEYNOM == '0056'){
						Yii::app()->getSession()->add('id', $usuario->KEYNOM);
						Yii::app()->getSession()->add('nombre', Empleados::model()->getNombreCompleto($usuario->KEYNOM));
						Yii::app()->getSession()->add('login', $usuario->NIT_M);
						$this->redirect(array('secretaria/default/index'));
					}

					/*Rol 'usuario externo'.*/
					else{
						Yii::app()->getSession()->add('id', $usuario->KEYNOM);
						Yii::app()->getSession()->add('nombre', Empleados::model()->getNombreCompleto($usuario->KEYNOM));
						Yii::app()->getSession()->add('login', $usuario->NIT_M);
						$this->redirect(array('preguntas/default/index'));
					}
				}

				/*Usuarios registrados en la tabla 'temp'*/
				else{
					/*Capturamos los datos del usuario que ha ingresado al sistema. (Usuario presente en la tabla 'temp')*/
					$usuario = Temp::model()->findByAttributes(array('cedula'=>$model->username, 'codigo'=>$model->password));

					/*Rol 'usuario externo'.*/
					Yii::app()->getSession()->add('id', $usuario->codigo);
					Yii::app()->getSession()->add('nombre', Temp::model()->getNombreCompleto($usuario->codigo));
					Yii::app()->getSession()->add('login', $usuario->cedula);
					$this->redirect(array('preguntas/default/index'));
				}
			}		
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * @summary: Metodo que permite a los usuarios que generan las solicitudes crear una cuenta en el sistema.
	 * @return Null
	 * @return Null
	 */
	public function actionNewUser(){

		$model = new Usuarios();

		if(isset($_POST['Usuarios'])){
			$model->attributes = $_POST['Usuarios'];
			$model->tipo = 'externo';

			if($model->save()){
				$this->redirect(array('site/login'));
			}
		}

		$this->render('newUser', array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}