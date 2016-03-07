<?php

namespace backend\controllers;

use backend\widget\ObjectFields\ObjectFieldsWidget;
use common\models\Category;
use common\models\ObjectsImg;
use Imagine\Image\Box;
use Yii;
use common\models\Objects;
use backend\models\ObjectsSearch;
use yii\filters\AccessControl;
use yii\imagine\Image;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\Response;
use yii\web\UploadedFile;

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
                        'actions' => [
                            'index',
                            'create',
                            'view',
                            'update',
                            'delete',
                            'change-fields',
                            'delete-file',
                        ],
                        'allow' => true,
                        'roles' => ['@']
                    ],
                ]
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                    'delete-file' => ['post'],
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
        $categories = ArrayHelper::map(Category::find()->where(['parent' => 0])->all(),
            'id', 'title');
        $categories[''] = 'Все';

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
        $this->setScenarious($model, 1);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('update?id='.Yii::$app->db->lastInsertID);
        } else {
            return $this->render('create', [
                'model' => $model
            ]);
        }
    }

    /**
     * Updates an existing Objects model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id){
        $model = $this->findModel($id);
        $this->setScenarious($model, $model->category);
        $this->upload($id);

        if($model->load(Yii::$app->request->post()) && $model->save()){
            return $this->redirect('index');
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    public function upload($id){
        if(Yii::$app->request->isPost){
            $model = new ObjectsImg();
            $model->setScenario('upload');

            $model->imgs = UploadedFile::getInstances($model, 'imgs');

            if($model->imgs && $model->validate()){
                if(!file_exists('../../frontend/web/upload/'.$id)){
                    mkdir('../../frontend/web/upload/'.$id);
                }
                foreach($model->imgs as $file){
                    $name = uniqid().'.'.$file->extension;
                    $file->saveAs('../../frontend/web/upload/'.$id.'/'.$name);
                    Image::frame('../../frontend/web/upload/'.$id.'/'.$name)
                         ->resize(new Box(190, 140))
                         ->save('../../frontend/web/upload/'.$id.'/t_'.$name);

                    $objImg = new ObjectsImg();
                    $objImg->attributes = [
                        'objId' => $id,
                        'img' => $name
                    ];
                    $objImg->save();
                }
            }
        }
    }

    public function actionDeleteFile(){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $id = Yii::$app->request->post('id');
        $name = Yii::$app->request->post('name');

        return ObjectsImg::deleteImg($id, $name);
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
        ObjectsImg::deleteAllImg($id);

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

    private function setScenarious(Objects $model, $id = null){
        $name = 'default';
        $scenario = null;

        if(Yii::$app->request->isPost){
            var_dump(Yii::$app->request->post('Objects')['category']);
            $scenario = Category::findOne(Yii::$app->request->post('Objects')['category']);
        } else if(!empty($id)){
            $scenario = Category::findOne($id);
        }

        if(isset($scenario->scenarious) && !empty($scenario->scenarious)){
            $name = $scenario->scenarious;
        }

        $model->setScenario($name);
    }
}
