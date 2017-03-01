<?php
//2017-03-01，字符串处理函数
//ltrim,rtrim,trim 处理掉字符串最左边/右边/前后两边的空格
	$arr['left'] = ltrim(" god");
	$arr['right'] = rtrim("sad ");
	$arr['middle'] = trim(" noodle ");
	echo "<pre>";
	var_dump($arr); 
	echo "<pre><br/>";

//htmlspecialchars() 函数把一些预定义的字符转换为 HTML 实体。
//函数原型：htmlspecialchars(string,quotestyle,character-set)
// 预定义的字符是：
// < （小于）成为 &lt; > （大于）成为 &gt; & （和号）成为 &amp; ” （双引号）成为 &quot; ‘ （单引号） 成为 &#039;

	
	$change_line1 = "&lt;p&gt;请输入内容...&lt;/p&gt;";
	$change_line2 = "<请输入内容>";
	echo htmlspecialchars_decode($change_line1)."<br/>";
	echo htmlspecialchars($change_line2)."<br/>";	
//一般来说，使用 htmlspecialchars 转化掉基本字符就已经足够了，没有必要使用 htmlentities。
//实在要使用 htmlentities 时，要注意为第三个参数传递正确的编码。
	$str = '<a href="demo.php?m=index&a=index&name=中文">测试页面</a>';
	echo 'htmlentities指定GB2312编码：'.htmlentities($str,ENT_COMPAT,"UTF-8").'<br/>';
	echo 'htmlentities未指定编码：'.htmlentities($str).'<br/>';

//addslashes()、stripslashes()、addcslashes()、stripcslashes()函数
//前两个用于转义字符串，存入数据库中防注入，strip取出来
//后者可以指定特定位置转义字符串，如

	$datas = "He said,'good!'";
	if (!get_magic_quotes_gpc()){
		$mysql_datas = addslashes($datas);
		echo "mysql_datas:".$mysql_datas."<br/>";
		$real_datas = stripslashes($mysql_datas);
		echo "real datas:" . $real_datas . "<br/>";
		echo addcslashes($datas,'A..Z')."<br>";
		echo addcslashes($datas,'a..z')."<br>";
		echo addcslashes($datas,'a..g')."<br/>";
	}else{
		echo $datas;
	}

//ucwords() 字符串每一个单词开头字母都改为大写 ;
//ucfirst() 字符串第一个字母改为大写
//strtolower() 字符串全都转为小写
//strtoupper() 字符串全都转为大写
$uc = "this is me";
echo "ucwords:" . ucwords($uc) . "<br/>";
echo "ucfirst:" . ucfirst($uc) . "<br/>";
$tolower = strtolower("THIS IS UPPER")."<br/>";
echo $tolower;
$toupper = strtoupper("this is lower")."<br/>";
echo $toupper;
?>