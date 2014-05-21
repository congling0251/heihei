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
	public $layout='//layouts/main';
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
    public function init(){
        $clientScript = Yii::app()->ClientScript;
        $clientScript -> registerCssFile(Yii::app() -> theme -> baseUrl . '/css/jquery-ui-1.10.4.min.css');
        $clientScript -> registerCssFile(Yii::app() -> theme -> baseUrl . '/css/bootstrap.min.css');
        $clientScript -> registerCssFile(Yii::app() -> theme -> baseUrl . '/css/bootstrap-responsive.min.css');
        $clientScript -> registerCssFile(Yii::app() -> theme -> baseUrl . '/css/awesome.css');
        $clientScript -> registerCssFile(Yii::app() -> theme -> baseUrl . '/css/SLideShow.css');
        $clientScript -> registerScriptFile( Yii::app() -> theme -> baseUrl . '/js/jquery-1.11.0.min.js' );
        $clientScript -> registerScriptFile( Yii::app() -> theme -> baseUrl . '/js/bootstrap.min.js' );
        $clientScript -> registerScriptFile( Yii::app() -> theme -> baseUrl . '/js/jquery-ui-1.10.4.min.js' );
        $clientScript -> registerScriptFile( Yii::app() -> theme -> baseUrl . '/js/jquery.ui.core.js' );
        $clientScript -> registerScript('safeNumberInit', "var serverSafeNumber = '".Yii::app()->user->getState('safeNumber')."',lastTime='".time()."';",CClientScript::POS_HEAD);
        parent::init();
    }    
    public function ajaxOutputJSON($result = 1, $msg = '', $data = array())
    {
        Yii::app()->user->setState('safeNumber',md5(Yii::app()->user->getState('safeNumber')));
        echo CJSON::encode(array(
                'result' => $result,
                'msg' => $msg,
                'data'=> $data,
                'safeNumber'=>Yii::app()->user->getState('safeNumber')
            )
        );
        Yii::app()->end();
    }
    public function beforeAction($action)
    {
        $extraActions = array('login', 'register');
        if (!in_array(strtolower($action->id), $extraActions) && Yii::app()->user->isGuest)
        {
            Yii::app()->user->loginRequired();
        }
        $request = Yii::app()->getRequest();
        if($request->isAjaxRequest){            
            if(isset($_POST['safeNumber']) && Yii::app()->user->getState('safeNumber')===$_POST['safeNumber'] && Yii::app()->user->getState('loginIp') ===$request->userHostAddress){
                return true;   
            }else{
                return false;
            }
        }
        return true;   
    }
}