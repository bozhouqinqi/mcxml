<?php
require_once dirname(__FILE__)."/cache_fun.inc.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
<link rel="miphtml" href="<?=mip_canonical()?>">
<!-- 启用极速模式(webkit) -->
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="KeyWords" content="我的世界,仙魔录,服务器,RPG,副本,地皮,">
<meta name="description" content="我的世界仙魔录官方网站">
<title>我的世界仙魔录服务器</title>
<link rel="shortcut icon" type="image/x-icon" href="img/upimages/favicon.ico" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<meta name="format-detection" content="telephone=no" />
<meta name='apple-touch-fullscreen' content='yes' />
<meta name="full-screen" content="yes">
<!-- SEO友好提示 -->
<meta name="applicable-device" content="pc,mobile">
<!--[if lt IE 9]>
<script type="text/javascript" src="/js/comm/html5shiv.js"></script>
<script type="text/javascript" src="/js/comm/respond.min.js"></script>
<![endif]-->
<script type="text/javascript" src="js/comm/jquery.min.js"></script>
<script type="text/javascript" src="js/comm/jquery.lazyload.min.js"></script>
<script type="text/javascript" src="js/comm/jquery.nicescroll.min.js"></script>
<script type="text/javascript" src="js/comm/ubox.js" charset="utf-8"></script>
<script type="text/javascript" src="js/comm/wow.js" charset="utf-8"></script>
<script type="text/javascript" src="js/comm/alert.js" charset="utf-8"></script>
<script type="text/javascript" src="js/071504.js?1583001606" charset="utf-8"></script>
<link rel="stylesheet" type="text/css" href="css/comm/font/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/comm/animate.min.css"/>
<link rel="stylesheet" type="text/css" href="css/comm/box.css"/>
<link rel="stylesheet" type="text/css" href="css/comm/alert.css"/>
<link rel="stylesheet" type="text/css" href="css/071504.css?1583001606"/>
<script>
	var batchArr = [];
	var checkLoad = 0;//判断是否是回调完成的
</script>
<script>
    var isOpenMobie = 2;
    var isOpenPad = 2;
    if(isOpenMobie == 1){
        if(isOpenPad == 1){
            $("body").css("width","auto");
        }else{
            //是否手机端判断
            var ua = navigator.userAgent;
            var ipad = ua.match(/(iPad).*OS\s([\d_]+)/),
                isIphone =!ipad && ua.match(/(iPhone\sOS)\s([\d_]+)/),
                isAndroid = ua.match(/(Android)\s+([\d.]+)/),
                isMobile = isIphone || isAndroid;
            if(isMobile){
                $("body").css("width","1280px");
            }else{
                $("body").css("width","auto");
            }
        }
    }else{
        $("body").css("width","auto");
        $("head").append("<meta id='headScreen' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no' name='viewport' />");
    }
    //手机屏幕尺寸兼容 purewinter 2019-03-26
    $(window).load(function(){
        bodyScale();
    });
    function bodyScale(){
        var windowWidth = $(window).width();
        $("#bodyScale").remove();
        if(windowWidth < 680){
            var scale = windowWidth / 375;
            $("#headScreen").remove();
            $("head").append("<meta id='headScreen' content='width=375, initial-scale="+scale+", maximum-scale="+scale+", user-scalable=no' name='viewport' />");
        }else if(windowWidth < 960){
            var scale = windowWidth / 960;
            $("#headScreen").remove();
            $("head").append("<meta id='headScreen' content='width=960, initial-scale="+scale+", maximum-scale="+scale+", user-scalable=no' name='viewport' />");
        }
    }
