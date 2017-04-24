<?php

namespace backend\controllers;

use Yii;
use common\models\Sanpham;
use backend\models\SanphamSearch;
use common\models\Slug;
use backend\modules\posts\models\PostRelationships;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SanphamController implements the CRUD actions for Sanpham model.
 */
class SanphamController extends BackendController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Sanpham models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SanphamSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Sanpham model.
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
     * Creates a new Sanpham model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Sanpham();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                Slug::create($model->id,$model->tableName(),$model->title);
                $this->createPosts($model,TRUE,TRUE,FALSE);
                return $this->redirect(['update', 'id' => $model->id]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Sanpham model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->getSeoPost();
        $model->slug = $model->getSlug();
        if ($model->load(Yii::$app->request->post())) {
            PostRelationships::deleteAll(['post_id' => $model->id, 'post_table' => $model->tableName()]);
            $this->createPosts($model,TRUE,TRUE,FALSE);
            Slug::create($model->id,$model->tableName(),$model->slug,false);
            $model->save();
            return $this->redirect(['update', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Sanpham model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Sanpham model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Sanpham the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Sanpham::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
