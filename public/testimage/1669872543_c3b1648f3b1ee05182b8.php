<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="style.css">
 
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"></script>
	<title></title>

<style type="text/css">


.filelabel {
    width: 120px;
    border: 2px dashed grey;
    border-radius: 5px;
    display: block;
    padding: 5px;
    transition: border 300ms ease;
    cursor: pointer;
    text-align: center;
    margin: 0;
}
.filelabel i {
    display: block;
    font-size: 30px;
    padding-bottom: 5px;
}
.filelabel i,
.filelabel .title {
  color: grey;
  transition: 200ms color;
}
.filelabel:hover {
  border: 2px solid #1665c4;
}
.filelabel:hover i,
.filelabel:hover .title {
  color: #1665c4;
}
#FileInput{
    display:none;
}

.r1{

padding: 5%;
}
#panel {
  
  display: none;
}
</style>

</head>
<body>

	<div class="container">
      
      <div class="row r1 bg-light">
        
        <div class="col-md-2">
            
        <label class="filelabel">
    <i class="fa fa-paperclip">
    </i>
    <span class="title">
        Add File
    </span>
    <input class="FileUpload1" id="FileInput" name="booking_attachment" type="file"/>
</label>

        </div>

        <div class="col-md-10">
                
             <h4 id="title" onclick="onButtonClick()">Title</h4> 
             <div style="display:none;" id="text" class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-sm">Title</span>
  </div>
  <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
</div>  
            <p id="desc" onclick="onButtonClick2()">Description</p>
          
           <div style="display:none;" id="description" class="input-group input-group-sm mb-3">
  <div class="input-group-prepend">
    <span class="input-group-text" id="inputGroup-sizing-sm">Description</span>
  </div>
  <input type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
</div>  

        </div>

      </div>

<hr>
<div class="row">

 <div class="col-md-12">
  
  <div class="card" style="width: 100%;">
  <div class="card-header">
    Title
  </div>
  </div><br>

  <div class="card" style="width: 100%;">
  <div class="card-header">
    Question
  </div>
  </div>
<div class="container">
<div class="form-group">
    <div class="form-group">
    <div class="input-group mb-3" style="float:left; width: 60%;">
        <div class="input-group-prepend">
           <span class="input-group-text" id="basic-addon1">::</span>
        </div>
          <input id="flip" type="text" class="form-control" placeholder="Prepared By" aria-label="Username" aria-describedby="basic-addon1">
    </div>
      
    
   
    <div class="bg-light" style="height: 37px; float:left; width: 30%;">
    	<p data-toggle="modal" data-target="#exampleModal" style="text-align: center;">Media <i class="fa fa-angle-down"></i></p>
    </div>
    
    <div style="float:left; width: 10%;">
        <button style="float: right;" class="btn btn-primary" onclick="addMore()" type="button"><i class="fa fa-plus"></i></button>
     </div>
</div>
<div class="form-group">
    <div style="float:left; width: 60%;"  class="bg-light" id="panel">
           
        <div style="padding: 15px;" class="form-group">
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

 
</div>
</div> 

<div id="r" class="container">

</div>


 </div>

</div>

 

	</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div style="margin-top: 17pc;" class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <!--<div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>-->
    </div>
  </div>
</div>
<script>



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
  $("#flip").click(function(){
    $("#panel").slideToggle("slow");
  });
});




function addMore(){
    var $html = `
      <div class="form-group">
         <div class="form-group">
    <div class="input-group mb-3" style="float:left; width: 60%;">
        <div class="input-group-prepend">
           <span class="input-group-text" id="basic-addon1">::</span>
        </div>
          <input id="flip" type="text" class="form-control" placeholder="Prepared By" aria-label="Username" aria-describedby="basic-addon1">
    </div>
      
    
   
    <div class="bg-light" style="height: 37px; float:left; width: 30%;">
    	<p style="text-align: center;">Media <i class="fa fa-angle-down"></i></p>
    </div>
    
     <div style="float:left; width: 10%;">
        <button style="float: right;" class="btn btn-danger" onclick="$(this).parent().parent().remove()" type="button"><i class="fa fa-times"></i></button>
     </div>
</div>
    <div style="float:left; width: 70%;"  class="bg-light" id="panel">
           
        <div style="padding: 15px;" class="form-group">
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
    `;
    $('#r').append($html);
}

</script>

 

 
</body>
</html>