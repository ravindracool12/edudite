  <? if(is_array($arr_error_msgs) && count($arr_error_msgs)>0) {?>
  <div class="errorMsg">
  <? foreach($arr_error_msgs as $err_msg){?>
  <br><?=$err_msg?>
  <? }?>
  </div>
  <? }?>