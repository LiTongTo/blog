<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>后台首页</title>
	<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse" role="navigation">
    <div class="container-fluid">
    <div class="navbar-header">
        <a class="navbar-brand" href="#">后台管理</a>
    </div>
    <div>
        <ul class="nav navbar-nav">
        
            <li class="active" ><a href="{{url('/admins/admins')}}">首页</a></li>
	
	<li class="dropdown"  style="margin-left:25px;">
		<a class="dropdown-toggle" data-toggle="dropdown" href="#">商品<span class="caret"></span></a>
		<ul class="dropdown-menu">
			<li><a href="{{url('/goods/create')}}">商品添加</a></li>
			<li><a href="{{url('/goods/index')}}">商品列表</a></li>
		</ul>
	</li>
    <li class="dropdown"  style="margin-left:25px;">
		<a class="dropdown-toggle" data-toggle="dropdown" href="#">品牌<span class="caret"></span></a>
		<ul class="dropdown-menu">
			<li><a href="{{url('/brand/create')}}">品牌添加</a></li>
			<li><a href="{{url('/brand/index')}}">品牌列表</a></li>
		</ul>
	</li>
    <li class="dropdown"  style="margin-left:25px;">
		<a class="dropdown-toggle" data-toggle="dropdown" href="#">分类<span class="caret"></span></a>
		<ul class="dropdown-menu">
			<li><a href="{{url('/cate/create')}}">分类添加</a></li>
			<li><a href="{{url('/cate/index')}}">分类列表</a></li>
		</ul>
	</li>
    <li class="dropdown"  style="margin-left:25px;">
		<a class="dropdown-toggle" data-toggle="dropdown" href="#">管理员<span class="caret"></span></a>
		<ul class="dropdown-menu">
			<li><a href="{{url('/admin/create')}}">管理员添加</a></li>
			<li><a href="{{url('/admin/index')}}">管理员列表</a></li>
		</ul>
	</li>

	<li class="dropdown"  style="margin-left:25px;">
		<a class="dropdown-toggle" data-toggle="dropdown" href="#">文章<span class="caret"></span></a>
		<ul class="dropdown-menu">
			<li><a href="{{url('/art/create')}}">文章添加</a></li>
			<li><a href="{{url('/art/index')}}">文章列表</a></li>
		</ul>
	</li>
	
	  <li  style="margin-left:500px;">
             
            <a href="#">
            <div style='width:100px; height:20px; text-align:center; background-color:#fff; border-radius:100px; color:black'>欢迎</div>
         
            </a>
           
        </li>
    </ul>
    </div>
    </div>
   </nav> 

<div>
<div style="border:1px solid black; height:1000px; width:1px; margin-left:200px;margin-top:-20px;"></div>
 
</div> 
 </body>
</html>