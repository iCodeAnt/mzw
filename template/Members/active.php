<?php global $zym_decrypt;$zym_decrypt['�֮�����î����֯�þ��Į���֥����']=base64_decode('ZGVmaW5lZA==');$zym_decrypt['���������ċ����֮�������������È']=base64_decode('ZGFkZHNsYXNoZXM=');$zym_decrypt['־��������ï������Ë��Į���ċË�']=base64_decode('c3RyaXBfdGFncw==');$zym_decrypt['��î����Ë����֯��������֔��å��']=base64_decode('c3RybGVu');$zym_decrypt['���֥���֥�����֥�����Į������į']=base64_decode('Z2V0X2N1cmw=');$zym_decrypt['��ֈ������Ô�Î֋�ֈ������������']=base64_decode('dXJsZW5jb2Rl');$zym_decrypt['����֯È���Ë���å��֋��þ������']=base64_decode('c2hvd21zZw==');$zym_decrypt['֥�������֯�������Ë��֥��������']=base64_decode('YmFzZTY0X2RlY29kZQ=='); ?>
<?php
if(!$GLOBALS['zym_decrypt']['�֮�����î����֯�þ��Į���֥����'](base64_decode('SU5fQ1JPTkxJVEU=')))exit();$title='激活账号';$breadcrumb='<li><a href="index.php?mod=user"><i class="icon fa fa-home"></i>首页</a></li>
<li class="active"><a href="#"><i class="icon fa fa-mobile-phone"></i>激活账号</a></li>';include TEMPLATE_ROOT.base64_decode('aGVhZC5waHA=');echo base64_decode('PGRpdiBjbGFzcz0iY29sLWxnLTggY29sLXNtLTEwIGNvbC14cy0xMiBjZW50ZXItYmxvY2siIHJvbGU9Im1haW4iPg==');if($islogin==1){if($_GET['my']=='start'){$phone=$GLOBALS['zym_decrypt']['���������ċ����֮�������������È']($_GET['phone']);$verifycode=$GLOBALS['zym_decrypt']['���������ċ����֮�������������È']($GLOBALS['zym_decrypt']['־��������ï������Ë��Į���ċË�']($_GET['verify']));if(isset($_SESSION['smsuid'])){echo '<div class="panel panel-primary">
<div class="panel-heading w h"><h3 class="panel-title">手机激活账号</h3></div><div class="panel-body box">';echo $_SESSION['smsmsg'];echo base64_decode('PHA+PGZvcm0gYWN0aW9uPSJpbmRleC5waHAiIG1ldGhvZD0iR0VUIj4KPGlucHV0IHR5cGU9ImhpZGRlbiIgbmFtZT0ibW9kIiB2YWx1ZT0iYWN0aXZlIj4KPGlucHV0IHR5cGU9ImhpZGRlbiIgbmFtZT0ibXkiIHZhbHVlPSJ2ZXJpZnkiPgo8aW5wdXQgdHlwZT0iaGlkZGVuIiBuYW1lPSJwaG9uZSIgdmFsdWU9Ig==').$phone.'">
<input type="hidden" name="uid" value="'.$_SESSION['smsuid'].'">
<input type="submit" class="btn btn-success btn-block" value="立即验证"></form></p>
<p><a href="index.php?mod=active" class="btn btn-block btn-default">返回重填</a></p>';echo base64_decode('PC9kaXY+PC9kaXY+');exit;}if($GLOBALS['zym_decrypt']['��î����Ë����֯��������֔��å��']($phone)!=11){exit("<script language='javascript'>alert('手机号码格式不正确！');history.go(-1);</script>");}if(empty($verifycode)|| $verifycode!=$_SESSION['verifycode']){exit("<script language='javascript'>alert('验证码不正确！');history.go(-1);</script>");}$row=$DB->get_row("SELECT * FROM ".DBQZ."_user WHERE phone='$phone' limit 1");if($row['user']!=''){exit("<script language='javascript'>alert('此手机号码已激活过本站账号，请勿重复注册！');history.go(-1);</script>");}$json=$GLOBALS['zym_decrypt']['���֥���֥�����֥�����Į������į']($smsapi.'smsapi.php?act=start&url='.$GLOBALS['zym_decrypt']['��ֈ������Ô�Î֋�ֈ������������']($siteurl).'&authcode='.$authcode.'&phone='.$phone.'&syskey='.SYS_KEY);$arr=json_decode($json,true);if($arr['code']==1){unset($_SESSION['verifycode']);$_SESSION['smsuid']=$arr['uid'];$_SESSION['smsmsg']=$arr['msg'];echo base64_decode('PGRpdiBjbGFzcz0icGFuZWwgcGFuZWwtcHJpbWFyeSI+CjxkaXYgY2xhc3M9InBhbmVsLWhlYWRpbmcgdyBoIj48aDMgY2xhc3M9InBhbmVsLXRpdGxlIj7miYvmnLrmv4DmtLvotKblj7c8L2gzPjwvZGl2PjxkaXYgY2xhc3M9InBhbmVsLWJvZHkgYm94Ij4=');echo $arr['msg'];echo base64_decode('PHA+PGZvcm0gYWN0aW9uPSJpbmRleC5waHAiIG1ldGhvZD0iR0VUIj4KPGlucHV0IHR5cGU9ImhpZGRlbiIgbmFtZT0ibW9kIiB2YWx1ZT0iYWN0aXZlIj4KPGlucHV0IHR5cGU9ImhpZGRlbiIgbmFtZT0ibXkiIHZhbHVlPSJ2ZXJpZnkiPgo8aW5wdXQgdHlwZT0iaGlkZGVuIiBuYW1lPSJwaG9uZSIgdmFsdWU9Ig==').$phone.'">
<input type="hidden" name="uid" value="'.$arr['uid'].'">
<input type="submit" class="btn btn-primary btn-block" value="立即验证"></form></p>
<p><a href="index.php?mod=active" class="btn btn-block btn-default">返回重填</a></p>';echo base64_decode('PC9kaXY+PC9kaXY+');}elseif($arr['code']==-1){$GLOBALS['zym_decrypt']['����֯È���Ë���å��֋��þ������']($arr['msg']);exit;}else{$GLOBALS['zym_decrypt']['����֯È���Ë���å��֋��þ������'](base64_decode('5LiOQVBJ6YCa5L+h5aSx6LSl77yM6K+356iN5ZCO5YaN6K+V'));exit;}}elseif($_GET['my']=='verify'){$phone=$GLOBALS['zym_decrypt']['���������ċ����֮�������������È']($_GET['phone']);$uid=$GLOBALS['zym_decrypt']['���������ċ����֮�������������È']($_GET['uid']);$json=$GLOBALS['zym_decrypt']['���֥���֥�����֥�����Į������į']($smsapi.'smsapi.php?act=verify&url='.$GLOBALS['zym_decrypt']['��ֈ������Ô�Î֋�ֈ������������']($siteurl).'&authcode='.$authcode.'&phone='.$phone.'&uid='.$uid.'&syskey='.SYS_KEY);$arr=json_decode($json,true);if($arr['code']==1){unset($_SESSION['smsuid']);unset($_SESSION['smsmsg']);echo base64_decode('PGRpdiBjbGFzcz0icGFuZWwgcGFuZWwtcHJpbWFyeSI+CjxkaXYgY2xhc3M9InBhbmVsLWhlYWRpbmcgdyBoIj48aDMgY2xhc3M9InBhbmVsLXRpdGxlIj7miYvmnLrmv4DmtLvotKblj7c8L2gzPjwvZGl2PjxkaXYgY2xhc3M9InBhbmVsLWJvZHkgYm94Ij4=');echo base64_decode('PHA+5oGt5Zac5L2g5bey6YCa6L+H6aqM6K+B77yBPC9wPg==');echo base64_decode('PHA+PGEgaHJlZj0i').$arr['click'].'" class="btn btn-block btn-success">点此立即激活账号</a></p>';echo base64_decode('PC9kaXY+PC9kaXY+');}elseif($arr['code']==-1){$GLOBALS['zym_decrypt']['����֯È���Ë���å��֋��þ������']($arr['msg']);exit;}else{$GLOBALS['zym_decrypt']['����֯È���Ë���å��֋��þ������'](base64_decode('5LiOQVBJ6YCa5L+h5aSx6LSl77yM6K+356iN5ZCO5YaN6K+V'));exit;}}elseif($_GET['my']=='doactive'){$phone=authcode($GLOBALS['zym_decrypt']['֥�������֯�������Ë��֥��������']($_GET['code']),'DECODE',SYS_KEY);if($GLOBALS['zym_decrypt']['��î����Ë����֯��������֔��å��']($phone)!=11){$GLOBALS['zym_decrypt']['����֯È���Ë���å��֋��þ������']('账号激活失败！');exit;}$sql18="update `".DBQZ."_user` set `phone` ='{$phone}',`active` ='1' where `user`='$gl'";$sds=$DB->query($sql18);if($sds){$GLOBALS['zym_decrypt']['����֯È���Ë���å��֋��þ������']('账号激活成功！<a href="index.php?mod=user">尽情使用吧</a>。',1);}else{$GLOBALS['zym_decrypt']['����֯È���Ë���å��֋��þ������'](base64_decode('6LSm5Y+35r+A5rS75aSx6LSlITxici8+').$DB->error(),4);}exit;}else{unset($_SESSION['smsuid']);unset($_SESSION['smsmsg']);if($row['active']==1){$GLOBALS['zym_decrypt']['����֯È���Ë���å��֋��þ������']('您已激活账号！',2);exit;}echo base64_decode('PGRpdiBjbGFzcz0icGFuZWwgcGFuZWwtcHJpbWFyeSI+CjxkaXYgY2xhc3M9InBhbmVsLWhlYWRpbmcgdyBoIj48aDMgY2xhc3M9InBhbmVsLXRpdGxlIj7miYvmnLrmv4DmtLvotKblj7c8L2gzPjwvZGl2PjxkaXYgY2xhc3M9InBhbmVsLWJvZHkgYm94Ij4=');echo base64_decode('PGZvcm0gYWN0aW9uPSJpbmRleC5waHAiIG1ldGhvZD0iR0VUIj4KPGlucHV0IHR5cGU9ImhpZGRlbiIgbmFtZT0ibW9kIiB2YWx1ZT0iYWN0aXZlIj4KPGlucHV0IHR5cGU9ImhpZGRlbiIgbmFtZT0ibXkiIHZhbHVlPSJzdGFydCI+CjxkaXYgY2xhc3M9ImZvcm0tZ3JvdXAiPgo8bGFiZWw+6K+36L6T5YWl5L2g55qE5omL5py65Y+3OjwvbGFiZWw+PGJyPgo8aW5wdXQgdHlwZT0idGV4dCIgY2xhc3M9ImZvcm0tY29udHJvbCIgbmFtZT0icGhvbmUiIHZhbHVlPSIiIHJlcXVpcmVkPjwvZGl2Pgo8ZGl2IGNsYXNzPSJmb3JtLWdyb3VwIj48bGFiZWw+6aqM6K+B56CBOiA8L2xhYmVsPjxicj48aW1nIHRpdGxlPSLngrnlh7vliLfmlrAiIHNyYz0idmVyaWZ5Y29kZS5waHAiIG9uY2xpY2s9InRoaXMuc3JjPSd2ZXJpZnljb2RlLnBocD8nK01hdGgucmFuZG9tKCk7Ij48YnI+CjxpbnB1dCB0eXBlPSJ0ZXh0IiBjbGFzcz0iZm9ybS1jb250cm9sIiBuYW1lPSJ2ZXJpZnkiIHZhbHVlPSIiIGF1dG9jb21wbGV0ZT0ib2ZmIiByZXF1aXJlZD48L2Rpdj4KPGlucHV0IHR5cGU9InN1Ym1pdCIgY2xhc3M9ImJ0biBidG4tcHJpbWFyeSBidG4tYmxvY2siIHZhbHVlPSLkuIvkuIDmraUiPjwvZm9ybT4=');echo base64_decode('PC9kaXY+PC9kaXY+');}}else{$GLOBALS['zym_decrypt']['����֯È���Ë���å��֋��þ������'](base64_decode('55m75b2V5aSx6LSl77yM5Y+v6IO95piv5a+G56CB6ZSZ6K+v5oiW6ICF6Lqr5Lu95aSx5pWI5LqG77yM6K+3PGEgaHJlZj0iaW5kZXgucGhwP21vZD1sb2dpbiI+6YeN5paw55m75b2VPC9hPu+8gQ=='),3);}include TEMPLATE_ROOT.base64_decode('Zm9vdC5waHA=');?>