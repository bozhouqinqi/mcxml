<?php
//建站宝盒缓存类库
session_start();
@error_reporting(E_ALL ^ E_NOTICE); 
define('CACHE_VERSION', 'V9');
define('IDWEB','49653');
$bbxserver = 's145js.nicebox.cn';
$trans_client_sess = $check_client_status = false;

if(!isset($_SESSION['X-UserID'])) $_SESSION['X-UserID']=0;
if(isset($_POST['act']) || isset($_GET['act'])) {
	if($_POST['act']=='savetranssess'){
		set_session_cache($_POST['sessid'], 1);
		if($_POST['userid']!=$_SESSION['X-UserID']){
			$_SESSION['X-UserID'] = $_POST['userid']?intval($_POST['userid']):"";
			//如果是这里的话，需要把原有的缓存给清空了
			clear_one_cache(session_id());
		}
		exit();
	}elseif($_GET['act']=='clearcache'){//清空缓存
		clear_one_cache(session_id());
		exit();
	}elseif($_GET['act']=='clear'){//清空缓存
		$a = dir_delete(dirname(__FILE__)."/caches/public/");
		header('Location:'.$_SERVER['SCRIPT_NAME']);
		exit();
	}
}
if((isset($_GET['newsid']) && $_GET['newsid']>0) || (isset($_GET['pid']) && $_GET['pid']>0)) clear_one_cache(session_id());
//获取缓存
function get_cache($url){
	$filename = md5($url).".cache";
	if (is_mip_page()) $filename = "mip_" . $filename;
	$dir = dirname(__FILE__)."/caches/";
	if(is_search_robot()) $dir .= "robots";
	elseif($_SESSION['X-UserID']) $dir .= session_id();
	else $dir .= "public";

	$file = $dir."/".$filename;

	$fresh_file = dirname(__FILE__)."/fresh.data";

	if(!file_exists($file)) return -1;//不存在
	
	if(filemtime($file)<(time()-60*60)) return -2; //缓存时间超时

	if(file_exists($fresh_file) && filemtime($file)<filemtime($fresh_file)) return -3; //如果是有强制刷新的文件

	$res = file_get_contents($file);

	$cacheinfo = substr($res, 0, strpos($res, "\n"));
	$arr = explode(":", $cacheinfo);
	if($arr[0]!=CACHE_VERSION) return -4; //如果版本不一致
	$JsonInfo = substr($res, strpos($res, "\n")+1);
	$HtmlInfo = json_decode($JsonInfo,true);
	return $HtmlInfo;
}

//新建缓存
function set_cache($url, $content){
	if(!$content) return -4;
	if(stripos($_SERVER['PHP_SELF'], '/temp/')!==false) return -3;
	$filename = md5($url).".cache";
	if (is_mip_page()) $filename = "mip_" . $filename;
	$dir = dirname(__FILE__)."/caches/";
	if(is_search_robot()) $dir .= "robots";
	elseif($_SESSION['X-UserID']) $dir .= session_id();
	else $dir .= "public";

	$file = $dir."/".$filename;
	if(!file_exists(dirname(__FILE__)."/caches")){
		$ret = mkdir(dirname(__FILE__)."/caches", 0777);
		if(!$ret) return -1; //创建目录失败
	}
	if(!file_exists($dir)){
		$ret = mkdir($dir, 0777);
		if(!$ret) return -2; //创建目录失败
	}
	$content = json_encode($content);
	//第一行是版本和url，填在缓存文件里
	file_put_contents($file, CACHE_VERSION.":".$url."\r\n".$content);

	clear_cache();

	return 1;
}

