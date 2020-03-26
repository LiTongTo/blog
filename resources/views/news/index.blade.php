<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>新闻列表</title>
	<link rel="stylesheet" href="{{asset('/static/admin/css/bootstrap.min.css')}}">  
	<script src="{{asset('/static/admin/js/jquery.min.js')}}"></script>
	<script src="{{asset('/static/admin/js/bootstrap.min.js')}}"></script>
</head>
<body>
 <center><h2>新闻列表</h2></center><a href="{{url('/news/create')}}" class="btn btn-default">添加</a><hr/> 
  <form action="" method="get">
	   新闻标题<input type="text" name='news_title' value="{{$news_title}}"><input type="submit" value="搜索">
  </form>
<table class="table table-condensed">
	<thead>
		<tr>
             <th>新闻ID</th>
			 <th>新闻标题</th>
             <th>新闻分类</th>
            <th>新闻作者</th>
			<th>发布时间</th>
            <th>操作</th>
		</tr>
	</thead>
	<tbody>
        @foreach($res as $v)
		<tr>
			<td>{{$v->news_id}}</td>
			<td>{{$v->news_name}}</td>
           
            <td>{{$v->cate_name}}</td>
            <td>{{$v->news_man}}</td>
			<td>{{$v->news_time}}</td>
			
			
            <td>
            <a href="{{url('/news/edit/'.$v->cate_id)}}" class="btn btn-info">编辑</a>
            <a href="{{url('/news/destroy/'.$v->cate_id)}}" class="btn btn-warning">删除</a>
            </td>
		</tr>
	    @endforeach
		<tr>
		   <td colspan='6'>{{$res->appends($news_title)->links()}}</td>
		</tr>
	</tbody>
	
</table>
<script>
     //无刷新页面
	 $(document).on('click','.pagination a',function(){
		//  alert('123');
		 var url=$(this).attr('href');
		 
		    $.get(url,function(result){
                $('tbody').html(result);
			});
		return false;
		
	  })

	 
</script>
</body>
</html>
