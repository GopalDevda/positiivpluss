<!DOCTYPE html>

<html>

<head>

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Positiive</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/js/bootstrap.min.js">

    <link rel="stylesheet" type="text/css" href="assets/header.css">
<script src="https://code.jquery.com/jquery-3.6.1.js"></script>

</head>
<body>
  <!-- INVESTIGATION  -->
<div style="margin-top: 3%; max-width: 1140px; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;">
       <div style="background: black; color: white; position: relative; border-radius: 15px;">
      <div style="padding: 20px; display: flex;">
        <div style="width: 130px; margin-right: 60px;">
          <img style="width: 85px; position: relative; top: 15px;" src="https://positiivplus.io/public/uploads/assessment/1629138611_2179817bd862b8f2b7ae.png">
        </div>
        <div style="width: 100%;">
          <div style="font-size: 16px; font-weight: 700; margin-bottom: 18px;color: white;"><span>INVESTIGATION</span>&nbsp;<span style="background: rgb(222, 254, 115); width: 69px; height: 4px; position: absolute; top: 45px;left: 190px;"></span></div>
          <div style="max-width: 390px; margin-bottom: 20px; color: white;">
            This is an Advanced assessment aligning you brand wth the United Nation's Sustainable Development Goals.
          </div>
          <div style="display: flex;">
            <div style="display: flex!important;">
              <div style="margin-right: 1rem !important;">
                <img src="https://user.positiivplus.io/public/brand/assets/app-assets/images/icon_score.png?v=1">                                            
              </div>
              <div>
                <div style="color: white;">Steps Completed</div>
                <div><span id="tot_attempt_id" style="font-weight: bold;">4</span> of 4</div>
              </div>
            </div>
            <div style="margin-left: 30px;">
              <div style="margin-right: 1rem !important;">
                <img src="https://positiivplus.io/public/brand/assets/custom_img/icon_complete.png">
              </div>
              <div>
                <div style="color: white;">Rating</div>
                <!-- <div class="cph_score_result fw-bolder">1.0000000149012% Out of 100</div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- endINVESTIGATION  -->


     <div style="border-top: 3px solid #defe73; box-shadow: 0 4px 24px 0 rgb(34 41 47 / 10%); padding: 15px 35px 15px 35px; border-radius: 12px; margin-top: 2rem; max-width: 1140px; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;">
       <div style=" display: -webkit-box; display: flex; flex-wrap: wrap;margin-right: -15px; margin-left: -15px;">
         <div style="position: relative; width: 100%; min-height: 1px; padding-right: 15px; padding-left: 15px; -webkit-box-flex: 0; flex: 0 0 25%; max-width: 25%;">
          <div>
            <h6 style="margin-top: 30px; color:#3e3d3d;">Title</h6>
            <h6 style="margin-top: 30px; color:#3e3d3d;">Site</h6>
            <h6 style="margin-top: 30px; color:#3e3d3d;">Investigation Team</h6>
            <h6 style="margin-top: 30px; color:#3e3d3d;">Closed On</h6>
            <h6 style="margin-top: 30px; color:#3e3d3d;">Closed By</h6>
          </div>
         </div>
           <?php foreach($root_cause as $inv){   ?>
        <div  style="position: relative; width: 100%; min-height: 1px; padding-right: 15px; padding-left: 15px; -webkit-box-flex: 0; flex: 0 0 75%; max-width: 75%;"s>
          <div>
            <h6 style="border-bottom: 1px solid #80808069; color:#828089c7;  margin-top: 30px;"><?php foreach($issue_title as $title){
                        if($inv['tool_issue_id'] == $title['id']){

                            echo $title['title_issue'];
                        }

                  }?></h6>
            <h6 style="border-bottom: 1px solid #80808069; color:#828089c7;  margin-top: 30px;">Product</h6>
            <h6 style="border-bottom: 1px solid #80808069; color:#828089c7;  margin-top: 30px;"> <?php if($inv['st_2_Inv_t_memb'] == '10'){
                            echo 'Rohit';}?>
                            <?php if($inv['st_2_Inv_t_memb'] == '11'){
                            echo 'Miracle';}?>
                            <?php if($inv['st_2_Inv_t_memb'] == '12'){
                            echo 'Venture';}?>
                              <?php if($inv['st_2_Inv_t_memb'] == '13'){
                            echo 'Ashhar';}?></h6>
            <h6 style="border-bottom: 1px solid #80808069; color:#828089c7;  margin-top: 30px;">ab</h6>
            <h6 style="border-bottom: 1px solid #80808069; color:#828089c7;  margin-top: 30px;">abc</h6>
          </div>
         </div>
         <?php
            }?>

       </div>
     </div>
     <!-- root cause -->
     <div style=" margin-top: 1rem; padding:0px; max-width: 1140px; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto; ">
       <h5 style="padding: 3px; color: #5e5873;">Root Cause</h5>
       <div style=" display: -webkit-box; display: flex; flex-wrap: wrap;margin-right: -15px; margin-left: -15px;">
         <div style="-webkit-box-flex: 0; flex: 0 0 33.333333%; max-width: 33.333333%; position: relative; width: 100%; min-height: 1px;    padding-right: 15px; padding-left: 15px;">
          <div style="border-top: 3px solid #defe73; box-shadow: 0 4px 24px 0 rgb(34 41 47 / 10%); padding: 15px 35px 15px 35px; border-radius: 12px;
          max-width: 1140px; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;">
            <h5 style="margin-top: 10px; color:#3e3d3d;">Root Cause 1</h5>
            <?php foreach ($root_cause as $key => $value) { ?> 
            <h6 style="margin-top: 20px; color:#404040c7;"><?php echo $value['st_3_m1']; ?></h6>
            <h6 style="margin-top: 20px; color:#404040c7;"><?php echo $value['st_3_man1']; ?></h6>
            <h6 style="margin-top: 20px; color:#404040c7;"><?php echo $value['st_3_Material1']; ?></h6>
            <h6 style="margin-top: 20px; color:#404040c7;"><?php echo $value['st_3_Enviroment1']; ?></h6>
            <h6 style="margin-top: 20px; color:#404040c7;"><?php echo $value['st_3_System']; ?></h6>
            <?php
    }?>
          </div>
         </div>
        <div style="-webkit-box-flex: 0; flex: 0 0 33.333333%; max-width: 33.333333%; position: relative; width: 100%; min-height: 1px;    padding-right: 15px; padding-left: 15px;">
          <div style="border-top: 3px solid #defe73; box-shadow: 0 4px 24px 0 rgb(34 41 47 / 10%); padding: 15px 35px 15px 35px; border-radius: 12px;
          max-width: 1140px; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;">
            <h5 style="margin-top: 10px; color:#3e3d3d;">Root Cause 2</h5>
            <h6 style="margin-top: 20px; color:#404040c7;">Machine</h6>
            <h6 style="margin-top: 20px; color:#404040c7;">Man</h6>
            <h6 style="margin-top: 20px; color:#404040c7;">Material</h6>
            <h6 style="margin-top: 20px; color:#404040c7;">Environment</h6>
            <h6 style="margin-top: 20px; color:#404040c7;">System</h6>
          </div>
         </div>
          <div style="-webkit-box-flex: 0; flex: 0 0 33.333333%; max-width: 33.333333%; position: relative; width: 100%; min-height: 1px;    padding-right: 15px; padding-left: 15px;">
          <div style="border-top: 3px solid #defe73; box-shadow: 0 4px 24px 0 rgb(34 41 47 / 10%); padding: 15px 35px 15px 35px; border-radius: 12px;
          max-width: 1140px; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;">
            <h5 style="margin-top: 10px; color:#3e3d3d;">Root Cause 3</h5>
            <h6 style="margin-top: 20px; color:#404040c7;">Machine</h6>
            <h6 style="margin-top: 20px; color:#404040c7;">Man</h6>
            <h6 style="margin-top: 20px; color:#404040c7;">Material</h6>
            <h6 style="margin-top: 20px; color:#404040c7;">Environment</h6>
            <h6 style="margin-top: 20px; color:#404040c7;">System</h6>
          </div>
         </div>
       </div>
     </div>
     <!-- end root cause -->
     <!-- victim -->
            <h5 style="padding: 3px; margin-top: 1rem; color: #5e5873;">Victim</h5>
          <div style="border-top: 3px solid #defe73; box-shadow: 0 4px 24px 0 rgb(34 41 47 / 10%); padding: 15px 35px 15px 35px; border-radius: 12px;max-width: 1140px; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;">
       <div style="background: #edfeb6; border: 1px solid #000000a6; border-radius: 5px; padding: 7px; color: #222;max-width: 1140px; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;">
         <h6 style=" color: #222; display: inline;">Victim Title</h6>
       </div>
       <div style=" display: -webkit-box; display: flex; flex-wrap: wrap;margin-right: -15px; margin-left: -15px;">
         <div style="-webkit-box-flex: 0;flex: 0 0 50%; max-width: 50%; position: relative; width: 100%; min-height: 1px;padding-right: 15px;    padding-left: 15px;">
    <div style=" max-width: 600px; position: relative;">
