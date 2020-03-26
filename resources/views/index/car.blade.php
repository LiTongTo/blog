@extends('layouts.shop')
@section('title','购物车')
@section('content')
     <header>
      <a href="javascript:history.back(-1)" class="back-off fl"><span class="glyphicon glyphicon-menu-left"></span></a>
      <div class="head-mid">
       <h1>购物车</h1>
      </div>
     </header>
     <div class="head-top">
      <img src="/static/index/images/head.jpg" />
     </div><!--head-top/-->
     <table class="shoucangtab">
      <tr>
       <td width="75%"><span class="hui">购物车共有：<strong class="orange">{{$num}}</strong>件商品</span></td>
       <td width="25%" align="center" style="background:#fff url(/static/index/images/xian.jpg) left center no-repeat;">
        <span class="glyphicon glyphicon-shopping-cart" style="font-size:2rem;color:#666;"></span>
       </td>
      </tr>
     </table>
     
     <div class="dingdanlist">
      <table>
       <tr>
        <td width="100%" colspan="4"><a href="javascript:;"><input type="checkbox" name="1" />全选</a></td>
       </tr> 
       @foreach($cInfo as $v)
       <tr>
        <td width="4%"><input type="checkbox" _id="{{$v->goods_id}}" class="box" name="1" /></td>
        <td class="dingimg" width="15%"><img src="{{env('UPLOADS_URL')}}{{$v->goods_img}}" /></td>
        <td width="50%">
         <h3>{{$v->goods_name}}</h3>
         <time>下单时间:@php echo date('Y-m-d H:i:s',$v->add_time)@endphp</time>
        </td>
        <td align="right" ><input type="text" goods_id="{{$v->goods_id}}" buy_number="{{$v->buy_number}}" num="{{$v->goods_num}}"  class="spinnerExample add less"/></td>
       </tr>
       <tr>
        <th colspan="4"><strong class="orange">¥{{$v->goods_price}}</strong></th>
       </tr> 
        @endforeach
      </table>
     </div><!--dingdanlist/-->
   
    
    
     <div class="height1"></div>
     <div class="gwcpiao">
     <table>
      <tr>
       <th width="10%"><a href="javascript:history.back(-1)"><span class="glyphicon glyphicon-menu-left"></span></a></th>
       <td width="50%">总计：<strong class="orange" id="money"></strong></td>
       <td width="40%"><a href="javascript:void(0)" id="confirmSett" class="jiesuan">去结算</a></td>
      </tr>
     </table>
    </div><!--gwcpiao/-->
    </div><!--maincont-->
        
        <script>
               //点击+  //获取商品库存
                $(document).on('click','.add',function(){
                    var _this=$(this);
                    var buy_num=parseInt(_this.attr('buy_number'));//已经要购买的数量
                    var goods_num=_this.attr('num');//商品库存
                     //判断购买数量是否超过库存
                     if(buy_number>=goods_num){
                         alert('超过库存');
                     }else{
                        var buy_number=parseInt(_this.val())+buy_num;//已经要购买的数量+又要购买的数量=最后要购买的
                     }
                   
                   //文本框的值改变 数据库的值也要改变
                     var goods_id=_this.attr('goods_id');
                     
                     // 更改购买数量  
                     changeNumber(goods_id,buy_number);


                     //重新获取小计
                    getToal(goods_id,_this);
                    
                     //给当前复选框选中
                     trChecked(_this);

                    
                })

                // //点击— 
                // $(document).on('click','.less',function(){
                //     var _this=$(this);
                //     var buy_num=parseInt(_this.attr('buy_number'));//已经要购买的数量
                //     var goods_num=_this.attr('num');//商品库存
                //      //判断购买数量是否超过库存
                //      if(buy_number<1){
                //          alert('至少购买一件');
                //      }else{
                //         var buy_number=buy_num-parseInt(_this.val());//已经要购买的数量-不想买的数量=最后要购买的
                //      }
                   
                //    //文本框的值改变 数据库的值也要改变
                //      var goods_id=_this.attr('goods_id');
                    
                //     // 更改购买数量  
                //     changeNumber(goods_id,buy_number);

                //      //重新获取小计
                //     getToal(goods_id,_this);
        
                   
                // })

         

            //  //更改购买数量
             function changeNumber(goods_id,buy_number){
                 //通过ajax技术传给控制器   控制器修改一定要用同步
                  $.ajax({
                       url:"car/changeNumber",
                       type:'get',
                       data:{goods_id:goods_id,buy_number:buy_number},//以对象的方式传输数据 {名字：值}
                       async:false,
                       dataType:'json',
                       success:function(result){
                           if(result.code=='00001'){
                              console.log(result.msg);
                           }
                       }

                  })
             }

              //重新获取小计
              function getToal(goods_id,_this){
                //通过ajax技术把商品id传给控制器
                 $.get(
                    "car/getToal",
                    {goods_id:goods_id},
                     function(res){
                    _this.parents('tr').next().find('th').text("￥"+res);
                   
                   }
                 );
             }

           
                //点击复选框 
                    $(document).on('click','.box',function(){
                    var _this=$(this);//当前点击的复选框
                    var status=_this.prop('checked');
                    // var goods_id=$(this).attr('_id');
                    // console.log(goods_id);
                    //重新获取总价
                     getMoney(_this,status);
                })
              


             //给当前复选框选中
               function trChecked(_this){
                var box=_this.parents('tr').find('.box').prop('checked',true); 
                  // console.log(box);
               }



              //重新获取总价
              function getMoney(_this){
              //获取到 选中的复选框  的商品id
                  var _box=$('.box:checked');
                  //console.log(_box); 
                     var goods_id=_this.attr('_id');
                  //    _box.each(function(index){
                  //       // console.log(index);
                  //     goods_id+=_this.attr("_id")+',';
                  //  })
                
                 //截取
                // goods_id=goods_id.substr(0,goods_id.length-1);
                //    console.log(goods_id);

                  //通过ajax技术传给控制器
                $.get(
                  "car/getMoney",
                   {goods_id:goods_id},
                   function(res){
                      // console.log(res);
                     $("#money").text('￥'+res);
                   }
                );


                }


                   //点击确认结算
               $(document).on('click','#confirmSett',function(){
                    //检测是否选中了商品
                    var _box=$(".box:checked");//获取到选中的复选框
                     if((_box.length)>0){
                        //得到选中商品的id
                        var goods_id=_box.attr('_id');
                           //  console.log(goods_id);           
                           location.href="/pay?goods_id="+goods_id;
                     }else{
                        //一件也没选 
                        alert('至少选择一件');
                     }
               })
             
        </script>
        
        @endsection
    