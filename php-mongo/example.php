<!DOCTYPE HTML>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<head>

    <a href="../index.php">返回主页</a>
  <title>英倍IELTS音频站</title>

<meta name="viewport" content="width=device-width, initial-scale=1" />
</head>

<html>

<body>


<?php
ini_set('display_errors',1);            //错误信息
ini_set('display_startup_errors',1);    //php启动错误信息
error_reporting(-1);                    //打印出所有的 错误信息
//链接mongodb 关键是最后斜杠/后的数据库，否则Auth会出错
$manager = new MongoDB\Driver\Manager('mongodb://dict:testbayrules@192.168.111.67:27017/dict');
 // 插入数据
$bulk = new MongoDB\Driver\BulkWrite;
$bulk->insert(['x' => 1, 'name'=>'菜鸟教程', 'url' => 'http://www.runoob.com']);
$bulk->insert(['x' => 2, 'name'=>'Google', 'url' => 'http://www.google.com']);
$bulk->insert(['x' => 3, 'name'=>'taobao', 'url' => 'http://www.taobao.com']);
$manager->executeBulkWrite('test.sites', $bulk);

$filter = ['x' => ['$gt' => 1]];
$options = [
    'projection' => ['_id' => 0],
    'sort' => ['x' => -1],
];

// 查询数据
$query = new MongoDB\Driver\Query($filter, $options);
$cursor = $manager->executeQuery('test.sites', $query);

foreach ($cursor as $document) {
    print_r($document);
}
?>

</body>

</html>
