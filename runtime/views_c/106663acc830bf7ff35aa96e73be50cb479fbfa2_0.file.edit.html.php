<?php /* Smarty version 3.1.27, created on 2017-06-07 04:09:37
         compiled from "D:\wamp\www\s62\mvc\mvc\views\User\edit.html" */ ?>
<?php
/*%%SmartyHeaderCode:1765959377c81ad6ba5_02497702%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '106663acc830bf7ff35aa96e73be50cb479fbfa2' => 
    array (
      0 => 'D:\\wamp\\www\\s62\\mvc\\mvc\\views\\User\\edit.html',
      1 => 1496808575,
      2 => 'file',
    ),
    '8681b46c2ccddc65ecd29ea4528027f0f92ba69d' => 
    array (
      0 => 'D:\\wamp\\www\\s62\\mvc\\mvc\\views\\User\\index.html',
      1 => 1496807534,
      2 => 'file',
    ),
    '83192fed4c0cf5f5c77ae7c7a847aa3187ea36ba' => 
    array (
      0 => '83192fed4c0cf5f5c77ae7c7a847aa3187ea36ba',
      1 => 0,
      2 => 'string',
    ),
  ),
  'nocache_hash' => '1765959377c81ad6ba5_02497702',
  'variables' => 
  array (
    'title' => 0,
    'list' => 0,
    'v' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.27',
  'unifunc' => 'content_59377c81be1480_19979988',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_59377c81be1480_19979988')) {
function content_59377c81be1480_19979988 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '1765959377c81ad6ba5_02497702';
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
$_smarty_tpl->properties['nocache_hash'] = '1765959377c81ad6ba5_02497702';
?>

    <form action="./index.php?c=User&a=update" method="post" class="mt20 h3">
        <input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
">

        name:
        <input type="text" name="name" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['name'];?>
" placeholder="请输入用户名"><br><br>
        sex:
        <input type="radio" name="sex" value="0" <?php if ($_smarty_tpl->tpl_vars['data']->value['sex'] == 0) {?>checked<?php }?>>女
        <input type="radio" name="sex" value="1" <?php if ($_smarty_tpl->tpl_vars['data']->value['sex'] == 1) {?>checked<?php }?>>男
        <input type="radio" name="sex" value="2" <?php if ($_smarty_tpl->tpl_vars['data']->value['sex'] == 2) {?>checked<?php }?>>保密<br><br>
        age:
        <input type="text" name="age" value="<?php echo $_smarty_tpl->tpl_vars['data']->value['age'];?>
"><br><br>
        province:
        <select name="province">
            <option value="江苏" <?php if ($_smarty_tpl->tpl_vars['data']->value['province'] == "江苏") {?>selected<?php }?>>江苏</option>
            <option value="上海" <?php if ($_smarty_tpl->tpl_vars['data']->value['province'] == "上海") {?>selected<?php }?>>上海</option>
            <option value="新疆" <?php if ($_smarty_tpl->tpl_vars['data']->value['province'] == "新疆") {?>selected<?php }?>>新疆</option>
            <option value="浙江" <?php if ($_smarty_tpl->tpl_vars['data']->value['province'] == "浙江") {?>selected<?php }?>>浙江</option>
            <option value="北京" <?php if ($_smarty_tpl->tpl_vars['data']->value['province'] == "北京") {?>selected<?php }?>>北京</option>
            <option value="深圳" <?php if ($_smarty_tpl->tpl_vars['data']->value['province'] == "深圳") {?>selected<?php }?>>深圳</option>
            <option value="纽约" <?php if ($_smarty_tpl->tpl_vars['data']->value['province'] == "纽约") {?>selected<?php }?>>纽约</option>
        </select>
        <input type="hidden" name="vcode" value="1234">
        <input type="hidden" name="hehe" value="dsadas">
        <input type="hidden" name="haha" value="wwwww"><br><br>
        <input type="submit" value="保存" class="btn btn-primary">
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