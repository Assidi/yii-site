<?php

/**
 * This is the model class for table "fandoms".
 *
 * The followings are the available columns in table 'fandoms':
 * @property integer $fandomId
 * @property string $fandomName
 *
 * The followings are the available model relations:
 * @property Characters[] $characters
 * @property FandomsFanfics[] $fandomsFanfics
 */
class Fandoms extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'fandoms';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fandomName', 'required'),
			array('fandomName', 'length', 'max'=>255),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('fandomId, fandomName', 'safe', 'on'=>'search'),
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
			'characters' => array(self::HAS_MANY, 'Characters', 'fandomId'),
			'fandomsFanfics' => array(self::HAS_MANY, 'FandomsFanfics', 'fandomId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'fandomId' => 'Fandom',
			'fandomName' => 'Fandom Name',
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

		$criteria->compare('fandomId',$this->fandomId);
		$criteria->compare('fandomName',$this->fandomName,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Fandoms the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
