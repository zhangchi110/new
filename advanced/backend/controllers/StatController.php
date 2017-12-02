<?php 
	namespace backend\controllers;
	use yii;
	use yii\web\Controller;
	class StatController extends Controller{
		//关闭csrf验证
		public $enableCsrfValidation = false;
		public function actionIndex(){
			$sql = "select * from new";
			$data = Yii::$app->db->createCommand($sql)->queryAll();
			return $this->render('index',['data'=>$data]);
			
		}

	}
 ?>