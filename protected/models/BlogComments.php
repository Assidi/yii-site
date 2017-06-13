<?php

/**
 * This is the model class for table "blog_comments".
 *
 * The followings are the available columns in table 'blog_comments':
 * @property integer $commentId
 * @property integer $postId
 * @property string $name
 * @property string $email
 * @property integer $date
 * @property string $text
 * @property boolean $admin
 *
 * The followings are the available model relations:
 * @property Blog $post
 */
class BlogComments extends CActiveRecord
{
    public $verifyCode;
    
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'blog_comments';
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
			array('postId, date', 'numerical', 'integerOnly'=>true),
			array('name, email', 'length', 'max'=>50),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('commentId, postId, name, email, date, text', 'safe', 'on'=>'search'),
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
			'post' => array(self::BELONGS_TO, 'Blog', 'postId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'commentId' => 'Номер комментария',
			'postId' => 'Номер поста',
			'name' => 'Имя',
			'email' => 'Электронный адрес',
			'date' => 'Дата',
			'text' => 'Текст комментария',
            'verifyCode' => 'Код проверки',
            'admin' => 'Знак администратора',
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
		$criteria->compare('postId',$this->postId);
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
	 * @return BlogComments the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
    /**
     * Перед сохранением комментария добавляем в него дату создания  
     * а также делаем пометку в базе, если коммент оставлен админом
     */
    protected function beforeSave() {
        if(parent::beforeSave()) {
            if(!(Yii::app()->user->isGuest)) {
                $this->admin = true;
            }
            if($this->isNewRecord) {
                $this->date = time();         
          }  
         return true;
        }
        else 
            return false;                
    }
}
