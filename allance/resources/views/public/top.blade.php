<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html"><img src="style/images/logo.png" alt=""/></a>
        </div>
        <!--/.navbar-header-->
        <!-- //没登录状态 -->
        @if($key==2)

        <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" style="height: 1px;">

            <ul class="nav navbar-nav">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">首页</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">职位</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">公司</a>

                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">登录<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="login">个人登录</a></li>
                        <li><a href="login?login_type=1">企业登录</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">注册<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="register">个人注册</a></li>
                        <li><a href="register?register_type=1">企业注册</a></li>
                    </ul>
                </li>
            </ul>
        </div>
            <!-- //个人状态 -->
        @elseif($key==0)
        <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" style="height: 1px;">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">首页</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">职位</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">公司</a>

                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
					@if(empty(!$user['i_name']))
					{{$user['i_name']}}
					@elseif(!empty($user['p_email']))
					{{$user['p_email']}}
					@else
					{{$user['p_phone']}}
					@endif
					的个人中心<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="jobs.html">我收藏的职位</a></li>
                        <li><a href="jobs.html">我的订阅</a></li>
                        <li><a href="jobs.html">帐号设置</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">退出</a>
                </li>
            </ul>
        </div>
            <!-- //企业登录状态 -->
         @elseif($key==1)
        <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" style="height: 1px;">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">首页</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">职位</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">公司</a>

                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
					@if(!empty($user['c_email']))
					{{$user['c_email']}}
					@else
					{{$user['c_phone']}}
					@endif
					<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="jobs.html">发布职位</a></li>
                        <li><a href="jobs.html">收到的简历</a></li>
                        <li><a href="jobs.html">我要招人</a></li>
                        <li><a href="jobs.html">帐号设置</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">退出</a>
                </li>
            </ul>
        </div>
           @endif
        <div class="clearfix"> </div>
    </div>
    <!--/.navbar-collapse-->
</nav>

<div class="banner_1">
    <div class="container">
        <div id="search_wrapper1">
            <div id="search_form" class="clearfix">
                <h1>开始找工作</h1>
                <p>
                    <input type="text" class="text" id="m_name" placeholder="请输入企业名称" value="">
                    <label class="btn2 btn-2 btn2-1b"><input type="submit" value="搜索" id="company"></label>
                </p>
                 <p>
                    <input type="text" class="text" id="r_name" placeholder="请输入职位" value="">
                    <label class="btn2 btn-2 btn2-1b"><input type="submit" value="搜索" id="position"></label>
                </p>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).on('click','#company',function(){
        var m_name=$("#m_name").val();//企业
        if(m_name==""){
             alert("企业名称不能为空")
        }else{
            $.ajax({
               type: "get",
               url: "{{url('ComMessage')}}",
               data: 'm_name='+m_name,
               success: function(msg){
                 // alert(msg)
                $('.single').children().remove();
                $('.single').append(msg);
               }
            });
            
        }
    })


</script>