//定时清理旧的缓存文件，避免生成太多的垃圾文件
function clear_cache(){
	if(stripos($_SERVER['PHP_SELF'], '/temp/')!==false) return -3;
	$clear_interval = 60*60; //清理动作多久执行一次
	$expired_time = 24*60*60; //缓存时间多长

	$clear_file = dirname(__FILE__)."/clear.data";
	if(file_exists($clear_file) && filemtime($clear_file)>(time()-$clear_interval)) return -1; //时间尚未到
	$dir = dirname(__FILE__)."/caches";

	if(!file_exists($dir)) return -2; //caches文件夹不存在
	$handle = opendir($dir);
	$clearlog = "";
	while (false !== ($file = readdir($handle))) {
        if($file == "." || $file == "..") continue;
		//这是一个文件夹
		if(strpos($file, ".")===false) {
			$handle2 = opendir($dir . "/" . $file);
			while (false !== ($file2 = readdir($handle2))) {
				if($file2 == "." || $file2 == "..") continue;
				$cachefile2 = $dir . "/" . $file . "/" . $file2;
				if (is_dir($cachefile2)) continue;
				if(filemtime($cachefile2)>(time()-$expired_time)) continue;
				@unlink($cachefile2);
			}
			continue;
		}
		$cachefile = $dir."/".$file;
		if(filemtime($cachefile)>(time()-$expired_time)) continue;
		$cachedir = substr($cachefile, 0, strrpos($cachefile, "."));
		dir_delete($cachedir);
		@unlink($cachefile);
		$clearlog .= $file."\r\n";
    }
    closedir($handle);
	file_put_contents($clear_file, $clearlog);
}
//删除一个缓存目录
function clear_one_cache($sessid){
	if(!$sessid) return -1;
	if(!preg_match("/^[0-9a-zA-Z]{3,}$/", $sessid)) return -2;
	$dir = dirname(__FILE__)."/caches";
	if(!file_exists($dir."/".$sessid.".sess")){
		if($sessid=='public' || $sessid=='robots');
		else return -3;
	}
	if(!file_exists($dir."/".$sessid)) return -4;
	dir_delete($dir."/".$sessid);

	return 1;
}
//删除整个目录
function dir_delete($file)
{
	if(file_exists($file)){
		if(is_dir($file)){
			$handle =opendir($file);
			while(false!==($filename=readdir($handle))){
				if($filename!="."&&$filename!="..") dir_delete($file."/".$filename);
			}
			closedir($handle);
			rmdir($file);
			return true;
		}
		else {
			unlink($file);
		}
	}
}

function get_session_cache(){
	if(is_search_robot()) return;
	$file = dirname(__FILE__)."/caches/".session_id().".sess";
	if(file_exists($file)){
		$arr = explode(":", file_get_contents($file));
		if(!$arr[1]) show_trans_client_sess();
		else load_client_status($arr[0]);
		return $arr[0];
	}
	show_trans_client_sess();
}
function set_session_cache($sessid, $isclient=0){
	if(!$sessid) return;
	if(is_search_robot()) return;
	if(!preg_match("/^[0-9a-zA-Z]{1,64}$/", $sessid)) return -1;
	$file = dirname(__FILE__)."/caches/".session_id().".sess";
	if(!file_exists(dirname(__FILE__)."/caches")){
		$ret = mkdir(dirname(__FILE__)."/caches", 0777);
		if(!$ret) return -2;
	}
	if(file_exists($file)){
		$arr = explode(":", file_get_contents($file));
		if($arr[0]==$sessid) return -3;
		//if($arr[1]!=$isclient) clear_one_cache(session_id());
	}
	file_put_contents($file, $sessid.":".$isclient);
}

function set_session_cache_from_headers($headers){
	$arr_Header = explode("\r\n", $headers);
	$userid = '';
	$arr_Operate = array();
	foreach($arr_Header as $val){
		if(!$val) continue;
		$arr = explode(":", $val);
		if($arr[0]=='Set-Cookie' && strpos($arr[1], 'PHPSESSID=')!==false){
			$sessid = substr($arr[1], strpos($arr[1], 'PHPSESSID=')+10);
			$sessid = substr($sessid, 0, strpos($sessid, ';'));
			set_session_cache($sessid);
		}
		elseif($arr[0]=='X-UserID'){
			$userid = trim($arr[1]);
		}elseif($arr[0]=='X-Operate'){
			$arr_Operate[] = trim($arr[1]);
		}
	}
	
	if($userid!=$_SESSION['X-UserID']){
		if($_SESSION['X-UserID']){
			//如果是这里的话，需要把原有的缓存给清空了
			clear_one_cache(session_id());
		}
		$_SESSION['X-UserID'] = $userid;
	}

	$arr_Operate = array_unique($arr_Operate);
	foreach($arr_Operate as $op){
		if($op=='clearcaches'){
			if($_SESSION['X-UserID']) clear_one_cache(session_id());
			clear_one_cache('public');
			clear_one_cache('robots');
		}elseif($op=='clearpubliccaches'){
			clear_one_cache('public');
		}elseif($op=='clearrobotcaches'){
			clear_one_cache('robots');
		}
	}
}
//加载客户端session
function show_trans_client_sess(){
	global $trans_client_sess, $bbxserver;
	if($trans_client_sess || !$bbxserver) return;
	if (is_mip_page()) return;
	echo '<script>$(function(){$.getScript("//'.$bbxserver.'/exusers/js_trans_client_sess.php");});</script>';
	$trans_client_sess = true;
}
//加载客户端的状态
function load_client_status($sessid){
	global $check_client_status, $bbxserver;
	if($check_client_status || !$bbxserver) return;
	$check_client_status = true;
	//这里成功与否，都要往下走，不然会有问题，而且如果加载一次如果失败后，应该要忽略半小时不加载
	$lockfile = dirname(__FILE__)."/load_client_status.lock";
	if(file_exists($lockfile) && filemtime($lockfile)>(time()-30*60)) return;

	$url = "http://{$bbxserver}/exusers/api_client_status.php";
	$res = @load_url($sessid, $url);
	if(!$res){
		file_put_contents($lockfile, '');
		return;
	}
	$header_ret = substr($res, 0, strpos($res, "\r\n\r\n"));
	$res = substr($res, strpos($res, "\r\n\r\n")+4);
	set_session_cache_from_headers($header_ret);
}

