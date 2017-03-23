<?php

class FanfController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
         if(Yii::app()->user->isGuest) $this->layout ='//layouts/mylayout';
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
				'actions'=>array('create','update'),
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
        //Yii::app()->params['debug'] = $fanfic;
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
		$characterFanfModel->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
    
    /**
     * удаляет фандом у определенного фанфика
     * @param integer $id  идентификатор связи "фанфик - фандом"
     */
     
     public function actionDeleteFandom($id) 
     {
        $fandomFanfModel = FandomsFanfics::model()->findByPk($id);
		$fandomFanfModel->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
     }
     
     /**
     * удаляет жанр у определенного фанфика
     * @param integer $id  идентификатор связи "фанфик - жанр"
     */

    public function actionDeleteGenre($id) 
     {
        $fandomFanfModel = GenreFanfic::model()->findByPk($id);
		$fandomFanfModel->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
     }

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
        $criteria=new CDbCriteria(array('order'=>'dateWrite DESC'));	   
		$models = Fanf::model()->findAll($criteria);
		$dataProvider=new CActiveDataProvider('Fanf', array('criteria'=>array('order'=>'dateWrite DESC')));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'models'=>$models,
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

		$this->render('admin',array(
			'model'=>$model,
		));
	}
    
    public function actionSearch()
	{
		$characters = AssidiHelper::getArrayFromRequest('characters');
		$fandoms = AssidiHelper::getArrayFromRequest('fandoms');
		$genres = AssidiHelper::getArrayFromRequest('genres');
		$models = Fanf::speacialSearch($characters, $fandoms, $genres);

		$this->render('special',array(
			'models' => $models,
			'character' => isset($characters[0]) ? $characters[0] : '',
			'characters' => Characters::getList(),
			'fandom' =>  isset($fandoms[0]) ? $fandoms[0] : '',
			'fandoms' => Fandoms::getList(),
			'genre' =>  isset($genres[0]) ? $genres[0] : '',
			'genres' => Genre::getList(),
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
