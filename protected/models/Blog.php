<?php

/**
 * This is the model class for table "blog".
 *
 * The followings are the available columns in table 'blog':
 * @property integer $postId
 * @property string $title
 * @property integer $date
 * @property string $text
 *
 * The followings are the available model relations:
 * @property BlogComments[] $blogComments
 * @property TagsPosts[] $tagsPosts
 */
class Blog extends CActiveRecord
{
    // тэги для поста
   // public $tags = array();
    
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'blog';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, text', 'required'),
			array('date', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>250),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('postId, title, date, text', 'safe', 'on'=>'search'),
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
			'blogComments' => array(self::HAS_MANY, 'BlogComments', 'postId'),
			'tagsPosts' => array(self::HAS_MANY, 'TagsPosts', 'postId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
		public function attributeLabels()
	{
		return array(
			'postId' => 'Пост',
			'title' => 'Заголовок',
			'date' => 'Дата',
			'text' => 'Текст',
            'tags' => 'Тэги',
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

		$criteria->compare('postId',$this->postId);
		$criteria->compare('title',$this->title,true);
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
	 * @return Blog the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
    /**
     * Перед сохранением поста добавляем в него дату создания  
     * 
     */
    
    protected function beforeSave() {
        if(parent::beforeSave()) {
            if($this->isNewRecord) {
                $this->date = time();         
          }  
          Yii::app()->params['debug'] = $model;
          
          
         return true;
        }
        else 
            return false;                
    }
    /**
     * Получение тэгов текущего поста  
     * @return array список тэгов
     * 
     */
    
    public function getTags() {
        $arTags = array();
        if($this->tagsPosts) {
            foreach ($this->tagsPosts as $tagsPostsModel) {
                $arTags[$tagsPostsModel->tagId] = $tagsPostsModel->tag->tagName;
            }            
        }
        return $arTags;
    }
    
    public function getTagIds() {
        $arTags = array();
        if($this->tagsPosts) {
            foreach ($this->tagsPosts as $tagsPostsModel) {
                $arTags[$tagsPostsModel->id] = $tagsPostsModel->tagId;
            }            
        }
        return $arTags;
    }
    
    function __get($name) {
        //echo $name.'<br />';
        if($name=='tags') {
            return $this->getTagIds();
        }
        return parent::__get($name);
    }
    
    /**
     * Получает все записи с определенным тэгом  
     * @param integer $id - идентификатор тэга
     * @return записи
     * 
     */
    public static function findPosts($id) {
        $criteria = new CDbCriteria();
        $criteria->with = array('tagsPosts');
        $ids = array();
        $ids[0] = $id;
        $criteria->addInCondition('tagsPosts.tagId', $ids);         
        $blogs = Blog::model()->findAll($criteria);
        if(!$blogs) return array();
        
        $postIds = array();
        foreach ($blogs as $blog) {
            $postIds[] = $blog->postId;
        }
        
        $criteria = new CDbCriteria();
        $criteria->with = array('tagsPosts');        
        $criteria->addInCondition('t.postId', $postIds);         
        return Blog::model()->findAll($criteria);
    }
    
    /**
     * формирует текст для вывода списке всех постов 
     * если пост коротий - оставляет без измепнения
     * если длинный - сокращает и прибавляет ссылку "читать дальше"     
     */
    
    public function cutText() {
        $post = $this->text;
        $l = strlen($post);
        $lmax = 300;
        if ($l<$lmax) {
            return $post;
        }
        else {
            // будет скрывать часть строки с точки, запятой или скобки, за которыми идет пробел
            $reg = "/[\.,)]\s/";
            $arrstr = preg_split($reg, $post,-1, PREG_SPLIT_OFFSET_CAPTURE);
            $n = count($arrstr);
    
            for ($i=0; $i<$n; $i++) {
                $pos = $arrstr[$i][1];                
                if ($pos>$lmax) break;        
            }
            $str = substr($post, 0, $pos);                      
            //$str = $str." <a href=".$this->postId.">Читать дальше</a>";            
            $str = $str.CHtml::link("Читать дальше", array('blog/view', 'id'=>$this->postId)); 
            return $str;   
        }
    }
    
    /**
 * Получает все комментарии к записи блога
 * @return array() $сomments * 
 */
    public function getComments() {
        $allComments=Array();
        //Yii::app()->params['debug'] = $this;
        if($this->blogComments) {
            foreach ($this->blogComments as $CommentsBlog) {
                $allComments[] = $CommentsBlog;
            }
        }
        return $allComments;
    }
    
    /**
     * Добавление комментария к записи
     */
    public function addComment($comment) {
        Yii::app()->params['debug'] = $comment;
        $comment->$postId = $this->$postId;
        return $comment->save();
    }
}
