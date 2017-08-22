<?php

/**
 * This is the model class for table "Fanf".
 *
 * The followings are the available columns in table 'Fanf':
 * @property integer $ficId
 * @property string $title
 * @property string $dateWrite
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
 * @property Beta $beta0
 * @property Coauthor $coauthor0
 * @property GenreFanfic[] $genreFanfics
 */
class Fanf extends CActiveRecord
{
    const MIN_SIZE = 0;
    const MAX_SIZE = 200;    

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Fanf';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, dateWrite, raiting, pairing, summary, category, text', 'required'),
			array('datePublish, size, beta, coauthor', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>100),
			array('raiting, category', 'length', 'max'=>10),
			array('pairing', 'length', 'max'=>200),
			array('summary, note, dedication', 'length', 'max'=>500),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ficId, title, dateWrite, datePublish, raiting, pairing, summary, note, dedication, size, beta, coauthor, category, text', 'safe', 'on'=>'search'),
            array(
            	'dateWrite',
            	'match',
            	'pattern' => '/[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])/',
            	'message' => 'Некорректный формат даты'
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
			'charactersFanfics' => array(self::HAS_MANY, 'CharactersFanfics', 'fanficId'),
			'comments' => array(self::HAS_MANY, 'Comments', 'fanficId'),
			'fandomsFanfics' => array(self::HAS_MANY, 'FandomsFanfics', 'fanficId'),
			'beta0' => array(self::BELONGS_TO, 'Beta', 'beta'),
			'coauthor0' => array(self::BELONGS_TO, 'Coauthor', 'coauthor'),
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
			'dateWrite' => 'Дата написания',
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
		$criteria->compare('dateWrite',$this->dateWrite,true);
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
    
    public function customSearch()
	{
		// функция для поиска текстов пользователем

		$criteria=new CDbCriteria;
		
		$criteria->compare('title',$this->title,true);
		$criteria->compare('dateWrite',$this->dateWrite,true);		
		$criteria->compare('raiting',$this->raiting);			
        $criteria->compare('summary',$this->summary,true);	

        $fanf = Yii::app()->request->getParam('Fanf');
        $minSize = $fanf['minSize'];
        if ($minSize) {
            $criteria->addCondition('size > :min_size');
            $criteria->params[':min_size'] = (int)$minSize * 1000;
        }
        $maxSize = $fanf['maxSize'];
        if ($maxSize && $maxSize <= self::MAX_SIZE) {
            $criteria->addCondition('size < :max_size');
            $criteria->params[':max_size'] = (int)$maxSize * 1000;
        }
		$criteria->compare('category',$this->category);
		$criteria->compare('text',$this->text,true);
        $characters = AssidiHelper::getArrayFromRequest('characters');
		$fandoms = AssidiHelper::getArrayFromRequest('fandoms');
		$genres = AssidiHelper::getArrayFromRequest('genres');
        
        $withCriteria = array();
		if ($characters) {
            $withCriteria['charactersFanfics'] = array('together' => true);
            //$withCriteria['charactersFanfics.character'] = array('together' => true);
            $criteria->addInCondition('charactersFanfics.characterId', $characters);
        }
		if ($fandoms) {
            $withCriteria['fandomsFanfics'] = array('together' => true);
            //$withCriteria['fandomsFanfics.fandom'] = array('together' => true);
            $criteria->addInCondition('fandomsFanfics.fandomId', $fandoms);
        }
		if ($genres) {
            $withCriteria['genreFanfics'] = array('together' => true);
           // $withCriteria['genreFanfics.genre'] = array('together' => true);
            $criteria->addInCondition('genreFanfics.genreId', $genres, 'and');
        }
		if ($withCriteria) {
			$criteria->with = $withCriteria;
		}
        $criteria->order = 'dateWrite DESC';
        $fanfics = Fanf::model()->findAll($criteria);
        $fanfIds = array();
        foreach ($fanfics as $fanfic) {
            $fanfIds[] = $fanfic->ficId;
        }
        
        //Yii::app()->params['debug'] = $fanfIds;
        
        $criteria = new CDbCriteria();
        $criteria->addInCondition('ficId', $fanfIds); 
        $criteria->order = 'dateWrite DESC'; 
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
                $arGenres[$genreFanficModel->genreFanficId] = $genreFanficModel->genre; 
            } 
        } 
        return $arGenres; 
    }
    
    /** 
    * @return array список персонажей текущего фанфика 
    */ 
    
    public function getCharacters() {
        $arCharact = array();
        if ($this->charactersFanfics) {
            foreach($this->charactersFanfics as $charFanficModel) { 
                $arCharact[$charFanficModel->charfanId] = $charFanficModel->character; 
            } 
        } 
        return $arCharact;        
    }
    
    /** 
    * @return array список моделей фандомов текущего фанфика 
    */ 
    public function getFandoms()   
    {           
        $arFandoms = array(); 
        if ($this->fandomsFanfics) { 
            foreach($this->fandomsFanfics as $fandomsFanficModel) {                
                $arFandoms[$fandomsFanficModel->fanfanId] = $fandomsFanficModel->fandom;               
            } 
        }        
        return $arFandoms; 
    }
        
    /** 
    * @return array список идентификаторов фандомов текущего фанфика 
    */
     public function getFandomsId() {
         $arFandomsId = array();
         Yii::app()->params['debug'] = $this->fandomsFanfics; 
         if ($this->fandomsFanfics) {
            foreach($this->fandomsFanfics as $fandomsFanficModel) {
                
                $arFandoms[] = $fandomsFanficModel->fandom->fandomId;               
            } 
         }         
         return $arFandomsId;
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

/**
 * Получает все комментарии к фанфику
 * @return array() $сomments * 
 */
    public function getComments() {
        $allComments=Array();
        if($this->comments) {
            foreach ($this->comments as $CommentsFanfic) {
                $allComments[] = $CommentsFanfic;
            }
        }
        return $allComments;
    }

    // поиск с использованием трёх фильтров
    /**
     * @param array $genres массив id жанров
     */
    public static function speacialSearch($characters = array(), $fandoms = array(), $genres = array()) {
        $criteria = new CDbCriteria();
		$withCriteria = array();
		if ($characters) {
			$withCriteria[] = 'charactersFanfics.character';
            $criteria->addInCondition('character.characterId', $characters);
        }
		if ($fandoms) {
			$withCriteria[] = 'fandomsFanfics.fandom';
            $criteria->addInCondition('fandom.fandomId', $fandoms);
        }
		if ($genres) {
			$withCriteria[] = 'genreFanfics.genre';
            $criteria->addInCondition('genre.genreId', $genres);
        }
		if ($withCriteria) {
			$criteria->with = $withCriteria;
		}
        return Fanf::model()->findAll($criteria);
    }
    
    /**
     * Перед сохранением фанфика добавляем в него дату создания и размер     * 
     * 
     */
    protected function beforeSave() {
        if(parent::beforeSave()) {
            if($this->isNewRecord) {
                $this->datePublish = time();            
                $this->size = iconv_strlen(strip_tags($this->text), 'UTF-8');
         }  
         return true;
        }
        else 
            return false;                
    }
    /**
     * Добавление комментария к фанфику
     */
    public function addComment($comment) {
        //Yii::app()->params['debug'] = $comment;
        $comment->fanficId=$this->ficId;
        return $comment->save();
    }
    
    /**
     * Возвращает последний добавленный фанфик
     * @return fanf 
     */
    
    public static function lastFanf() {
        $criteria=new CDbCriteria(array('order'=>'datePublish DESC'));
        $fanfNew = self::model()->find($criteria);
        return $fanfNew;
    }
}
