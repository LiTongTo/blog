<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>管理员列表</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
 <center><h2>管理员列表</h2></center><a href="{{url('/admin/create')}}" class="btn btn-default">添加</a><hr/> 
 <form>
     管理员名称<input type="text" name='admin_name'>
	
	 <button>搜索</button>
</form>
<h2></h2>
<table class="table table-condensed">
	<thead>
		<tr>
             <th>管理员ID</th>
			<th>管理员名称</th>
			<th>管理员邮箱</th>
			<th>管理员头像</th>
            
            <th>管理员电话</th>
            <th>操作</th>
		</tr>
	</thead>
	<tbody>
        @foreach($res as $v)
		<tr>
			<td>{{$v->admin_id}}</td>
			<td>{{$v->admin_name}}</td>
            <td>{{$v->admin_email}}</td>
            <td>
			  @if($v->admin_img)<img src="{{env('UPLOADS_URL')}}{{$v->admin_img}}" width='50'>
			  @endif
			  </td>
            <td>{{$v->admin_tel}}</td>
            <td>
            <a href="{{url('/admin/edit/'.$v->admin_id)}}" class="btn btn-info">编辑</a>
            <a href="{{url('/admin/destroy/'.$v->admin_id)}}" class="btn btn-warning">删除</a>
            </td>
		</tr>
	    @endforeach
		
	</tbody>
	
</table>
{{$res->links()}}
</body>
</html>