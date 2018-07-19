<?php
class MsgController extends BaseController
{
    public function indexAction(){
        //1.获取数据
       $msgs = (new MsgModel())->get('select * from msg');
        //2.传递数据
       $this->getView()->assign('msgs',$msgs);
        //3.加载视图
        return $this->getView()->render('msg/index.phtml');
    }

    //添加
    public function addAction()
    {
        #1.判断提交方式
        if ($this->getRequest()->isPost()) {
            #2.接受数据
            $uname = $this->getRequest()->getPost('uname');
            $content = $this->getRequest()->getPost('content');
            #3.插入数据库
            $rs = (new MsgModel)->add("insert into msg (uname,content,created_at) 
			values 
			('{$uname}', '{$content}', ".time().")"
            );
            #4.判断
            if ($rs) {
                $this->success('/msg/index', '添加成功');
            } else {
                $this->error('/msg/index', '添加失败');
            }
        }
    }
}