<!DOCTYPE HTML>
<html>
<head>
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href="style/css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <!-- Custom Theme files -->
    <link href="style/css/style.css" rel='stylesheet' type='text/css' />
    <!----font-Awesome----->
    <link href="style/css/font-awesome.css" rel="stylesheet">
    <!----font-Awesome-->
    <script src="style/js/jquery.min.js"></script>
    <script src="style/js/bootstrap.min.js"></script>
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
							<a href="" >{{$vv['i_name']}}</a>
						</span>：&nbsp;&nbsp;
						@foreach( $vv['son'] as $k => $v )
							<a href="#" onclick="position('{{$v['i_name']}}')">{{$v['i_name']}}</a>
						@endforeach
					</li>
				@endforeach
                </ul>
            </div>
		@endforeach
        </div>
        <div class="col-md-8">
            @foreach( $data as $key => $val )
            <div class="col_1" id="a">
                <div class="col-sm-4 row_2">
                    <a href="single.html"><img src="{{$val['m_logo']}}" alt=""></a>
                </div>
                <div class="col-sm-8 row_1">
                    <h4><a href="single.html">{{$val['r_name']}}</a></h4>
                    <h6>{{$val['m_name']}} <span class="dot">·</span> {{$val['r_addtime']}}</h6>
                    <p>{{$val['productprofile']}}</p>
                    <div class="social">
                        <a class="btn_1" href="#">
                            <?php
                            if(strpos($val['m_welfare'],',')){
                                $m_welfare = explode(',',$val['m_welfare']);
                                foreach($m_welfare as $vv){
                                    ?>
                            <span class="share1 fb">{{$vv}}</span>
                            <?php }}else{ ?>
                            <span class="share1 fb">{{$val['m_welfare']}}</span>
                            <?php }?>
                        </a>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
            @endforeach
                <input type="hidden" id="show_click">
        </div>
        @if( $show_click == 1 )
            <span id=""><a href="javascript:void (0)" onclick="ck_page({{$page+1}})" class="btn btn-default pull-left" >加载更多</a></span>
        @endif
        <div class="clearfix"></div>
    </div>
</div>
@include('public.footer')
</body>
<script>
    function ck_page(p) {
        $.ajax({
            type: 'GET',
            url: 'indexPage',
            data: 'p=' + p ,
            success: function (msg) {
                $('#show_click').remove();
                $('.col_1').last().after(msg);
                var show_click = $('#show_click').val();
                if(show_click == 0){
                    $('#more_button').html('');
                }else {
                    $('#more_button').html('<a href="javascript:void (0)" onclick="ck_page(' + show_click + ')" class="btn btn-default pull-left" >加载更多</a>');
                }
            }
        })
    }
    //个人收工作
    function position(name) {
        $.ajax({
            type: 'get',
            url: 'selectposition',
            data: 'name=' + name,
            success: function (msg) {
            $('#a').html(msg);
            $('#more_button').html('');
            
          }
        })
    }
</script>
</html>