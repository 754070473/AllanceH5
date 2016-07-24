@foreach( $data as $key => $val )
    <div class="col_1">
        <div class="col-sm-4 row_2">
        </div>
        <div class="col-sm-8 row_1">
            <a href="single.html"><img src="{{$val['m_logo']}}" alt=""  width="50px" height="50px"></a>
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
@if($show_click == 1)
<input type="hidden" id="show_click" value="{{$page+1}}">
    @else
<input type="hidden" id="show_click" value="0">
@endif
