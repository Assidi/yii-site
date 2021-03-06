<?php

class FanfController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
    public $adminmenu = false;
    public $description = "Сайт фанфиков автора Ассиди";
	public $keywords = array("Ассиди", "фанфики");

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}
    
    protected function beforeRender($view) {
        if(parent::beforeRender($view)) {
         if(Yii::app()->user->isGuest) $this->layout ='//layouts/column1';
         return true;
        }
        else 
            return false;                
    }


	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view', 'search','captcha'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'statistics'),
				'users'=>array('admin'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','viewupdate', 'deletecharacter', 'deletefandom', 'deletegenre'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{  
	   $fanfic = $this->loadModel($id);
        $comment=$this->newComment($fanfic);
        $this->pageTitle = Yii::app()->name.' - '.$fanfic->title;
        $this->description = $fanfic->summary;
        if(Yii::app()->user->isGuest) $this->layout ='//layouts/column1';        
		$this->render('view',array(
			'model'=>$fanfic,
            'comment'=>$comment,
		));
	}
    /**
     * функция для добавления комментария к фанфику
     * @param $fanfic - модель для фанфика
     */
    protected function newComment($fanfic) {        
        $comment=new Comments;
        if(isset($_POST['Comments']))
        {
            $comment->attributes=$_POST['Comments'];
            if($fanfic->addComment($comment))
            {
                Yii::app()->user->setFlash('commentSubmitted','Комментарий добавлен');
                Yii::log('Комментарии к фанфикам. Комментарий номер '.$comment->commentId.' оставлен с IP-адреса '.$_SERVER['REMOTE_ADDR'],'comment_level');
                $this->refresh();            
            }
        }
        return $comment;
    }
    
    
    
    /**
     * Добавление к фанфику персонажей, фандомов и жанров 
     */
    
    public function actionViewupdate($id)
	{
	       if(isset($_POST['characterId'])) {
	           $charactersFanficsModel = new CharactersFanfics;
               $charactersFanficsModel->fanficId = $id;
               $charactersFanficsModel->characterId = $_POST['characterId'];
               $charactersFanficsModel->save();
	       }
           
           if(isset($_POST['fandomId'])) {
	           $fandomsFanficsModel = new FandomsFanfics;
               $fandomsFanficsModel->fanficId = $id;
               $fandomsFanficsModel->fandomId = $_POST['fandomId'];
               $fandomsFanficsModel->save();
	       }
           
           if(isset($_POST['genreId'])) {
	           $genreFanficModel = new GenreFanfic;
               $genreFanficModel->fanficId = $id;
               $genreFanficModel->genreId = $_POST['genreId'];
               $genreFanficModel->save();
	       }
        
        $this->pageTitle = Yii::app()->name.' - Добавление персонажей';   
		$this->render('viewupdate',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Fanf;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Fanf']))
		{
			$model->attributes=$_POST['Fanf'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ficId));
		}
        $this->pageTitle = Yii::app()->name.' - Новый текст';
		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Fanf']))
		{
			$model->attributes=$_POST['Fanf'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ficId));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
    /**
     * удаляет персонажей у определенного фанфика
     * @param integer $id  идентификатор связи "фанфик - персонаж"
     */
    public function actionDeletecharacter($id)
	{
        $characterFanfModel = CharactersFanfics::model()->findByPk($id);
        $idtext = $characterFanfModel->fanficId;
		$characterFanfModel->delete();

		// перенаправляем на страницу с текстом
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('view','id'=>$idtext));
	}
    
    /**
     * удаляет фандом у определенного фанфика
     * @param integer $id  идентификатор связи "фанфик - фандом"
     */
     
     public function actionDeleteFandom($id) 
     {
        $fandomFanfModel = FandomsFanfics::model()->findByPk($id);
        $idtext = $fandomFanfModel->fanficId;
		$fandomFanfModel->delete();

		// перенаправляем на страницу с текстом 
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('view','id'=>$idtext));
     }
     
     /**
     * удаляет жанр у определенного фанфика
     * @param integer $id  идентификатор связи "фанфик - жанр"
     */

    public function actionDeleteGenre($id) 
     {
        $genreFanfModel = GenreFanfic::model()->findByPk($id);
        $idtext = $genreFanfModel->fanficId;
		$genreFanfModel->delete();

		// перенаправляем на страницу с текстом
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('view','id'=>$idtext));
     }

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
        $criteria=new CDbCriteria(array('order'=>'dateWrite DESC'));	   
		$models = Fanf::model()->findAll($criteria);
		$dataProvider=new CActiveDataProvider('Fanf', array('criteria'=>array('order'=>'dateWrite DESC')));
        $this->pageTitle = Yii::app()->name.' - Тексты'; 
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'models'=>$models,
		));
	}
    
    /**
     * Вывод статистики по текстам
     */
    
    public function actionStatistics() {
        $this->pageTitle = Yii::app()->name.' - Статистика по текстам';        
        $stat = Fanf::statYear();        
        
        $this->render('statistics',array(
            'statArray'=>$stat,
        )); 
    } 

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Fanf('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Fanf']))
			$model->attributes=$_GET['Fanf'];
        
        $this->pageTitle = Yii::app()->name.' - Управление текстами';
		$this->render('admin',array(
			'model'=>$model,
		));
	}
    /**
     * Поиск текстов по различным параметрам
     */
    public function actionSearch()
	{
		$characters = AssidiHelper::getArrayFromRequest('characters');
		$fandoms = AssidiHelper::getArrayFromRequest('fandoms');
		$genres = AssidiHelper::getArrayFromRequest('genres');
        $model=new Fanf('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Fanf']))
			$model->attributes=$_GET['Fanf'];

        $requestFanf = Yii::app()->request->getParam('Fanf');
        if ($requestFanf['maxSize'] == 200) $requestFanf['maxSize'] = 2000;
        //Yii::app()->params['debug'] =   $requestFanf;
        $fandom = isset($fandoms[0]) ? $fandoms[0] : '';
        
        $this->pageTitle =Yii::app()->name.' - Поиск текстов'; 
        //Yii::app()->params['debug'] = $model;
		$this->render('special',array(
            'model' => $model,
			'character' => isset($characters[0]) ? $characters[0] : '',
			'characters' => Characters::getList($fandom),
			'fandom' =>  $fandom,
			'fandoms' => Fandoms::getList(),
			'genre' =>  isset($genres[0]) ? $genres[0] : '',
			'genres' => Genre::getList(),
            'minSize' => $requestFanf['minSize'],
            'maxSize' => $requestFanf['maxSize'],
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Fanf the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Fanf::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Fanf $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='fanf-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    public function actions(){
        return array(
            'captcha'=>array(
                'class'=>'CCaptchaAction',
            ),
        );
    }
}
