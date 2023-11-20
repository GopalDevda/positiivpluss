<?= $this->extend('brand/layout/master-page.php') ?>
<?= $this->section('style') ?>

<style type="text/css">
.filelabel {
    width: 100%;
    height: 100%;
    border: 2px dashed grey;
    border-radius: 5px;
    display: block;
    padding: 5px;
    transition: border 300ms ease;
    cursor: pointer;
    text-align: center;
    margin: 0;
    padding: 15px;
}
.filelabel i {
    display: block;
    font-size: 30px;
    padding-bottom: 5px;
}
.filelabel i, .filelabel .title {
    color: grey;
    transition: 200ms color;
    font-size: 12px;
}
.filelabel:hover {
    background: rgb(219, 224, 235);
    border: dashed;
    border-width: 1px;
    border-color: rgb(126 126 126);
}
.filelabel:hover i,
.filelabel:hover .title {
    color: #222;
}
#FileInput{
    display:none;
}
.r1{
    padding: 5%;
}
#panel0 {
    display: none;
}
h4#title {
    font-size: 30px;
    color: black;
    font-weight: bolder;
}
p#desc {
    font-size: 20px;
    font-weight: 500;
}
span#inputGroup-sizing-sm {
    font-size: 20px;
}
.card-footer, .card-header {
    padding: 10px !important;
    background-color: transparent;
    font-size: 17px !important;
    font-weight: 500 !important;
}
span#basic-addon1 {
    font-size: 30px;
    padding: 0px 10px 0px 9px;
    font-weight: bolder;
}

img#blah {
width: 100%;
}
.list-group-item-action:active {
    color: #FFF !important;
    background-color: #d5d5d5 !important;
}
</style>
<?= $this->endSection();?>
<?= $this->section('content') ?>

      <div class="app-content content">
        <!-- profile info section -->
  <section id="profile-info">
    <div class="row">
      <!-- left profile info section -->
      <div class="col-lg-2 col-12 order-2 order-lg-1">
        <!-- add file -->
        <div class="card">
            <div class="card-body">
                <label id="fil" class="filelabel">
                    <img style="display:none;" id="blah" src="#" alt="your image" />
                    <i class="fa fa-paperclip">
                    </i>
                    <span class="title">
                        Add File
                    </span>
                    <input onchange="readURL(this);" class="FileUpload1" id="FileInput" name="booking_attachment" type="file"/>
                </label>
            </div>
        </div>
        <!--/ end add file -->
      </div>
      <!--/ left profile info section -->

      <!-- center profile info section -->
      <div class="col-lg-10 col-12 order-1 order-lg-2">
        <!-- post 1 -->
        <div class="card">
          <div class="card-body">
            <div class="d-flex justify-content-start align-items-center mb-1">
              
              <div class="profile-user-info w-100">
                <h4 id="title" contentEditable="true">Title</h4>
                <p id="desc" contentEditable="true">Description</p>
              </div>
            </div>

            
          </div>
        </div>
        <!--/ post 1 -->
      </div>
      <!--/ center profile info section -->
    </div>
  </section>
<div class="content-header row">
   <div class="content-header-left col-md-9 col-12 mb-2">
      <div class="row breadcrumbs-top">
         <div class="col-12">
            <h2 class="content-header-title float-start">Title Pages</h2>
         </div>
         <p class="mb-0">The Title Page is the first page of your inspection report. You can customize the Title Page below.</p>
      </div>
   </div>
</div>
  <!--/ profile info section -->

<!-- question section  -->
<section>
    <div class="row match-height">
    <!-- Company Table Card -->
    <div class="col-lg-12 col-12">
      <div class="card card-company-table border-0 mb-1">
        <div class="card-body p-0">
          <div class="">
            <table class="table">
              <thead class="table-dark">
                <tr>
                  <th style="border-right: 1px solid;padding-right: 184px">Question</th>
                  <th>Type of response</th>
                </tr>
              </thead>
            </table>
            <div class="form-group">
                <div class="input-group" style="float:left; width: 60%;">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">::</span>
                    </div>
                    <input id="flip0" type="text" class="form-control" placeholder="Type Question" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="bg-light" style="height: 45px; display: grid;">
                <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                Add Response</button>
                </div>
                <div style="float:left; width: 10%;">
                    
                </div>
            </div>
            <div class="form-group">
                <div style="width: 60%;"  class="bg-light" id="panel0">
                    <div style="padding: 8px 10px;font-size: 14px;" class="form-group">
                        <label class = "checkbox-inline">
                            <input type = "checkbox" value = ""> Required
                        </label> |
                        <label class = "checkbox-inline">
                            <input type = "checkbox" value = ""> Multiple Selection
                        </label> |
                        <label class = "checkbox-inline">
                            <input type = "checkbox" value = ""> Flagged Responses
                        </label>
                    </div>
                </div>
            </div>
            <div id="r" class="">
            </div>
          </div>

        </div>

      </div>

    </div>

    <!--/ Company Table Card -->
  </div>
  <button class="btn btn-primary btn-sm" onclick="addMore()" type="button">Add More</button>
  <button class="btn btn-primary btn-sm" onclick="addMoreSection()" type="button">Add Section</button>
