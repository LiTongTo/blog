<table class="table table-condensed">
	
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
		   <td colspan='6'>{{$res->links()}}</td>
		</tr>
	</tbody>
	
</table>