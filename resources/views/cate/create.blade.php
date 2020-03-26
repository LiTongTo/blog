<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>分类添加</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>分类添加</h2></center><a href="{{url('/cate/index')}}" class="btn btn-default">列表</a><hr/>
  <div style="margin-left:300px;">
<form class="form-horizontal" role="form" action="{{url('/cate/store')}}" method="post">
   @csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">分类名字</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="firstname" placeholder="分类名称..." name="cate_name">
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">父分类</label>
		<div class="col-sm-3">
			<select class="form-control" id="lastname" name="pid">
                  <option value="0">顶级分类</option>
                  @foreach($pInfo as $v)
                  <option value="{{$v->cate_id}}">{{str_repeat('-------',$v->level)}}{{$v->cate_name}}</option>
                  @endforeach
            </select>
		</div>
	</div>
    <div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">分类简介</label>
		<div class="col-sm-3">
			<textarea class="form-control" id="lastname" name="cate_desc">
                 
            </textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">是否在导航栏显示</label>
		<div class="col-sm-2">
            <input type="radio" name="is_nav" value="1" checked>是 
            <input type="radio" name="is_nav" value="2">否
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