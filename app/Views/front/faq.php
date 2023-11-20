<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<?php include('include/header.php'); ?>
<?php include('include/site_header.php'); ?>
<div class="page faq">
  <div class="faq_accordion">
    <div class="container">
      <div class="row">
        <div class="container">
          <div id="accordion" class="accordion">
            <div class="title mb-3 text-center"><?php echo $cms[0]['title']; ?></div>
            <div class="didot text-center mb-5">
              <?php echo $cms[0]['description']; ?>
            </div>
            <div class="faq_single_category">
              <div class="faq_cat_title">Category</div>
              <div class="card mb-0">
            <?php if(!empty($list )) { 
                foreach ($list as $d) { ?>
                <div class="card-header collapsed" data-toggle="collapse" href="#collapseOne" id="collapseOnes" >
                  <a class="card-title">
                  <?php echo $d['title']; ?>
                  </a>
                </div>
                <div id="collapseOne" class="card-body collapse show" data-id="1" >
                  <p>
                    <?php echo $d['description']; ?>
                  </p>
                </div>
                 <?php } }?>
                <!-- <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                  <a class="card-title">
                  What are Positive Marks ?
                  </a>
                </div>
                <div id="collapseTwo" class="card-body collapse" data-parent="#accordion" >
                  <p>
                    Positive Marks are Third-Party certified Eco Labels which are used by Businesses on achieving pre-defined benchmarks by using Positive Platform. Currently there are three different types of Marks available for businesses. 1. Positive Brand 2. Positive Product 3. Positive Workplace 4. Positive Event
                  </p>
                </div> -->
                <!-- <div class="card-header collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                  <a class="card-title">
                  How long does it take to get the Marks ?
                  </a>
                </div>
                <div id="collapseThree" class="card-body collapse" data-parent="#accordion" >
                  <p>
                    The length of the certification process varies based on a company's size and complexity. Completing the Assessment requires a minimum of several hours. The verification process to finalize a company's score typically takes from several days to a few weeks. Large Companies with many related entities should expect a longer process.
                  </p>
                </div> -->
              </div>
           
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
  <script type="text/javascript">

  $( "#collapseOnes" ).click(function() {
  $( "#collapseOne" ).toggle();
  });
  </script>

<?php include('include/site_footer.php'); ?>