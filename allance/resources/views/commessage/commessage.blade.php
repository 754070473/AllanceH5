<div class="col-sm-10 follow_left">
    <!--隐藏域传值-->
     <input type="hidden" id="per_id" value="{{$per_id}}">
	<h3>企业信息</h3>
	@foreach($arr as $val)
    <div class="jobs_follow jobs-single-item" id="commessage">
		<div class="thumb"><img src="{{$val['m_logo']}}" class="img-responsive" alt=""/></div>
		<div class="thumb_right">
		<div class="date">30 <span>Jul</span></div>
		<h6 class="title"><a href="#">{{$val['m_name']}}</a>   
            <font color="#FF66FF">  <a href="javascript:void(0)" onclick="deliver('{{$val['mes_id']}}')" style="color:#FF6600;float:right;">投个简历</a></font> 
        </h6>
		<span class="title">
		领域: &nbsp&nbsp <font color="#999fff">{{$val['h_name']}}</font>
		创始人: &nbsp&nbsp <font color="#999fff">{{$val['leadername']}}</font>
		</span>
		<ul class="top-btns">
			<li>
				<a href="#" class="btn_1 fa fa-star-o icon_2"></a>
			</li>
		</ul>
		<p>阶段:<font color="#999fff">{{$val['m_type']}}</p>
        <hr>
        	<?php
	            if(strpos($val['m_welfare'],',')){
	                $m_welfare = explode(',',$val['m_welfare']);
	                foreach($m_welfare as $vv){
	        ?>
	         <a href="javascript:void(0)" class="btn btn-default pull-left" data-toggle="modal" data-target="#applyModal"><?php echo $vv?></a>&nbsp&nbsp
	        <?php }}else{?>
	         <a href="#" class="btn btn-default pull-left" data-toggle="modal" data-target="#applyModal">{{$val['m_welfare']}}</a>
			&nbsp&nbsp
	         <?php }?>
        <ul class="social-icons pull-right">
			<li><span>Share : </span></li>
			<li><a href="#" class="fa fa-facebook" target="_blank"></a></li>
			<li><a href="#" class="fa fa-twitter" target="_blank"></a></li>
			<li><a href="#" class="fa fa-google-plus" target="_blank"></a></li>
		</ul>
        </div>
    </div>
    @endforeach
        <input type="hidden" id="show_click">
        <input type="hidden" id="m_name" value="{{$m_name}}">
        <div class="clearfix" style="margin-left:300px;"> 
             @if( $show_click == 1 )
                <span id="more_button"><a href="javascript:void (0)" onclick="commess_page({{$page+1}})" class="btn btn-default pull-left" >加载更多</a></span>
            @endif
        </div>
</div>



<div class="col-sm-2">
	<h4 class="m_1">Career level</h4>
	<table class="table">
            <tbody>
                <tr class="unread checked">
                    <td class="hidden-xs">
                        <input type="checkbox" class="checkbox">
                    </td>
                    <td class="hidden-xs">
                        Junior
                    </td>
                    <td>
                        (56)
                    </td>
                </tr>
        </tbody>
     </table>
     <h4 class="m_1">Job type</h4>
     <table class="table">
            <tbody>
                <tr class="unread checked">
                    <td class="hidden-xs">
                        <input type="checkbox" class="checkbox">
                    </td>
                    <td class="hidden-xs">
                        Junior
                    </td>
                    <td>
                        (56)
                    </td>
                </tr>
        </tbody>
     </table>
     <h4 class="m_1">Location</h4>
     <table class="table">
            <tbody>
                <tr class="unread checked">
                    <td class="hidden-xs">
                        <input type="checkbox" class="checkbox">
                    </td>
                    <td class="hidden-xs">
                        Junior
                    </td>
                    <td>
                        (56)
                    </td>
                </tr>
        </tbody>
     </table>
</div>
<div class="clearfix"> </div>

<script>
    function commess_page(p) {
        var m_name=$('#m_name').val();
        $.ajax({
            type: 'GET',
            url: 'CommessagePage',
            data: 'p='+p+'&m_name='+m_name,
            success: function (msg) {
               //alert(msg)
                $('#commessage').last().after(msg);
                var show_click = $('#show_click').val();
                // // alert(show_click);
                if(show_click == 0){
                    $('#more_button').html('');
                }else {
                    $('#more_button').html('<a href="javascript:void (0)" onclick="commess_page(' + show_click + ')" class="btn btn-default pull-left" >加载更多</a>');
                }
            }
        })
    }
    function deliver(deliver){
        
    }
</script>