$(window).load(function(){
	if (!(/msie [6|7|8|9]/i.test(navigator.userAgent))){
		setTimeout(function(){
			new WOW().init()
		},150)
	};
});
var DIY_WEBSITE_ID = "49653";
var DIY_JS_SERVER = "s145js.nicebox.cn";
</script>
<script src="//s145js.nicebox.cn/exusers/login_html_v9_diy.php?idweb=49653&langid=0&UPermission=all"></script>
</head>
<body>
<script type="text/javascript">var Default_isFT = 0;</script>
<script>var _paq = _paq || [];_paq.push(["trackPageView"]);_paq.push(["enableLinkTracking"]);(function() {var u=(("https:" == document.location.protocol) ? "https" : "http") + "://tj.laoking.cn//";_paq.push(["setTrackerUrl", u+"piwik.php"]);_paq.push(["setSiteId", 12932]);var d=document, g=d.createElement("script"), s=d.getElementsByTagName("script")[0]; g.type="text/javascript";g.defer=true; g.async=true; g.src=u+"website.js"; s.parentNode.insertBefore(g,s);})();</script><script type="text/javascript" src="js/comm/transform.js?201603091"></script>
    <!-- 百度自动提交收录代码 -->
    <script>
        (function(){
            var bp = document.createElement('script');
            var curProtocol = window.location.protocol.split(':')[0];
            if (curProtocol === 'https'){
                bp.src = 'https://zz.bdstatic.com/linksubmit/push.js';
            }
            else{
                bp.src = 'http://push.zhanzhang.baidu.com/push.js';
            }
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(bp, s);
        })();
    </script>
    <!-- 360自动提交收录代码 -->
        <script>
            (function(){
                var src = "https://jspassport.ssl.qhimg.com/11.0.1.js?d182b3f28525f2db83acfaaf6e696dba";
                document.write('<script src="' + src + '" id="sozz"><\/script>');
            })();
        </script>
			<div id="comm_layout_header" class="layout  none"  data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
				<div class="view_contents">
								<div id="image_logo_1563417409427" class="view logo image  none"  data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
				<div names="image" class="view_contents" >
					<div class="logoStyle modSet">
<a href='index.php' target="_self"><img class="imgSet"  src="img/comm/img_load.gif" data-original="img/logo.png?1583001606" title="我的世界仙魔录" alt="我的世界仙魔录" style="width:auto; height:100%; position:relative; top:0; left:50%; transform:translate(-50%,0);"/></a>
</div>				</div>
			</div>
					<div id="dh_style_28_1563417565851" class="view style_28 dh  none lockHeightView"  data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
				<div names="dh" class="view_contents" >
<div id="menu" class="menu menuStyle_28">
	<div class="menuLayout">
		<ul class="miniMenu columnSet showmobile">
			<li class="leftBox">
				<div class="nav"></div>
				<div class="sidebar icoMenuSet"><i class="fa fa-navicon" onclick="setDhListen('style_01',this)"></i></div>
				<div class="menuScroll">
					<ul class="menuUlCopy">
								<li id="hot" class="rflex" pageid="71504" showmobile=""><a class="mainMenuSet" href="index.php">
								首页</a>
								</li>
					</ul>
				</div>
			</li>
		</ul>
		<div class="menuUl_box columnSet dhAreaSet showpc">
			<ul class="menuUl dflex maxWidth ">
						<li id="hot" class="rflex isLi" pageid="71504" showpc="">
							<a class="mainMenuSet Nosub" href="index.php">
								首页
							</a>
						</li>
			</ul>
			<div class="subBox">
				<div class="subBoxContent maxWidth">
				</div>
			</div>
		</div>
	</div>