/**
 * 获取seo 三要素
 * @param string $url
 * @param string $method
 * @param string $postdata
 * @return array
 */
function get_seo($url, $method = '', $postdata = '') {
    $res = load_by_url($url, $method='', $postdata="");
    unset($res['html']);
    return $res['data'];
}

//获取远程信息
function api_get($url, $method = '', $postdata = '') {
    $res = load_by_url($url, $method, $postdata);
    echo $res['html'];
	return 1;
}

//获取远程信息
function load_by_url($url, $method = '', $postdata = '') {
    global $bbxserver;
    if (substr($url, 0, 2) == '//') $url = 'http:' . $url;
    $parr = $parr1 = array();
    $urlarr = parse_url($url);
    parse_str($urlarr['query'],$parr1);
    $apiviewID = $parr1['viewid'];
    
	$arr_Get = array();
    foreach ($_GET as $k => $v) {
        if (strstr($k,"page") || strstr($k,"Page")) {
            $arr = explode("-",$k);
            if($arr[1]==$apiviewID) {
				$arr_Get[$arr[0]] = $v;
            }
        } else {
			$arr_Get[$k] = $v;
		}
    }
    if($arr_Get){
        $params = http_build_query($arr_Get);
        $url = $url."&".$params;
    }
    
    if($_GET['pgid']) $url.="&pgid=".$_GET['pgid'];
    $url.="&Pagephp=1";
    if (is_mip_page()) $url .= "&mip=1";
    if (is_https()) $url .= "&https=1"; //如果当前访问的HTTPS，我们把这个参数传过去
    $bbxserver = $urlarr['host'];
    
    $sessid = get_session_cache();
    //先查一下缓存是否存在
    //看看缓存的时间是否已过
    //是否有强制刷新的文件
    $res = get_cache($url);
	//暂时把$sessid加上，后面要去掉的  keenx 2018-11-9!$sessid && 
    if(!$_GET['newsid'] && (!is_int($res) || $res['html']>0)){ //新闻浏览量实时更新
        return $res;
    }
    //session，cookie如何传过去，可以避免重复加载session
    //不同的用户，加载的东西可能是不一样的，所以缓存要加上sessionid
    
    $res = load_url($sessid, $url, $method, $postdata);
    //把头部分出来
    $header_ret = substr($res, 0, strpos($res, "\r\n\r\n"));
    $res = substr($res, strpos($res, "\r\n\r\n")+4);
    $res = json_decode($res,true);
    set_session_cache_from_headers($header_ret);
    $a = set_cache($url, $res);
    //print_r($a);
    return $res;
}

