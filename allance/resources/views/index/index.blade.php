<!DOCTYPE HTML>
<html>
<head>
<title>Location</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="style/css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!-- Custom Theme files -->
<link href="style/css/style.css" rel='stylesheet' type='text/css' />
<!----font-Awesome----->
<link href="style/css/font-awesome.css" rel="stylesheet"> 
<!----font-Awesome----->
<script src="style/js/jquery.min.js"></script>
<script src="style/js/bootstrap.min.js"></script>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script type="text/javascript">
    $(function(){
        $.get("{{url('top')}}",function(m){
            $('.container').first().before(m);
        })
    })
</script>
</head>
<body>
<div class="container">
<div class="grid_1">
        <h3>Featured Employers</h3>
        <ul id="flexiselDemo3">
            <li><img src="style/images/c1.gif"  class="img-responsive" /></li>
            <li><img src="style/images/c2.gif"  class="img-responsive" /></li>
            <li><img src="style/images/c3.gif"  class="img-responsive" /></li>
            <li><img src="style/images/c4.gif"  class="img-responsive" /></li>
            <li><img src="style/images/c5.gif"  class="img-responsive" /></li>
            <li><img src="style/images/c6.gif"  class="img-responsive" /></li>
        </ul>
        <script type="text/javascript">
            $(window).load(function() {
                $("#flexiselDemo3").flexisel({
                    visibleItems: 6,
                    animationSpeed: 1000,
                    autoPlay:false,
                    autoPlaySpeed: 3000,
                    pauseOnHover: true,
                    enableResponsiveBreakpoints: true,
                    responsiveBreakpoints: {
                        portrait: {
                            changePoint:480,
                            visibleItems: 1
                        },
                        landscape: {
                            changePoint:640,
                            visibleItems: 2
                        },
                        tablet: {
                            changePoint:768,
                            visibleItems: 3
                        }
                    }
                });

            });
        </script>
        <script type="text/javascript" src="style/js/jquery.flexisel.js"></script>
    </div>
    <div class="single">  
	  <div class="col-md-4">
		@foreach( $classify as $key => $val )
            <div class="col_3">
                <h3>{{$val['i_name']}}</h3>
                <ul class="list_1">
				@foreach( $val['son'] as $kk => $vv )
                    <li>
						<span>
							<a href="#">{{$vv['i_name']}}</a>
						</span>：&nbsp;&nbsp;
						@foreach( $vv['son'] as $k => $v )
							<a href="#">{{$v['i_name']}}</a>
						@endforeach
					</li>
				@endforeach
                </ul>
            </div>
		@endforeach
        </div>
	 <div class="col-md-8 single_right">
	      <div class="but_list">
	       <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
			<ul id="myTab" class="nav nav-tabs" role="tablist">
			@foreach( $generalize_list as $key => $val )
			@if( $key == 1 )
				<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">{{$val}}</a></li>
			@else
				<li role="presentation"><a href="#profile{{$key}}" role="tab" id="profile{{$key}}-tab" data-toggle="tab" aria-controls="profile{{$key}}">{{$val}}</a></li>
			@endif
			@endforeach
			</ul>
		<div id="myTabContent" class="tab-content">
		@foreach( $generalize_list as $key => $val )
			@if( $key == 1 )
		  <div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
			@else
		  <div role="tabpanel" class="tab-pane fade" id="profile{{$key}}" aria-labelledby="profile{{$key}}-tab">
			@endif
		  @foreach( $data[$key]['data'] as $k => $v )
		    <div class="tab_grid">
			    <div class="col-sm-3 loc_1">
			    	<a href="location_single.html"><img data-src="holder.js/100%x180" alt="100%x180" src="{{$v['m_logo']}}" data-holder-rendered="true" style="height: 140px; width: 100%; display: block;"></a>
			    </div>
			    <div class="col-sm-9">
			       <div class="location_box1">
			    	 <h6><a href="location_single.html">{{$v['r_name']}}</a><span class="m_1">{{$v['m_name']}}&nbsp;&nbsp;{{$v['r_addtime']}}</span></h6>
			    	 <p><span class="m_2">企业介绍 : </span>{{$v['productprofile']}}</p>
			    	 <ul class="links_bottom">
						<?php
							if(strpos($v['m_welfare'],',')){
							$m_welfare = explode(',',$v['m_welfare']);
							foreach($m_welfare as $vv){
							?>
							<li><span class="icon_text">{{$vv}}</span></li>
							<?php }}else{ ?>
							<li><span class="icon_text">{{$v['m_welfare']}}</span></li>
						<?php }?>
					 </ul>
				   </div>
			    </div>
			    <div class="clearfix"> </div>
			 </div>
		  @endforeach
		  <input type="hidden" id="show_click{{$key}}">
		    @if( $data[$key]['show_click'] == 1 )
				<span id="more_button{{$key}}" style="float:right"><a href="javascript:void (0)" onclick="ck_page({{$data[$key]['page']+1}},{{$key}})" class="btn btn-default pull-left" >加载更多</a></span>
			@endif
		  </div>
		@endforeach
		  </div>
	  </div>
     </div>
    </div>
   </div>
  <div class="clearfix"> </div>
 </div>
</div>
@include('public.footer')
</body>
<script>
    function ck_page(p,key) {
        $.ajax({
            type: 'GET',
            url: 'indexPage',
            data: 'p=' + p + '&g_type_id=' + key ,
            success: function (msg) {
                $('#show_click'+key).remove();
				if( key == 1 ){
					$('#home').children('.tab_grid').last().after(msg);
				}else{
					$('#profile'+key).children('.tab_grid').last().after(msg);
				}
                var show_click = $('#show_click'+key).val();
                if(show_click == 0){
                    $('#more_button'+key).html('');
                }else {
                    $('#more_button'+key).html('<a href="javascript:void (0)" onclick="ck_page(' + show_click + ',' + key + ')" class="btn btn-default pull-left" >加载更多</a>');
                }
            }
        })
    }
</script>
</html>	