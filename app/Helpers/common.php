<?php
  //文件上传
     function upload($img){
    $file=request()->file($img);
    //判断上传过程中有无错误 
      if($file->isValid()){
          $store_result=$file->store('upload');
          return $store_result;
      }

      exit('没有上传文件或上传过程中有错');
  }
   
  function CateInfo($Cate,$pid=0,$level=0){
        if(!$Cate){
            return;
        }
          static $newArray=[];
        foreach($Cate as $v){
          if($v->pid==$pid){
              $v->level=$level;
              $newArray[]=$v;

               //再次调用自己查找复合条件的孩子
              CateInfo($Cate,$v->cate_id,$level+1);
          }
        }

        return $newArray;
  }

  

?>