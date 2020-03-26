<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>管理员添加页面</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<center><h2>管理员添加</h2></center><a href="{{url('/admin/index')}}" class="btn btn-default">列表</a><hr/>
  <!-- @if ($errors->any())
    <div class='alert alert-danger'>
	<ul>
	@foreach($errors->all() as $error)
	 <li>{{ $error }}</li>@endforeach
	</ul>
	</div>
  @endif -->
<form action="{{url('/admin/store')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">管理员名称</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="admin_name"
				   placeholder="请输入管理员名称">
				   <b style='color:green'>{{$errors->first('admin_name')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">密码</label>
		<div class="col-sm-8">
			<input type="password" class="form-control" id="firstname" name="admin_pwd"
				   placeholder="密码......">
			  <b style='color:green'>{{$errors->first('admin_pwd')}}</b>
		</div>
    </div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">确认密码</label>
		<div class="col-sm-8">
			<input type="password" class="form-control" id="firstname" name="admin_paw"
				   placeholder="确认密码......">
			  <b style='color:green'>{{$errors->first('admin_paw')}}</b>
		</div>
    </div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">头像</label>
		<div class="col-sm-8">
		<input type="file" class="form-control" id="firstname" name="admin_img">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">邮箱</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="admin_email"
				   placeholder="请输入邮箱">
			  <b style='color:green'>{{$errors->first('admin_email')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">电话</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="admin_tel"
				   placeholder="请输入电话...">
			  <b style='color:green'>{{$errors->first('admin_tel')}}</b>
		</div>
    </div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">添加</button>
		</div>
	</div>
</form>

</body>
</html>