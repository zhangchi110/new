<?php 

	namespace frontend\controllers;
	use yii;
	use yii\web\Controller;
	ini_set("error_reporting","E_ALL & ~E_NOTICE");
	class NewController extends Controller{
		public function actionIndex(){
			//分类ID所对应的数据
			$id = Yii::$app->request->get('id');
			//查询全部分类
			$sql = "select * from new_class";
			$data = Yii::$app->db->createCommand($sql)->queryAll();

			//查询点击量前五轮播图
			$sql1 = "select * from carr";
			$data1 = Yii::$app->db->createCommand($sql1)->queryAll();

			//查询点击量升序后的所有数据
			if($id){
				$sql2 = "select * from new where new_fid=$id order by new_click desc";
				$data2 = Yii::$app->db->createCommand($sql2)->queryAll();
			}else{
				$sql2 = "select f.f_name,n.* from new as n left join new_class as f on n.new_fid=f.fid GROUP BY f.f_name order by new_click desc";
				$data2 = Yii::$app->db->createCommand($sql2)->queryAll();
			}
			// print_r($data2);die;
			return $this->render('index',['data'=>$data,'data1'=>$data1,'data2'=>$data2]);
		}

		//新闻详情
		public function actionPart(){
			//增加点击量
			$id = Yii::$app->request->get('id');
			$sql1 = "update new set new_click=new_click+1 where new_id=".$id;
			Yii::$app->db->createCommand($sql1)->execute();
			//查询点击详情
			$sql = "select * from new where new_id=$id";
			$data = Yii::$app->db->createCommand($sql)->queryOne();
			//根据点击量排名全部
			$sql1 = "select * from new order by new_click desc";
			$data1 = Yii::$app->db->createCommand($sql1)->queryAll();
			// print_r($data1);die;
			return $this->render('link',['data'=>$data,'data1'=>$data1]);
		}

		//新闻分类
		public function actionClass(){
			$id = Yii::$app->request->get('id');
			$this->redirect(['new/index','id'=>$id]);
		}

		
	}
 ?>