</div>
<!-- 导航栏目有下级时禁止跳转 -->
<!-- 二级菜单宽度自适应 -->
<script>
function navSwtich(obj) {
	$(obj).siblings(".menuUlCopy").slideToggle(200);
	$(obj).parent().siblings().find(".menuUlCopy").slideUp(200);
}
function subLeft_dh_style_28_1563417565851(){
	$("#dh_style_28_1563417565851 .menuUl>li").each(function(){
		$(this).find(".menuUl03").css("left",'100%');
	})
}
$(window).resize(function() {
	subLeft_dh_style_28_1563417565851();
})
$(function(){
	$("#dh_style_28_1563417565851 .fa-navicon").click(function(){
		$("#dh_style_28_1563417565851 .menuUlCopy").each(function(){
			$(this).siblings(".fa").show();
		})
	})
	subLeft_dh_style_28_1563417565851();
		$("#dh_style_28_1563417565851 .subBox").css("top",$("#dh_style_28_1563417565851 .menuUl_box").height());
	if($("#dh_style_28_1563417565851 .menuUl").hasClass("noHover")){
		var tabNum = 0;
		$("#dh_style_28_1563417565851 .menuUl>li").find(".Onsub").each(function(){
			tabNum += 1;
			$(this).parent().attr("tabNum",tabNum)
		})
		$("#dh_style_28_1563417565851 .menuUl>li .Onsub").mouseover(function(){
			$("#dh_style_28_1563417565851 .subBox").show();
			var index = $(this).parent().attr("tabNum");
			$("#dh_style_28_1563417565851 .subBox .subItems").eq(index-1).fadeIn(200).siblings().hide();
			$("#dh_style_28_1563417565851 .subBox .subMenuImgArea .subMenuImgCon").eq(0).fadeIn(200).siblings().hide();
			// $("#dh_style_28_1563417565851 .subBox .subMenuImgArea .subMenuImgCon").eq(1).fadeIn(200).siblings().hide();
		})
		$("#dh_style_28_1563417565851 .subBox").mouseleave(function(){
			$(this).hide();
		})
		$("#dh_style_28_1563417565851 .menuUl>li .Nosub").mouseover(function(){
			$("#dh_style_28_1563417565851 .subBox").hide();
		})
		//风格41 42
	}
})
</script>
				</div>
			</div>
					<div id="music_style_01_1583001381756" class="view style_01 music  none lockHeightView"  data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
				<div names="music" class="view_contents" >
					<script></script><!-- 以下HTML是jplayer的某些皮肤的CSS, 切换皮肤的界面结构时, 必须也选择对应的皮肤的CSS (开始) -->
<!--  -->
<!--  -->
<!-- 以下HTML是jplayer的某些皮肤的CSS, 切换皮肤的界面结构时, 必须也选择对应的皮肤的CSS (结束) -->
<!-- 以下HTML是jplayer的某个皮肤的界面结构 (开始) -->
<!--
<div class="jp-blue-monday">
  <div id="jplayer_music_style_01_1583001381756" class="jp-jplayer"></div>
  <div id="jp_container_music_style_01_1583001381756" class="jp-audio" role="application" aria-label="media player">
    <div class="jp-type-single">
      <div class="jp-gui jp-interface">
        <div class="jp-controls">
          <button class="jp-play" role="button" tabindex="0">play</button>
          <button class="jp-stop" role="button" tabindex="0">stop</button>
        </div>
        <div class="jp-progress">
          <div class="jp-seek-bar">
            <div class="jp-play-bar"></div>
          </div>
        </div>
        <div class="jp-volume-controls">
          <button class="jp-mute" role="button" tabindex="0">mute</button>
          <button class="jp-volume-max" role="button" tabindex="0">max volume</button>
          <div class="jp-volume-bar">
            <div class="jp-volume-bar-value"></div>
          </div>
        </div>
        <div class="jp-time-holder">
          <div class="jp-current-time" role="timer" aria-label="time">&nbsp;</div>
          <div class="jp-duration" role="timer" aria-label="duration">&nbsp;</div>
          <div class="jp-toggles">
            <button class="jp-repeat" role="button" tabindex="0">repeat</button>
          </div>
        </div>
      </div>
      <div class="jp-details">
        <div class="jp-title" aria-label="title">&nbsp;</div>
      </div>
      <div class="jp-no-solution">
        <span>Update Required</span>
        To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
      </div>
    </div>
  </div>
</div>
-->
<!-- 以上HTML是jplayer的某个皮肤的界面结构 (结束) -->
<!--
<script type="application/javascript">
  (function(window, document, $) {
    var jplayer_id = '#jplayer_music_style_01_1583001381756', jp_container = '#jp_container_music_style_01_1583001381756';
    $(function () {
      $(jplayer_id).jPlayer({
        ready: function (event) {
          $(this).jPlayer("setMedia", {
            title: "音频标题",
            // 音频
            // mp3: "http://www.yugu-china.com/t/twenty-one-pilots-Heathens.mp3",
            // m4a: "http://www.yugu-china.com/t/twenty-one-pilots-Heathens.m4a",
            // webma: "http://www.yugu-china.com/t/twenty-one-pilots-Heathens.webma",
            // wav: "http://www.yugu-china.com/t/twenty-one-pilots-Heathens.wav",
            "mp3": "img/upimages/pkgimg/other/4c163bf8f5f2.mp3"
          }).jPlayer("play");
        },
        cssSelectorAncestor: jp_container,
        swfPath: "/sysTools/Model/views/music/style_01/v9Res/jplayer",
        supplied: "mp3",
        // solution: "html, flash",
        loop: true,
        volume: 0.8,
        wmode: "window",
        useStateClassSkin: true,
        autoBlur: false,
        smoothPlayBar: true,
        keyEnabled: true,
        remainingDuration: true,
        toggleDuration: true
      });
    });
  })(window, document, $);
