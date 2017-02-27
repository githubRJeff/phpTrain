<?php
// 时间函数测试
//time(),getDate(),date(),strtotime(),mktime(),checkDate()
//打印当前时间戳
$time = time();
echo "time():".$time."<br/>";

//getDate()将当前的日期、时间、周几、时间戳等等存放到数组里面
$get_date = getdate();
echo "getDate():<br/>";
echo "<pre>";
var_dump($get_date)."<br/>";
echo "</pre>";
echo $get_date['hours']."<br/>";


//打印出当前时间，需要指定格式
$date = date("Y-m-d");
echo "date():".$date."<br/>";

//也可以用于转化时间戳，时间戳放在第二个参数，如
$date2= date("Y-m-d H:i:s","1488174749");
echo "date2:".$date2."<br/>";

//strtotime() 函数将任何英文文本的日期或时间描述解析为 Unix 时间戳
//指定对应日期，如下1980年10月15号
echo "strtotime():".strtotime("15 October 1980") ."<br/>";
//指定一周7天+3天+7小时+5秒之后的时间戳
echo "strtotime2():".strtotime("+1 week 3 days 7 hours 5 seconds") . "<br>";
//打印出前一天的时间
$before_day = date("Y-m-d H:i:s",strtotime("-1 day"));
echo "before_day:".$before_day."<br/>";
//打印出上个周日的时间戳
echo "strtotime():".strtotime("last Sunday")."<br/>";
//打印出当前年份
echo "date():".date("Y")."<br/>";

//打印出指定日期时间的时间戳
//mktime(hour,minute,second,month,day,year)
echo "mktime():".mktime(0,0,0,1,1,2012)."<br/>";

//检验日期有效性,checkDate(int month,int day,int year)
echo "checkDate():".checkDate(2,28,2017)."<br/>";

?>