<?php

class AdminController extends Controller
{

	public $layout='//layouts/main';

	public function actionIndex()
	{
		$this->render('index');
	}


	public function actionInicio(){

      /* soria/index.php/contenido/update/1 */
	   $model=Contenido::model()->findByPk(1);
	   //print_r($model);
       $this->render('inicio',array('model'=>$model));
	}


	public function actionNosotros(){

       $model=Contenido::model()->findByPk(2);
	   //print_r($model);
       $this->render('nosotros',array('model'=>$model));

	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}