<?php
switch ($y){
	case "car":
		switch ($x){
			case "ten":
				header("location:car/10th.html");
				break;
			case "tel":
				header("location:car/10th.html");
				break;
			case "bach":
				header("location:car/bach.html");
				break;
			case "mast":
				header("location:car/master.html");
				break;
		}
	case "edu":
		switch ($x){
			case "ten":
				header("location:car/10th.html");
				break;
			case "tel":
				header("location:car/10th.html");
				break;
			case "bach":
				header("location:car/bach.html");
				break;
			case "mast":
				header("location:car/master.html");
				break;
		}
}

if($y=="edu"){
	if($x=="ten"){
		header("edu/10th.html");
	}
	elseif($x=="bach"){
		header("edu/bach.html");
	}
	elseif($x=="mast"){
		header("edu/master.html");
	}
	else{
		header("edu/12th.html");
	}
}
else {
	if($x=="ten"){
		header("car/10th.html");
	}
	elseif($x=="bach"){
		header("car/bach.html");
	}
	elseif($x=="mast"){
		header("car/master.html");
	}
	else{
		header("car/12th.html");
	}
}
echo "<script>window.close();</script>";
?>