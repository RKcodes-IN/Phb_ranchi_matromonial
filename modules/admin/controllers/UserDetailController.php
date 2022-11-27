<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\User;
use app\modules\admin\forms\UserForm;
use app\modules\admin\models\UserDetail;
use app\modules\admin\models\search\UserDetailSearch;
use app\modules\admin\models\UserSibling;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserDetailController implements the CRUD actions for UserDetail model.
 */
class UserDetailController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'update-status', 'add-user-sibling', 'generate-pdf'],
                        'matchCallback' => function () {
                            return User::isAdmin() || User::isSubAdmin();
                        }

                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'update', 'pdf', 'update-status', 'generate-pdf'],
                        'matchCallback' => function () {
                            return User::isManager();
                        }
                    ],
                    [
                        'allow' => false
                    ]
                ]
            ]
        ];
    }

    /**
     * Lists all UserDetail models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserDetailSearch();
        if (\Yii::$app->user->identity->user_role == User::ROLE_ADMIN || \Yii::$app->user->identity->user_role == User::ROLE_SUBADMIN) {
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        } else if (\Yii::$app->user->identity->user_role == User::ROLE_MANAGER) {
            $dataProvider = $searchModel->managersearch(Yii::$app->request->queryParams);
        }
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UserDetail model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        $providerUserSibling = new \yii\data\ArrayDataProvider([
            'allModels' => $model->userSiblings,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($id),
            'providerUserSibling' => $providerUserSibling,
        ]);
    }

    /**
     * Creates a new UserDetail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UserDetail();
        $user = new UserForm();
        $post = Yii::$app->request->post();
        $user->on(User::EVENT_BEFORE_INSERT, [$user, 'generateAuthKey']);

        if ($model->load(Yii::$app->request->post()) && $user->load(Yii::$app->request->post())) {
            if ($model->validate() && $user->validate()) {
                $user->user_role = User::ROLE_USER;

                if ($user->save(false)) {
                    $model->user_id = $user->id;
                    $upload_image = \yii\web\UploadedFile::getInstance($model, 'profile_image');
                    if (empty($upload_image) || $upload_image == Null) {
                        $model->profile_image = "";
                    } else {
                        $image = Yii::$app->notification->imageKitUpload($upload_image);
                        // print_r($image['url']);exit;

                        $model->profile_image = $image['url'];
                    }

                    if ($model->save()) {

                        $userSiblings = Yii::$app->request->post('UserSibling');
                        // var_dump($userSiblings);exit;
                        if (!empty($userSiblings)) {
                            foreach ($userSiblings as $userSibling) {
                                $userSib = new UserSibling();


                                $userSib->user_id = $user->id;
                                $userSib->sibling_type_id = $userSibling['sibling_type_id'];
                                $userSib->user_detail_id = $model->id;

                                $userSib->name = $userSibling['name'];
                                $userSib->age = $userSibling['age'];
                                $userSib->education_qulification = $userSibling['education_qulification'];
                                $userSib->married = $userSibling['married'];
                                $userSib->occupation = $userSibling['occupation'];
                                if ($userSib->save(false)) {
                                    print_r("data saved");
                                } else {
                                    print_r("bot saved");
                                }
                            }
                        }
                        return $this->redirect(['view', 'id' => $model->id]);
                    } else {
                        $user = User::find()->where(['id' => $user->id])->one();

                        $user->delete();
                        // throw new NotFoundHttpException(Yii::t('app', $model->getErrors()));
                        return $this->render('create', [
                            'model' => $model,
                            'user' => $user,
                        ]);
                    }
                } else {

                    //  throw new NotFoundHttpException(Yii::t('app', ""));
                    return $this->render('create', [
                        'model' => $model,
                        'user' => $user,
                    ]);
                    // print_r($user->getErrors());
                    // exit;
                }
            } else {
                // print_r($user->getErrors());
                return $this->render('create', [
                    'model' => $model,
                    'user' => $user,
                ]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'user' => $user,
            ]);
        }
    }

    /**
     * Updates an existing UserDetail model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $user = User::find()->where(['id' => $model->user_id])->one();
        if (empty($userSigblings)) {
            $userSigblings = new UserSibling();
        }
        $oldImage = $model['profile_image'];
        if ($user->load(Yii::$app->request->post())) {

            if ($user->save(false)) {
                $model->load(Yii::$app->request->post());


                $upload_image = \yii\web\UploadedFile::getInstance($model, 'profile_image');
                if (!empty($upload_image)) {


                    $image = Yii::$app->notification->imageKitUpload($upload_image);

                    $model->profile_image = $image['url'];
                } else {
                    $model->profile_image = $oldImage;
                }

                if ($model->save(false)) {
                    if ($model->status == UserDetail::STATUS_INACTIVE) {
                        $user->status = User::STATUS_BLOCKED;
                        $user->save(false);
                    } else if ($model->status == UserDetail::STATUS_ACTIVE) {
                        $user->status = User::STATUS_ACTIVE;
                        $user->save(false);
                    }
                    $userSiblings =  Yii::$app->request->post('UserSibling');
                    if (!empty($userSiblings)) {
                        foreach ($userSiblings as $userSibling) {
                            $userSigblingsold = UserSibling::find()->where(['id' => $userSibling['id']])->one();
                            if (empty($userSibling['id'])) {
                                $userSigblingsold = new UserSibling();
                                $userSigblingsold->user_id = $user->id;
                                $userSigblingsold->user_detail_id  = $model->id;
                                $userSigblingsold->sibling_type_id   = $userSibling['sibling_type_id'];
                                $userSigblingsold->name   = $userSibling['name'];
                                $userSigblingsold->age   = $userSibling['age'];
                                $userSigblingsold->education_qulification   = $userSibling['education_qulification'];
                                $userSigblingsold->married   = $userSibling['married'];
                                $userSigblingsold->occupation   = $userSibling['occupation'];
                            } else {
                                if ($userSigblingsold->id == $userSibling['id']) {

                                    $userSigblingsold->user_id = $user->id;
                                    $userSigblingsold->user_detail_id  = $model->id;
                                    $userSigblingsold->sibling_type_id   = $userSibling['sibling_type_id'];
                                    $userSigblingsold->name   = $userSibling['name'];
                                    $userSigblingsold->age   = $userSibling['age'];
                                    $userSigblingsold->education_qulification   = $userSibling['education_qulification'];
                                    $userSigblingsold->married   = $userSibling['married'];
                                    $userSigblingsold->occupation   = $userSibling['occupation'];
                                }
                            }
                            $userSigblingsold->save(false);
                        }
                    }
                }
            } else {
                print_r('Not Updated');
            }

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'user' => $user,
            ]);
        }
    }

    /**
     * Deletes an existing UserDetail model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {

        $model = $this->findModel($id);
        if (!empty($model)) {
            $model->status = UserDetail::STATUS_DELETE;
            $model->save(false);
        }

        return $this->redirect(['index']);
    }

    public function actionUpdateStatus()
    {
        $data = [];
        $post = \Yii::$app->request->post();
        \Yii::$app->response->format = 'json';
        if (!empty($post['id'])) {
            $model = UserDetail::find()->where([
                'id' => $post['id'],
            ])->one();
            if (!empty($model)) {

                $model->status = $post['val'];
            }
            if ($model->save(false)) {
                $data['message'] = "Updated";
                $data['id'] = $model->status;
            } else {
                $data['message'] = "Not Updated";
            }
        }
        return $data;
    }


    /**
     * Finds the UserDetail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserDetail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserDetail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }

    /**
     * Action to load a tabular form grid
     * for UserSibling
     * @author Yohanes Candrajaya <moo.tensai@gmail.com>
     * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
     *
     * @return mixed
     */
    public function actionAddUserSibling()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('UserSibling');
            if (!empty($row)) {
                $row = array_values($row);
            }
            if ((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formUserSibling', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }

    public function actionGeneratePdf()
    {
        $content = $this->renderPartial('profile-pdf');
    
        // setup kartik\mpdf\Pdf component
        $pdf = new Pdf([
            // set to use core fonts only
            'mode' => Pdf::MODE_CORE, 
            // A4 paper format
            'format' => Pdf::FORMAT_A4, 
            // portrait orientation
            'orientation' => Pdf::ORIENT_PORTRAIT, 
            // stream to browser inline
            'destination' => Pdf::DEST_BROWSER, 
            // your html content input
            'content' => $content,  
            // format content from your own css file if needed or use the
            // enhanced bootstrap css built by Krajee for mPDF formatting 
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            // any css to be embedded if required
            'cssInline' => '.kv-heading-1{font-size:18px}', 
             // set mPDF properties on the fly
            'options' => ['title' => 'Krajee Report Title'],
             // call mPDF methods on the fly
            'methods' => [ 
                'SetHeader'=>['Krajee Report Header'], 
                'SetFooter'=>['{PAGENO}'],
            ]
        ]);
        
        // return the pdf output as per the destination setting
        return $pdf->render(); 
    }
        
    }
}
