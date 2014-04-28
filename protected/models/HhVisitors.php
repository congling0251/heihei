<?php

/**
 * This is the model class for table "hh_visitors".
 *
 * The followings are the available columns in table 'hh_visitors':
 * @property integer $userid
 * @property integer $visitid
 * @property integer $visitors_date
 *
 * The followings are the available model relations:
 * @property HhUsers $user
 */
class HhVisitors extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return HhVisitors the static model class
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
		return 'hh_visitors';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('visitors_date', 'required'),
			array('userid, visitid, visitors_date', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('userid, visitid, visitors_date', 'safe', 'on'=>'search'),
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
                        'visitor' => array(self::BELONGS_TO, 'HhUsers','', 'on'=>' t.visitid=visitor.userid')
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'userid' => 'Userid',
			'visitid' => 'Visitid',
			'visitors_date' => 'Visitors Date',
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
		$criteria->compare('visitid',$this->visitid);
		$criteria->compare('visitors_date',$this->visitors_date);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}