<?php 

/**
 * 用户控制器
 */

class  UserController extends Controller
{
    private $model = null;

    public function __construct()
    {
        // 再调用一次基类的构造方法
        parent::__construct();
        $this->model = new Model('user');
    }


    public function index()
    {
        $data = $this->model->order('id desc')->select();

        $this->assign('title', '用户列表');
        $this->assign('list', $data);
        $this->display('User/index.html');

    }

    // 执行删除
    public function del()
    {
        if ($this->model->delete($_GET['id'])) {
            $this->redirect('恭喜你,删除成功!', './index.php?c=user');
        } else {
            $this->redirect('恭喜你,删除失败!', './index.php?c=user');
        }
    }

    // 显示添加表单
    public function  add()
    {
         $this->assign('title', '填个用户!');
         $this->display('User/add.html');
    }

    // 执行添加
    public function insert()
    {
        if ($this->model->insert() > 0) {
            $this->redirect('恭喜你,新增成功!', './index.php?c=user');
        } else {
            $this->redirect('恭喜你,新增失败!');
        }
    }


    // 显示编辑表单
    public function edit()
    {
         $data = $this->model->find($_GET['id']);
         $this->assign('title', '编辑用户');
         $this->assign('data', $data);
         $this->display('User/edit.html');
    }

    // 执行编辑
    public function update()
    {
        if ($this->model->update()) {
            $this->redirect('恭喜你,编辑成功!', './index.php?c=user');
        } else {
            $this->redirect('恭喜你,编辑失败!');
        }
    }

}


