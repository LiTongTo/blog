<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>品牌列表</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
 <center><h2>分类列表</h2></center><a href="{{url('/cate/create')}}" class="btn btn-default">添加</a><hr/> 
<table class="table table-condensed">
	<thead>
		<tr>
             <th>分类ID</th>
			<th>分类名称</th>
			
            <th>分类简介</th>
            <th>是否在导航显示</th>
            <th>操作</th>
		</tr>
	</thead>
	<tbody>
        @foreach($res as $v)
		<tr>
			<td>{{$v->cate_id}}</td>
			<td>{{$v->cate_name}}</td>
           
            <td>{{$v->cate_desc}}</td>
            <td>
                  @if($v->is_nav==1)
				       是
				   @else
				       否
				   @endif
			</td>
            <td>
            <a href="{{url('/cate/edit/'.$v->cate_id)}}" class="btn btn-info">编辑</a>
            <a href="{{url('/cate/destroy/'.$v->cate_id)}}" class="btn btn-warning">删除</a>
            </td>
		</tr>
	    @endforeach
		
	</tbody>
	
</table>

</body>
</html>