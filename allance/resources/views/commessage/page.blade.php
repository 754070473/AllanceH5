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

@if($show_click == 1)
<input type="hidden" id="show_click" value="{{$page+1}}">
@else
<input type="hidden" id="show_click" value="0">
@endif
<input type="hidden" id="m_name" value="{{$m_name}}">