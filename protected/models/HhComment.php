<?php

/**
 * This is the model class for table "hh_comment".
 *
 * The followings are the available columns in table 'hh_comment':
 * @property integer $userid
 * @property integer $commentid
 * @property integer $comment_date
 * @property string $comment
 * @property integer $messageid
 * @property integer $re_commentid
 * @property integer $forward_flag
 *
 * The followings are the available model relations:
 * @property HhMessages $message
 * @property HhUsers $user
 * @property HhComment $reComment
 * @property HhComment[] $hhComments
 */
class HhComment extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return HhComment the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'hh_comment';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('comment_date, messageid, forward_flag', 'required'),
			array('userid, comment_date, messageid, re_commentid, forward_flag', 'numerical', 'integerOnly'=>true),
			array('comment', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('userid, commentid, comment_date, comment, messageid, re_commentid, forward_flag', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'message' => array(self::BELONGS_TO, 'HhMessages', 'messageid'),
			'user' => array(self::BELONGS_TO, 'HhUsers', 'userid'),
			'reComment' => array(self::BELONGS_TO, 'HhComment', 're_commentid'),
			'hhComments' => array(self::HAS_MANY, 'HhComment', 're_commentid'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'userid' => 'Userid',
			'commentid' => 'Commentid',
			'comment_date' => 'Comment Date',
			'comment' => 'Comment',
			'messageid' => 'Messageid',
			're_commentid' => 'Re Commentid',
			'forward_flag' => 'Forward Flag',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('userid',$this->userid);
		$criteria->compare('commentid',$this->commentid);
		$criteria->compare('comment_date',$this->comment_date);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('messageid',$this->messageid);
		$criteria->compare('re_commentid',$this->re_commentid);
		$criteria->compare('forward_flag',$this->forward_flag);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}