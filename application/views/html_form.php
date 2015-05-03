<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Demo libary html form</title>

		<!-- Bootstrap CSS -->
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		<style>
			lable{
				font-weight:lighter;
			}
			lable.lable_form{
				width:100px;
				float:left;
				margin-right:10px;
				text-align:right;
				font-weight:bold;
			}
		</style>
	}
	

	</head>
	<body>
		<div class="container">
			<h2>Libary html form</h2>
			<form>
			<?php 
			foreach ($form as $key => $value) {
				echo "<p> <lable class='lable_form'>".$value["lable"]."</lable> " . $value["html"]." <div class='clearfix'></div></p>";
			}
			 ?>
			<p class="text-center"><button type="reset" class="btn btn-default"> Reset </button> <button type="submit" class="btn btn-primary"> Submit </button></p>
			<form>
		</div>

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	</body>
</html>
<?php 
 ?>
