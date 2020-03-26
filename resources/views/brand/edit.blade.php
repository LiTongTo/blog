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
<center><h2>品牌修改</h2></center><a href="{{url('/brand/index')}}" class="btn btn-default">列表</a><hr/>
<form action="{{url('/brand/update/'.$data->brand_id)}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌名称</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="brand_name" 
            value="{{$data->brand_name}}"  placeholder="请输入品牌名称">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌网址</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="brand_url"
			value="{{$data->brand_url}}"	   placeholder="请输入品牌网址">
		</div>
    </div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌logo</label>
		<div class="col-sm-8">
			<input type="file" class="form-control" id="firstname" name="brand_logo">
			 <img src="{{env('UPLOADS_URL')}}{{$data->brand_logo}}" width="50">
		</div>
    </div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">品牌描述</label>
		<div class="col-sm-8">
			<textarea type="text" class="form-control" id="firstname" name="brand_desc">
              {{$data->brand_desc}}
            </textarea>
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