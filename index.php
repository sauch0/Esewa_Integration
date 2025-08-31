<?php
$amount = 100;
$tax_amount = 0;
$service_charge = 0;
$delivery_charge = 0;
$total_amount = $amount + $tax_amount + $service_charge + $delivery_charge;
$transaction_uuid = uniqid(); // A unique identifier for each transaction
$product_code = "EPAYTEST";
$success_url = "http://localhost/esewa-test/success.php";
$failure_url = "http://localhost/esewa-test/failure.php";
// Prepare string for signature
$signed_field_names = "total_amount,transaction_uuid,product_code";
$signature_data = "total_amount={$total_amount},transaction_uuid={$transaction_uuid},product_code={$product_code}";
$secret_key = "8gBm/:&EnhH.1/q";
$signature = base64_encode(hash_hmac('sha256', $signature_data, $secret_key, true));
?>

<!DOCTYPE html>
<html>
<head><title>eSewa Sandbox Payment</title></head>
<body>
  <form action="https://rc-epay.esewa.com.np/api/epay/main/v2/form" method="POST">
      <input type="hidden" name="amount" value="<?php echo $amount; ?>">
      <input type="hidden" name="tax_amount" value="<?php echo $tax_amount; ?>">
      <input type="hidden" name="product_service_charge" value="<?php echo $service_charge; ?>">
      <input type="hidden" name="product_delivery_charge" value="<?php echo $delivery_charge; ?>">
      <input type="hidden" name="total_amount" value="<?php echo $total_amount; ?>">
      <input type="hidden" name="transaction_uuid" value="<?php echo $transaction_uuid; ?>">
      <input type="hidden" name="product_code" value="<?php echo $product_code; ?>">
      <input type="hidden" name="success_url" value="<?php echo $success_url; ?>">
      <input type="hidden" name="failure_url" value="<?php echo $failure_url; ?>">
      <input type="hidden" name="signed_field_names" value="<?php echo $signed_field_names; ?>">
      <input type="hidden" name="signature" value="<?php echo $signature; ?>">
      <button type="submit">Pay with eSewa (Sandbox)</button>
  </form>
</body>
</html>
