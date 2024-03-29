<?
namespace app\controllers;
use app\models\LoginForm;
use app\models\SignupForm;
use app\models\User;
use yii\web\Controller;
use yii;

class  AuthController extends Controller
{
//    /**
//     * Login action.
//     *
//     * @return Response|string
//     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

//        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLoginVk($uid,$first_name,$photo)
    {
        $user=new User();
       if($user->saveFromVk($uid,$first_name,$photo))
        {
           return $this->redirect(['site/index']);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionSignup()
    {
        $model=new SignupForm();
        if(Yii::$app->request->isPost){
            $model->load(Yii::$app->request->post());
            if ($model->signup())
            {
                return $this->redirect(['auth/login']);
            }
        }
        return $this->render('signup',['model'=>$model]);
    }

    public function actionTest()
    {
        $user=User::findOne(1);
        Yii::$app->user->logout();
        if (yii::$app->user->isGuest) {
            echo 'Im a guest';
        }else{
            echo 'Im a registered person';
        }
        die();
    }
}