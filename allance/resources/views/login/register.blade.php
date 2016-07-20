<!DOCTYPE HTML>
<html>
<head>
<title>Register</title>
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
    <div class="single">  
	   <div class="form-container">
        <h2>注册表单</h2>
        <form action="{{url('doRegister')}}" method="get">
          <div class="row">
            <div class="form-group col-md-12">
                <label class="col-md-3 control-lable" for="firstName">手机号</label>
                <div class="col-md-9">
                    <input type="text" path="firstName" id="firstName" name="phone" class="form-control input-sm" />
                </div>
            </div>
         </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label class="col-md-3 control-lable" for="lastName">邮箱</label>
                    <div class="col-md-9">
                        <input type="text" path="lastName" id="lastName" name="email" class="form-control input-sm"/>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-12">
                    <label class="col-md-3 control-lable" for="lastName">密码</label>
                    <div class="col-md-9">
                        <input type="password" path="passWord" id="passWord" name="password" class="form-control input-sm"/>
                    </div>
                </div>
            </div>
        <div class="row">
            <div class="form-actions floatRight">
                <input type="submit" value="提交" class="btn btn-primary btn-sm">
            </div>
        </div>
    </form>
    </div>
 </div>
</div>
@include('public.footer')
</body>
</html>	