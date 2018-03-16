<?php

/*
 * PHP Bell Number calculator
 * By NimaH79
 * NimaH79.ir
*/

function factorial($number) {
  $factorial = 1;
  for($i = 2; $i <= $number; $i++) {
  	$factorial *= $i;
  }
  return $factorial;
}

function selectKFromN($k, $n) {
  $soorat = factorial($n);
  $makhraj = factorial($k) * factorial($n - $k);
  return $soorat/(float)$makhraj;
}

function countOfPartitionsKFromN($k, $n) {
  $a = 1/factorial($k);
  $bell = pow($k, $n);
  $alamat = '-';
  $i = 1;
  while($k > $i) {
  	$tobell = selectKFromN($i, $k) * pow($k - $i, $n);
  	if($alamat == '-') {
  	  $bell -= $tobell;
  	  $alamat = '+';
  	}
  	elseif($alamat == '+') {
  	  $bell += $tobell;
  	  $alamat = '-';
  	}
  	$i++;
  }
  return $a * $bell;
}

function countOfAllPartitionsOfSet($n) {
  $count = 0;
  for($i = 1; $i <= $n; $i++) {
    $count += countOfPartitionsKFromN($i, $n);
  }
  return $count;
}

echo countOfPartitionsKFromN(2, 7);

?>