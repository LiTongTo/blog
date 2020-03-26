<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"> 
	<title>文章添加</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<center><h2>文章添加</h2></center><a href="{{url('/art/index')}}" class="btn btn-default">列表</a><hr/>
  <div style="margin-left:300px;">
<form class="form-horizontal" role="form" action="{{url('/art/store')}}" method="post" enctype="multipart/form-data">
   @csrf
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">文章标题</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="title"  onblur="titles()" placeholder="分类名称..." name="art_title">
			
			<b style="color:red">{{$errors->first('art_title')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">文章分类</label>
		<div class="col-sm-3">
			<select class="form-control" id="lastname" name="t_id">
                  <option value="">请选择</option>
                   @foreach($TypeInfo as $v)
				     <option value="{{$v->t_id}}">{{$v->t_name}}</option>
				   @endforeach
            </select>
			<b style="color:red">{{$errors->first('t_id')}}</b>
		</div>
	</div>
    <div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">文章重要性</label>
		<div class="col-sm-3">
		     <input type="radio" name="is_up" value="1" checked>重要 
            <input type="radio" name="is_up" value="2">不重要
			<b style="color:red">{{$errors->first('is_up')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="lastname" class="col-sm-2 control-label">是否显示</label>
		<div class="col-sm-2">
            <input type="radio" name="is_show" value="1" checked>是 
            <input type="radio" name="is_show" value="2">否
			<b style="color:red">{{$errors->first('is_show')}}</b>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">文章作者</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="firstname"  name="art_man">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">作者邮箱</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="firstname"  name="art_email">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">关键字</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="firstname"  name="art_size">
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">文章简介</label>
		<div class="col-sm-3">
			<textarea class="form-control" id="firstname"  name="art_desc">
			</textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="firstname" class="col-sm-2 control-label">上传文件</label>
		<div class="col-sm-3">
			<input type="file" class="form-control" id="firstname"  name="art_img">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" class="btn btn-default">添加</button>
		</div>
	</div>
</form>
</div>
</body>
</html>

<script>
    //    function titles(){
	// 	   var art_title=document.getElementById('title').value;//通过id 找对象 //对象.value 获取表单控件的值
	// 	   //console.log(goods_name);
	// 	    var reg= /^[\u4e00-\u9fa5\w]{1,}$/;
	// 	   if(art_title==''){
    //            document.getElementById('span_title').innerHTML="<font style='color:red; font-size:15px;'>标题名称不能为空</font>";
	// 	   }else if(!reg.test(art_title)){
    //            document.getElementById('span_title').innerHTML="<font style='color:red; font-size:15px'>中文字母数字下划线</font>"
	// 	   }else{
	// 		document.getElementById('span_title').innerHTML="<font style='color:green; font-size:15px'>格式正确</font>"
	// 	   }
	//    }

	$(document).on('blur','#title',function(){
		// alert('123');
		 var art_title=$(this).val();
		// alert(art_title);
		 var reg=/^[\u4e00-\u9fa5\w]{2,50}$/;
		if(art_title==''){
            $(this).next().text('新闻标题不能为空');
		}else if(!reg.test(art_title)){
			$(this).next().text('新闻标题由中文、数字、字母下划线组成');
			 return;
		}else{
			var obj=$(this);
			$,ajax({
				url:"/art/checkOnly",
				data:{atr_title:art_title},
				successly:function(){
					
				}
			})
		}
	})
  
</script>