function load_url($sessid, $url, $method='', $postdata=""){
	$browser = "Nicebox Engine V".CACHE_VERSION;
	if(!$method) $method = 'GET';
	if(function_exists('curl_init')){
		$headers = array();
		$headers[] = "X-Browser: ".$browser." CURL";
		$headers[] = "Referer: http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
		$headers[] = "X-UserID: ".($_SESSION['X-UserID']?$_SESSION['X-UserID']:'0');
		$headers[] = "X-IDWEB: ".IDWEB;
		$headers[] = "X-VERSION: ".CACHE_VERSION;
		if($sessid){
			$headers[] = "Cookie: PHPSESSID=".$sessid;
		}

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 120);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		if($method=='POST'){
			curl_setopt($curl, CURLOPT_POST, 1);
			curl_setopt($curl, CURLOPT_POSTFIELDS, $postdata);
		}
		$res = curl_exec($ch);
		curl_close($ch);

		return $res;
	}elseif(function_exists('fsockopen')){
		$urlarr = parse_url($url);
		$fp = @fsockopen($urlarr['host'], $urlarr['port']?$urlarr['port']:80, $errno,$errstr, 10) or exit($errstr."--->".$errno); 
		
		//构造post请求的头 
		$header = $method." ".$urlarr['path'].($urlarr['query']?"?".$urlarr['query']:"")." HTTP/1.1\r\n";
		$header .= "Host:" . $urlarr['host'] . "\r\n";
		$header .= "X-Browser: ".$browser." SOCK\r\n";
		$header .= "Referer: http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."\r\n";
		$header .= "X-UserID: ".($_SESSION['X-UserID']?$_SESSION['X-UserID']:'0')."\r\n";
		$header .= "X-IDWEB: ".IDWEB."\r\n";
		$header .= "X-VERSION: ".CACHE_VERSION."\r\n";
		if($sessid){
			$header .= "Cookie: PHPSESSID=".$sessid."\r\n";
		}
		$header .= "Connection: Close\r\n\r\n";
		if($method=='POST'){
			$header .= is_array($postdata)?http_build_query($postdata):$postdata;
		}
		//发送数据 
		@fputs($fp,$header);
		$inheader = 1; 
		$res = $header_ret = $allret ="";
		while (!feof($fp)) {
			$line = @fgets($fp,1024); //去除请求包的头只显示页面的返回数据 
			$allret .= $line;
			if ($inheader && ($line == "\n" || $line == "\r\n")) {
				 $inheader = 0; 
			} 
			if ($inheader == 0) { 
				$res.=$line; 
			}else $header_ret .= $line;
		} 
		@fclose($fp);

		return $allret;

	}else{//最后一种方法，这个方法不一定有效，因为有的服务器不支持file_get_contents获取远程的内容
		$urlarr = parse_url($url);
		$header = "";
		$header .= "X-Browser: ".$browser." SOCK\r\n";
		$header .= "Referer: http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']."\r\n";
		$header .= "X-UserID: ".($_SESSION['X-UserID']?$_SESSION['X-UserID']:'0')."\r\n";
		$header .= "X-IDWEB: ".IDWEB."\r\n";
		if($sessid){
			$header .= "Cookie: PHPSESSID=".$sessid."\r\n";
		}

		$httpArr = array(
			'method'=>$method,
			'header'=>$header
		  );
		if($method=='POST'){
			$httpArr['content'] = is_array($postdata)?http_build_query($postdata):$postdata;
		}

		$opts = array(
		  'http'=>$httpArr
		);
		$context = stream_context_create($opts);

		$res = @file_get_contents($url, false, $context);
		if($res){
			$res = implode("\r\n", $http_response_header)."\r\n\r\n".$res;
		}
		return $res;
	}
}
//如果是来自搜索引擎的爬虫，缓存的路径不一样
function is_search_robot(){
	$agent= strtolower($_SERVER['HTTP_USER_AGENT']);
	if (!empty($agent)) {
		$spiderSite= array(
				"TencentTraveler",
				"Baiduspider+",
				"BaiduGame",
				"Googlebot",
				"msnbot",
				"Sosospider+",
				"Sogou web spider",
				"ia_archiver",
				"Yahoo! Slurp",
				"YoudaoBot",
				"Yahoo Slurp",
				"MSNBot",
				"Java (Often spam bot)",
				"BaiDuSpider",
				"Voila",
				"Yandex bot",
				"BSpider",
				"twiceler",
				"Sogou Spider",
				"Speedy Spider",
				"Google AdSense",
				"Heritrix",
				"Python-urllib",
				"Alexa (IA Archiver)",
				"Ask",
				"Exabot",
				"Custo",
				"OutfoxBot/YodaoBot",
				"yacy",
				"SurveyBot",
				"legs",
				"lwp-trivial",
				"Nutch",
				"StackRambler",
				"The web archive (IA Archiver)",
				"Perl tool",
				"MJ12bot",
				"Netcraft",
				"MSIECrawler",
				"WGet tools",
				"larbin",
				"Fish search",
		);
		foreach($spiderSite as $val) {
			$str = strtolower($val);
			if (strpos($agent, $str) !== false) {
				return true;
			}
		}
	}else{
		return false;
	}
}
/**
 * 判断是否mip页面
 */
function is_mip_page() {
	return strpos($_SERVER['PHP_SELF'], 'mip_') !== false;
}
/**
 * mip的网址转换
 */
function mip_canonical(){
	$path = $_SERVER['PHP_SELF'];
	$path1 = substr($path, 0, strrpos($path, "/") + 1);
	$path2 = substr($path, strrpos($path, "/") + 1);
	if (strpos($path2, "mip_") === false) $path = $path1 . "mip_" . $path2;
	else $path = $path1 . substr($path2, 4);

	$url = (is_https() ? 'https://' : 'http://') . $_SERVER['HTTP_HOST'] . $path . ($_SERVER['QUERY_STRING'] ? '?' . $_SERVER['QUERY_STRING'] : '');
	return $url;	
}
/**
 * 判断当前网站是否https
 */
function is_https(){
	if (!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'on') {
		return true;
	} else if($_SERVER['HTTP_FROM_HTTPS'] == 'on' || $_SERVER['HTTP_SSL_FLAG'] == 'SSL'){
        return true;
    } elseif (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https') {
		return true;
	} elseif (!empty($_SERVER['HTTP_FRONT_END_HTTPS']) && strtolower($_SERVER['HTTP_FRONT_END_HTTPS']) !== 'off') {
		return true;
	}
	return false;
}
?>