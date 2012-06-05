<?php

class SubCategoryController extends Controller
{
    private $_category = null;
    
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
            'categoryContext + create index admin', // check to ensure valid category context
		);
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
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
        $mediaProvider = new CActiveDataProvider('Media', array(
            'criteria' => array(
                'condition' => 'sub_category_id=:subCategoryID',
                'params' => array(':subCategoryID' => $id),
            )
        ));
		$this->render('view',array(
			'model'=>$this->loadModel($id),
            'mediaProvider'=>$mediaProvider,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new SubCategory;
        $model->parent_id = $this->_category->id;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['SubCategory']))
		{
			$model->attributes=$_POST['SubCategory'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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

		if(isset($_POST['SubCategory']))
		{
			$model->attributes=$_POST['SubCategory'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('SubCategory');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new SubCategory('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['SubCategory']))
			$model->attributes=$_GET['SubCategory'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=SubCategory::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
        
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='sub-category-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    
    protected function loadCategory($category_id)
    {
        // if the category property is null, create it based on input id
        if ( $this->_category === null )
        {
            $this->_category = Category::model()->findByPk($category_id);
            if ( $this->_category === null )
            {
                throw new CHttpException(404, 'The requested category does not exist.');
            }
        }
        
        return $this->_category;
    }
    
    public function filterCategoryContext($filterChain)
    {
        // set the grant identifier based on either the GET or POST input
        // request variables, since we allow both types for our actions
        $categoryID = null;
        if ( isset($_GET['gid']) )
        {
            $categoryID = $_GET['gid'];
        }
        else if ( isset($_POST['gid']) )
        {
            $categoryID = $_POST['gid'];
        }
        
        $this->loadCategory($categoryID);
        
        // complete the running of other filters and execute the requested action
        $filterChain->run();
    }
}
