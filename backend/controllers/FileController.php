<?php
/**
 * Created by PhpStorm.
 * User: CrazyBobik
 * Date: 22.02.2016
 * Time: 21:22
 */

namespace backend\controllers;


use backend\models\FileModel;
use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;
use yii\web\UploadedFile;

class FileController extends Controller{
    public function behaviors(){
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['all-img', 'gallery-img', 'upload', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ]
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'upload' => ['post'],
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function actionAllImg(){
        $this->layout = false;

        $allFiles = glob('../../frontend/web/upload/*');
        return $this->render('all-file', ['all' => $allFiles]);
    }

    public function actionGalleryImg(){
        $allFiles = glob('../../frontend/web/upload/*');
        return $this->render('gallery', ['all' => $allFiles]);
    }

    public function actionUpload(){
        $this->layout = false;
        Yii::$app->response->format = Response::FORMAT_JSON;
        $model = new FileModel();

        if(Yii::$app->request->isPost){
            $model->file = UploadedFile::getInstance($model, 'file');

            if($model->file && $model->validate()){
                $model->file->saveAs('../../frontend/web/upload/'.uniqid().'.'.$model->file->extension);
                return [
                    'error' => false,
                    'mess' => 'Файл загружен',
                    'callback' => 'function callback(){loadAllFiles();}'
                ];
            }
        }

        return [
            'error' => true,
            'mess' => 'Загрузка не удалась'
        ];
    }

    public function actionDelete($name = null){
        Yii::$app->response->format = Response::FORMAT_JSON;
        $name = Yii::$app->request->post('name');
        if(is_file('../../frontend/web/upload/'.$name)){
            return unlink('../../frontend/web/upload/'.$name);
        }

        return false;
    }
}