<?php

namespace backend\controllers;

use backend\widget\ObjectFields\ObjectFieldsWidget;
use common\models\Category;
use Yii;
use common\models\Objects;
use backend\models\ObjectsSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Response;

/**
 * ObjectsController implements the CRUD actions for Objects model.
 */
class ObjectsController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'create', 'view', 'update', 'delete', 'change-fields'],
                        'allow' => true,
                        'roles' => ['@']
                    ],
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Objects models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ObjectsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $categories = ArrayHelper::map(Category::find()->indexBy('id')->all(),
            'id', 'title');

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'categories' => $categories,
        ]);
    }

    /**
     * Displays a single Objects model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Objects model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Objects();
        if(Yii::$app->request->isPost){
            $scenario = Category::findOne(Yii::$app->request->post('Objects')['category']);
            if(isset($scenario->scenarious) && !empty($scenario->scenarious)){
                $model->setScenario($scenario->scenarious);
            }
        } else{
            $model->setScenario('motoblock');
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('index');
        } else {
            $categories = ArrayHelper::map(Category::find()->indexBy('id')->all(),
                'id', 'title');

            return $this->render('create', [
                'model' => $model,
                'categories' => $categories,
            ]);
        }
    }

    /**
     * Updates an existing Objects model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('index');
        } else {
            $categories = ArrayHelper::map(Category::find()->indexBy('id')->all(),
                'id', 'title');
            return $this->render('update', [
                'model' => $model,
                'categories' => $categories,
            ]);
        }
    }

    /**
     * Deletes an existing Objects model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionChangeFields($id){
        if(Yii::$app->request->isAjax){
            $this->layout = false;
            $scenario = Category::findOne($id);

            if(isset($scenario->scenarious) && !empty($scenario->scenarious)){
                $scenario = $scenario->scenarious;
            } else{
                $scenario = 'default';
            }

            return ObjectFieldsWidget::widget([
                'scenario' => $scenario
            ]);
        }

        throw new NotFoundHttpException();
    }

    /**
     * Finds the Objects model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Objects the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Objects::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
