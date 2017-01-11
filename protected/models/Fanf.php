<?php

/**
 * This is the model class for table "fanf".
 *
 * The followings are the available columns in table 'fanf':
 * @property integer $ficId
 * @property string $title
 * @property string $year
 * @property integer $month
 * @property integer $datePublish
 * @property string $raiting
 * @property string $pairing
 * @property string $summary
 * @property string $note
 * @property string $dedication
 * @property integer $size
 * @property integer $beta
 * @property integer $coauthor
 * @property string $category
 * @property string $text
 */
class Fanf extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'fanf';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, year, month, datePublish, raiting, pairing, summary, size, beta, coauthor, category, text', 'required'),
			array('month, datePublish, size, beta, coauthor', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>100),
			array('year', 'length', 'max'=>4),
			array('raiting, category', 'length', 'max'=>10),
			array('pairing', 'length', 'max'=>200),
			array('summary, note, dedication', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ficId, title, year, month, datePublish, raiting, pairing, summary, note, dedication, size, beta, coauthor, category, text', 'safe', 'on'=>'search'),
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
			'ficId' => 'Fic',
			'title' => 'Title',
			'year' => 'Year',
			'month' => 'Month',
			'datePublish' => 'Date Publish',
			'raiting' => 'Raiting',
			'pairing' => 'Pairing',
			'summary' => 'Summary',
			'note' => 'Note',
			'dedication' => 'Dedication',
			'size' => 'Size',
			'beta' => 'Beta',
			'coauthor' => 'Coauthor',
			'category' => 'Category',
			'text' => 'Text',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('ficId',$this->ficId);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('year',$this->year,true);
		$criteria->compare('month',$this->month);
		$criteria->compare('datePublish',$this->datePublish);
		$criteria->compare('raiting',$this->raiting,true);
		$criteria->compare('pairing',$this->pairing,true);
		$criteria->compare('summary',$this->summary,true);
		$criteria->compare('note',$this->note,true);
		$criteria->compare('dedication',$this->dedication,true);
		$criteria->compare('size',$this->size);
		$criteria->compare('beta',$this->beta);
		$criteria->compare('coauthor',$this->coauthor);
		$criteria->compare('category',$this->category,true);
		$criteria->compare('text',$this->text,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Fanf the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