</script>
-->
<!-- 自定义的jplayer音频播放器 (开始) -->
<div id="jplayer_music_style_01_1583001381756" class="webPlayer audioPlayer light">
  <div id="jp_container_music_style_01_1583001381756" class="videoPlayer"></div>
  <div style="display:none;" class="playerData"> {
      "name": "音频标题",
      "autoplay": true,
      "loop": true,
      "size": {
        "width": "320px"
      },
      "media": {
        "mp3": "img/upimages/pkgimg/other/4c163bf8f5f2.mp3"
      }
    } </div>
</div>
<!-- 自定义的jplayer音频播放器 (结束) --><script type="text/javascript" src="res/music/style_01/jplayer/jquery.jplayer.min.js"></script>
<!--  -->
<script type="text/javascript" src="res/music/style_01/jplayer/skin/cleanskin/js/jplayer.clean.skin.js"></script>
<script type="application/javascript">
  $(function () {
    var jplayer_id = '#jplayer_music_style_01_1583001381756', jp_container = '#jp_container_music_style_01_1583001381756';
    $(jplayer_id).videoPlayer();
  });
</script>
<divclass="col-md-6">
    				</div>
			</div>
						</div>
			</div>
					<div id="layout_diy_1563416590" class="layout  none wow rollIn"  data-wow-duration='1s' data-wow-delay='0.25s' data-wow-offset='0' data-wow-iteration='1'>
				<div class="view_contents">
								<div id="text_style_01_1563418886905" class="view style_01 text  none lockHeightView"  data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
				<div names="text" class="view_contents" >
					我的世界仙魔录
				</div>
			</div>
						</div>
			</div>
					<div id="layout_1563419361642" class="layout  none"  data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
				<div class="view_contents">
								<div id="image_style_01_1563419483896" class="view style_01 image  none"  data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
				<div names="image" class="view_contents" >
					<div class="imgStyle CompatibleImg picSet">
		<a href='javascript:;' target="">
			<img class="link-type-"  src="img/comm/img_load.gif" data-original="https://cdn.yun.sooce.cn/3/49653/jpg/15829948320440fdebb3df4e45543.jpg?version=0" title="" alt="描述" id="imageModeShow"/>
		</a>
</div>
<!-- 新加的js  -->
				</div>
			</div>
					<div id="text_style_01_1563434557423" class="view style_01 text  none lockHeightView"  data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
				<div names="text" class="view_contents" >
					SCULPTURE
				</div>
			</div>
					<div id="text_style_01_1563434781424" class="view style_01 text  none lockHeightView"  data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
				<div names="text" class="view_contents" >
					最新展览
				</div>
			</div>
					<div id="text_style_01_1563434907932" class="view style_01 text  none lockHeightView"  data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
				<div names="text" class="view_contents" >
					360°
				</div>
			</div>
					<div id="text_style_01_1563434981723" class="view style_01 text  none lockHeightView"  data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
				<div names="text" class="view_contents" >
					360°
				</div>
			</div>
					<div id="text_style_01_1563435043288" class="view style_01 text  none lockHeightView"  data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
				<div names="text" class="view_contents" >
					投入式体验
				</div>
			</div>
					<div id="text_style_01_1563435071330" class="view style_01 text  none lockHeightView"  data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
				<div names="text" class="view_contents" >
					大内存运行
				</div>
			</div>
					<div id="text_style_01_1563435090298" class="view style_01 text  lockHeightView"  data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
				<div names="text" class="view_contents" >
					参观指南
				</div>
			</div>
					<div id="text_style_01_1563435166350" class="view style_01 text  none wow bounceInDown lockHeightView"  data-wow-duration='1s' data-wow-delay='0.25s' data-wow-offset='0' data-wow-iteration='1'>
				<div names="text" class="view_contents" >
					<a href="http://" target='_blank' style='color:inherit' class='editor-view-extend link-type-3-'>RPG副本 称号系统<div>铁匠打造 宠物系统</div><div>婚侣系统 好友系统&nbsp;</div><div>签到系统 地皮系统&nbsp;</div><div>仙阶排行&nbsp;封号系统</div><div><br></div><div><br>
				<div><br></div></div></a>
				</div>
			</div>
					<div id="div_blank_new13_1563435611202" class="view blank_new13 div  none lockHeightView"  data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
				<div names="div" class="view_contents" >
				</div>
			</div>
					<div id="div_blank_new13_1563435718859" class="view blank_new13 div  none lockHeightView"  data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
				<div names="div" class="view_contents" >
				</div>
			</div>
					<div id="div_blank_new13_1563435727558" class="view blank_new13 div  none lockHeightView"  data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
				<div names="div" class="view_contents" >
				</div>
			</div>
					<div id="div_blank_new01_1563435828869" class="view blank_new01 div  none"  data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
				<div names="div" class="view_contents" >
					<div class="blank_new01">
