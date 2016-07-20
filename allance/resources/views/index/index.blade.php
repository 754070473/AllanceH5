<!DOCTYPE HTML>
<html>
<head>
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Seeking Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href="style/css/bootstrap-3.1.1.min.css" rel='stylesheet' type='text/css' />
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="style/js/jquery.min.js"></script>
    <script src="style/js/bootstrap.min.js"></script>
    <!-- Custom Theme files -->
    <link href="style/css/style.css" rel='stylesheet' type='text/css' />
    <link href='http://fonts.useso.com/css?family=Roboto:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>
    <!----font-Awesome----->
    <link href="style/css/font-awesome.css" rel="stylesheet">
    <!----font-Awesome----->
</head>
<body>
@include('public.top')
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
            <div class="col_3">
                <h3>Todays Jobs</h3>
                <ul class="list_1">
                    <li><a href="#">Department of Health - Western Australia</a></li>
                    <li><a href="#">Australian Nursing Agency currently require experiences</a></li>
                    <li><a href="#">Russia Nursing Agency currently require experiences</a></li>
                    <li><a href="#">The Government of Western Saudi Arbia</a></li>
                    <li><a href="#">Department of Health - Western Australia</a></li>
                    <li><a href="#">Australian Nursing Agency currently require experiences</a></li>
                    <li><a href="#">Russia Nursing Agency currently require experiences</a></li>
                    <li><a href="#">The Scientific Publishing Services in Saudi Arbia</a></li>
                    <li><a href="#">BPO Private Limited in Canada</a></li>
                    <li><a href="#">Executive Tracks Associates in Pakistan</a></li>
                    <li><a href="#">Pyramid IT Consulting Pvt. Ltd. in Pakistan</a></li>
                </ul>
            </div>
            <div class="col_3">
                <h3>Jobs by Category</h3>
                <ul class="list_2">
                    <li><a href="#">Railway Recruitment</a></li>
                    <li><a href="#">Air Force Jobs</a></li>
                    <li><a href="#">Police Jobs</a></li>
                    <li><a href="#">Intelligence Bureau Jobs</a></li>
                    <li><a href="#">Army Jobs</a></li>
                    <li><a href="#">Navy Jobs</a></li>
                    <li><a href="#">BSNL Jobs</a></li>
                    <li><a href="#">Software Jobs</a></li>
                    <li><a href="#">Research Jobs</a></li>
                </ul>
            </div>
            <div class="widget">
                <h3>Take The Seeking Poll!</h3>
                <div class="widget-content">
                    <div class="seeking-answer">
			    	<span class="seeking-answer-group">
		    			<span class="seeking-answer-input">
		    			   <input class="seeking-radiobutton" type="radio">
		    			</span>
		    			<label for="" class="seeking-input-label">
		    				<span class="seeking-answer-span">Frequently</span>
		    			</label>
		    		</span>
			    	<span class="seeking-answer-group">
		    			<span class="seeking-answer-input">
		    			   <input class="seeking-radiobutton" type="radio">
		    			</span>
		    			<label for="" class="seeking-input-label">
		    				<span class="seeking-answer-span">Interviewing</span>
		    			</label>
		    		</span>
			        <span class="seeking-answer-group">
		    			<span class="seeking-answer-input">
		    			   <input class="seeking-radiobutton" type="radio">
		    			</span>
		    			<label for="" class="seeking-input-label">
		    				<span class="seeking-answer-span">Leaving a familiar workplace</span>
		    			</label>
		    		</span>
                        <div class="seeking_vote">
                            <a class="seeking-vote-button">Vote</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            @foreach( $data as $key => $val )
            <div class="col_1">
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
            <span id="more_button"><a href="javascript:void (0)" onclick="ck_page({{$page+1}})" class="btn btn-default pull-left" >加载更多</a></span>
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
</script>
</html>