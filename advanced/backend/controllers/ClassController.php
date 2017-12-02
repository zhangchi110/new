<?php 
	namespace backend\controllers;
	use yii;
	use yii\web\Controller;
	use backend\models\Classes;
	use yii\data\Pagination;
	use common\controllers\CommonController;
	class ClassController extends CommonController{
		//关闭csrf验证
		public $enableCsrfValidation = false;

		public function actionIndex(){
			return $this->render('index');
		}

		public function actionAdd(){
			$post = Yii::$app->request->post();
			if(Yii::$app->request->isPost){
				$sql = "insert into new_class(f_name) values('".$post['f_name']."')";
				$data = Yii::$app->db->createCommand($sql)->execute();
				if($data){
					echo "<script>alert('添加成功');location.href='http://localhost/twelfth/advanced/backend/web/index.php?r=class/list';</script>";
				}
			}
			return $this->render('index');
		}

		public function actionList(){
			$model = new Classes();
			$pageArr = $model->find();
		 	$pagination = new Pagination(['totalCount' => $pageArr -> count(),'pageSize'=>'5']);
            $data = $pageArr->select('*')
                            ->offset($pagination ->offset)
                            ->limit($pagination ->limit)
                            ->asArray()
                            ->all();
            // print_r($data);die;
            return $this -> render('list',
                ['data' => $data,
                'pagination' => $pagination,
                ]
            );
		}

		public function actionUpdate(){
			$id = Yii::$app->request->get('id');
			$sql = "select * from new_class where fid=".$id;
			$data = Yii::$app->db->createCommand($sql)->queryOne();
			// print_r($data);die;
			return $this->render('update',['data'=>$data]);
		}

		public function actionUpdates(){
			$post = Yii::$app->request->post();
			// print_r($post);die;
			$res = Yii::$app->db->createCommand()->update('new_class',['f_name'=>$post['f_name']],'fid='.$post['id'])->execute();
			if($res){
				echo "<script>alert('修改成功');location.href='http://localhost/twelfth/advanced/backend/web/index.php?r=class/list';</script>";
			}else{
				return $this->render('update');
			}
		}

		public function actionDelete(){
			$id = Yii::$app->request->get('id');
			$res = Yii::$app->db->createCommand()->delete('new_class',['fid'=>$id])->execute();
			$this->redirect('?r=class/list');
		}
	}
 ?>