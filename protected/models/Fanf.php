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
 *
 * The followings are the available model relations:
 * @property CharactersFanfics[] $charactersFanfics
 * @property Comments[] $comments
 * @property FandomsFanfics[] $fandomsFanfics
 * @property Coauthor $coauthor0
 * @property Beta $beta0
 * @property GenreFanfic[] $genreFanfics
 */
class Fanf extends CActiveRecord
{
    public $characters;
    public $fandoms;
    public $genres;
    
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
			array('title, year, month, datePublish, raiting, pairing, summary, size, category, text', 'required'),
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
			'charactersFanfics' => array(self::HAS_MANY, 'CharactersFanfics', 'fanficId'),
			'comments' => array(self::HAS_MANY, 'Comments', 'fanficId'),
			'fandomsFanfics' => array(self::HAS_MANY, 'FandomsFanfics', 'fanficId'),
			'coauthor0' => array(self::BELONGS_TO, 'Coauthor', 'coauthor'),
			'beta0' => array(self::BELONGS_TO, 'Beta', 'beta'),
			'genreFanfics' => array(self::HAS_MANY, 'GenreFanfic', 'fanficId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ficId' => 'Номер фика',
			'title' => 'Заголовок',
			'year' => 'Год',
			'month' => 'Месяц',
			'datePublish' => 'Дата публикации',
			'raiting' => 'Рейтинг',
			'pairing' => 'Пейринг',
			'summary' => 'Краткое содержание',
			'note' => 'Примечание',
			'dedication' => 'Посвящение',
			'size' => 'Размер',
			'beta' => 'Бета',
			'coauthor' => 'Соавтор',
			'category' => 'Категория',
			'text' => 'Текст',
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
    
    /** 
    * @return array список моделей жанров текущего фанфика 
    */ 
    public function getGenres() 
    { 
        $arGenres = array(); 
        if ($this->genreFanfics) { 
            foreach($this->genreFanfics as $genreFanficModel) {
                
                $arGenres[] = $genreFanficModel->genre; 
            } 
        } 
        return $arGenres; 
    }
    
    /** 
    * @return array список моделей фандомов текущего фанфика 
    */ 
    public function getFandoms() 
    {         
        $arFandoms = array(); 
        if ($this->fandomsFanfics) { 
            foreach($this->fandomsFanfics as $fandomsFanficModel) {                
                $arFandoms[] = $fandomsFanficModel->fandom; 
            } 
        }
        return $arFandoms; 
    }
    
    /** 
    * @return имя беты текущего фанфика 
    */ 
    public function getBeta() {
        if ($this->beta0) {
            $mybeta =   $this->beta0;
        }
        return $mybeta;
    }
    
    /** 
    * @return имя соавтора текущего фанфика 
    */ 
    public function getCoauthor() {
        if ($this->coauthor0) {
            $mycoauthor =   $this->coauthor0;
        }
        return $mycoauthor;
    }

    // поиск с использованием трёх фильтров
    /**
     * @param array $genres массив id жанров
     */
    public static function speacialSearch($characters = array(), $fandoms = array(), $genres = array()) {
        $criteria = new CDbCriteria();
        $criteria->with = array('genreFanfics.genre');
        if ($genres) {
            $criteria->addInCondition('genre.genreId', $genres);
        }
        return Fanf::model()->findAll($criteria);
    }
}