<?php foreach ($victim_report as $key => $value) { ?>
  <div style="background: red; border-radius: 50%; height: 10px; position: absolute; width: 10px; top: 14%;left: 16%;">

    <input type="checkbox" style="width: 10px;" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="neck" ? 'checked' : '');
     
     
 }}?>></div>

  <div  style="background: red; border-radius: 50%; height: 10px; position: absolute; width: 10px; top: 6%;left: 16%;"><input type="checkbox"  style="width: 10px;" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="head" ? 'checked' : '');
     
     
 }}?>></div>

  <!-- <div class="dot dot3"><input type="checkbox"></div> -->
<!-- leg -->
  <div  style="background: red; border-radius: 50%; height: 10px; position: absolute; width: 10px; top: 90%; right: 84%;"><input type="checkbox"  style="width: 10px;" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="leftleg" ? 'checked' : '');
     
     
 }}?>></div>
  <div  style="background: red; border-radius: 50%; height: 10px; position: absolute; width: 10px; top: 90%; right: 79%;" ><input type="checkbox"  style="width: 10px;" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","rightleg","leftleg","head");
 if(in_array($k, $MARKF)){
  echo ($k=="rightleg" ? 'checked' : '');
    
     
 }}?> ></div>
  <div  style="background: red; border-radius: 50%; height: 10px; position: absolute; width: 10px; top: 75%; right: 85%;" ><input type="checkbox"  style="width: 10px;" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="leftcalf" ? 'checked' : '');
     
     
 }}?>></div>
  <div  style="background: red; border-radius: 50%; height: 10px; position: absolute; width: 10px; top: 75%; right: 78%;" ><input type="checkbox"  style="width: 10px;" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="rightcalf" ? 'checked' : '');
  
     
 }}?>></div>
  <!-- <div class="dot dotleg5"><input type="checkbox"></div>
  <div class="dot dotleg6"><input type="checkbox"></div> -->
  <div  style="background: red; border-radius: 50%; height: 10px; position: absolute; width: 10px;  top: 58%; right: 86%;" ><input type="checkbox"  style="width: 10px;" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="leftthigh" ? 'checked' : '');
   
     
 }}?>></div>
  <div  style="background: red; border-radius: 50%; height: 10px; position: absolute; width: 10px;  top: 58%; right: 77%;" ><input type="checkbox"  style="width: 10px;" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="rightthigh" ? 'checked' : '');
    
     
 }}?>></div>
  <!-- uper -->
  <div  style="background: red; border-radius: 50%; height: 10px; position: absolute; width: 10px;  top: 45%;right:87%;" ><input type="checkbox"  style="width: 10px;" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="lefthip" ? 'checked' : '');
    
     
 }}?>></div>
  <div  style="background: red; border-radius: 50%; height: 10px; position: absolute; width: 10px;  top: 45%;right:76%;" ><input type="checkbox"  style="width: 10px;" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="righthip" ? 'checked' : '');
    
     
 }}?>></div>
  <div  style="background: red; border-radius: 50%; height: 10px; position: absolute; width: 10px;  top: 40%;right:82%;" ><input type="checkbox"  style="width: 10px;" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="lumber" ? 'checked' : '');
     
     
 }}?>></div>
  <div  style="background: red; border-radius: 50%; height: 10px; position: absolute; width: 10px;  top: 33%;right:82%;" ><input type="checkbox"  style="width: 10px;" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="back" ? 'checked' : '');
     
     
 }}?>></div>
  <div  style="background: red; border-radius: 50%; height: 10px; position: absolute; width: 10px;  top: 23%;right:82%;" ><input type="checkbox"  style="width: 10px;" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="shoulderblade" ? 'checked' : '');
     
     
 }}?>></div>
  <div  style="background: red; border-radius: 50%; height: 10px; position: absolute; width: 10px;  top: 23%;right:73%;" ><input type="checkbox"  style="width: 10px;" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="rightshoulder" ? 'checked' : '');
    
     
 }}?>></div>
  <div  style="background: red; border-radius: 50%; height: 10px; position: absolute; width: 10px;  top: 23%;right:90%;" ><input type="checkbox"  style="width: 10px;" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="leftshoulder" ? 'checked' : '');
     
     
 }}?>></div>
  <!-- Front Uper -->
  <div  style="background: red; border-radius: 50%; height: 10px; position: absolute; width: 10px; top:10%;left:43%;"><input type="checkbox"  style="width: 10px;" value="earleft" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="leftear" ? 'checked' : '');
    
     
 }}?>></div>

  <div  style="background: red; border-radius: 50%; height: 10px; position: absolute; width: 10px; top:10%;left:50%;"><input type="checkbox"  style="width: 10px;" value="earright"  <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="rightear" ? 'checked' : '');
    
     
 }}?> ></div>

  <div  style="background: red; border-radius: 50%; height: 10px; position: absolute; width: 10px; top:13%;left:46%;"><input type="checkbox"  style="width: 10px;" value="mouth" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="mouth" ? 'checked' : '');
    
     
 }}?>></div>

  <div  style="background: red; border-radius: 50%; height: 10px; position: absolute; width: 10px; top:9%;left:45%;"><input type="checkbox"  style="width: 10px;" value="eyeright" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="righteye" ? 'checked' : '');
     
     
 }}?>></div>

  <div  style="background: red; border-radius: 50%; height: 10px; position: absolute; width: 10px; top:9%;left:48%;"><input type="checkbox"  style="width: 10px;" value="eyeleft" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","rightleg","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="lefteye" ? 'checked' : '');
     
     
 }}?>></div>


  <div  style="background: red; border-radius: 50%; height: 10px; position: absolute; width: 10px; top:4%;left:46%;"><input type="checkbox"  style="width: 10px;" value="head" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="head" ? 'checked' : '');
    
     
 }}?>></div>


  <div  style="background: red; border-radius: 50%; height: 10px; position: absolute; width: 10px; top:19%;left:46%;"><input type="checkbox"  style="width: 10px;" value="adams"  <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="adams" ? 'checked' : '');
     
     
 }}?>></div>

  <div  style="background: red; border-radius: 50%; height: 10px; position: absolute; width: 10px; top:22%;left:38%;"><input type="checkbox"  style="width: 10px;" value="shoulderleft" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="rightshoulder" ? 'checked' : '');
 
     
 }}?>></div>

  <div  style="background: red; border-radius: 50%; height: 10px; position: absolute; width: 10px; top:22%;left:55%;"><input type="checkbox"  style="width: 10px;" value="shoulderright" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="leftshoulder" ? 'checked' : '');
   
     
 }}?>></div>

  <div  style="background: red; border-radius: 50%; height: 10px; position: absolute; width: 10px; top:25%;left:45%;"><input type="checkbox"  style="width: 10px;" value="chest" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="chest" ? 'checked' : '');
 
     
 }}?>></div>

  <div  style="background: red; border-radius: 50%; height: 10px; position: absolute; width: 10px; top:35%;left:40%;"><input type="checkbox"  style="width: 10px;" value="elbowleft" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="rightelbow" ? 'checked' : '');
     
     
 }}?>></div>

  <div  style="background: red; border-radius: 50%; height: 10px; position: absolute; width: 10px; top:35%;left:53%;"><input type="checkbox"  style="width: 10px;" value="elbowright" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="leftelbow" ? 'checked' : '');
     
     
 }}?>></div>

  <div  style="background: red; border-radius: 50%; height: 10px; position: absolute; width: 10px; top:45%;left:36%;"><input type="checkbox"  style="width: 10px;" value="forearm" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="forearm" ? 'checked' : '');
     
     
 }}?>></div>

  <div  style="background: red; border-radius: 50%; height: 10px; position: absolute; width: 10px; top:46%;left:57%;"><input type="checkbox"  style="width: 10px;" value="forearm2" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="forearm2" ? 'checked' : '');
     
     
 }}?>></div>

  <div  style="background: red; border-radius: 50%; height: 10px; position: absolute; width: 10px; top:40%;left:46%;"><input type="checkbox"  style="width: 10px;" value="umbilicus" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="umbilicus" ? 'checked' : '');
     
     
 }}?>></div>
  <div  style="background: red; border-radius: 50%; height: 10px; position: absolute; width: 10px; top:47%;left:46%;"><input type="checkbox"  style="width: 10px;" value="penis" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="penis" ? 'checked' : '');
     
     
 }}?>></div>

  <div  style="background: red; border-radius: 50%; height: 10px; position: absolute; width: 10px; top:56%;left:43%;"><input type="checkbox"  style="width: 10px;" value="Thighleft" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="rightThigh" ? 'checked' : '');
     
     
 }}?>></div>

  <div  style="background: red; border-radius: 50%; height: 10px; position: absolute; width: 10px; top:56%;left:50%;"><input type="checkbox"  style="width: 10px;" value="Thighright" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="leftThigh" ? 'checked' : '');
  
     
 }}?>></div>

  <div  style="background: red; border-radius: 50%; height: 10px; position: absolute; width: 10px; top:67%;left:44%;"><input type="checkbox"  style="width: 10px;" value="kneeleft" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="rightknee" ? 'checked' : '');
   
     
 }}?> ></div>

  <div  style="background: red; border-radius: 50%; height: 10px; position: absolute; width: 10px; top:67%;left:48%;"><input type="checkbox"  style="width: 10px;" value="kneeright"
     <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="leftknee" ? 'checked' : '');
    
     
 }}?>></div>

  <div  style="background: red; border-radius: 50%; height: 10px; position: absolute; width: 10px; top:80%;left:44%;"><input type="checkbox"  style="width: 10px;" value="calfleft" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","rightleg","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="rightcalf" ? 'checked' : '');
     
     
 }}?>></div>

  <div  style="background: red; border-radius: 50%; height: 10px; position: absolute; width: 10px; top:80%;left:48%;">
    <input type="checkbox"  style="width: 10px;" value="calfright" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","rightleg","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="leftcalf" ? 'checked' : '');
     
     
 }}?>></div>

 <div  style="background: red; border-radius: 50%; height: 10px; position: absolute; width: 10px; top:89%;left:45%;"><input type="checkbox" 
  style="width: 10px;" value="footleft" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){

  echo ($k=="leftfoot" ? 'checked' : '');
     
     
 }}?>></div>
  <div  style="background: red; border-radius: 50%; height: 10px; position: absolute; width: 10px; top:89%;left:48%;"><input type="checkbox"  style="width: 10px;" value="footright" <?php $v = json_decode($value['body_mark']);foreach($v as $k){
 $MARKF=array("neck","leftfoot","leftcalf","rightfoot","rightcalf","leftknee","rightknee","rightThigh","penis","umbilicus","forearm","leftelbow","rightelbow","chest","adams","lefteye","righteye","mouth","rightear","leftear","leftshoulder","rightshoulder","shoulderblade","back","lumber","righthip","lefthip","rightthigh","leftthigh","rightcalf","leftcalf","head","leftleg","head");
 if(in_array($k,$MARKF)){
  echo ($k=="rightfoot" ? 'checked' : '');
     
     
 }}?>></div>
  <img style="width: 65%;"src="https://user.positiivplus.io/report_design/demo4/body-mark.jpeg"/>