<div class="roundcs modSet" ></div>
</div>
				</div>
			</div>
					<div id="text_style_01_1563434986220" class="view style_01 text  none lockHeightView"  data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
				<div names="text" class="view_contents" >
					6666
				</div>
			</div>
					<div id="text_style_01_1563435010309" class="view style_01 text  none lockHeightView"  data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
				<div names="text" class="view_contents" >
					MB
				</div>
			</div>
					<div id="text_style_01_1582995747642" class="view style_01 text  none wow bounceInLeft lockHeightView"  data-wow-duration='1s' data-wow-delay='0.25s' data-wow-offset='0' data-wow-iteration='1'>
				<div names="text" class="view_contents" >
					<a href="http://www.mclists.cn/server/ADD.HUAFIA.WIN_26061.html" target='' style='color:inherit' class='editor-view-extend link-type-3-'>IP：ADD.HUAFIA.WIN:26061</a>
				</div>
			</div>
					<div id="button_style_07_1582995811609" class="view style_07 button  none wow fadeInLeftBig lockHeightView"  data-wow-duration='1s' data-wow-delay='0.25s' data-wow-offset='0' data-wow-iteration='1'>
				<div names="button" class="view_contents" >
					<script>function btnTop(){$("html,body").animate({scrollTop:"0px"},1000);}function btnBottom(){var bodyH = $("html,body").height();$("html,body").animate({scrollTop:bodyH},1000);}</script><button type="button" class="button_default07  btnaSet" onclick="location.href='http://jq.qq.com/?_wv=1027&k=5ntNTS6'">官方群</button>
<script type="text/javascript">
if(typeof showcart !== 'function'){
	function showcart(){
		if(window.screen.width<767 || ($('body').width() > 0 && $('body').width() < 767)){
		location.href = "//s145js.nicebox.cn/exusers/u_cart.php?idweb=49653&act=show&lang=0&v=9";
		}else{
		document.getElementById("boxName").innerHTML="";
		if(document.getElementById("boxClose")) document.getElementById("boxClose").innerHTML="×";
		document.getElementById("showiframe").src="//s145js.nicebox.cn/exusers/u_cart.php?idweb=49653&act=show&lang=0&v=9";
		box.Show({width:'1000px', height:'600px'});
		}
	}
}
</script>				</div>
			</div>
					<div id="button_style_04_1582995993578" class="view style_04 button  none lockHeightView"  data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
				<div names="button" class="view_contents" >
					<script>function btnTop(){$("html,body").animate({scrollTop:"0px"},1000);}function btnBottom(){var bodyH = $("html,body").height();$("html,body").animate({scrollTop:bodyH},1000);}</script><button type="button" class="button_default04  btnaSet" onclick="location.href='http://share.weiyun.com/56LEkcY'">客户端</button>
