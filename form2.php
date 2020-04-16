<?php
echo htmlspecialchars($_SERVER["PHP_SELF"]);
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
if($_SERVER["REQUEST_METHOD"]=="POST"){
	if($_POST["guide"]=="edu" && $_POST["qual"]=="ten"){
		echo "<script>window.open('edu/10th.html', '_self')</script>";		
	}
	if($_POST["guide"]=="edu" && $_POST["qual"]=="tel"){
		echo "<script>window.open('edu/12th.html', '_self')</script>";		
	}
	if($_POST["guide"]=="edu" && $_POST["qual"]=="bach"){
		echo "<script>window.open('edu/bach.html', '_self')</script>";			
	}
	if($_POST["guide"]=="edu" && $_POST["qual"]=="mast"){
		echo "<script>window.open('edu/master.html', '_self')</script>";		
	}
	if($_POST["guide"]=="car" && $_POST["qual"]=="ten"){
		echo "<script>window.open('car/10th.html', '_self')</script>";		
	}
	if($_POST["guide"]=="car" && $_POST["qual"]=="tel"){
		echo "<script>window.open('car/12th.html', '_self')</script>";		
	}
	if($_POST["guide"]=="car" && $_POST["qual"]=="bach"){
		echo "<script>window.open('car/bach.html', '_self')</script>";		
	}
	if($_POST["guide"]=="car" && $_POST["qual"]=="mast"){
		echo "<script>window.open('car/master.html', '_self')</script>";		
	}
}
?>