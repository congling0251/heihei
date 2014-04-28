<?php

/**
 * This is the model class for table "hh_articles".
 *
 * The followings are the available columns in table 'hh_articles':
 * @property integer $articleid
 * @property integer $userid
 * @property integer $article_date
 * @property string $article_title
 * @property string $article
 * @property integer $comment_amount
 * @property integer $forward_amount
 * @property integer $new_comment_flag
 * @property integer $forward_flag
 *
 * The followings are the available model relations:
 * @property HhUsers $user
 */
class HhArticles extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return HhArticles the static model class
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
		return 'hh_articles';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('article_date, forward_flag', 'required'),
			array('userid, article_date, comment_amount, forward_amount, new_comment_flag, forward_flag', 'numerical', 'integerOnly'=>true),
			array('article_title', 'length', 'max'=>255),
			array('article', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('articleid, userid, article_date, article_title, article, comment_amount, forward_amount, new_comment_flag, forward_flag', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'articleid' => 'Articleid',
			'userid' => 'Userid',
			'article_date' => 'Article Date',
			'article_title' => 'Article Title',
			'article' => 'Article',
			'comment_amount' => 'Comment Amount',
			'forward_amount' => 'Forward Amount',
			'new_comment_flag' => 'New Comment Flag',
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

		$criteria->compare('articleid',$this->articleid);
		$criteria->compare('userid',$this->userid);
		$criteria->compare('article_date',$this->article_date);
		$criteria->compare('article_title',$this->article_title,true);
		$criteria->compare('article',$this->article,true);
		$criteria->compare('comment_amount',$this->comment_amount);
		$criteria->compare('forward_amount',$this->forward_amount);
		$criteria->compare('new_comment_flag',$this->new_comment_flag);
		$criteria->compare('forward_flag',$this->forward_flag);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}