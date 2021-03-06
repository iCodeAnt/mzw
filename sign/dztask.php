<?php
/*
*DiscuzX系列论坛任务系统
*/
error_reporting(0);
set_time_limit(0);
ignore_user_abort(true);
header("content-Type: text/html; charset=utf-8");

function curl_get($url, $use = false, $save = false, $referer = null, $post_data = null){
	global $cookie_file;
    $ch=curl_init($url);
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/30.0.1599.101 Safari/537.36');
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	//需要使用cookies
	if($use){
		curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie_file);
    }
	//需要保存cookies
	if($save){
		curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie_file);
    }
	//需要referer伪装
	if(isset($referer))
		curl_setopt($ch, CURLOPT_REFERER, $referer);
	//需要post数据
	if(is_array($post_data)) {
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    }
    $content = curl_exec($ch);
    curl_close($ch);
    return $content;
}

function get_formhash($res){
	preg_match('/name="formhash" value="(.*?)"/i', $res, $matches);
	if(isset($matches))
        return $matches[1];
	else
		exit('没有找到formhash');
}


//签到代码
$url = isset($_POST['u']) ? $_POST['u'] : $_GET['u'];
$user = isset($_POST['user']) ? $_POST['user'] : $_GET['user'];//用户名
$pwd = isset($_POST['pwd']) ? $_POST['pwd'] : $_GET['pwd'];//密码
$quest = isset($_POST['quest']) ? $_POST['quest'] : $_GET['quest'];//密码提示问题
$answ = isset($_POST['answ']) ? $_POST['answ'] : $_GET['answ'];//密码提示问题答案
$task = isset($_POST['task']) ? $_POST['task'] : $_GET['task'];//任务ID
if($url && $user && $pwd && $task){}else{echo"<font color='red'>输入不完整!<a href='javascript:history.back();'>返回重新填写</a></font>";exit;}

//论坛首页地址
$baseUrl = preg_match("/^http:\/\//",$url)?$url:"http://".$url."/";
//账号登录地址
$loginPageUrl = $baseUrl.'member.php?mod=logging&action=login';
//账号信息提交地址
$loginSubmitUrl = $baseUrl.'member.php?mod=logging&action=login&loginsubmit=yes&loginhash=LNvu3';
//任务申请地址
$applyUrl = $baseUrl.'home.php?mod=task&do=apply&id='.$task;
//任务完成地址
$drawUrl = $baseUrl.'home.php?mod=task&do=draw&id='.$task;
//系统提醒页面
$noticeUrl = $baseUrl.'home.php?mod=space&do=notice&view=system';

//存放Cookies的文件
$cookie_file = tempnam('./','cookie');

//访问论坛登录页面，保存Cookies
$res=curl_get($loginPageUrl, false, true);

if(preg_match('!charset=gbk\"!i', $res) || preg_match('!charset=\"gbk\"!i', $res))$gbk=1;else $gbk=0;

//获取DiscuzX论坛的formhash验证串
$formhash = get_formhash($res);

//构建登录信息
$login_array=array(
					'username'=>$user,
                    'password'=>$pwd,
                    'referer'=>$baseUrl,
                    'questionid'=>$quest,
                    'answer'=>$answ,
					'formhash'=>$formhash,
					);

//携带cookie提交登录信息
$res=curl_get($loginSubmitUrl ,true, true, null, $login_array);

//访问申请任务页面
$res=curl_get($applyUrl, true, false, null);
if($gbk){$res=iconv('gbk', 'UTF-8//IGNORE', $res);}


//访问完成任务页面
$res2 = curl_get($drawUrl ,true, false, null);
if($gbk){$res2=iconv('gbk', 'UTF-8//IGNORE', $res2);}


if(strpos($res2, '任务已成功完成'))
{
	$resultStr = '任务已成功完成';
	//访问系统提醒页面
	curl_get($noticeUrl ,true, false, null);
}
elseif(strpos($res, '需要先登录才能继续本操作'))
{
	$resultStr = '登录失败！可能需要验证码';
}
else
{
	$resultStr = '任务失败';
}
if(strpos($res, '您已申请过此任务'))
{
	$resultStr = '本期您已申请过此任务';
}


echo $resultStr;

@unlink($cookie_file);//删除cookie文件
?>