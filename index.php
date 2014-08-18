<?php
/**
 * 版权所有 (c) 2014，保留所有权利。
 * NetFav 2.0
 *
 * 首页
 */

include 'session.php';

// 如果会话存在表示已经登录
if($_SESSION['name'])
{
	header('Location: main.php'); // 如果已经登陆则跳转到 main 页面
	die(); // 不执行之后的代码
}
else
{
	?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>H</title>
<script type = "text/javascript">
window.onload = function()
{
	var U=document.getElementById("User");
	U.select();
}

function S(M){var P=8;var A=0;function D(Q,R){var S=(Q&65535)+(R&65535);var T=(Q>>16)+(R>>16)+(S>>16);return(T<<16)|(S&65535)}function F(R,Q){return(R>>>Q)|(R<<(32-Q))}function E(R,Q){return(R>>>Q)}function G(Q,R,S){return((Q&R)^((~Q)&S))}function B(Q,R,S){return((Q&R)^(Q&S)^(R&S))}function H(Q){return(F(Q,2)^F(Q,13)^F(Q,22))}function O(Q){return(F(Q,6)^F(Q,11)^F(Q,25))}function C(Q){return(F(Q,7)^F(Q,18)^E(Q,3))}function K(Q){return(F(Q,17)^F(Q,19)^E(Q,10))}function J(V,U){var r=new Array(1116352408,1899447441,3049323471,3921009573,961987163,1508970993,2453635748,2870763221,3624381080,310598401,607225278,1426881987,1925078388,2162078206,2614888103,3248222580,3835390401,4022224774,264347078,604807628,770255983,1249150122,1555081692,1996064986,2554220882,2821834349,2952996808,3210313671,3336571891,3584528711,113926993,338241895,666307205,773529912,1294757372,1396182291,1695183700,1986661051,2177026350,2456956037,2730485921,2820302411,3259730800,3345764771,3516065817,3600352804,4094571909,275423344,430227734,506948616,659060556,883997877,958139571,1322822218,1537002063,1747873779,1955562222,2024104815,2227730452,2361852424,2428436474,2756734187,3204031479,3329325298);var S=new Array(1779033703,3144134277,1013904242,2773480762,1359893119,2600822924,528734635,1541459225);var s=new Array(64);var Y,Z,k,n,o,p,q,R,X,T;var Q,t;V[U>>5]|=128<<(24-U%32);V[((U+64>>9)<<4)+15]=U;for(var X=0;X<V.length;X+=16){Y=S[0];Z=S[1];k=S[2];n=S[3];o=S[4];p=S[5];q=S[6];R=S[7];for(var T=0;T<64;T++){if(T<16){s[T]=V[T+X]}else{s[T]=D(D(D(K(s[T-2]),s[T-7]),C(s[T-15])),s[T-16])}Q=D(D(D(D(R,O(o)),G(o,p,q)),r[T]),s[T]);t=D(H(Y),B(Y,Z,k));R=q;q=p;p=o;o=D(n,Q);n=k;k=Z;Z=Y;Y=D(Q,t)}S[0]=D(Y,S[0]);S[1]=D(Z,S[1]);S[2]=D(k,S[2]);S[3]=D(n,S[3]);S[4]=D(o,S[4]);S[5]=D(p,S[5]);S[6]=D(q,S[6]);S[7]=D(R,S[7])}return S}function I(R){var T=Array();var Q=(1<<P)-1;for(var S=0;S<R.length*P;S+=P){T[S>>5]|=(R.charCodeAt(S/P)&Q)<<(24-S%32)}return T}function N(R){R=R.replace(/\r\n/g,"\n");var S="";for(var Q=0;Q<R.length;Q++){var T=R.charCodeAt(Q);if(T<128){S+=String.fromCharCode(T)}else{if((T>127)&&(T<2048)){S+=String.fromCharCode((T>>6)|192);S+=String.fromCharCode((T&63)|128)}else{S+=String.fromCharCode((T>>12)|224);S+=String.fromCharCode(((T>>6)&63)|128);S+=String.fromCharCode((T&63)|128)}}}return S}function L(Q){var R=A?"0123456789ABCDEF":"0123456789abcdef";var S="";for(var T=0;T<Q.length*4;T++){S+=R.charAt((Q[T>>2]>>((3-T%4)*8+4))&15)+R.charAt((Q[T>>2]>>((3-T%4)*8))&15)}return S}M=N(M);return L(J(I(M),M.length*P))};


// POST 处理
function onPost()
{
    var M=document.getElementById("Pwd"); // 获得输入的密码的对象
	var P=M.value; // 获得密码的值
	if(P=="")
	{
		//alert("Please fill in password!");
		M.select();
		return false;
	}
    var K="<?=session_id();?>"; // 服务器传递的随机值
    var T=S(P); // 散列密码值
    var R=S(K+T); // 散列随机值和密码的散列值
    document.forms["FormLogin"].elements["Pwd"].value=R; // 将密码改为最终散列的值
    return true; // 返回正确
}

function onReg()
{
	window.location = "reg.php";
}
</script>
</head>
<body>
<form action="login.php" method="post" enctype="application/x-www-form-urlencoded" id="FormLogin" onSubmit="return onPost();">
  <div align="center">
    <table width="600" border="0">
      <tr>
        <td>用户：
        <input name="User" type="text" id="User" size="16" maxlength="16" /></td>
        <td>密码：
        <input name="Pwd" type="password" id="Pwd" size="17" maxlength="16" autocomplete="off" /></td>
        <td><input type="submit" name="Login" id="Login" value="登陆" /></td>
        <td><input type="button" id="reg" value="注册" onclick="onReg();" /></td>
      </tr>
    </table>
  </div>
</form>
</body>
</html>
<?php
} 
?>