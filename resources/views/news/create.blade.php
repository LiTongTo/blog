<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>新闻添加页面</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<center><h2>新闻添加</h2></center><a href="{{url('/news/index')}}" class="btn btn-default">列表</a><hr/>
<form action="{{url('/news/store')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
@csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">新闻标题</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="news_title"
				   placeholder="请输入新闻标题 ">
				   <b style="color:red">{{$errors->first('news_title')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">新闻分类</label>
		<div class="col-sm-8">
			<select class="form-control" id="firstname" name="cate_id">
			  <option value="0">请选择</option>
			  @foreach($CateInfo as $v)
			    <option value="{{$v->cate_id}}">{{str_repeat('--------',$v->level)}}{{$v->cate_name}}</option>
			  @endforeach
			</select>
		</div>
    </div>
    <div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">作者</label>
		<div class="col-sm-8">
			<input type="text" class="form-control" id="firstname" name="news_man">
			<b style="color:red">{{$errors->first('news_man')}}</b>
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