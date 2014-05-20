<?php

class RWebUser extends CWebUser
{
    public $_access=array();
    public function loginRequired()
    {
        $app = Yii::app();
        $request = $app->getRequest();
        $this->setReturnUrl( $request->getUrl() );
        if ( ($url = $this->loginUrl) !== null ){
            if (is_array($url)){
                $route=isset($url[0]) ? $url[0] : $app->defaultController;
                $url=$app->createUrl($route,array_splice($url,1));
            }
            if ( $request->isAjaxRequest ){
                if($this->safeNumber===$_POST['safeNumber'] && $this->loginIp ===$request->userHostAddress ){
                    
                }
                //$this->renderPartial('application.views.main.sessionTimeout', array(), false, true);
//                echo "This output is never given to the client...";

            	//Set the return URL to be the host URL if the request is an ajax call.
				$this->setReturnUrl($request->getUrlReferrer());
                if(empty($url))
                    $url = CHtml::normalizeUrl(array("site/login"));
                echo "<script type='text/javascript'>window.location= '$url';</script>";
            }
            else{
//                var_dump($app->controller->action->layout);
//                $request->redirect($url.'?layout='.$app->controller->layout);
                if(empty($url))
                $url = CHtml::normalizeUrl(array("site/login"));
                echo "<script type='text/javascript'>window.top.location= '$url';</script>";
            }
        }
    }
    
    public function checkLogin($returnUrl = '') {
        if($this -> isGuest) {
            if ($returnUrl) {
                Yii::app() -> request -> redirect(Yii::app() -> createUrl(reset($this -> loginUrl),array('returnUrl' => $returnUrl)));
            } else {
                Yii::app() -> request -> redirect(Yii::app() -> createUrl(reset($this -> loginUrl)));
            }
            
        } else {
            return true;
        }
        return false;
    }

}
