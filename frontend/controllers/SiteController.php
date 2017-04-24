<?php
namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\db\ActiveRecord;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use backend\modules\posts\models\Posts;
use backend\modules\posts\models\Category;
use \backend\modules\posts\models\PostRelationships;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
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

    /**
     * @inheritdoc
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
     * @return mixed
     */
    public function actionIndex()
    {
        $List_TinYKhoa     = $this->getPostLimitByCategory(25,6);
        $List_Tintuc_Big   = $this->getPostLimitByCategory(5,1);
        $List_Tintuc_Small = $this->getPostLimitByCategory(5,3,1);
        $List_ChuyenGia    = $this->getPostLimitByCategory(28,2);
        $List_NhanXet      = $this->getPostLimitByCategory(29,4);
        $List_Slider       = $this->getPostLimitByCategory(27,6);
        return $this->render('index',[
            'List_Slider'       => $List_Slider,
            'List_TinYKhoa'     => $List_TinYKhoa,
            'List_TinTuc_Big'   => $List_Tintuc_Big,
            'List_TinTuc_Small' => $List_Tintuc_Small,
            'List_ChuyenGia'    => $List_ChuyenGia,
            'List_NhanXet'      => $List_NhanXet,
        ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays ThongTinSanPham page.
     *
     * @return mixed
     */
    public function actionThongTinSanPham()
    {
        $List_Tintuc   = $this->getPostLimitByCategory(5,5);
        $post = $this->getPostLimitByCategory(31,3);
        return $this->render('thong-tin-san-pham',[
            'thongtin' => $post,
            'title' => 'Thông tin sản phẩm',
            'List_Tintuc' => $List_Tintuc
        ]);
    }

    /**
     * Displays NovasolCurcumin page.
     *
     * @return mixed
     */
    public function actionNovasolCurcumin()
    {
        $post = $this->getPostLimitByCategory(32,3);
        $List_Tintuc   = $this->getPostLimitByCategory(5,5);
        return $this->render('novasol-curcumin',[
            'thongtin' => $post,
            'title' => 'Novasol Curcumin',
            'List_Tintuc' => $List_Tintuc
        ]);
    }

    /**
     * Displays NovasolCurcumin page.
     *
     * @return mixed
     */
    public function actionLienHe()
    {
        $List_Tintuc   = $this->getPostLimitByCategory(5,5);
        return $this->render('lien-he',[
            'title' => 'Liên hệ',
            'List_Tintuc' => $List_Tintuc
        ]);
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        self::create("anhtrieunhu@gmail.com","demo","tesst d");
        die('e');
        return $this->render('about');
    }
    public static function create($emailTo, $subject, $content, $layout = 'layouts/html') {
        $emailSend = Yii::$app->mailer->compose(['html' => $layout], ['content' => $content])
                ->setFrom(["m5.hotro@gmail.com"=>"Hỗ trợ M5"])
                ->setTo($emailTo)
                ->setSubject($subject);
        $emailSend->send();
    }
    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
    /**
     * Lấy dữ liệu bài viết theo category
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function getPostLimitByCategory($category_id,$limit = '-1',$offset = 0)
    {
        $query = Posts::find()
        ->where(['type'=>'post'])
        ->orderBy(['id'=>SORT_DESC])
        ->innerJoin('post_relationships','post_relationships.post_id = id')
        ->where([
                'post_relationships.post_table' => 'posts',
                'post_relationships.table_id'   => $category_id,
                'post_relationships.table_name' => 'category'
            ])
        ->offset($offset)
        ->limit($limit)
        ->all();
        return $query;
    }
}