<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>售楼列表</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
 <center><h2>售楼列表</h2></center><a href="{{url('/sale/create')}}" class="btn btn-default">添加</a><hr/> 
<table class="table table-condensed">
	<thead>
		<tr>
             <th>售楼ID</th>
			 <th>小区名称</th>
             <th>导购人</th>
            <th>导购联系方式</th>
			<th>房屋面积</th>
			<th>房屋图片</th>
			<th>房屋相册</th>
			<th>房屋价格</th>
            <th>操作</th>
		</tr>
	</thead>
	<tbody>
        @foreach($res as $v)
		<tr>
			<td>{{$v->sale_id}}</td>
			<td>{{$v->sale_name}}</td>
           
            <td>{{$v->sale_man}}</td>
            <td>{{$v->sale_tel}}</td>
			<td>{{$v->sale_area}}</td>
			<td><img src="{{env('UPLOADS_URL')}}{{$v->sale_img}}" width='50'></td>
			<td>
			@if($v->sale_imgs)
			@php $sale_imgs=explode('|',$v->sale_imgs); @endphp
			@foreach($sale_imgs as $val)
			<img src="{{env('UPLOADS_URL')}}{{$val}}" width='35'>
			@endforeach
			@endif
			</td>
			<td>{{$v->sale_price}}</td>
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