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
                        <li><a href="jobs.html">个人登录</a></li>
                        <li><a href="jobs.html">企业登录</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">注册<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="jobs.html">个人注册</a></li>
                        <li><a href="jobs.html">企业注册</a></li>
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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">个人中心<b class="caret"></b></a>
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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">企业信息中心<b class="caret"></b></a>
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
                    <input type="text" class="text" placeholder="请输入行业" value="">
                    <input type="text" class="text" placeholder="请输入职位" value="">
                    <label class="btn2 btn-2 btn2-1b"><input type="submit" value="搜索"></label>
                </p>
            </div>
        </div>
    </div>
</div>