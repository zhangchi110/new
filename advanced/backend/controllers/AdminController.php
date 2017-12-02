<?php 
	namespace backend\controllers;
	use yii;
	use yii\web\Controller;
	use yii\web\Cookie;
	use yii\web\UploadedFile;
	use backend\models\News;
	use yii\data\Pagination;
	use common\controllers\CommonController;
	//图片压缩
	// use Imagine\Image\ManipulatorInterface;
	use yii\imagine\Image;
	class AdminController extends CommonController
	{
		public function actionIndex(){
			// 新闻分类
			$sql = "select * from new_class";
			$data = Yii::$app->db->createCommand($sql)->queryAll();
			return $this->render('index',['data'=>$data]);
		}
		//关闭csrf验证
		public $enableCsrfValidation = false;
		
		//新闻添加
		public function actionAdd(){
			$model = new News();
			$cookie = Yii::$app->request->cookies;
			$id = $cookie->getValue('user');
			$image = $_FILES['imageFile'];
			// print_r($image);die;
			$path = '../../uploads/'.$image['name'];
			// print_r($image);die;
			// echo $path;die;
			move_uploaded_file($image['tmp_name'],$path);
			//生成缩略图
			Image::thumbnail($path, 100 , 100)->save(Yii::getAlias($path),['quality' => 100]);

			$post = Yii::$app->request->post();
			// print_r($post);die;
			if(Yii::$app->request->isPost){
				// echo 1;die;
				$model->new_time = date('Y-m-d H:i:s');
				$model->imageFile = $path;
				$model->new_uid = $id;
				$model->new_name = $post['new_name'];
				$model->new_status = $post['new_status'];
				$model->new_desc = $post['new_desc'];
				$model->new_content = $post['new_content'];
				$model->new_fid = $post['fid'];
				$model->new_authour = $post['new_authour'];
				if($model->save()){
					$this->redirect('?r=admin/list');
				}
				
			}
			
		}

		//新闻展示
		public function actionList(){
			$model = new News();
			$pageArr = $model->find();
		 	$pagination = new Pagination(['totalCount' => $pageArr -> count(),'pageSize'=>'5']);
            $data = $pageArr ->join('INNER JOIN', 'new_class','new_class.fid= new.new_fid')
                               ->select('*')
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

		//新闻修改
		public function actionUpdate(){
			$id = Yii::$app->request->get('id');
			$sql = "select n.*,f.* from new as n left join new_class as f on n.new_fid=f.fid where n.new_id=$id";
			$data = Yii::$app->db->createCommand($sql)->queryOne();

			//全部新闻分类
			$sql = "select * from new_class";
			$res = Yii::$app->db->createCommand($sql)->queryAll();
			
			// print_r($data);die;
			return $this->render('update',['data'=>$data,'res'=>$res,'id'=>$id]);
		}	

		public function actionUpdates(){
			$post = Yii::$app->request->post();
			if(Yii::$app->request->isPost){
				$image = $_FILES['imageFile'];
				// print_r($image);die;
				$path = '../../uploads/'.$image['name'];
				move_uploaded_file($image['tmp_name'],$path);
				// print_r($post);die;
				$res = Yii::$app->db->createCommand()->update('new',['new_name'=>$post['new_name'],'new_fid'=>$post['fid'],'new_status'=>$post['new_status'],'new_authour'=>$post['new_authour'],'new_desc'=>$post['new_desc'],'new_content'=>$post['new_content'],'new_time'=>date('Y-m-d H:i:s'),'imageFile'=>$path],'new_id='.$post['id'])->execute();
				if($res){
					echo "<script>alert('修改成功');location.href='http://localhost/twelfth/advanced/backend/web/index.php?r=admin/list';</script>";
				}else{
					return $this->render('update');
				}
			}
			
		}

		//新闻删除
		public function actionDelete(){
			$id = Yii::$app->request->get('id');
			$res = Yii::$app->db->createCommand()->delete('new',['new_id'=>$id])->execute();
			$this->redirect('?r=admin/list');
		}

	
	}
	
 ?>