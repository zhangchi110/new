<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="bing/css/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="bing/js/jquery.js"></script>
</head>

<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="?r=admin/list">首页</a></li>
    <li><a href="?r=rbac/index">RBAC</a></li>
     <li><a href="#">添加角色</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    
    <div class="formtitle"><span>基本信息</span></div>
    
    <ul class="forminfo">
    <li><label>权限</label><input name="" type="text" class="dfinput" /><i>权限随便你</i></li>
    <li><label>&nbsp;</label><input name="" type="button" class="btn" value="确认保存"/></li>
    </ul>
    
    
    </div>
</body>
</html>
<script type="text/javascript">
    $('.btn').click(function() {
        var permission = $('.dfinput').val();
        $.post('?r=rbac/permission_add', {permission:permission}, function(result) {
            if(result.error = 10000){
                alert(result.msg);
                $('.dfinput').val('');
            }else{
                alert(result.msg);
            }
        },'json');
    });
    

</script>