<script type="text/javascript">
if(typeof showcart !== 'function'){
	function showcart(){
		if(window.screen.width<767 || ($('body').width() > 0 && $('body').width() < 767)){
		location.href = "//s145js.nicebox.cn/exusers/u_cart.php?idweb=49653&act=show&lang=0&v=9";
		}else{
		document.getElementById("boxName").innerHTML="";
		if(document.getElementById("boxClose")) document.getElementById("boxClose").innerHTML="×";
		document.getElementById("showiframe").src="//s145js.nicebox.cn/exusers/u_cart.php?idweb=49653&act=show&lang=0&v=9";
		box.Show({width:'1000px', height:'600px'});
		}
	}
}
</script>				</div>
			</div>
						</div>
			</div>
					<div id="layout_1563430000581" class="layout  none"  data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
				<div class="view_contents">
								<div id="div_blank_new13_1563430432278" class="view blank_new13 div  none lockHeightView"  data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
				<div names="div" class="view_contents" >
				</div>
			</div>
					<div id="liuyanban_style_05_1563432111930" class="view style_05 liuyanban  none lockHeightView"  data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
				<div names="liuyanban" class="view_contents" >
					<?php
 api_get('//s145js.nicebox.cn/sysTools.php?mod=viewsConn&rtype=json&idweb=49653&viewid=liuyanban_style_05_1563432111930&name=liuyanban&style=style_05&langid=0&pageid=71504&viewCtrl=default&isfb=1');
?>
<script type="text/javascript" src="//s145js.nicebox.cn/js/v9check.js"></script>
<script>
$(' #liuyanban_style_05_1563432111930 .gformList').each(function(){
	$(this).find('input').blur(function(){
		var type = $(this).attr('name');
		if(type == 'verification_code'){
			return;
		}
		var check = $(this).attr('check');
		var reg = new RegExp(check,"i");
		var value = $(this).val();
		if(reg.test(value)) {
			$(this).removeClass('error');
		}else {
			$(this).addClass('error');
		}
	});
});
</script>				</div>
			</div>
					<div id="div_blank_new13_1563432610942" class="view blank_new13 div  none lockHeightView"  data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
				<div names="div" class="view_contents" >
				</div>
			</div>
					<div id="image_style_01_1563529202712" class="view style_01 image  none"  data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
				<div names="image" class="view_contents" >
					<div class="imgStyle CompatibleImg picSet">
		<a href='javascript:btnTop();' target="">
			<img class="link-type-"  src="img/comm/img_load.gif" data-original="img/upimages/pkgimg/tupian/20190719173954210.png" title="" alt="描述" id="imageModeShow"/>
		</a>
</div>
<!-- 新加的js  -->
				</div>
			</div>
						</div>
			</div>
					<div id="comm_layout_footer" class="layout  none"  data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
				<div class="view_contents">
								<div id="text_style_01_1563433244409" class="view style_01 text  none lockHeightView"  data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
				<div names="text" class="view_contents" >
					快速链接
				</div>
			</div>
					<div id="text_style_01_1563433311181" class="view style_01 text  none lockHeightView"  data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
				<div names="text" class="view_contents" >
					<a href="http://www.mcbbs.net" target='' style='color:inherit' class='editor-view-extend link-type-3-'>MCBBS</a>
				</div>
			</div>
					<div id="text_style_01_1563433425901" class="view style_01 text  none lockHeightView"  data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
				<div names="text" class="view_contents" >
					<a href="http://vexrmb.i8mc.cn/index.php/serverpay/index/id/1398.html" target='' style='color:inherit' class='editor-view-extend link-type-3-'>服务器充值</a>
				</div>
			</div>
					<div id="div_blank_new01_1563433583074" class="view blank_new01 div  none"  data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
				<div names="div" class="view_contents" >
					<div class="blank_new01">
<div class="roundcs modSet" ></div>
</div>
				</div>
			</div>
					<div id="text_style_01_1563433698175" class="view style_01 text  none lockHeightView"  data-wow-duration='0s' data-wow-delay='0s' data-wow-offset='0' data-wow-iteration='1'>
				<div names="text" class="view_contents" >
					我的世界仙魔录版权所有
				</div>
			</div>
						</div>
			</div>
		<script>
	$(function(){
		sendBatch(batchArr);
	});
</script>
<script type="text/javascript" src="//s145js.nicebox.cn/webapp/UserPanel/share/js.js" charset="utf-8"></script>
</body>
</html>
