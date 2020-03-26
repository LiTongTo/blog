<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>学生列表</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
 <center><h2>学生列表</h2></center><a href="{{url('/student/create')}}" class="btn btn-default">添加</a><hr/> 
<table class="table table-condensed">
	<thead>
		<tr>
             <th>学生ID</th>
			<th>学生名称</th>
			<th>学生班级</th>
            
            <th>操作</th>
		</tr>
	</thead>
	<tbody>
        @foreach($sInfo as $v)
		<tr>
			<td>{{$v->s_id}}</td>
			<td>{{$v->s_name}}</td>
            <td>{{$v->s_sex}}</td>
            <td>{{$v->c_name}}</td>
           
            <td>
            <button type="button" class="btn btn-info">删除</button>
            <button type="button" class="btn btn-warning">编辑</button>
            </td>
		</tr>
	    @endforeach
	</tbody>
</table>

</body>
</html>