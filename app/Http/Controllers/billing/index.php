<?php require_once'config.php'; ?>

<form action="charge.php" method="post">
  <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
          data-key="<?php echo $stripe['publishable_key']; ?>"
          data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
          data-name="Site Name"
          data-description="Billing"
          data-amount="5000"
          data-locale="auto">
  </script>
</form>