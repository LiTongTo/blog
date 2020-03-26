<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>图书列表</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
 <center><h2>图书列表</h2></center><a href="{{url('/books/create')}}" class="btn btn-default">添加</a><hr/> 
<table class="table table-condensed">
	<thead>
		<tr>
             <th>图书ID</th>
			 <th>图书名称</th>
             <th>作者</th>
              <th>售价</th>
			<th>图书封面</th>
            <th>操作</th>
		</tr>
	</thead>
	<tbody>
        @foreach($res as $v)
		<tr>
			<td>{{$v->b_id}}</td>
			<td>{{$v->b_name}}</td>
           
            <td>{{$v->b_man}}</td>
            <td>{{$v->b_price}}</td>
			
			<td><img src="{{env('UPLOADS_URL')}}{{$v->b_img}}" width='50'></td>
		
            <td>
            <a href="{{url('/books/edit/'.$v->b_id)}}" class="btn btn-info">编辑</a>
            <a href="{{url('/books/destroy/'.$v->b_id)}}" class="btn btn-warning">删除</a>
            </td>
		</tr>
	    @endforeach
		
	</tbody>
	
</table>

</body>
</html>