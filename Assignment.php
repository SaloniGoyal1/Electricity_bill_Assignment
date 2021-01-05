<!DOCTYPE html>
<?php
$final_bill = $bill = '';
if(isset($_POST['submiting_units'])){
  $unit = $_POST['units_electricity'];
  if(!empty($unit)){
    $bill = electricity_bill($unit);
    $final_bill = $bill;
  }
}

function electricity_bill($number_of_units){
  $first = 3.5;
  $second = 4.0;
  $third = 5.2;
  $fourth = 6.5;
  
  if($number_of_units<=50){
    $totalbill = $number_of_units * $first;
  }
  else if($number_of_units>50 && $number_of_units<=100){
    $a = 50 * $first;
    $b = $number_of_units - 50;
    $totalbill = $a + ($b * $second);
  }
  else if($number_of_units>100 && $number_of_units<=200){
    $a = (50 * $first) + (100 * $second);
    $b = $number_of_units - 150;
    $totalbill = $a + ($b * $third);
  }
  else{
    $a = (50 * $first) + (100 * $second) + (100 * $third);
    $b = $number_of_units - 250;
    $totalbill = $a + ($b * $fourth);
  }
  return number_format((float)$totalbill);
}
?>
<body>
<div id="page-wrap">
<form action="" method="post" id="form">
<input type="number" name="units_electricity" id="units_electricity"/>
<input type="submit" name="submiting_units" id="submiting_units" value="Submit" />
</form>
<div>
<?php echo '<br>' . $final_bill; ?>
</div>
</div>
</body>
</html>