<?php
//字符串操作

//连接、分割字符串
//explode()，第三个参数表示最少要返回多少个元素
$email = explode("@", "602842617@qq.com@good@sad",3);
echo "<pre>";
var_dump($email);
echo "<pre>";
//implode、join用法和参数一样
$implode = implode("|", $email);
echo $implode."<br/>";
//substr(),第二个参数为要开始取的位置。第三个参数为长度
$substr = substr("This is a word", 3,6);
echo $substr."<br/>";

//字符串比较
//strcmp(str1,str2)，如果str1 > str2，返回1,反之返回-1，如果相等则返回0
//如果前面几位都相等，从某一位开始不等，则取这一位的ascll码差值与返回值乘积
//如果前面几位都相等，从某一位开始，$str2已经结束，则返回字符串相差长度与返回值的乘积，如”bear”和”be”，则比较会返回2
//ord() 返回字符串的第一个字符ASCLL码
//strcasecmp()，忽略大小写
//strnatcmp(),按照自然算法，2<12。而上面两个都是按照计算机算法，2>12
$str1 = "bear";;
$str2 = "tear";
echo ord($str1)."<br/>"; 	//
echo ord($str2)."<br/>"; 
echo "strcmp:" . strcmp($str1, $str2) . "<br/>";

//字符串匹配和查找字符串
//查找字符串位置：string strstr(string haystack,string needle)
//int strpos() intstrrpos() 返回指定字符串出现的第一个位置/最后一个位置
$strpos = strrpos("Hello World WorldNot", "Wor");
$strstr = strstr("Hello World", "Wor");
echo "strstr:" . $strstr . "<br/>";
echo "strpos:" . $strpos . "<br/>";

//mixed str_replace(mixed needle,mixed new_needle,mixed haystack,[,int count])
//第一个参数是要被替换的，第二个是要替换掉第一个的参数，第三个是指定的字符串，第四个可选，是替换的次数。第一个和第二个参数可以为数组
$needle = "happy angry sad angry cheer";
$replace_word = "angry";
$new_needle = "good";
$mix_str_replace = str_replace($replace_word,$new_needle,$needle);
var_dump($mix_str_replace);
//mixed substr_replace(string string,string replacement,int start,int [length])
//第一个参数是指定字符串，第二个参数是要替换的字符串，第三个参数是起始位置，第四个是长度

$str = "aaa啊啊啊...";
echo mb_strlen($str,"utf-8")."<br/>";
echo mb_strwidth($str,'GB2312')."<br/>";
?>