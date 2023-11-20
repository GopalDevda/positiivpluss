<?php include('include/header.php'); ?>
<?php include('include/site_header.php'); ?>
<div class="page terms">
<div class="section_one">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title mb-3 text-center">Payment</div>
                <div class="didot text-center mb-4">
                </div>
            </div>
        </div>
    </div>
</div>

</div>
        <script src="https://js.stripe.com/v3/"></script>
          <script type="text/javascript">
            // Create an instance of the Stripe object with your publishable API key
            var stripe = Stripe('<?php echo stripe_public_key;?>');
           // var checkoutButton = document.getElementById("checkout-button");
        //    checkoutButton.addEventListener("click", function () {
              fetch("<?php echo base_url();?>/supplier/stripe_payment/<?php echo $supplier[0]['id'];?>", {
                method: "POST",
              })
                .then(function (response) {
                  return response.json();
                })
                .then(function (session) {
                  return stripe.redirectToCheckout({session:session.id});
                })
                .then(function (result) {
                  // If redirectToCheckout fails due to a browser or network
                  // error, you should display the localized error message to your
                  // customer using error.message.
                  if (result.error) {
                    alert(result.error.message);
                  }
                })
                .catch(function (error) {
                   // alert(error);
                  console.error("Error:", error);
                });
          //  });
          </script>

