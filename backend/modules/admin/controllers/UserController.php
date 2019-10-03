<?php

namespace backend\modules\admin\controllers;

use Yii;
use common\models\User;
use common\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller {

    /**
     * {@inheritdoc}
     */
    public function behaviors() {
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new User();
        $model->scenario = 'create';

        if ($model->load(Yii::$app->request->post())) {
            if ($model->isNewRecord):
                $model->password_hash = Yii::$app->security->generatePasswordHash($model->password_hash);
            endif;

            if ($model->validate() && $model->save())
                return $this->redirect(['index']);
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $model->scenario = 'update';

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionChangePassword($data) {

        $model = $this->findModel($data);
        if (Yii::$app->request->post()) {

            if (Yii::$app->getSecurity()->validatePassword(Yii::$app->request->post('old-password'), $model->password_hash)) {

                if (Yii::$app->request->post('new-password') == Yii::$app->request->post('confirm-password')) {

                    Yii::$app->getSession()->setFlash('success', 'password changed successfully');
                    $model->password_hash = Yii::$app->security->generatePasswordHash(Yii::$app->request->post('confirm-password'));
                    $model->update();
                    return $this->redirect(Yii::$app->request->referrer);
                } else {
                    Yii::$app->getSession()->setFlash('error', 'password mismatch');
                }
            } else {

                Yii::$app->getSession()->setFlash('error', 'incorrect old password');
            }
        }
        return $this->render('new-password', [
                    'model' => $model,
        ]);
    }

}
