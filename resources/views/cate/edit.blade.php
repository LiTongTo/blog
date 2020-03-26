<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>品牌修改页面</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<center><h2>品牌修改</h2></center><a href="{{url('/cate/index')}}" class="btn btn-default">列表</a><hr/>
<form action="{{url('/cate/update/'.$data->brand_id)}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">分类名称</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="cate_name" 
            value="{{$data->cate_name}}"  placeholder="分类名称">
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">父分类</label>
		<div class="col-sm-2">
			<select class="form-control" id="lastname" name="pid">
			   @foreach($pInfo as $v)
			       @if($v->cate_id==$data->cate_id)
				   <option value="{{$v->cate_id}}" selected>{{str_repeat('------',$v->level)}}{{$v->cate_name}}</option>
				   @else
				   <option value="{{$v->cate_id}}">{{str_repeat('------',$v->level)}}{{$v->cate_name}}</option>
				   @endif
               @endforeach
            </select>
		</div>
	</div>
     

    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">分类简介</label>
		<div class="col-sm-8">
			<textarea type="text" class="form-control" id="firstname" name="cate_desc">
              {{$data->cate_desc}}
            </textarea>
		</div>
	</div>

	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">是否在导航栏显示</label>
		<div class="col-sm-2">
            <input type="radio" name="is_nav" value="1" {{$data->is_nav}}==1 ? 'checked':''>是 
            <input type="radio" name="is_nav" value="2" {{$data->is_nav}}==2 ? 'checked':''>否
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">修改</button>
		</div>
	</div>
</form>

</body>
</html>