<?php

$page1 = 'insight';

 include('include/header.php'); ?>

<?php include('include/site_header.php'); ?>

<style type="text/css">
  .join_btn button {
    color: #C39A4A;
    font-family: myFirstFont;
    background: black;
    font-size: 18px;
    border: none;
    text-transform: uppercase;
    line-height: 28px;
    padding: 5px 18px;
}
</style>

<div class="page insight">

  <div class="container">

    <div class="row">

      <div class="col-md-12">

        <div class="title mb-3 text-center">Insights</div>

        <div class="text-center mb-3"> Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has 

          

          been the industry's standard dummy text ever since the 1500s, when an unknown printer took </div>

      </div>

    </div>

    <div class="row">



      <?php 

      if(!empty($blog)){

        foreach ($blog as $value) {

       ?>

      <div class="col-md-4"> 

        

        <div class="blog_single">

          <div class="blog_single_thumb">

            <a href=""> <img src="<?php echo base_url('/'); ?>/public/uploads/blog/<?php echo $value['image'] ?>"></a> 

          </div>

          <div class="fw_desc">

            <div class="blog_category"> <?php echo $value['type'] ?> </div>

            <div class="blog_title"> <?php echo $value['heading'];?> </div>

            <div class="blog_short_desc"> <?php echo substr($value['description'], 0,200); ?> 

            </div>

            <div class="join_btn mt-4">

              <?php if($value['report']!=''){?>

              <button type="submit" onClick="enquiry(<?php echo $value['id'];?>)" class="Submit" name="submit" id="submit">Click for View Report</button>

            <?php }

            if($value['url']!=''){?>

              <button type="submit" onClick="enquiry(<?php echo $value['id'];?>)" class="Submit" name="submit" id="submit">Click for View</button>

              <?php } ?>

            </div>

          </div>

        </div>

      </div>

    <?php } }else{ ?> 

      <div class="col-md-12">

        <h2 class="text-center">Not Found</h2>

      </div>

    <?php } ?>

      <!-- <div class="col-md-4"> <a href="">

        <div class="blog_single">

          <div class="blog_single_thumb"> <img src="<?php echo base_url('public/utopiic/'); ?>/assets/images/blog_thumb_2.jpg"> </div>

          <div class="fw_desc">

            <div class="blog_category"> EVENT </div>

            <div class="blog_title"> Virtual Rock & Roll Underground 2021 </div>

            <div class="blog_short_desc"> Join Incisiv and a group of very talented industry veterans for 

              

              the 3rd edition of Rock & Roll Underground to our now well known virtual environment! </div>

          </div>

        </div>

        </a> </div>

      <div class="col-md-4"> <a href="">

        <div class="blog_single">

          <div class="blog_single_thumb"> <img src="<?php echo base_url('public/utopiic/'); ?>/assets/images/blog_thumb_2.jpg"> </div>

          <div class="fw_desc">

            <div class="blog_category"> Q1 | MARKET SNAPSHOT </div>

            <div class="blog_title"> Redefining the Guest Experience through Unified Commerce </div>

            <div class="blog_short_desc"> Operators must offer a consistent ‘unified’ view of their offerings to their 

              

              guests and must have the same view internally to ensure efficient operations. </div>

          </div>

        </div>

        </a> </div>

      <div class="col-md-4"> <a href="">

        <div class="blog_single">

          <div class="blog_single_thumb"> <img src="<?php echo base_url('public/utopiic/'); ?>/assets/images/blog_thumb_2.jpg"> </div>

          <div class="fw_desc">

            <div class="blog_category"> WEBINAR </div>

            <div class="blog_title"> Digital Maturity Wars: QSR vs. Fast Casual </div>

            <div class="blog_short_desc"> In this webinar, Incisiv analysts compare and contrast key digital 

              

              capabilities between the leaders and laggards in the QSR and Fast Casual Segments. </div>

          </div>

        </div>

        </a> </div>

      <div class="col-md-4"> <a href="">

        <div class="blog_single">

          <div class="blog_single_thumb"> <img src="<?php echo base_url('public/utopiic/'); ?>/assets/images/blog_thumb_2.jpg"> </div>

          <div class="fw_desc">

            <div class="blog_category"> EVENT </div>

            <div class="blog_title"> Virtual Rock & Roll Underground 2021 </div>

            <div class="blog_short_desc"> Join Incisiv and a group of very talented industry veterans for 

              

              the 3rd edition of Rock & Roll Underground to our now well known virtual environment! </div>

          </div>

        </div>

        </a> </div>

      <div class="col-md-4"> <a href="">

        <div class="blog_single">

          <div class="blog_single_thumb"> <img src="<?php echo base_url('public/utopiic/'); ?>/assets/images/blog_thumb_2.jpg"> </div>

          <div class="fw_desc">

            <div class="blog_category"> Q1 | MARKET SNAPSHOT </div>

            <div class="blog_title"> Redefining the Guest Experience through Unified Commerce </div>

            <div class="blog_short_desc"> Operators must offer a consistent ‘unified’ view of their offerings to their 

              

              guests and must have the same view internally to ensure efficient operations. </div>

          </div>

        </div>

        </a> </div> -->

    </div>

    <div class="row">

      <div class="col-md-12">

        <div class="pagination">

          <ul>

          </ul>

        </div>

      </div>

    </div>

  </div>

