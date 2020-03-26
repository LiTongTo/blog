<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>商品列表</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
 <center><h2>商品列表</h2></center><a href="{{url('/goods/create')}}" class="btn btn-default">添加</a><hr/> 
 
<table class="table table-condensed">
	<thead>
		<tr>
             <th>商品ID</th>
			<th>商品名称</th>
			<th>商品价格</th>
            <th>商品简介</th>
            <th>商品库存</th>
            <th>商品货号</th>
			<th>商品主图</th>
			<th>商品相册</th>
			<th>是否新品 </th>
			<th>是否显示</th>
			<th>是否精品</th>
			<th>分类</th>
			<th>品牌</th>
		</tr>
	</thead>
	<tbody>
        @foreach($res as $v)
		<tr>
			<td>{{$v->goods_id}}</td>
			<td>{{$v->goods_name}}</td>
            <td>{{$v->goods_price}}</td>
			<td>{{$v->goods_desc}}</td>
			<td>{{$v->goods_num}}</td>
			<td>{{$v->goods_art}}</td>
            <td>
			  @if($v->goods_img)<img src="{{env('UPLOADS_URL')}}{{$v->goods_img}}" width='35'>
			  @endif
			  </td>
            <td>
			   @if($v->goods_imgs)
			      @php $goods_imgs=explode('|',$v->goods_imgs); @endphp
				  @foreach($goods_imgs as $val)
			       <img src="{{env('UPLOADS_URL')}}{{$val}}"width="35">
				  @endforeach
			   @endif
			 </td>
			 <td>
			    @if($v->is_new==1)
				  是
				@else
				  否
				@endif
			 </td>
			 <td>
			 @if($v->is_up==1)
				  是
				@else
				  否
				@endif
			 </td>
			 <td>
			 @if($v->is_best==1)
				  是
				@else
				  否
				@endif
            </td>
			<td>{{$v->cate_name}}</td>
			<td>{{$v->brand_name}}</td>
			<td>
            <a href="{{url('/goods/edit/'.$v->goods_id)}}" class="btn btn-info">编辑</a>
            <a href="{{url('/goods/destroy/'.$v->goods_id)}}" class="btn btn-warning">删除</a>
            </td>
		</tr>
	    @endforeach
		
	</tbody>
	
</table>

</body>
</html>