<?php

/**
 * This is the model class for table "genre_fanfic".
 *
 * The followings are the available columns in table 'genre_fanfic':
 * @property integer $genreFanficId
 * @property integer $fanficId
 * @property integer $genreId
 *
 * The followings are the available model relations:
 * @property Fanf $fanfic
 * @property Genre $genre
 */
class GenreFanfic extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'genre_fanfic';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fanficId, genreId', 'required'),
			array('fanficId, genreId', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('genreFanficId, fanficId, genreId', 'safe', 'on'=>'search'),
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
			'fanfic' => array(self::BELONGS_TO, 'Fanf', 'fanficId'),
			'genre' => array(self::BELONGS_TO, 'Genre', 'genreId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'genreFanficId' => 'Genre Fanfic',
			'fanficId' => 'Fanfic',
			'genreId' => 'Genre',
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

		$criteria->compare('genreFanficId',$this->genreFanficId);
		$criteria->compare('fanficId',$this->fanficId);
		$criteria->compare('genreId',$this->genreId);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return GenreFanfic the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
