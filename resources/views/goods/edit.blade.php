<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>商品修改</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>商品修改</h2></center><a href="{{url('/goods/index')}}" class="btn btn-default">列表</a><hr/> 
<div style='margin-left:200px;'>
<form class="form-horizontal" role="form" action="{{url('/goods/update/'.$res->goods_id)}}" method="post" enctype='multipart/form-data'>
  @csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品名称</label>
		<div class="col-sm-5">
			<input type="text" class="form-control" id="firstname" name='goods_name' value="{{$res->goods_name}}">
            <b style='color:red;'>{{$errors->first('goods_name')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品货号</label>
		<div class="col-sm-5">
			<input type="text" class="form-control" id="firstname" name='goods_art' value="{{$res->goods_art}}">
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品品牌</label>
		<div class="col-sm-5">
			<select class="form-control" id="firstname" name='brand_id'>
                  <option value="">请选择</option>
                   @foreach ($BrandInfo as $v)
				     @if($v->brand_id==$res->brand_id)
                     <option value="{{$v->brand_id}}" selected>{{$v->brand_name}}</option>
					 @else
					 <option value="{{$v->brand_id}}">{{$v->brand_name}}</option>
					 @endif
                   @endforeach
            </select>
            <b style='color:red'>{{$errors->first('brand_id')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品分类</label>
		<div class="col-sm-5">
			<select type="text" class="form-control" id="firstname" name='cate_id'>
               <option value="">请选择</option>
               @foreach($CateInfo as $v)
			       @if($v->cate_id==$res->cate_id)
				   <option value="{{$v->cate_id}}" selected>{{str_repeat('------',$v->level)}}{{$v->cate_name}}</option>
				   @else
				   <option value="{{$v->cate_id}}">{{str_repeat('------',$v->level)}}{{$v->cate_name}}</option>
				   @endif
               @endforeach
            </select>
            <b style='color:red'>{{$errors->first('cate_id')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品价格</label>
		<div class="col-sm-5">
			<input type="text" class="form-control" id="firstname" name='goods_price' value="{{$res->goods_price}}">
            <b style='color:red'>{{$errors->first('goods_price')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品库存</label>
		<div class="col-sm-5">
			<input type="text" class="form-control" id="firstname" name='goods_num' value="{{$res->goods_num}}">
            <b style='color:red'>{{$errors->first('goods_num')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">是否显示</label>
		<div class="col-sm-5">
		      @if($res->is_up==1)
			  <input type="radio"  id="firstname" name='is_up' value='1' checked>是
			  <input type="radio"  id="firstname" name='is_up' value='2'>否
			  @else
			  <input type="radio"  id="firstname" name='is_up' value='1'>是
              <input type="radio"  id="firstname" name='is_up' value='2' checked>否
			 @endif
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">是否精品</label>
		<div class="col-sm-5">
		@if($res->is_best==1)
			  <input type="radio"  id="firstname" name='is_best' value='1' checked>是
			  <input type="radio"  id="firstname" name='is_best' value='2'>否
			  @else
			  <input type="radio"  id="firstname" name='is_best' value='1'>是
              <input type="radio"  id="firstname" name='is_best' value='2' checked>否
			 @endif
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">是否新品</label>
		<div class="col-sm-5">
		@if($res->is_new==1)
			  <input type="radio"  id="firstname" name='is_new' value='1' checked>是
			  <input type="radio"  id="firstname" name='is_new' value='2'>否
			  @else
			  <input type="radio"  id="firstname" name='is_new' value='1'>是
              <input type="radio"  id="firstname" name='is_new' value='2' checked>否
			 @endif
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品主图</label>
		<div class="col-sm-5">
			<input type="file" class="form-control" id="firstname" name='goods_img'>
			<img src="{{env('UPLOADS_URL')}}{{$res->goods_img}}" width="35">
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品相册</label>
		<div class="col-sm-5">
			<input type="file" class="form-control" id="firstname" name='goods_imgs[]' multiple='multiple'>
			@php $goods_imgs=explode('|',$res->goods_imgs); @endphp
			@foreach($goods_imgs as $val)
			 <img src="{{env('UPLOADS_URL')}}{{$val}}" width='35'>
			@endforeach
		</div>
	</div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">商品简介</label>
		<div class="col-sm-5">
			<textarea  class="form-control" id="firstname" name='goods_desc'>
			   {{$res->goods_desc}}
            </textarea>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">修改</button>
		</div>
	</div>
</form>
</div>
</body>
</html>