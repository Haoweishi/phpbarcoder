<?php
class barcoder{
function create39num($input){
$string = "*$input*";
$bin = 0;
$seq = 0;
$leng = strlen($string)*13;
$image = ImageCreate($leng, 20);
$white = ImageColorAllocate($image, 255, 255, 255);
$black = ImageColorAllocate($image, 0, 0, 0);
ImageFill($image, 0, 0, $white);
for($i=0;$i<=strlen($string)-1; $i++){
	$letter = substr($string,$i,1);
	if($letter == '0'){
		$bin = 101001101101;
	}else if($letter == '1'){
		$bin = 110100101011;
	}else if($letter == '2'){
		$bin = 101100101011;
	}else if($letter == '3'){
		$bin = 110110010101;
	}else if($letter == '4'){
		$bin = 101001101011;
	}else if($letter == '5'){
		$bin = 110100110101;
	}else if($letter == '6'){
		$bin = 101100110101;
	}else if($letter == '7'){
		$bin = 101001011011;
	}else if($letter == '8'){
		$bin = 110100101101;
	}else if($letter == '9'){
		$bin = 101100101101;
	}else if($letter == '*'){
		$bin = 100101101101;
	}
	for($j=0;$j<=strlen($bin)-1; $j++){
	$char = substr($bin,$j,1);
	if($char== 1){
		ImageLine($image, $j + $seq+1,0,$j +$seq+1,20,$black);
	}else{
		ImageLine($image, $j +$seq+1,0,$j + $seq+1,20,$white);
	}
}
	$seq = $seq + 13;
}
header("Content-Type: image/JPEG");
ImageJpeg($image);
ImageDestroy($image);
}
}
?>