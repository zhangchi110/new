<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link href="bing/css/style.css" rel="stylesheet" type="text/css" />
<link href="bing/css/select.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="bing/js/jquery.js"></script>
<script type="text/javascript" src="bing/js/jquery.idTabs.min.js"></script>
<script type="text/javascript" src="bing/js/select-ui.min.js"></script>
<script type="text/javascript" src="bing/editor/kindeditor.js"></script>

<script type="text/javascript">
    KE.show({
        id : 'content7',
        cssPath : './index.css'
    });
  </script>
  
<script type="text/javascript">
$(document).ready(function(e) {
    $(".select1").uedSelect({
		width : 345			  
	});
	$(".select2").uedSelect({
		width : 167  
	});
	$(".select3").uedSelect({
		width : 100
	});
});
</script>
</head>

<body>

	<div class="place">
    <span>位置：</span>
    <ul class="placeul">
    <li><a href="?r=admin/list">首页</a></li>
    <li><a href="?r=rbac/index">RBAC</a></li>
     <li><a href="#">给角色赋权限</a></li>
    </ul>
    </div>
    
    <div class="formbody">
    
    
    <div id="usual1" class="usual"> 
    
    <div class="itab">
  	<ul> 
    <li><a href="#tab1" class="selected">赋权限</a></li> 
   
  	</ul>
    </div> 
    
  	<div id="tab1" class="tabson">
    
   
    
    <ul class="forminfo">
   
   
    <li><label>权限名称<b>*</b></label>  
    

    <div class="vocation">
    <select class="select1">
    <option value="">请选择</option>
    <?php foreach($permission as $v){?>
        <option><?=$v['name']?></option>
   <?php }?>
    </select>
    </div>
    
    </li>
    
    <li><label>角色名称<b>*</b></label>
    
    <div class="vocation">
    <select class="select2">
    <option value="">请选择</option>
    <?php foreach($role as $v){?>
        <option><?=$v['name']?></option>
   <?php }?>
   
   
    </select>
    </div>

    </li>
   
    <li><label>&nbsp;</label><input name="" type="button" class="btn" value="马上发布"/></li>
    </ul>
    
    </div> 
 
       
	</div> 
 
	<script type="text/javascript"> 
      $("#usual1 ul").idTabs(); 
    </script>
    
    <script type="text/javascript">
	$('.tablelist tbody tr:odd').addClass('odd');
	</script>
</div>

</body>
</html>
<script type="text/javascript">
    $('.btn').click(function() {
// alert(2)
        var permission = $('.select1').val();
        var role = $('.select2').val();
        
        $.post('?r=rbac/pr_add', {role:role,permission:permission}, function(result) {
            if(result.error = 10000){
                alert(result.msg);
                location.reload();
            }else{
                alert(result.msg);
            }
        },'json');
    });
    

</script>