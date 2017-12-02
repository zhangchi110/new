<?php 
	namespace backend\controllers;
	use yii;
	use yii\web\Controller;
	use backend\models\Carr;
	use yii\data\Pagination;
	use common\controllers\CommonController;
	class CarrController extends CommonController{
		//关闭csrf验证
		public $enableCsrfValidation = false;

		public function actionIndex(){
			return $this->render('index');
		}

		// unlink()
		//轮播图添加
		public function actionAdd(){
			$post = Yii::$app->request->post();
			$imageFile = $_FILES['imageFile'];
			$path = "../../carr/".$imageFile['name'];
			
			move_uploaded_file($imageFile['tmp_name'],$path);
			if(Yii::$app->request->isPost){
				$sql = "insert into carr(carr_desc,imageFile,carr_time) values('".$post['carr_desc']."','".$path."','".date('Y-m-d H:i:s')."')";
				$data = Yii::$app->db->createCommand($sql)->execute();
				if($data){
					echo "<script>alert('添加成功');location.href='http://localhost/twelfth/advanced/backend/web/index.php?r=carr/list';</script>";
				}
			}
			return $this->render('index');
		}

		//轮播图展示
		public function actionList(){
			$model = new Carr();
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

		//轮播图修改
		public function actionUpdate(){
			$id = Yii::$app->request->get('id');
			$sql = "select * from carr where id = $id";
			$res = Yii::$app->db->createCommand($sql)->queryOne();
			return $this->render('update',['res'=>$res,'id'=>$id]);
		}
		// unlink($path);
		public function actionUpdates(){
			$post = Yii::$app->request->post();
			//删除本地原有轮播图
			$sql = "select * from carr where id=$post[id]";
			$data = Yii::$app->db->createCommand($sql)->queryOne();
			$res = unlink($data['imageFile']);
			if($res){
				//新图上传
				if(Yii::$app->request->isPost){
					// print_r($post);die;
					$image = $_FILES['imageFile'];
					$path = '../../carr/'.$image['name'];
					move_uploaded_file($image['tmp_name'],$path);
					$ress = Yii::$app->db->createCommand()->update('carr',['carr_desc'=>$post['carr_desc'],'carr_time'=>date('Y-m-d H:i:s'),'imageFile'=>$path],'id='.$post['id'])->execute();
					if($ress){
						echo "<script>alert('修改成功');location.href='http://localhost/twelfth/advanced/backend/web/index.php?r=carr/list';</script>";
					}else{
						
						$this->redirect('?r=carr/list');
					}
				}
			}
		}

		//轮播图删除
		public function actionDelete(){
			$id = Yii::$app->request->get('id');
			$res = Yii::$app->db->createCommand()->delete('carr',['id'=>$id])->execute();
			$this->redirect('?r=carr/list');
		}

	}
 ?>