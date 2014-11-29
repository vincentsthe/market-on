<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\api\BestApp;
use app\models\db\User;
use app\models\forms\LoginForm;
use app\models\forms\ContactForm;
use app\models\db\Category;
use app\models\db\Item;
class SiteController extends Controller
{
    public $home = false;
    public $login_form;

    public $defaultAction = 'home';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

/*
    public function actionIndex()
    {
        return $this->render('index');
    }*/

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->redirect('home');
        }

        $this->login_form = new LoginForm();
        if ($this->login_form->load(Yii::$app->request->post()) && $this->login_form->login()) {
            return $this->goBack();
        } else {
            return $this->redirect('home');
        }
    }

    public function actionHome() {
        $this->home = true;
        $this->login_form = new LoginForm();

        if(Yii::$app->request->isPost) {
            Yii::$app->response->format = 'json';
            $return = [];

            $listToko = User::getAllSeller();
            foreach ($listToko as $toko) {
                $record = [];
                $record['name'] = $toko->fullname;
                $record['latitude'] = $toko->lat;
                $record['longitude'] = $toko->lng;
                $record['url'] = Yii::$app->urlManager->createUrl(['/user/view', 'id'=>$toko->id]);
                $record['category'] = $toko->category->name;

                $return[] = $record;
            }

            return $return;
        }

        return $this->render('home',['items' => Item::find()->limit(9)->all()]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionTestoken() {
        BestApp::getToken();
    }
}
