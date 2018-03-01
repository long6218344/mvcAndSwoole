MVC + php7 + swoole
=========================
1. mvc 的定义
    M   Model       模型层
    V   View        视图层
    C   Controller  控制器
    
    一般来说 一个模块 对应一个类 对应一个控制器 C
    公共的模型层 M
    对应的控制器里的方法的  模版文件 V
 
2. mvc 优势
    1. 高内聚 低耦合
    2. 易于维护
    3. 代码可读性
    4. 单一入口  index.php

3. MVC 实例
    3.1 mvc 1.0
        目录结构
        |-- models        模型层
        |-- views         视图层
        |-- controllers   控制器
        |-- configs       配置文件目录
        index.php         入口文件

        URL:
            index.php?c=控制器名&a=方法名
            index.php?c=goods&a=edit

    3.2 mvc 2.0
        自动加载类

    3.3 mvc 3.0
        目录结构
        |-- models        模型层
        |-- views         视图层
        |-- libs          Smarty模板引擎
        |-- runtime       运行目录
            |-- views_c   编译目录
            |-- caches    缓存目录
        |-- controllers   控制器
        |-- configs       配置文件目录
        index.php         入口文件

        引入模版引擎

    3.4 mvc 4.0
        添加 控制基类

    4.5 mvc 5.0
        完善增删改查 及 其他功能
