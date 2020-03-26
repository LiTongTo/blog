<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>文章修改</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>文章修改</h2></center><a href="{{url('/art/index')}}" class="btn btn-default">列表</a><hr/>
  <div style="margin-left:300px;">
<form class="form-horizontal" role="form" action="{{url('/art/update/'.$data->art_id)}}" method="post" enctype="multipart/form-data">
   @csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">文章标题</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="firstname" value="{{$data->art_title}}" name="art_title">
			<b style="color:red">{{$errors->first('art_title')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">文章分类</label>
		<div class="col-sm-3">
			<select class="form-control" id="lastname" name="t_id">
                  <option value="">请选择</option>
				   @foreach($TypeInfo as $v)
				      @if($v->t_id==$data->t_id)
					 <option value="{{$v->t_id}}" selected>{{$v->t_name}}</option>
					 @else
					 <option value="{{$v->t_id}}" >{{$v->t_name}}</option>
					 @endif
				   @endforeach
            </select>
			<b style="color:red">{{$errors->first('t_id')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">文章重要性</label>
		<div class="col-sm-3">
		@if($data->is_show==1)
			<input type="radio" name="is_up" value="1" checked>重要
			<input type="radio" name="is_up" value="2">不重要
			 @else
			 <input type="radio" name="is_up" value="1">重要
			<input type="radio" name="is_up" value="2" checked>不重要
			@endif
			<b style="color:red">{{$errors->first('is_up')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">是否显示</label>
		<div class="col-sm-2">
			 @if($data->is_show==1)
			<input type="radio" name="is_show" value="1" checked>是
			<input type="radio" name="is_show" value="2">否
			 @else
			 <input type="radio" name="is_show" value="1">是
			<input type="radio" name="is_show" value="2" checked>否
			@endif
			<b style="color:red">{{$errors->first('is_show')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">文章作者</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="firstname" value="{{$data->art_man}}"  name="art_man">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">作者邮箱</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="firstname" value="{{$data->art_email}}"  name="art_email">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">关键字</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="firstname" value="{{$data->art_size}}"  name="art_size">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">文章简介</label>
		<div class="col-sm-3">
			<textarea class="form-control" id="firstname"  name="art_desc">
			    {{$data->art_desc}}
			</textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">上传文件</label>
		<div class="col-sm-3">
			<input type="file" class="form-control" id="firstname"  name="art_img">
			<img src="{{env('UPLOADS_URL')}}{{$data->art_img}}" width="35">
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