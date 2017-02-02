<?php

class FandomsController extends Controller
{
    public function accessRules()
    {
        return array(
            array('allow',  // allow all users to perform 'index' and 'view' actions
                'actions'=>array('view'),
                'users'=>array('*'),
            ),
        );
    }
    
    public function actionView($id)
    {
        $this->render('view',array(
            'fandom'=>Fandoms::model()->findByPk($id),
            'fanfs'=>Fanf::speacialSearch(array(), array($id), array()),
        ));
    }
}
