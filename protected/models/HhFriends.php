<?php

/**
 * This is the model class for table "hh_friends".
 *
 * The followings are the available columns in table 'hh_friends':
 * @property integer $userid
 * @property integer $friendid
 *
 * The followings are the available model relations:
 * @property HhUsers $user
 */
class HhFriends extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return HhFriends the static model class
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
		return 'hh_friends';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('userid, friendid', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('userid, friendid', 'safe', 'on'=>'search'),
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
			'friend' => array(self::BELONGS_TO, 'HhUsers','', 'on'=>' t.friendid=friend.userid'),
			'message' => array(self::HAS_MANY, 'HhMessages','', 'on'=>' t.friendid=message.userid')
                    
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'userid' => 'Userid',
			'friendid' => 'Friendid',
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
		$criteria->compare('friendid',$this->friendid);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}