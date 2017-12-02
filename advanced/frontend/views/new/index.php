<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"/>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link rel="stylesheet" href="css/amazeui.min.css">
    <link rel="stylesheet" href="css/wap.css?2">
    <title>首页</title>
</head>
<body>
<div data-am-widget="gotop" class="am-gotop am-gotop-fixed">
    <a href="#top" title="">
        <img class="am-gotop-icon-custom" src="img/goTop.png" />
    </a>
</div>
<div class="pet_mian" id="top">
  <div data-am-widget="slider" class="am-slider am-slider-a1" data-am-slider='{"directionNav":false}' >
  <ul class="am-slides">
  <?php foreach ($data1 as $key => $value): ?>
    <li>
            <img src="<?php echo $value['imageFile']?>">
            
            <div class="pet_slider_font">
                <span class="pet_slider_emoji"><?php echo $value['new_authour']?></span>
                <span><?php echo $value['carr_desc']?></span>
            </div>
              <div class="pet_slider_shadow"></div>
      </li>
  <?php endforeach ?>
      
  </ul>
</div>


<div class="pet_circle_nav">
    <ul class="pet_circle_nav_list">
    <?php foreach ($data as $k => $v): ?>
        <li><a href="?r=new/class&id=<?php echo $v['fid']?>" class="iconfont pet_nav_xinxianshi ">&#xe61e;</a><span><?php echo $v['f_name']?></span></li>
    <?php endforeach ?>
        
        <li><a href="javascript:;" class="iconfont pet_nav_gengduo ">&#xe600;</a><span>更多</span></li>
    </ul>
    <div class="pet_more_list"><div class="pet_more_list_block">
    <div class="iconfont pet_more_close">×</div>
    <div class="pet_more_list_block">
        <div class="pet_more_list_block_name">
            <div class="pet_more_list_block_name_title">新闻点击量排名</div>
            
            <ul>
            <?php foreach ($data2 as $k => $v): ?>
                <a href="?r=new/part&id=<?php echo $v['new_id']?>"><li><?php echo $v['new_name']?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $v['new_click']?></li></a>
            <?php endforeach ?>
            </ul>
                       
            
 <div class="pet_more_list_block_name_title pet_more_list_block_line_height">服务 Service</div>
              <a class="pet_more_list_block_line">
                <i class="iconfont pet_nav_xinxianshi pet_more_list_block_line_ico">&#xe61e;</i>
                <div class="pet_more_list_block_line_font">新鲜事</div>
            </a>
                        <a class="pet_more_list_block_line">
                <i class="iconfont pet_nav_zhangzhishi pet_more_list_block_line_ico">&#xe607;</i>
                <div class="pet_more_list_block_line_font">趣闻</div>
            </a>
                        <a class="pet_more_list_block_line">
                <i class="iconfont pet_nav_kantuya pet_more_list_block_line_ico">&#xe62c;</i>
                <div class="pet_more_list_block_line_font">阅读</div>
            </a>
                        <a class="pet_more_list_block_line">
                <i class="iconfont pet_nav_mengzhuanti pet_more_list_block_line_ico">&#xe622;</i>
                <div class="pet_more_list_block_line_font">专题</div>
            </a>
                                    <a class="pet_more_list_block_line">
                <i class="iconfont pet_nav_bk pet_more_list_block_line_ico">&#xe629;</i>
                <div class="pet_more_list_block_line_font">订阅</div>
            </a>
                                    <a class="pet_more_list_block_line">
                <i class="iconfont pet_nav_wd pet_more_list_block_line_ico">&#xe602;</i>
                <div class="pet_more_list_block_line_font">专栏</div>
            </a>
        </div>
    </div>

    </div></div>
</div>
<div class="pet_content_main">
  <div data-am-widget="list_news" class="am-list-news am-list-news-default" >
   <div class="pet_comment_list_wap"><div class="pet_comment_list_title">热点新闻</div>
  <div class="am-list-news-bd">
  <ul class="am-list">
     <!--缩略图在标题右边-->
     <?php foreach ($data2 as $key => $value): ?>
        <li class="am-g am-list-item-desced am-list-item-thumbed am-list-item-thumb-right pet_list_one_block">
        <div class="pet_list_one_info">
            <div class="pet_list_one_info_l">
                <div class="pet_list_one_info_ico"><img src="img/a1.png" alt=""></div>
                <div class="pet_list_one_info_name"><?php echo $value['new_authour']?></div>
            </div>
            <div class="pet_list_one_info_r">
                <div class="pet_list_tag pet_list_tag_xxs">新鲜事</div>
            </div>
        </div>
        <div class=" am-u-sm-8 am-list-main pet_list_one_nr">
            <h3 class="am-list-item-hd pet_list_one_bt"><a href="?r=new/part&id=<?php echo $value['new_id']?>" class=""><?php echo $value['new_name']?></a></h3>
            <div class="am-list-item-text pet_list_one_text"><?php echo $value['new_desc']?></div>

        </div>
          <div class="am-u-sm-4 am-list-thumb">
            <a href="?r=new/part&id=<?php echo $value['new_id']?>" class="">
              <img src="<?php echo $value['imageFile']?>" class="pet_list_one_img" alt=""/>
            </a>
          </div>
      </li>
     <?php endforeach ?>
    </ul>
  </div>
    </div>
</div>
<div class="pet_article_dowload pet_dowload_more_top_off">
      <div class="pet_article_dowload_title">关于Amaze UI</div>
      <div class="pet_article_dowload_content pet_dowload_more_top_bg"><div class="pet_article_dowload_triangle pet_dowload_more_top_san"></div>
      <div class="pet_article_dowload_ico"><img src="img/footdon.png" alt=""></div>
      <div class="pet_article_dowload_content_font">
Amaze UI 以移动优先（Mobile first）为理念，从小屏逐步扩展到大屏，最终实现所有屏幕适配，适应移动互联潮流。 </div>
      <div class="pet_article_dowload_all">
        <a href="###" class="pet_article_dowload_Az am-icon-apple"> App store</a>
        <a href="###" class="pet_article_dowload_Pg am-icon-android"> Android</a>
      </div>
      </div>
      <div class="pet_article_footer_info">Copyright(c)2015 Amaze UI All Rights Reserved.模板收集自 <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> -  More Templates  <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></div>
</div>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/amazeui.min.js"></script>
<script>
$(function(){

    // 动态计算新闻列表文字样式
    auto_resize();
    $(window).resize(function() {
        auto_resize();
    });
    $('.am-list-thumb img').load(function(){
        auto_resize();
    });

    $('.am-list > li:last-child').css('border','none');
    function auto_resize(){
        $('.pet_list_one_nr').height($('.pet_list_one_img').height());

    }
        $('.pet_nav_gengduo').on('click',function(){
            $('.pet_more_list').addClass('pet_more_list_show');
       });
        $('.pet_more_close').on('click',function(){
            $('.pet_more_list').removeClass('pet_more_list_show');
        });
});

</script>
</body>
</html>