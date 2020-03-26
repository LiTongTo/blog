<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>文章列表</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
 <center><h2>文章列表</h2></center><a href="{{url('/art/create')}}" class="btn btn-default">添加</a><hr/> 
 <form action="">
     文章标题 <input type="text" name="title" value="{{$query['title']??''}}">
	 文章分类 <select name="t_id">
                  <option value="">请选择</option>
                   @foreach($TypeInfo as $v)
				     
				     <option value="{{$v->t_id}}">{{$v->t_name}}</option>
					 
				   @endforeach
            </select>
			<input type="submit" value="搜索">
 </form>
<table class="table table-condensed">
	<thead>
		<tr>
             <th>文章ID</th>
			<th>文章标题</th>
			
            <th>文章分类</th>
			<th>是否重要</th>
            <th>是否显示</th>
			<th>文章作者</th>
			<th>作者邮箱</th>
			<th>关键字</th>
			<th>文章简介</th>
			<th>上传文件</th>
            <th>操作</th>
		</tr>
	</thead>
	<tbody>
        @foreach($data as $v)
		<tr>
			<td>{{$v->art_id}}</td>
			<td>{{$v->art_title}}</td>
           
            <td>{{$v->t_name}}</td>
            <td>
                  @if($v->is_up==1)
				       是
				   @else
				       否
				   @endif
			</td>
			<td>
                  @if($v->is_show==1)
				       是
				   @else
				       否
				   @endif
			</td>
			<td>{{$v->art_man}}</td>
			<td>{{$v->art_email}}</td>
			<td>{{$v->art_size}}</td>
			<td>{{$v->art_desc}}</td>
			<td><img src="{{env('UPLOADS_URL')}}{{$v->art_img}}" width="50"></td>
            <td>
			<a href="{{url('/art/edit/'.$v->art_id)}}" class="btn btn-info">编辑</a>
			<!-- <a href="{{url('/art/destroy/'.$v->art_id)}}" class="btn btn-info">删除</a> -->
            <a  href="javascript:void(0)" class="btn btn-warning del " art_id="{{$v->art_id}}">删除</a>
            </td>
		</tr>
	    @endforeach
		
	</tbody>
	
</table>
{{$data->appends($query)->links()}}
</body>
</html>
<script>
    $(document).on('click','.del',function(){
		// alert('123');
		var _this=$(this);
		// alert(_this);
		var art_id=_this.attr('art_id');
		//  alert(art_id);
		
		//ajax get  删除
		 if(confirm('确认删除吗？')){
            //   alert('123');
			$.get('/art/destroy/'+art_id,function(result){
                if(result.code=='00000'){
                    location.reload();
				}
			},'json')
		 }
	
	});

</script>

