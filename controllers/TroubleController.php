<?php

namespace app\controllers;

use app\extensions\Access;
use app\models\LoginForm;
use app\models\User;
use Yii;
use app\models\Trouble;
use app\models\TroubleSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TroubleController implements the CRUD actions for Trouble model.
 */
class TroubleController extends Controller
{
    /**
     * {@inheritdoc}
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
	        'access' =>  [
		        'class' => AccessControl::className(),
//		        'only' => ['index', 'update', 'create', 'delete', 'update'],
		        'denyCallback' => function($rule, $action){
			        throw new ForbiddenHttpException('Доступ запрещён!');
		        },
		        'rules' => [
			        [    //разрешаем доступ модулю trouble просмотру списка аварий только зарегистрированным пользователям
				        'allow' => true,
				        'actions' => ['index'],
				        'roles' => ['@']
			        ],
			        [   //разрешаем админу всё, кроме удаления
				        'allow' => true,
				        'actions' => ['create', 'view', 'update'],
				        'matchCallback' => function($rule, $action){
					        return Access::checkAccess([User::ROLE_ADMIN]);
				        }
			        ],
			        [   //запрещаем доступ к созданию аварий для операторов и исполнителей
			        	'allow' => false,
				        'actions' => ['create', 'delete'],
				        'matchCallback' => function($rule, $action){
					        return Access::checkAccess([User::ROLE_OPERATOR, User::ROLE_EXECUTOR]);
				        }
			        ],
			        [   //разрешаем доступ к созданию аварий только наблюдателю
				        'allow' => true,
				        'actions' => ['create', 'view', 'update'],
				        'matchCallback' => function($rule, $action){
					        return Access::checkAccess([User::ROLE_OBSERVER]);
				        }
			        ],
			        [   //разрешаем доступ к просмотру аварии для операторов и исполнителей
				        'allow' => true,
				        'actions' => ['view'],
				        'matchCallback' => function($rule, $action){
					        return Access::checkAccess([User::ROLE_OPERATOR, User::ROLE_EXECUTOR]);
				        }
			        ]
		        ]
	        ],
        ];
    }

    /**
     * Lists all Trouble models.
     * @return mixed
     */
	public function actionIndex()
	{
		$searchModel = new TroubleSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);

		$damageStages = Trouble::getTroubleStages();

		return $this->render('index', compact('searchModel', 'dataProvider', 'damageStages'));
	}

    /**
     * Displays a single Trouble model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Trouble model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Trouble();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Trouble model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Trouble model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Trouble model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Trouble the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Trouble::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