</div>

<?php if($page1!='insight'){?>

<div class="insight_footer">

  <div class="container">

    <div class="row">

      <div class="col-md-12">

        <div class="ih_footer"> Incisiv offers digital transformation insights for consumer industries.

          <div class="join_btn mt-4"> <a href="">Contact Us</a> </div>

        </div>

      </div>

    </div>

  </div>

</div>

<?php } ?>

<div class="modal fade" id="myModal" role="dialog">

    <div class="modal-dialog">

        

        <!-- Modal content-->

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

                

            </div>

            <div class="modal-body">

                <form class="single_radio line_break" action="submitenquiry.php" method="post" name="frm" id="frm">

                    <input type="hidden" name="id" value="" id="divid">

                    <div class="single_q">

                        <div class="field">

                            <input type="text" name="name" placeholder="Enter Your Name" required="required">

                        </div>

                    </div>

                    <div class="single_q">

                        <div class="field">

                            <input type="text" name="email" placeholder="Enter Your Email" required="required">

                        </div>

                    </div>

                    <div class="single_q">

                        <div class="field">

                            <input type="text" name="mobile" placeholder="Enter Your Mobile" required="required">

                        </div>

                    </div>

                    <div class="single_q">

                        <div class="form_field join_btn btn_link">

                            <input type="submit" value="Submit" id="submit">

                        </div>

                    </div>

                </form>

            </div>

            <!-- <div class="modal-footer">

                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

            </div> -->

        </div>

        

    </div>

</div>

<script type="text/javascript">

function enquiry(id){

$('#divid').val(id);

// $('#myModal').modal('toggle');

$('#myModal').modal('show');

// $('#myModal').modal('hide');

}

</script>

<script>



// selecting required element



const element = document.querySelector(".pagination ul");



let totalPages = 20;



let page = 1;







//calling function with passing parameters and adding inside element which is ul tag



element.innerHTML = createPagination(totalPages, page);



function createPagination(totalPages, page){



  let liTag = '';



  let active;



  let beforePage = page - 1;



  let afterPage = page + 1;



  if(page > 1){ //show the next button if the page value is greater than 1



    liTag += `<li class="btn prev" onclick="createPagination(totalPages, ${page - 1})"><span><i class="fas fa-angle-left"></i> Prev</span></li>`;



  }







  if(page > 2){ //if page value is less than 2 then add 1 after the previous button



    liTag += `<li class="first numb" onclick="createPagination(totalPages, 1)"><span>1</span></li>`;



    if(page > 3){ //if page value is greater than 3 then add this (...) after the first li or page



      liTag += `<li class="dots"><span>...</span></li>`;



    }



  }







  // how many pages or li show before the current li



  if (page == totalPages) {



    beforePage = beforePage - 2;



  } else if (page == totalPages - 1) {



    beforePage = beforePage - 1;



  }



  // how many pages or li show after the current li



  if (page == 1) {



    afterPage = afterPage + 2;



  } else if (page == 2) {



    afterPage  = afterPage + 1;



  }







  for (var plength = beforePage; plength <= afterPage; plength++) {



    if (plength > totalPages) { //if plength is greater than totalPage length then continue



      continue;



    }



    if (plength == 0) { //if plength is 0 than add +1 in plength value



      plength = plength + 1;



    }



    if(page == plength){ //if page is equal to plength than assign active string in the active variable



      active = "active";



    }else{ //else leave empty to the active variable



      active = "";



    }



    liTag += `<li class="numb ${active}" onclick="createPagination(totalPages, ${plength})"><span>${plength}</span></li>`;



  }







  if(page < totalPages - 1){ //if page value is less than totalPage value by -1 then show the last li or page



    if(page < totalPages - 2){ //if page value is less than totalPage value by -2 then add this (...) before the last li or page



      liTag += `<li class="dots"><span>...</span></li>`;



    }



    liTag += `<li class="last numb" onclick="createPagination(totalPages, ${totalPages})"><span>${totalPages}</span></li>`;



  }







  if (page < totalPages) { //show the next button if the page value is less than totalPage(20)



    liTag += `<li class="btn next" onclick="createPagination(totalPages, ${page + 1})"><span>Next <i class="fas fa-angle-right"></i></span></li>`;



  }



  element.innerHTML = liTag; //add li tag inside ul tag



  return liTag; //reurn the li tag



}    



</script>

<?php include('include/site_footer.php'); ?>

