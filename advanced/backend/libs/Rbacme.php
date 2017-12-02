<?php
class Rbacme
{
	//创建权限
	public function Permission($name)
	{    
	    $auth = Yii::$app->authManager;    
	    $createPost = $auth->createPermission($name);    
	    $createPost->description = '创建了 ' . $name. ' 权限';    
	    $auth->add($createPost);
	}

	//创建角色
	public function createRole($name)
	{    
		
	    $auth = Yii::$app->authManager;    
	    $role = $auth->createRole($name);    
	    $role->description = '创建了 ' . $name. ' 角色';    
	    $auth->add($role);
	}

	//添加
	public function add($object)
    {
        if ($object instanceof Item) {
            return $this->addItem($object);
        } elseif ($object instanceof Rule) {
            return $this->addRule($object);
        } else {
            throw new InvalidParamException("Adding unsupported object type.");
        }
    }

    //将权限赋给角色
    public function addroleChild($role,$permission)
	{    
	    $auth = Yii::$app->authManager;    
	    $parent = $auth->createRole($role);                //创建角色对象
	    $child = $auth->createPermission($permission);     //创建权限对象
	    $auth->addChild($parent, $child);                           //添加对应关系
	}

	//将角色赋给用户
	public function addChild($role,$user)
	{    
	    $auth = Yii::$app->authManager;    
	    $role = $auth->createRole($role);                //创建角色对象
	                                          
	    $auth->assign($role, $user);                           //添加对应关系
	}


}