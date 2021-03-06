<?php

class FriendController extends Controller {

    public $layout = '//layouts/index';
    public function accessRules()
    {
        return array(
            array('allow', // allow authenticated users to access all actions
                'actions'=>array(
                    'Index',
                    'findfriend',
                    'deletefriend',
                    'addfriend'
                ),
                'users'=>array('@'),
            ),
            array('deny',  // deny all users
                'users'=>array('*'),
            ),
        );
    }
    public function actionIndex() {
        $userid = Yii::app()->user->getState('userid');
        $model = HhUsers::model()->findByPk($userid);
        $myfriendscriteria = new CDbCriteria(array(
            'distinct' => true,
            'condition' => ' Hh_Friends.userid = ' . $userid,
            'limit' => 10,
            'join' => "JOIN Hh_Friends on t.userid = Hh_Friends.friendid"
        ));
         $myfriends = HhUsers::model()->findAll($myfriendscriteria);
        $sefriends=$this->getsefriend();
        $befriends = $this ->getbeFriend($userid);
         $prefriends=$this->getprefriend($model);
        $this->render('index', array('model' => $model,'beFriendNum'=>count($this->getbeFriend($userid)),'myFriendNum'=>count($this->getmyFriend($userid)), 'prefriends' => $prefriends, 'sefriends' => $sefriends, 'myfriends' => $myfriends, 'befriends' => $befriends));
    }

    public function actionfindfriend() {
        $userid = Yii::app()->user->getState('userid');
        $friendscriteria = new CDbCriteria();
        $friendscriteria->distinct = true;
        if (isset($_POST['name']))
            $friendscriteria->condition = "t.realname LIKE '%" . $_POST['name'] . "%' and t.userid != " . $userid . " and t.userid not in (select friendid from Hh_Friends where Hh_Friends.userid=". $userid.")";
        else {
           $temp= "t.userid != " . $userid . " and t.userid not in (select friendid from Hh_Friends where Hh_Friends.userid=". $userid.")" . (isset($_POST['gender'])&&$_POST['gender'] != '' ? " and t.sex='" . $_POST['gender']."'" : "") . (isset($_POST['school'])&&$_POST['school'] != '' ? " and t.college='" . $_POST['school']."'" : "") . (isset($_POST['company'])&&$_POST['company'] != '' ? " and t.company='" . $_POST['company']."'" : "");
            $friendscriteria->condition = $temp;
        }
        $sefriends = HhUsers::model()->findAll($friendscriteria);
        $content =$this->renderPartial(
                'addfriends', array(
                 'sefriends' => $sefriends
                ),true);
        $this->ajaxOutputJSON(1, 'success', array('data'=>$content));
    }
    public function actiondeletefriend() {
        $userid = Yii::app()->user->getState('userid');
         $deletecount = HhFriends::model()->deleteByPk(array('userid'=>$userid,'friendid'=>$_POST['deletefriendid']));
               if( $deletecount>0)
                     $this->ajaxOutputJSON(1, 'success', '成功删除好友');
                 else {
                      $this->ajaxOutputJSON(0, 'fail', '删除好友失败');
                 }
    }
    public function actionaddfriend() {
        $userid = Yii::app()->user->getState('userid');
         $friendmodel = new HhFriends();
                $friendmodel->userid = $userid;
                $friendmodel->friendid = $_POST['addfriendid'];
               if( $friendmodel->save())
                     $this->ajaxOutputJSON(1, 'success', '成功添加好友');
                 else {
                      $this->ajaxOutputJSON(0, 'fail', '添加好友失败');
                 }
    }
    private function getsefriend(){
          $userid = Yii::app()->user->getState('userid');
        $sql = "select * from Hh_Users as t where t.userid !=".$userid." and t.userid not in (select friendid from Hh_Friends as f where f.userid =".$userid.")";
        $result = yii::app()->db->createCommand($sql);
        $friends = $result->queryAll();
        return $friends;
    }
     private function getprefriend($model){
          $userid = Yii::app()->user->getState('userid');
        $sql = "select * from Hh_Users as t where t.userid !=".$userid." and (t.college='".$model->college."' or t.company='".$model->company."') and t.userid not in (select friendid from Hh_Friends as f where f.userid =".$userid.")";
        $result = yii::app()->db->createCommand($sql);
        $friends = $result->queryAll();
        return $friends;
    }
    private function getmyFriend($id){
        $userid = Yii::app()->user->getState('userid');
        $myFriend = HhFriends::model()->findAll(array(
            'condition'=>'userid=:userId',
            'params'=>array(':userId'=>$userid),
        ));
        return $myFriend;
    }
    private function getbeFriend($id){
        $userid = Yii::app()->user->getState('userid');
        $beFriend = HhFriends::model()->with('user')->findAll(array(
            'condition'=>'friendid=:userId',
            'params'=>array(':userId'=>$userid),
        ));
        return $beFriend;
    }

}