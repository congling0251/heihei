<?php

/**
 * This is the model class for table "hh_messages".
 *
 * The followings are the available columns in table 'hh_messages':
 * @property integer $messageid
 * @property integer $userid
 * @property integer $message_date
 * @property string $message
 * @property integer $comment_amount
 * @property integer $forward_amount
 * @property integer $new_comment_flag
 *
 * The followings are the available model relations:
 * @property HhUsers $user
 */
class HhMessages extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return HhMessages the static model class
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
		return 'hh_messages';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('userid, message_date, message', 'required'),
			array('userid, message_date, comment_amount, forward_amount, new_comment_flag', 'numerical', 'integerOnly'=>true),
			array('message', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('messageid, userid, message_date, message, comment_amount, forward_amount, new_comment_flag', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'HhUsers', 'userid'),
			'comments'=>array(self::HAS_MANY,'HhComment','messageid')
                    );
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'messageid' => 'Messageid',
			'userid' => 'Userid',
			'message_date' => 'Message Date',
			'message' => 'Message',
			'comment_amount' => 'Comment Amount',
			'forward_amount' => 'Forward Amount',
			'new_comment_flag' => 'New Comment Flag',
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

		$criteria->compare('messageid',$this->messageid);
		$criteria->compare('userid',$this->userid);
		$criteria->compare('message_date',$this->message_date);
		$criteria->compare('message',$this->message,true);
		$criteria->compare('comment_amount',$this->comment_amount);
		$criteria->compare('forward_amount',$this->forward_amount);
		$criteria->compare('new_comment_flag',$this->new_comment_flag);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}