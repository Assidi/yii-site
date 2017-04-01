<?php

/**
 * This is the model class for table "jokes".
 *
 * The followings are the available columns in table 'jokes':
 * @property integer $jokeId
 * @property string $jokeText
 */
class Jokes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'jokes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('jokeText', 'required'),
			array('jokeText', 'length', 'max'=>800),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('jokeId, jokeText', 'safe', 'on'=>'search'),
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
			'jokeId' => 'Номер',
			'jokeText' => 'Текст',
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

		$criteria->compare('jokeId',$this->jokeId);
		$criteria->compare('jokeText',$this->jokeText,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Jokes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
       
    
    /**
     * @return случайную шутку из базы Jokes
     */
    public static function getRandJoke() {
        $criteria=new CDbCriteria();
        $jokesAll = self::model()->findAll($criteria);	
        $n = count($jokesAll);
        
        $i = mt_rand(0, $n-1);
        //echo 'Номер '.$i.'<br />';
        
        $jokes = array();
        
        foreach ($jokesAll as $jokerow) {
            $jokes[] = $jokerow->jokeText;
        }
        
        $joke = $jokes[$i];
        //$joke = preg_replace('/[\r\n]+/', "<br />", $joke);
        $joke = AssidiHelper::insertBreakes($joke);
        return $joke;
    }
    
    
}
