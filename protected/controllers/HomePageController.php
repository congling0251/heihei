<?php

class HomePageController extends Controller {

    public $layout = 'index';
    public $limitTime = 2;
    public function accessRules()
    {
        return array(
            array('allow', // allow authenticated users to access all actions
                'actions'=>array(
                    'Index',
                    'EditUserInfo',
                    'savelayout',
                    'savemessage',
                    'changePassword',
                    'newnoteajax',
                    'moreFriendmessage',
                    'message'
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
    public function actionIndex($id = '') {
        Yii::app()->user->checkLogin();
        $this->layout = 'index';
        $userid = Yii::app()->user->getState('userid');
        if ($id == '' || $id == $userid) {
            $model = HhUsers::model()->findByPk($userid);
            $layout = $model->layout;
            $visitorflag = false;
            $id=$userid;
        } else {
            $visitorflag = true;
            $layout = "userinfo,userstatus,visitor,";
            $lastVisitor = $this->getLasetVisitor($id);
            $model = HhUsers::model()->findByPk($id);
            if($lastVisitor->visitid!==$userid || floor($lastVisitor->visitors_date/86400) != floor(time()/86400) ){
                $transaction = $model->dbConnection->beginTransaction();
                try {
                    $model->visitors_amount = $model->visitors_amount + 1;
                    $model->save();
                    $visitormodel = new HhVisitors;
                    $visitormodel->userid = $id;
                    $visitormodel->visitid = $userid;
                    $visitormodel->visitors_date = time();
                    $visitormodel->save();
                    $transaction->commit();
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }
        }
        $prefriends=$this->getprefriend($model);
        $friendmessage = $this->getfriendmessage();
        $message = $this->getmessages();
        $recentvisitors = $this->getrecentvisitors($id);
        $this->render('index', array('model' => $model, 'visitorflag' => $visitorflag, 'layout' => $layout, 'message' => $message, 'recentvisitors' => $recentvisitors, 'prefriends' => $prefriends, 'friendmessage' => $friendmessage));
    }

    public function actionEditUserInfo() {
        $userid = Yii::app()->user->getState('userid');
        $model = HhUsers::model()->findByPk($userid);
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'UserInfo-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['HhUsers'])) {
            $model->attributes = $_POST['HhUsers'];
            $model->userid = $userid;
            $uploadedimage = CUploadedFile::getInstance($model, 'headphoto');
            $uploaddir = Yii::app()->theme->basePath . "/images/uploads/";
            if (is_object($uploadedimage) && get_class($uploadedimage) === 'CUploadedFile') {
                $filename = md5(uniqid());
                $ext = $uploadedimage->extensionName;
                $uploadfile = $uploaddir . $filename . '.' . $ext;
                $uploadedimage->saveAs($uploadfile);
                $model->headphoto = $filename . '.' . $ext;
                if ($model->save())
                    $this->redirect('index');
            }
        }
        $this->render('editUserInfo', array('model' => $model));
    }

    public function actionsavelayout() {
        $userid = Yii::app()->user->getState('userid');
        $model = HhUsers::model()->findByPk($userid);
        $model->layout = $_POST['layout'];
        if ($model->save()) {
            $this->ajaxOutputJSON(1, 'succsess', '布局保存成功！');
        }
    }

    public function actionsavemessage() {
        $userid = Yii::app()->user->getState('userid');
        $model = new HhMessages();
        $model->userid = $userid;
        $model->message = $_POST['message'];
        $model->message_date = time();
        if ($model->save()) {
            $this->ajaxOutputJSON(1, 'succsess', '状态发布成功！');
        } else {
            print_r($model->errors);
            die;
            $this->ajaxOutputJSON(0, 'fail', '状态发布失败！');
        }
    }

    public function actionchangePassword() {
        // collect user input data
        if (isset($_POST['password'])) {

            $userid = Yii::app()->user->getState('userid');
            $model = HhUsers::model()->findByPk($userid);
            if ($model->password == md5($_POST['password'])) {

                $model->password = md5($_POST['newpassword']);
                if ($model->save()) {
                    $this->redirect('index');
                }
            }
        }
        $this->render('changePassword');
    }

    public function actionnewnoteajax() {
        $userid = Yii::app()->user->getState('userid');
        $sql = "select * from Hh_Messages as t,Hh_Users as u where t.userid = u.userid and t.userid in (select friendid from Hh_Friends as f where f.userid =".$userid.") and t.message_date> ".time();
        $result = yii::app()->db->createCommand($sql);
        $friendmessages = $result->queryAll();
        $nowTime = time();
        $this->ajaxOutputJSON(1, 'success', array('num'=>count($friendmessages),'time'=>$nowTime));
    }

    public function actionmoreFriendmessage() {
        $this->limitTime = $this->limitTime + 10;
        $friendmessage = $this->getfriendmessage();
         $this->renderPartial('_friendmessage', array(
        'friendmessage' => $friendmessage
    ));
    }
    public function actionmessage($messageid='') {
            $model = HhMessages::model()->with('comments','user')->findByPk($messageid);
            $this->render('messagedetail',array('model'=>$model));
    }
    private function getfriendmessage() {
        $userid = Yii::app()->user->getState('userid');
        $sql = "select * from Hh_Messages as t,Hh_Users as u where t.userid = u.userid and t.userid in (select friendid from Hh_Friends as f where f.userid =".$userid.") order by t.message_date desc limit ".$this->limitTime;
        $result = yii::app()->db->createCommand($sql);
        $friendmessages = $result->queryAll();
        return $friendmessages;
    }
    private function getprefriend($model){
          $userid = Yii::app()->user->getState('userid');
        $sql = "select * from Hh_Users as t where t.userid !=".$userid." and (t.college='".$model->college."' or t.company='".$model->company."') and t.userid not in (select friendid from Hh_Friends as f where f.userid =".$userid.")";
        $result = yii::app()->db->createCommand($sql);
        $friends = $result->queryAll();
        return $friends;
    }
    private function getmessages() {
        $userid = Yii::app()->user->getState('userid');
        $criteria = new CDbCriteria();

        $criteria->condition = 'userid=' . $userid;
        $criteria->limit = $this->limitTime;
        $criteria->order = 'message_date DESC';
        $messages = new CActiveDataProvider('HhMessages', array(
            'pagination' => array(
                'pageSize' => 5,
            ),
            'criteria' => $criteria,
        ));
        return $messages;
    }

    private function getrecentvisitors($id) {
        $criteria = new CDbCriteria();

        $criteria->condition = 't.userid=' . $id;
        $criteria->limit = 6;
        $criteria->order = 'visitors_date DESC';
        $recentvisitors = HhVisitors::model()->with('visitor')->findAll($criteria);
        return $recentvisitors;
    }
    private function getLasetVisitor($id) {
        $criteria = new CDbCriteria();

        $criteria->condition = 't.userid=' . $id;
        $criteria->limit = 6;
        $criteria->order = 'visitors_date DESC';
        $LasetVisitor = HhVisitors::model()->with('visitor')->find($criteria);
        return $LasetVisitor;
    }

}