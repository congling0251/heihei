<?php

/**
 * This is the model class for table "hh_users".
 *
 * The followings are the available columns in table 'hh_users':
 * @property integer $userid
 * @property string $realname
 * @property string $password
 * @property string $username
 * @property set $layout
 * @property string $headphoto
 * @property string $sex
 * @property integer $age
 * @property string $college
 * @property string $company
 * @property integer $visitors_amount
 */
class HhUsers extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return HhUsers the static model class
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
		return 'hh_users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('age, visitors_amount', 'numerical', 'integerOnly'=>true),
			array('username, layout, headphoto, college, company', 'length', 'max'=>255),
			array('password, username', 'length', 'max'=>50),
            array('headphoto', 'file','allowEmpty'=>true,   
                'types'=>'jpg,png,gif',   //上传文件的类型  
                'maxSize'=>1024*1024*10,    //上传大小限制，注意不是php.ini中的上传文件大小  
                'tooLarge'=>'文件大于10M，上传失败！请上传小于10M的文件！',  'on'=>'editUserInfo'),
            array('username,realname,sex', 'required','on'=>'register,editUserInfo'),
			array('sex', 'length', 'max'=>6),
                       // The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('userid, realname, password, username, layout, headphoto, sex, age, college, company, visitors_amount', 'safe', 'on'=>'search'),
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
		
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'userid' => 'Userid',
			'realname' => '姓名',
			'password' => '密码',
            'newpassword' => '新密码',
            'repassword' => '重复密码',
			'username' => '用户名',
			'layout' => '布局',
			'headphoto' => '头像',
			'sex' => '性别',
			'age' => '年龄',
			'college' => '大学',
			'company' => '公司',
			'visitors_amount' => '访客数',
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
		$criteria->compare('realname',$this->realname,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('layout',$this->layout,true);
		$criteria->compare('headphoto',$this->headphoto,true);
		$criteria->compare('sex',$this->sex,true);
		$criteria->compare('age',$this->age);
		$criteria->compare('college',$this->college,true);
		$criteria->compare('company',$this->company,true);
		$criteria->compare('visitors_amount',$this->visitors_amount);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        public function getusername($username){
        $oCommand = Yii::app()->db->createCommand();
        $oCommand->select()
                 ->from($this->tableName())
                 ->where('username="'.$username.'"' );
        $rs = $oCommand->queryAll();
        return ($rs)?count($rs):0;
    }
     public function getelayout($username){
        $criteria=new CDbCriteria();
        $criteria->select="layout";
        $criteria->condition = 'username="'.$username.'"';
        $resLayout=self::model()->find($criteria);
        
        return $resLayout->layout;
    }
}