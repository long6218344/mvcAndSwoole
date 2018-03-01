<?php /* Smarty version 3.1.27, created on 2017-06-07 03:56:05
         compiled from "D:\wamp\www\s62\mvc\mvc\views\User\add.html" */ ?>
<?php
/*%%SmartyHeaderCode:2028559377955ec5987_30258089%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '17dd0958ef0fa5cd0398e002f4e04349c6f34494' => 
    array (
      0 => 'D:\\wamp\\www\\s62\\mvc\\mvc\\views\\User\\add.html',
      1 => 1496807667,
      2 => 'file',
    ),
    '8681b46c2ccddc65ecd29ea4528027f0f92ba69d' => 
    array (
      0 => 'D:\\wamp\\www\\s62\\mvc\\mvc\\views\\User\\index.html',
      1 => 1496807534,
      2 => 'file',
    ),
    'd8f4c926bea74050c60310a3769733478740dc51' => 
    array (
      0 => 'd8f4c926bea74050c60310a3769733478740dc51',
      1 => 0,
      2 => 'string',
    ),
  ),
  'nocache_hash' => '2028559377955ec5987_30258089',
  'variables' => 
  array (
    'title' => 0,
    'list' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_5937795604b484_18584790',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5937795604b484_18584790')) {
function content_5937795604b484_18584790 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '2028559377955ec5987_30258089';
?>
<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
    <link rel="stylesheet" href="./public/css/bootstrap.min.css">
    <link rel="stylesheet" href="./public/my.css">
</head>
<body>
    <div class="container">
        <h1><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</h1>
        <div class="center-block mt20">
            <a href="./index.php?c=User&a=index" class="btn btn-info">首页</a>
            <a href="./index.php?c=User&a=add" class="btn btn-success">添加</a>
        </div>
        
        <?php
$_smarty_tpl->properties['nocache_hash'] = '2028559377955ec5987_30258089';
?>



    <form action="./index.php?c=User&a=insert" method="post" class="mt20 h3">
        name:
        <input type="text" name="name" placeholder="请输入用户名"><br><br>
        sex:
        <input type="radio" name="sex" value="0">女
        <input type="radio" name="sex" value="1" checked>男
        <input type="radio" name="sex" value="2">保密<br><br>
        age:
        <input type="text" name="age"><br><br>
        province:
        <select name="province">
            <option value="江苏">江苏</option>
            <option value="上海">上海</option>
            <option value="新疆">新疆</option>
            <option value="浙江">浙江</option>
            <option value="北京">北京</option>
            <option value="深圳">深圳</option>
            <option value="纽约">纽约</option>
        </select>
        <input type="hidden" name="vcode" value="1234">
        <input type="hidden" name="hehe" value="dsadas">
        <input type="hidden" name="haha" value="wwwww">
        <input type="submit" value="确认添加">
    </form>


    </div><!--END container-->

    <?php echo '<script'; ?>
 src="./public/js/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="./public/js/bootstrap.min.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
?>