</div>
<?php
}?>
   </div>
          <div style="-webkit-box-flex: 0;flex: 0 0 50%; max-width: 50%; position: relative; width: 100%; min-height: 1px;padding-right: 15px;    padding-left: 15px;">
          <div style="max-width: 1140px; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;">
            <div style="display: flex;flex-wrap: wrap; margin-right: -15px;    margin-left: -15px;">
              <div style="-webkit-box-flex: 0;flex: 0 0 50%; max-width: 50%; position: relative; width: 100%; min-height: 1px;padding-right: 15px;    padding-left: 15px;">
                <div>
                  <h6 style="margin-top: 25px; color: #3e3d3d;">Select Victim</h6>
                  <h6 style="margin-top: 20px; color: #3e3d3d;">Name of Victim</h6>
                  <h6 style="margin-top: 20px; color: #3e3d3d;">Gender</h6>
                  <h6 style="margin-top: 20px; color: #3e3d3d;">Range</h6>
                  <h6 style="margin-top: 20px; color: #3e3d3d;">Details of Injury</h6>
                  <h6 style="margin-top: 20px; color: #3e3d3d;">Body Marks</h6>
                  <h6 style="margin-top: 20px; color: #3e3d3d;">What was Victim taken</h6>
                  <h6 style="margin-top: 20px; color: #3e3d3d;">Details of Treatment</h6>
                </div>
              </div>
                                <?php foreach ($victim_report as $key => $value) { ?>

               <div style="-webkit-box-flex: 0;flex: 0 0 50%; max-width: 50%; position: relative; width: 100%; min-height: 1px;padding-right: 15px;    padding-left: 15px;">
                <div>
                  <h6 style="margin-top: 25px; color: #828089c7; border-bottom: 1px solid #80808069; color:#828089c7;"><?php if($value['victim_type'] == '10'){
                                               echo "Admin"; }?>
                                               <?php if($value['victim_type'] == '12'){
                                               echo "Employee"; }?>
                                               <?php if($value['victim_type'] == '11'){
                                               echo "Manager"; }?></h6>
                  <h6 style="margin-top: 20px; color: #828089c7; border-bottom: 1px solid #80808069; color:#828089c7;"><?php echo $value['victim_name']?> </h6>
                  <h6 style="margin-top: 20px; color: #828089c7; border-bottom: 1px solid #80808069; color:#828089c7;"><?php echo $value['gender']?></h6>
                  <h6 style="margin-top: 20px; color: #828089c7; border-bottom: 1px solid #80808069; color:#828089c7;"><?php echo $value['age']?></h6>
                  <h6 style="margin-top: 20px; color: #828089c7; border-bottom: 1px solid #80808069; color:#828089c7;"><?php echo $value['details_injury']?></h6>
                  <h6 style="margin-top: 20px; color: #828089c7; border-bottom: 1px solid #80808069; color:#828089c7;"><?php $v = json_decode($value['body_mark']);
                                              foreach($v as $k){
                                                echo ucwords($k); echo ",";
                                                
                                              }
                                          ?></h6>
                  <h6 style="margin-top: 20px; color: #828089c7; border-bottom: 1px solid #80808069; color:#828089c7;"><?php echo $value['victim_work']?></h6>
                  <h6 style="margin-top: 20px; color: #828089c7; border-bottom: 1px solid #80808069; color:#828089c7;"><?php echo $value['details_treatment']?></h6>
                </div>
              </div>
              <?php 
         }?>
            </div>
          </div>
         </div>
       </div>
   </div>

    <!-- end victim -->
     <!-- Action -->

     <div style="margin-top: 1rem; max-width: 1140px; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;">
       <h5 style="color: #5e5873;">Action</h5>
       <?php foreach($all_action as $action){?>
       <div style=" display: -webkit-box; display: flex; flex-wrap: wrap;margin-right: -15px; margin-left: -15px;">

         <div style="-webkit-box-flex: 0; flex: 0 0 33.333333%; max-width: 33.333333%; position: relative; width: 100%; min-height: 1px;    padding-right: 15px; padding-left: 15px; border-top: 3px solid #defe73; box-shadow: 0 4px 24px 0 rgb(34 41 47 / 10%); padding: 15px 35px 15px 35px; border-radius: 12px;">
          <!-- 1 -->
              

        <div>
          <h4 style="color: #5E5873;"><?php echo $action['title']; ?></h4>
        </div>
        <?php foreach($all_action_timeline as $timline){?>
            <?php if($timline['action_center_id'] == $action['id']){?>
          <ul style="padding: 0; margin-bottom: 0; margin-left: 1rem;list-style: none;">
            <li style="position: relative;padding-left: 2.5rem;border-left: 1px solid #EBE9F1; padding-bottom: 1.8rem;">
              <span style="left: -0.412rem; top: 0.07rem;height: 12px; width: 12px; border: 0; background-color: #7367F0; position: absolute; z-index: 2; display: flex; justify-content: center; align-items: center; text-align: center; border-radius: 50%"></span>
              <div style="position: relative;width: 100%;min-height: 4rem;">
                  <h6><?php echo $timline['TitleAdd'] ?></h6>
                  
                <p><?php echo $timline['description'] ?></p>
              </div>
            </li>
            <?php
        }?>
         <?php 
}?>
           
             
                  </ul>
                </div>
              </div>
              <?php 
}?>
            </li>
          </ul>
   <!--    <div style="-webkit-box-flex: 0; flex: 0 0 33.333333%; max-width: 33.333333%; position: relative; width: 100%; min-height: 1px;    padding-right: 15px; padding-left: 15px; border-top: 3px solid #defe73; box-shadow: 0 4px 24px 0 rgb(34 41 47 / 10%); padding: 15px 35px 15px 35px; border-radius: 12px;">
        issue
      </div>
      <div style="-webkit-box-flex: 0; flex: 0 0 33.333333%; max-width: 33.333333%; position: relative; width: 100%; min-height: 1px;    padding-right: 15px; padding-left: 15px; border-top: 3px solid #defe73; box-shadow: 0 4px 24px 0 rgb(34 41 47 / 10%); padding: 15px 35px 15px 35px; border-radius: 12px;">
        issue
      </div>  -->
       </div>
     </div>
     <!-- end action -->
     <footer style="margin-top: 1rem;">
       <p style="color: #56565a;">COPYRIGHT &copy; <a href="#" style="text-decoration: none; color: #abcd39;">PositiivPlus</a>, All right Reserved</p>
     </footer>
</div>
</body>
</html>

<script type="text/javascript">
$("document").ready(function() {
        window.print();      

    $('#rrrrrrr').on('click', function() {
      
        
    });
 });


</script>