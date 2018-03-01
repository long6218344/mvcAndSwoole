<?php 

/**
 * 控制基类
 */
class Controller extends Smarty
{
    public function __construct()
    {
        //  配置Smarty  连贯操作
        $this->setTemplateDir('./views')
               ->setCompileDir('./runtime/views_c')
               ->setConfigDir('./configs')
               ->setCacheDir('./runtime/caches');

        // 配置 模版变量定界符 <{ }> 
        $this->left_delimiter = LEFT_D;
        $this->right_delimiter = RIGHT_D;
        // 缓存 开关
        $this->caching = CACHING; //开启缓存
        $this->cache_lifetime = CACHE_LIFETIME;//缓存时间
    }

    // 跳转重定向
    public function redirect($message, $url=null)
    {
        echo "<script>alert('{$message}')</script>";
        if (empty($url)) {
            echo "<script>history.back()</script>";
        }else{
            echo "<script>location.href='{$url}'</script>";
        }
    }



    public function __call($fun, $params)
    {
        header("HTTP/1.0 404 not found");
        echo '<h1>404 NOT FOUND: 来自于控制基类</h1>';
        exit;
    }
}
