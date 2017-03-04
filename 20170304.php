<?php
//2017-03-03 数组专栏

$arr1 = array(5,1,2,4,3,5,5,2,7,8,1,9,8,8);

//array_count_values() 统计数组中值出现的次数,键名即为数组中得键值，键值为出现次数
$y = array_count_values($arr1);
echo "<pre>";
echo "array_count_values():<br/>";
print_r($y);


//array_unique(),键值为相同值首次出现的键值，
echo "array_unique():<br/>";
print_r(array_unique($arr1));


//sort()排序函数,从小到大。rsort()从大到小
//返回值是TRUE和false，直接将数组进行排序，因此不能将sort函数处理后赋值给另一个变量
echo "sort():<br/>";
sort($arr1);
print_r($arr1);
rsort($arr1);
print_r($arr1);

//array_diff($arr1,$arr2)，将第一个参数数组中的跟第二个参数数组不同的元素以数组形式存起来
//array_diff_assoc($arr1,$arr2)，将第一个跟第二个参数数组比较有无相同的键名并且键值相同
//两者都是用第一个参数去跟第二个参数比较，而不是后者跟前者比较
$arr1 = array('b'=>"apple",'pear','peach','good','a'=>"apple",'potato','tomato');
$arr2 = array('b'=>"apple",'a'=>'pear','peach');
print_r($arr1);
print_r($arr2);

print_r(array_diff_assoc($arr1, $arr2));

//array_slice($arr,$start[,$length,$preserve]) 函数在数组中根据条件取出一段值，并返回。
//$preserve参数不带时默认为false,即重置键值（只有当键值为数字的时候），带参数的时候若为false则不重置
$a = array('0'=>'red','1'=>'green','2'=>'blue','3'=>'black','4'=>'kkk');
print_r(array_slice($a, 1,4,false));

//shuffle()随机打乱数组顺序
//array_rand($arr,$count)随机返回数组键名，个数为$count
shuffle($a);
print_r($a);
$rand_key = array_rand($a);

echo "array_rand():";
print_r($a[$rand_key]);
echo "<br/>";

//array_merge()合并数组
$b = array('kk','sad','cool');
$c = array_merge($a,$b);
print_r($c);
//in_array($val,$arr[,$type])函数在数组中搜索给定的值，type检查搜索的数据跟数组的值得类型是否相同，返回true or fale
echo 'in_array():';
if(in_array('kk', $b)){
	echo 'ok,in<br/>';
}

//array_pop()删除数组的最后一个元素
//array_shift()删除数组的第一个元素
echo "before array_pop():";
print_r($b);

echo "after array_pop():";
array_pop($b);
print_r($b);

echo "after array_shift():";
array_shift($b);
print_r($b);


//array_push(),将一个或多个单元压入数组末尾，即入栈
//array_unshift()将一个或多个单元压入数组头，即入栈
$lang = array('java','jsp','jquery');
echo "before array_push():";
print_r($lang);

echo "after array_push():";
array_push($lang, 'php',array('html','css'));
print_r($lang);

echo "after array_unshift():";
array_unshift($lang, "python");
print_r($lang);


//array_filter($input,$callback)
$input = array('10','11','13','14','16');
function old($var)

{
	if($var % 2 == 0){
		return true;
	}else{
		return false;
	}
}
echo "before array_filter():";
print_r($input);
echo "after array_filter():";
print_r(array_filter($input,"old"));
echo "</pre>";


?>