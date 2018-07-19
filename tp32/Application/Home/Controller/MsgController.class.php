<?php
namespace Home\Controller;
use Think\Controller;
class MsgController extends Controller {
    public function index(){
    	$msgs=M('msg')->order("created_at desc")->select();
    	$this->assign('msgs',$msgs);
    	$this->display('index');
    }
    public function add(){
    	if(IS_POST){
    		$postData['uname']=I('post.uname');
    		$postData['content']=I('post.content');
    		$postData['created_at']=$postData['updated_at']=time();
    		$rs=M('msg')->add($postData);
    		if($rs){
    			$this->success('操作成功',U('msg/index'));
    		}else{
    			$this->error('操作失败',U('msg/index'));
    		}
   
    	}
    }
    public function indextwo(){
        if(IS_POST){
            $postData=I('POST.');
            $time1=$postData['created_at'];
            $time2=$postData['createdd_at'];
            $date1=strtotime($time1);
            $date2=strtotime($time2);
            $condition=[
                'created_at'=>['between',"$date1,$date2"]
            ];
            $msgs=M('msg')->where($condition)->order("created_at desc")->select();
            $this->assign('msgs',$msgs);
            $this->display('indextwo');
            
        }
    }
}