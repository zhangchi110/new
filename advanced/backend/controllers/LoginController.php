<?php 
	namespace backend\controllers;
	use yii;
	use yii\web\Controller;
	use yii\web\Cookie;
	use backend\models\Admin;
	// use common\controllers\CommonController;
	class LoginController extends Controller
	{
		public $enableCsrfValidation = false;
		public function actions()
	    {
	      return [
	            'captcha' => [
	                'class' => 'yii\captcha\CaptchaAction',
	                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
	            ],
	        ];
	    }

		public function actionIndex(){
			$model  = new Admin();
			$cookie = Yii::$app->request->cookies;
			$user = $cookie->getValue('user');
			// echo $user;die;
			if($user){
				// echo 1;die;
				echo "<script>alert('登录成功');location.href='http://localhost/twelfth/advanced/backend/web/index.php?r=admin/list';</script>";
			}else{
				// echo 2;die;

				return $this->render('login',['model'=>$model]);
			}
		}

		public function actionLogin(){
			$post = Yii::$app->request->post();
			// print_r($post);die;
			if(Yii::$app->request->isPost){
				$sql = "select * from admin where username='".$post['username']."' and password='".$post['password']."' ";
				$res = Yii::$app->db->createCommand($sql)->queryOne();
				if($res){
					$cookies = Yii::$app->response->cookies;
					// print_r($res);die;
					$id = $res['id'];
					$cookie_data = ['name'=>'user','value'=>$id];
					$cookies->add(new Cookie($cookie_data));
					$this->redirect('?r=login/index');
				}
			}
		}

		//返回登录
		public function actionReturn(){
			$model = new Admin();
			return $this->render('login',['model'=>$model]);
		}
	}