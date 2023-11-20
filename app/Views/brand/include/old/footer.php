<!-- Summernote -->

<script src="<?php echo base_url('public/admin/assets/'); ?>/plugins/summernote/summernote-bs4.min.js"></script>

<!-- Bar chart end -->
<script>



var countryElements = document.getElementById('countries').childNodes;
    var countryCount = countryElements.length;
    for (var i = 0; i < countryCount; i++) {
      countryElements[i].onclick = function() {
        alert('You clicked on ' + this.getAttribute('data-name'));
      }
    }
</script>
<!--World map start-->
<!--World map end-->

<!-- Show hide start -->
<script>
    $(document).ready(function(){
        $(".hide").click(function(){
            $(".custom_action").hide();
        });
        $(".show_btn").click(function(){
            $(".custom_action").css('display', 'flex');
        });
    });
</script>
<!-- Show hide end -->

<!-- datepicker start -->
<script>
/*    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap4'
    });
    
    $('#datepicker2').datepicker({
        uiLibrary: 'bootstrap4'
    });
*/
</script>

<!-- how datepicker end -->

<!-- password eye start -->
<script>
$(function(){
  
  $('#eye').click(function(){
       
        if($(this).hasClass('fa-eye-slash')){
           
          $(this).removeClass('fa-eye-slash');
          
          $(this).addClass('fa-eye');
          
          $('#password').attr('type','text');
            
        }else{
         
          $(this).removeClass('fa-eye');
          
          $(this).addClass('fa-eye-slash');  
          
          $('#password').attr('type','password');
        }
    });
});
</script>
<!-- password eye end -->
<!-- account avtar image start -->
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imageUpload").change(function() {
        readURL(this);
    });    
</script>
<!-- account avtar image end -->
    
<!--     <script src="<?php echo base_url('public/brand/assets/'); ?>/js/plugins/jquery-3.3.1.min.js"></script> -->
    <script src="<?php echo base_url('public/brand/assets/'); ?>/js/plugins/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url('public/brand/assets/'); ?>/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="<?php echo base_url('public/brand/assets/'); ?>/js/scripts/script.min.js"></script>
    <script src="<?php echo base_url('public/brand/assets/'); ?>/js/scripts/sidebar.large.script.min.js"></script>
    <script src="<?php echo base_url('public/brand/assets/'); ?>/js/plugins/echarts.min.js"></script>
    <script src="<?php echo base_url('public/brand/assets/'); ?>/js/scripts/echarts.script.min.js"></script>
    
    </body>
</html>