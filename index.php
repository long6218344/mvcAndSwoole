<?php 

require './configs/config.php';

// 自动加载类
function mvc_autoload($classname)
{
    // echo $classname;
    if (file_exists("./models/{$classname}.class.php")) {
        require "./models/{$classname}.class.php";
    } else if (file_exists("./controllers/{$classname}.class.php")) {
        require "./controllers/{$classname}.class.php";
    } else {
        header("HTTP/1.0 404 not found");
        echo '<h1>404 NOT FOUND: 来自于入口文件</h1>';
        exit;
    }
}

// 导入模版引擎
require './libs/Smarty.class.php';
// 注册给定的函数作为 __autoload 的实现
spl_autoload_register('mvc_autoload');

// 实例化模版引擎
// $smarty = new Smarty();
// var_dump($smarty);
// 初始化配置




// 获取用户参数
// 获取控制器名
$c = (!empty($_GET['c']))?$_GET['c']:'Index';
// 获取操作名   方法名
$a = (!empty($_GET['a']))?$_GET['a']:'index';

// 拼装类名
$classname = $c.'Controller';
// 实例化控制器
$controller = new $classname();
// var_dump($controller);

// 调用控制器中的方法
$controller->$a();
