<?php
//////////////////////////////////////////
// Template for customer add result page
//////////////////////////////////////////

// Expected variables:
// $added - list of all customers
// $customerName - last value used in "Add customer" form
$added = $GLOBALS["added"];
$givenName = $GLOBALS["givenName"];
?>

<?php if ($added) { 
header("Location:?page=bookingstepTwo");
}else{?>
<h1>Ups, something went wrong</h1>
<?php } ?>



<a href="?page=bookingstepone">Try again</a>.
