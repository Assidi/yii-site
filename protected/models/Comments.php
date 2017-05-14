<?php

/**
 * This is the model class for table "comments".
 *
 * The followings are the available columns in table 'comments':
 * @property integer $commentId
 * @property integer $fanficId
 * @property string $name
 * @property string $email
 * @property integer $date
 * @property string $text
 *
 * The followings are the available model relations:
 * @property Fanf $fanfic
 */
class Comments extends CActiveRecord
{
     public $verifyCode;
     
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'comments';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, email, text', 'required'),
            array('email', 'email'),
			array('fanficId, date', 'numerical', 'integerOnly'=>true),
			array('name, email', 'length', 'max'=>50),
			array('text', 'length', 'max'=>1000),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('commentId, fanficId, name, email, date, text', 'safe', 'on'=>'search'),
             array(
                'verifyCode',
                'captcha',
                // авторизованным пользователям код можно не вводить
                'allowEmpty'=>!Yii::app()->user->isGuest || !CCaptcha::checkRequirements(),
            ),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'commentId' => 'Комментарий',
			'fanficId' => 'Номер текста',
			'name' => 'Имя',
			'email' => 'Электронный адрес',
			'date' => 'Дата',
			'text' => 'Текст комментария',
            'verifyCode' => 'Код проверки',
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

		$criteria->compare('commentId',$this->commentId);
		$criteria->compare('fanficId',$this->fanficId);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('date',$this->date);
		$criteria->compare('text',$this->text,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Comments the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
    /**
     * Перед сохранением комментария добавляем в него дату создания  
     * 
     */
    protected function beforeSave() {
        if(parent::beforeSave()) {
            if($this->isNewRecord) {
                $this->date = time();         
          }  
         return true;
        }
        else 
            return false;                
    }
}
