<?php 
	namespace backend\controllers;
	use yii;
	use yii\web\Controller;
	use Rbacme;
	use backend\models\AuthItem;
	use backend\models\Admin;
	use common\controllers\CommonController;
	class RbacController extends CommonController{
		public $enableCsrfValidation = false;
		public function actionIndex(){
			return $this->render('index');
		}

		//角色创建
		public function actionRole(){
			return $this->render('role');
		}

		public function actionRole_add()
		{
			$request = yii::$app ->request;
			$item = $request -> post('role');
			$rbac = new Rbacme();
			$res = $rbac -> createRole($item);
			$result = [
						'error'=>10000,
						'msg'=>"新增成功",
				  	  ];
			return json_encode($result);
		}

		//权限创建
		public function actionPermission(){
			return $this->render('permission');
		}

		public function actionPermission_add()
		{
			$request = yii::$app ->request;
			$item = $request -> post('permission');
			$rbac = new Rbacme();
			$res = $rbac -> Permission($item);
			$result = [
						'error'=>10000,
						'msg'=>"新增成功",
				  	  ];
			return json_encode($result);
		}

		//权限赋给角色
		public function actionPermissionaddrole(){
			$role = AuthItem::find()->where(['type'=>1])
									->asArray()
									->all();
			$permission = AuthItem::find()->where(['type'=>2])
									->asArray()
									->all();
			return $this->render('permissionaddrole',['role'=>$role,'permission'=>$permission]);
		}

		public function actionPr_add()
		{
			$request = yii::$app -> request;
			$role = $request -> post('role');
			$permission = $request -> post('permission');
			$rbac = new Rbacme();
			$res = $rbac -> addroleChild($role,$permission);
			$result = [
						'error'=>10000,
						'msg'=>"新增成功",
					  ];
			return json_encode($result);

		}

		//将角色赋给用户
		public function actionRoleadduser()
		{
			$user = Admin::find()
							->where(['status'=>1])
							->asArray()
							->all();
			$role = AuthItem::find()
							->where(['type'=>1])
							->asArray()
							->all();
			return $this -> render('roleadduser',['user' => $user,'role'=>$role]);
		}

		public function actionRu_add()
		{
			$request = yii::$app -> request;
			$role = $request -> post('role');
			$user = $request -> post('user');
			$rbac = new Rbacme();
			$res = $rbac -> addChild($role,$user);
			$result = [
						'error'=>10000,
						'msg'=>"新增成功",
					  ];
			return json_encode($result);

		}
	}
 ?>