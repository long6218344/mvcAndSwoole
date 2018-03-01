<?php 

/**
 * 首页控制器
 */

class IndexController extends Controller
{
    public function index()
    {
        // global $smarty;
        $this->display('Index/index.html');
    }
}


