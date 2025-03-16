<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\Card;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
{
    return [
        'access' => [
            'class' => AccessControl::class,
            'except' => ['login', 'error'], // A login és error akciókhoz mindenki hozzáférhet.
            'rules' => [
                [
                    'actions' => ['new-card', 'cards', 'logout', 'index', 'view-card'], // A new-card és cards akciókhoz csak bejelentkezett felhasználók férhetnek hozzá.
                    'allow' => true,
                    'roles' => ['@'],
                ],
            ],
        ],
        'verbs' => [
            'class' => VerbFilter::class,
            'actions' => [
                'logout' => ['post'],
            ],
        ],
    ];
}


    /**
     * {@inheritdoc}
     */
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

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $totalCards = Card::find()->count();
        $kepzesSzintek = ['bsc', 'msc', 'foszk', 'tanari'];
        $cardCounts = [];
        foreach ($kepzesSzintek as $kepzesSzint) {
            $cardCounts[$kepzesSzint] = Card::find()->where(['kepzes_szint' => $kepzesSzint])->count();
        }

        // Visszatérés a nézettel és továbbítása a számolt rekordok számával
        return $this->render('index', [
            'totalCards' => $totalCards,
            'cardCounts' => $cardCounts,
        ]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionNewCard()
    {
        $model = new Card();
        
        if ($model->load(Yii::$app->request->post())) {
            $adminUsername = Yii::$app->user->identity->username;
            
            $model->adminuser = $adminUsername;
            
            // A kártya mentése az adatbázisba
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'A kártya sikeresen létrejött.');
                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'A kártya létrehozása sikertelen volt.');
            }
        }

        return $this->render('new-card', [
            'model' => $model,
        ]);
    }

    public function actionCards()
    {
        $cards = Card::find()->orderBy(['id' => SORT_DESC])->all();

        if (Yii::$app->request->post('delete_id')) {
            $id = Yii::$app->request->post('delete_id');
            $card = Card::findOne($id);
            if ($card) {
                $card->delete();
                Yii::$app->session->setFlash('success', 'A kártya sikeresen törölve lett.');
                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('error', 'A kártya törlése nem sikerült.');
            }
        }

        return $this->render('cards', [
            'cards' => $cards,
        ]);
    }

    public function actionViewCard($id)
    {
        $card = Card::findOne($id);
        if (!$card) {
            throw new \yii\web\NotFoundHttpException('The requested page does not exist.');
        }
    
        if (Yii::$app->request->isPost) {
            $card->load(Yii::$app->request->post());
            if ($card->save()) {
                return $this->redirect(['view-card', 'id' => $card->id]);
            }
        }
    
        return $this->render('view-card', [
            'card' => $card,
        ]);
    }
    
}
