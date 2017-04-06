<?php

/**
 * This is the model class for table "pictures".
 *
 * The followings are the available columns in table 'pictures':
 * @property integer $id
 * @property integer $categoryId
 * @property string $description
 * @property string $image
 *
 * The followings are the available model relations:
 * @property Categories $category
 */
class Pictures extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pictures';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('categoryId, description, image', 'required'),
			array('categoryId', 'numerical', 'integerOnly'=>true),
			array('description', 'length', 'max'=>500),
			array('image', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, categoryId, description, image', 'safe', 'on'=>'search'),
            //устанавливаем правила для файла, позволяющие загружать
            // только картинки!            
            array('image', 'file', 'types'=>'jpg, gif, png', 'maxSize' => 1048576),
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
			'category' => array(self::BELONGS_TO, 'Categories', 'categoryId'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Номер',
			'categoryId' => 'Раздел',
			'description' => 'Описание',
			'image' => 'Изображение',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('categoryId',$this->categoryId);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('image',$this->image,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Pictures the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
    
    /**
     * Получает все картинки из определенного раздела  
     * @param integer $id - идентификатор раздела
     * @return картинки
     * 
     */
    public static function findPictures($id) {
        $criteria = new CDbCriteria();
        $ids=array();
        $ids[0]= $id;
        $criteria->addInCondition('categoryId', $ids); 
        return Pictures::model()->findAll($criteria);
    }
    /**
     * После сохранения картинки создаем ее превьюшку 
     * 
     */
    
    protected function afterSave() {
        parent::afterSave();
        //начинаем запись превьюшки        
        $source = Yii::getPathOfAlias('webroot') ."/images/".$this->image;
        $dest = Yii::getPathOfAlias('webroot') ."/images/preview/".$this->image;
        $nh = 250;    // Высота миниатюр
        
        //определяем тип изображения
    $stype = explode(".", $source);
    $stype = $stype[count($stype)-1];
    
    //получаем размер оригинального изображения.
    $size = getimagesize($source);
    $w = $size[0];    // Ширина изображения 
    $h = $size[1];    // Высота изображения

    // высоту миниатюры сейчас сосчитаем пропорционально ширине
    $nw = round($nh*$w/$h);
    
    
    
    //Затем используем нужную функцию PHP для работы с определенным форматом изображения:
    switch($stype) {
        case 'gif':
            $simg = imagecreatefromgif($source);
            break;
        case 'jpg':
            $simg = imagecreatefromjpeg($source);
            break;
        case 'png':
            $simg = imagecreatefrompng($source);
            break;
    }
    
    //И, наконец, создаем миниатюру и помещаем ее в указанную папку.
    
    $dimg = imagecreatetruecolor($nw, $nh);
    $wm = $w/$nw;
    $hm = $h/$nh;
    $h_height = $nh/2;
    $w_height = $nw/2;
     
    if($w > $h) {
        $adjusted_width = $w / $hm;
        $half_width = $adjusted_width / 2;
        $int_width = $half_width - $w_height;
        imagecopyresampled($dimg,$simg,-$int_width,0,0,0,$adjusted_width,$nh,$w,$h);
    } elseif(($w < $h) || ($w == $h)) {     
    		$adjusted_height = $h / $wm;
    		$half_height = $adjusted_height / 2;
    		$int_height = $half_height - $h_height;
    		imagecopyresampled($dimg,$simg,0,-$int_height,0,0,$nw,$adjusted_height,$w,$h);
    	} else {     
    		imagecopyresampled($dimg,$simg,0,0,0,0,$nw,$nh,$w,$h); 
    	 }     
    imagejpeg($dimg,$dest,100);
 
    } 
}