</section>
<!-- end question section -->
<!-- modal popup -->
<div
    class="modal fade"
    id="exampleModalCenter"
    tabindex="-1"
    aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true"
    >
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Vertically Centered</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-0">
                <div class="row">
                    <div class="col-md-6 pe-0">
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action">
                                <span class="badge badge-light-secondary">N/A</span>
                                <span class="badge badge-light-success">Yes</span>
                                <span class="badge badge-light-danger">No</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <span class="badge badge-light-secondary">N/A</span>
                                <span class="badge badge-light-success">Good</span>
                                <span class="badge badge-light-warning">Fair</span>
                                <span class="badge badge-light-danger">Poor</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <span class="badge badge-light-success">Safe</span>
                                <span class="badge badge-light-danger">At Risk</span>
                                <span class="badge badge-light-secondary">N/A</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <span class="badge badge-light-secondary">N/A</span>
                                <span class="badge badge-light-success">Compliant</span>
                                <span class="badge badge-light-danger">Non-Compliant</span>
                            </a>
                            <a href="#" class="list-group-item list-group-item-action">
                                <span class="badge badge-light-secondary">N/A</span>
                                <span class="badge badge-light-success">Yes</span>
                                <span class="badge badge-light-danger">No</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6 ps-0">
                        <div class="list-group">
                            <a href="#" class="list-group-item list-group-item-action"><span class="badge badge-light-success"><i data-feather='type'></i></span> Text answer </a>

                            <a href="#" class="list-group-item list-group-item-action"><span class="badge badge-light-warning"><i data-feather='check-square'></i></span> Check box</a>
                            <a href="#" class="list-group-item list-group-item-action"><span class="badge badge-light-info"><i data-feather='calendar'></i></span> Date & Time</a>
                            <a href="#" class="list-group-item list-group-item-action"><span class="badge badge-light-secandry"><i data-feather='image'></i></span> Media</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- end model popup -->
      </div>
      <?= $this->endSection(); ?>
      <?= $this->section('script') ?>
      <script>
         function readURL(input) {
             if (input.files && input.files[0]) {
             var reader = new FileReader();
             reader.onload = function (e) {
                 $("#blah").css("display", "block")
                 $(".fa-file-image-o").css("display", "none")
                 $('#blah')
                 .attr('src', e.target.result);                
             };
             reader.readAsDataURL(input.files[0]);
             }
         }
         $("#FileInput").on('change',function (e) {
             var labelVal = $(".title").text();
             var oldfileName = $(this).val();
             fileName = e.target.value.split( '\\' ).pop();
             if (oldfileName == fileName) {return false;}
             var extension = fileName.split('.').pop();
             if ($.inArray(extension,['jpg','jpeg','png']) >= 0) {
                 $(".filelabel i").removeClass().addClass('fa fa-file-image-o');
                 $(".filelabel i, .filelabel .title").css({'color':'#208440'});
                 $(".filelabel").css({'border':' 2px solid #208440'});
             }
             else if(extension == 'pdf'){
                 $(".filelabel i").removeClass().addClass('fa fa-file-pdf-o');
                 $(".filelabel i, .filelabel .title").css({'color':'red'});
                 $(".filelabel").css({'border':' 2px solid red'});
             }
             else if(extension == 'doc' || extension == 'docx'){
                 $(".filelabel i").removeClass().addClass('fa fa-file-word-o');
                 $(".filelabel i, .filelabel .title").css({'color':'#2388df'});
                 $(".filelabel").css({'border':' 2px solid #2388df'});
             }
             else{
                 $(".filelabel i").removeClass().addClass('fa fa-file-o');
                 $(".filelabel i, .filelabel .title").css({'color':'black'});
                 $(".filelabel").css({'border':' 2px solid black'});
             }
             if(fileName ){
                 if (fileName.length > 10){
                    $(".filelabel .title").text(fileName.slice(0,4)+'...'+extension);
                 }
                 else{
                    $(".filelabel .title").text(fileName);
                 }
             }
             else{
                $(".filelabel .title").text(labelVal);
             }
         });
         function onButtonClick(){
             document.getElementById('text').style="show";
             document.getElementById('title').style.display="none";
         }
         function onButtonClick2(){
             document.getElementById('description').style="show";
             document.getElementById('desc').style.display="none";
         }
         function modalShow(){
            document.getElementById('modal').style.display="block";
         }
         //$(document).click(function() {
         //  $("#title").show();
         //});
         $(document).ready(function(){

             $("#flip0").click(function(){
                $("#panel0").slideToggle("slow");
             });
         });
         var i=0
         function addMore(){
         i++;
         $('#r').append('<div class="form-group" style="position: relative;">\
                 <div class="input-group" style="float:left; width: 60%;">\
                     <div class="input-group-prepend">\
                         <span class="input-group-text" id="basic-addon1">::</span>\
                     </div>\
                     <input id="flip'+i+'" type="text" class="form-control" placeholder="Type Question" aria-label="Username" aria-describedby="basic-addon1">\
                 </div>\
                 \
                 \
                 \
                 <div class="bg-light" style="height: 45px; display: grid;">\
                <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">\
                Add Response</button>\
                </div>\
                 <div class="" style="position: absolute;right: 0;">\
                     <button style="float: right;margin-top: 4px;margin-right: 4px;" class="btn btn-sm btn-dark" onclick="$(this).parent().parent().remove()" type="button"><i class="fa fa-trash"></i></button>\
                 </div>\
             </div>\
             <div style="width: 60%;"  class="bg-light" id="panel'+i+'">\
                 \
                 <div style="padding: 8px 10px;font-size: 14px;" class="form-group">\
                         <label class = "checkbox-inline">\
                         <input type = "checkbox" value = ""> Required\
                     </label> |\
                     <label class = "checkbox-inline">\
                         <input type = "checkbox" value = ""> Multiple Selection\
                     </label> |\
                     <label class = "checkbox-inline">\
                         <input type = "checkbox" value = ""> Flagged Responses\
                     </label>\
                         \
                 </div>\
                 \
             </div>');
         }
      </script>
      <?= $this->endSection(); ?>