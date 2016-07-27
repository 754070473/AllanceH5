@foreach( $data as $k => $v )
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
@if($show_click == 1)
<input type="hidden" id="show_click{{$g_type_id}}" value="{{$page+1}}">
    @else
<input type="hidden" id="show_click{{$g_type_id}}" value="0">
@endif
