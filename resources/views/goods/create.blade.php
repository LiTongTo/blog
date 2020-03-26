<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>商品添加</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>商品添加</h2></center><a href="{{url('/goods/index')}}" class="btn btn-default">列表</a><hr/> 
<div style='margin-left:200px;'>
<form class="form-horizontal" role="form" action="{{url('/goods/store')}}" method="post" enctype='multipart/form-data'>
  @csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品名称</label>
		<div class="col-sm-5">
			<input type="text" class="form-control" id="gname" name='goods_name' placeholder="请输入商品名称" onblur="names()">
			<span id="span_name"></span>
            <b style='color:red;'>{{$errors->first('goods_name')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品货号</label>
		<div class="col-sm-5">
			<input type="text" class="form-control" id="firstname" name='goods_art' placeholder="请输入商品货号">
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品品牌</label>
		<div class="col-sm-5">
			<select class="form-control" id="firstname" name='brand_id'>
                  <option value="">请选择</option>
                   @foreach ($BrandInfo as $v)
                     <option value="{{$v->brand_id}}">{{$v->brand_name}}</option>
                   @endforeach
            </select>
            <b style='color:red'>{{$errors->first('brand_id')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品分类</label>
		<div class="col-sm-5">
			<select type="text" class="form-control" id="firstname" name='cate_id'>
               <option value="0">请选择</option>
               @foreach($CateInfo as $v)
                  <option value="{{$v->cate_id}}">{{str_repeat('------',$v->level)}}{{$v->cate_name}}</option>
               @endforeach
            </select>
            <b style='color:red'>{{$errors->first('cate_id')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品价格</label>
		<div class="col-sm-5">
			<input type="text" class="form-control" id="firstname" name='goods_price' placeholder="请输入商品价格">
            <b style='color:red'>{{$errors->first('goods_price')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品库存</label>
		<div class="col-sm-5">
			<input type="text" class="form-control" id="firstname" name='goods_num' placeholder="请输入商品库存">
            <b style='color:red'>{{$errors->first('goods_num')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">是否显示</label>
		<div class="col-sm-5">
			<input type="radio"  id="firstname" name='is_up' value='1' checked>是
            <input type="radio"  id="firstname" name='is_up' value='2'>否
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">是否精品</label>
		<div class="col-sm-5">
			<input type="radio"  id="firstname" name='is_best' value='1' checked>是
            <input type="radio"  id="firstname" name='is_best' value='2'>否
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">是否新品</label>
		<div class="col-sm-5">
			<input type="radio"  id="firstname" name='is_new' value='1' checked>是
            <input type="radio"  id="firstname" name='is_new' value='2'>否
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品主图</label>
		<div class="col-sm-5">
			<input type="file" class="form-control" id="firstname" name='goods_img'>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品相册</label>
		<div class="col-sm-5">
			<input type="file" class="form-control" id="firstname" name='goods_imgs[]' multiple='multiple'>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品简介</label>
		<div class="col-sm-5">
			<textarea  class="form-control" id="firstname" name='goods_desc'>
            </textarea>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">添加</button>
		</div>
	</div>
	
</form>
</div>
</body>
</html>
<script>
       function names(){
		   var goods_name=document.getElementById('gname').value;//通过id 找对象 //对象.value 获取表单控件的值
		   //console.log(goods_name);
		   var reg=/^[\u4e00-\u9fa5]{2,15}$/;
		   if(goods_name==''){
               document.getElementById('span_name').innerHTML="<font style='color:red; font-size:15px;'>商品名称不能为空</font>";
		   }else if(!reg.test(goods_name)){
               document.getElementById('span_name').innerHTML="<font style='color:red; font-size:15px'>格式不对</font>"
		   }
	   }
  
</script>