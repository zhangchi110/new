<?php 
	namespace frontend\controllers;
	use yii;
	use yii\web\Controller;
	use yii\web\Cookie;
	use frontend\models\User;
	class LoginController extends Controller
	{
		public function actions()
	    {
	      return [
	            'captcha' => [
	                'class' => 'yii\captcha\CaptchaAction',
	                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
	            ],
	        ];
	    }
		public $enableCsrfValidation = false;

		public function actionIndex(){
			$cookie = Yii::$app->request->cookies;
			$user = $cookie->getValue('user');
			if($user){
				echo "<script>alert('登录成功');location.href='http://localhost/twelfth/advanced/frontend/web/index.php?r=new/index';</script>";
			}else{
				return $this->renderPartial('login');
			}
		}

		public function actionLogin(){
			$post = Yii::$app->request->post();
			// print_r($post);die;
			$sql = "select * from user where username='".$post['username']."' and password='".$post['password']."' ";
			$res = Yii::$app->db->createCommand($sql)->queryOne();
			if($res){
				$cookies = Yii::$app->response->cookies;
				$id = $res['uid'];
				$cookie_data = ['name'=>'user','value'=>$id];
				$cookies->add(new Cookie($cookie_data));
				$this->redirect('?r=login/index');
			}
			return $this->render('login');
		}

		//注册
		public function actionRegister(){
			$model = new User();
			$post = Yii::$app->request->post();
			if(Yii::$app->request->isPost)
			{
				$sql = "insert into user(username,password,email) values('".$post['username']."','".$post['password']."','".$post['email']."')";
				$res = Yii::$app->db->createCommand($sql)->execute();
				if($res){
					echo "<script>alert('注册成功');location.href='http://localhost/twelfth/advanced/frontend/web/index.php?r=login/index'</script>";
				}
			}
			return $this->render('register',['model'=>$model]);
		}
	}