<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title></title>
<link rel="stylesheet" href="css/pintuer.css">
<link rel="stylesheet" href="css/admin.css">
<script src="js/jquery.js"></script>
<script src="js/pintuer.js"></script>
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>增加轮播图</strong></div>
  <div class="body-content">
    <form method="post" class="form-x" action="?r=carr/add" enctype="multipart/form-data">  
      <div class="form-group">
        <div class="label">
          <label>轮播图描述：</label>
        </div>
        <div class="field">
          <input type="text" class="input w50" name="carr_desc" value=""  />
          <div class="tips"></div>
        </div>
      </div>
      <div class="form-group">
        <div class="label">
          <label>轮播图片：</label>
        </div>
        <div class="field">
            <input type="file" name="imageFile" value="浏览上传">
        </div>
      </div>
      
      <div class="form-group">
        <div class="label">
          <label></label>
        </div>

        <div class="field">
          <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
        </div>
      </div>
    </form>
  </div>
</div>

</body></html>