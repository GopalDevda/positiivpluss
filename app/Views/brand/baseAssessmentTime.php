<?php include("include/header.php"); ?>
<?php include("include/menu.php");?>
<div class="main-content-wrap sidenav-open d-flex flex-column custom_page">
            <!-- ============ Body content start ============= -->
            <div class="main-content category_body">
                <div class="breadcrumb">
                    <h1><?php echo $assessment[0]['assessment_name'];?></h1>
                   <!-- <ul>
                        <li><a href="">dummy</a></li>
                        <li>dummy</li>
                    </ul>-->
                </div>
                <div class="separator-breadcrumb border-top"></div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="category_page_header">
                            <div class="cph_inner">
                                <div class="cph_left">
                                    <img src="<?php echo base_url();?>/public/uploads/assessment/<?php echo $assessment[0]['image'];?>">
                                </div>
                                <div class="cph_right">
                                    <div class="cph_title"><?php echo $assessment[0]['title'];?></div>
                                    <div class="cph_short_desc">
                                        <?php echo $assessment[0]['description'];?>
                                    </div>
                                    <div class="cph_status">
                                        <div class="cph_status_left d-flex">
                                            <div class="cph_score_icon">
                                                <img src="https://www.utopiic.com/positive/assets/dist-assets/custom_img/icon_score.png">
                                            </div>
                                            <div class="cph_score_content">
                                                <div class="cph_score_label">Question Completion</div>
                                                <div class="cph_score_result">0 Out of 100</div>
                                            </div>
                                        </div>
                                        <div class="cph_status_right d-flex">
                                            <div class="cph_score_icon">
                                                <img src="https://www.utopiic.com/positive/assets/dist-assets/custom_img/icon_complete.png">
                                            </div>
                                            <div class="cph_score_content">
                                                <div class="cph_score_label">Utopiic Score</div>
                                                <div class="cph_score_result">0 Out of 100</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <div class="admin_btn float-right mt-4">
                            <a href="https://www.utopiic.com/positive/assessment/submitAssessment/0/554" style="background-color: #C39A4A;color: white;
font-size: 16px;
font-weight: 600;
border: none;
padding: 3px 15px;
cursor: pointer;" onclick="return confirm('Do You Want to Submit Assessment?')">Submit</a>
                        </div>
                    </div>
                </div>


            </div>
            
        </div>
<!-- color change by toggle btn start -->        
<script>        
    var toggle = document.getElementById('toggle_btn')
    let isToggle = true;

    function myFunction() {
        var textArea = document.getElementById('color_change')
        isToggle = !isToggle
        if (isToggle) {
            textArea.value = `<iframe src="https://bigsolution.co.in/admin/brand_white_theme.php" style="width: 87px; height: 87px; overflow: hidden; border: none;" scrolling="no"></iframe>  `
        } else {
            console.log("ok ok")
            textArea.value = `<iframe src="https://bigsolution.co.in/admin/brand_black_theme.php" style="width: 87px; height: 87px; overflow: hidden; border: none;" scrolling="no"></iframe>  `
        }
    }
</script>
<?php include("include/footer.php"); ?>
<script type="text/javascript">
    function getNext(id,next){
        $('#accordion-item-icons-'+id).removeClass('show');
        $('#accordion-item-icons-'+next).addClass('collapse show');
    }

    function saveQuestion(qid,indicator,id,next) {
        //let quesitonNumber = $(that).attr('data-question');
        var remark = $("#remark"+qid).val();
        var answer = $("input[name='answer"+qid+"']:checked").val();
        $.ajax({
            url : "<?php echo base_url();?>/supplier/submitBaseAssessmentQuestion/"+qid+"/"+answer+"/"+remark+"/"+indicator,
            type: "POST",
            //dataType: "JSON",
            success: function(result){
                 var obj = JSON.parse(result);
                 $("#totAnswer"+indicator).html(obj.tot_ans);
                 $("#totQuestion"+indicator).html(obj.tot_q);
                 if(obj.tot_ans==obj.tot_q){
                    $("#completeImg"+indicator).attr("src","/dist-assets/custom_img/q_filled.png");
                 }

            },
        });
        $('#accordion-item-icons-'+id).removeClass('show');
        $('#accordion-item-icons-'+next).addClass('collapse show');
    }
</script>
<script>
    var j = jQuery.noConflict();
j(document).ready(function(){
  j('#tab2c, #tab3c').hide();
        j('#tab1').click(function(){
        j('#tab1c').show();                       
        j('#tab2c, #tab3c').hide();                   
        });
        
        j('#tab2').click(function(){
        j('#tab2c').show();                       
        j('#tab1c, #tab3c').hide();                       
        });
        
        j('#tab3').click(function(){
        j('#tab3c').show();                       
        j('#tab1c, #tab2c').hide();                       
        });
});
</script>
<!-- tooltip start -->
<script>
    $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
    });
</script>   
