<?php
namespace common\controllers;

use Yii;
use yii\web\Controller;
use backend\models\AuthAssignment;
use backend\models\AuthItemChild;
use yii\web\Cookie;
/**
* 
*/
class CommonController extends Controller
{
	
	public function beforeAction($action)
	{
		// var_dump($action);die;
	  if (!parent::beforeAction($action)) {
	        return false;
	    }
    //用户不登录没有权限
    $controller = Yii::$app->controller->id;
    $action = Yii::$app->controller->action->id;

    $permissionName = $controller.'/'.$action;
    $cookie = Yii::$app->request->cookies;
    $userid = $cookie->getValue('user');
    if(empty($userid))
   	{
   		throw new \yii\web\UnauthorizedHttpException('对不起，您现在还没获此操作的权限');
   	}

    //角色不存在没有权限
    $roledata = AuthAssignment:: find()
    							->select('item_name')
    							->where(['user_id'=>$userid])
    							->asArray()
    							->all();
   	if(empty($roledata))
   	{
   		throw new \yii\web\UnauthorizedHttpException('对不起，您现在还没获此操作的权限');
   	}
   	foreach ($roledata as $value) {
   		$newrole[] = $value['item_name'];
   	}
   	$role = "'";
   	$role .= implode("','",$newrole);
   	$role .= "'";
    // print_r($role);die;
   	$permissiondata = Yii::$app
   						->db
   						->createCommand("select child from auth_item_child where parent in ($role)")
   						->queryAll();
   	if(empty($permissiondata))
   	{
   		throw new \yii\web\UnauthorizedHttpException('对不起，您现在还没获此操作的权限');
   	}
   	foreach ($permissiondata as $v) {
   		$newpermission[] = $v['child'];
   	}
   	if(in_array($permissionName,$newpermission)){
		return true;
   	}else{
   		throw new \yii\web\UnauthorizedHttpException('对不起，您现在还没获此操作的权限');
   	}
	}
}