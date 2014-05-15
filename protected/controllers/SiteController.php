<?php

class SiteController extends Controller
{
     public function accessRules()
    {
        return array(
            array('allow', // allow authenticated users to access all actions
                'actions'=>array(
                    'Index',
                    'Pages',
                    'Logout'
                ),
                'users'=>array('@'),
            ),
            array('allow', // allow authenticated users to access all actions
                'actions' => array(
                    'Captcha',
                    'Error',
                    'Login',
                ),
                'users' => array('*'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }
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
           //$this->render('index');
       $this->redirect('HomePage');
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
             //   $this->layout="login";
               // $this->render('login');
		$model=new LoginForm;
                if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
                        else
                            $this->render('login',array('model'=>$model,'error'=>true));
                            exit();
		}
		// display the login form
		$this->render('login',array('model'=>$model,'error'=>false));
	}
	public function actionRegister()
            {
		$model=new HhUsers();

		// if it is ajax validation request
		if(isset($_POST['email']))
		{
                    if($model->getusername($_POST['email'])>0) {
                        $this->render('register',array('model'=>$model,'error'=>true));
                        exit();
                    }
                    $model->username = $_POST['email'];
                    $model->realname = $_POST['realname'];
                    $model->password = md5($_POST['password']);
                    $model->sex = $_POST['sex'];
                    $rs = $model->save(false);
                    if($rs)
                        $this->redirect('login');
		}
		$this->render('register',array('model'=>$model,'error'=>false));
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