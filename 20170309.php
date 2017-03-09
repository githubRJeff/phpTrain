<?php
//2017-03-06 
//数据库函数系列
$host1 = '127.0.0.1';
$host2 = 'localhost';
$username = 'root';
$password = '361450596JEFF.';
$my_db = 'test';
//mysqli_connect()面向过程，new mysqli()则是面向对象的方法
@$con = new mysqli($host2,$username,$password,$my_db);
if (mysqli_connect_error()) {
	echo mysqli_connect_error();
	exit();
}
// $con = @mysqli_connect($host2,$username,$password,$my_db) or die('Cannot connect to mysql server');
echo "<pre>";
var_dump($con);
//$con->query()面向对象的方法,mysqli_query($sql)是面向过程的方法
//$res = mysqli_query('test', $query);
//需要设置文件编码，否则会出现中文乱码
$con->query('SET NAMES UTF8');
$sql = "select * from performance_test limit 10";
//面向对象，面向过程的方法是mysqli_query()
$res = $con->query($sql);

//防止数据出错
if (!$res) {
	printf("Error:%s\n",mysqli_error($con));
	exit();
}

//mysqli_fetch_array()，从结果集中取得当前行作为数字数组和关联数组
//mysqli_fetch_row()，从结果集中取得当前行作为数字数组
///mysqli_fetch_assoc()，从结果集中取得当前行作为关联数组

echo "<br/><br/>面向对象fetch_array()取出一个结果集：<br/>";
var_dump($res->fetch_array());
echo "<br/><br/>面向对象fetch_object()循环取出所有结果集：(第一个结果集已经在上面被取出)<br/>";
while ($row = $res->fetch_object()) {
	var_dump($row->intro);
}

echo "<br/><br/>面向过程fetch_object()循环取出所有结果集：<br/>";
$res2 = mysqli_query($con,$sql);
while ($row = mysqli_fetch_object($res2)) {
	var_dump($row->intro);
}

echo "<br/><br/>计算一共有多少条数据<br/>";
var_dump(mysqli_num_rows($res2));
echo "<br/><br/>获取查询的字段个数<br/>";
var_dump(mysqli_num_fields($res2));

echo "<br/><br/>affected_rows检查影响行数<br/>";
$insert_sql = "Insert into performance_test(name,intro,age) values('cool','cool intro',30)";
$res3 = $con->query($insert_sql);
var_dump($con->affected_rows);
echo "<br/>";

$insert_sql2 = 'INSERT into performance_test(name,intro,age) values (?, ?, ?)';
$name = "stmt_name";
$intro = "stmt_intro-good";
$age = 22;

// $stmt = $con->prepare($insert_sql2) or die($con->error);
// $stmt->bind_param("ssd",$name,$intro,$age);
$select_sql = "SELECT * FROM performance_test WHERE age=? AND name=?";
$stmt = $con->prepare($select_sql) or die($con->error);
$age2 = 22;
$name2 = 'stmt_name';
$stmt->bind_param("ds",$age2,$name2);

if (!$stmt->execute()) {
	die("操作失败".$stmt->error);
}else{
	//bind_result()中的变量数要跟取出来的字段数相同
	$res = $stmt->bind_result($stmt_id,$stmt_name,$stmt_intro,$stmt_age);
	echo "stmt取出所有数据：";
	while ($stmt->fetch()){
		echo "第" . $stmt_id . "条数据：" . $stmt_age;
	}
}
$stmt->close();




echo "</pre>";

?>