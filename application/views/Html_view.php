<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Library html form - develope by Santo</title>

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
				width:212px;
				float:left;
				margin-right:10px;
				text-align:right;
				font-weight:bold;
			}
			.colorgraph {
			  height: 7px;
			  border-top: 0;
			  background: #c4e17f;
			  border-radius: 5px;
			  background-image: -webkit-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
			  background-image: -moz-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
			  background-image: -o-linear-gradient(left, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
			  background-image: linear-gradient(to right, #c4e17f, #c4e17f 12.5%, #f7fdca 12.5%, #f7fdca 25%, #fecf71 25%, #fecf71 37.5%, #f0776c 37.5%, #f0776c 50%, #db9dbe 50%, #db9dbe 62.5%, #c49cde 62.5%, #c49cde 75%, #669ae1 75%, #669ae1 87.5%, #62c2e4 87.5%, #62c2e4);
			}
			.description_library{
				display:none;
			}
		</style>
	</head>
	<body>
	<div id="border_description">
		<div class="description_library">
		<pre>
	/**
	*	This is library quick form write for Codeigniter framework
	*	Library writer for MVC Model
	*	It support tag: input_text, input_radio, input_checkbox, textarea, select
	*	Function in button submit have Confirm||Back||Done
	*		-Confirm: Customer can re-view input that they wrote.
	*		-Back: Back from page confirm to page index and refill input by old data base.
	*		-Done: This page to finish from, in this page customer can do everything with data, insert, update
	*	Can catch validate require
	*	Can develope many rule.
	*		-Right now have 2 rule: is_numberic, is_email...
	*		-if I have time I can build many useful rule
	*
	*	__If continue develop this library, I'll finish support input_file, catch validate more careful.
	*	@version [HtmlTag_1.0]
	*	@author Santo <santo@cybridge.jp>
	*	Thank you for review !
	*/
		</pre>
		</div>
		<button type="button">Description Library</button>
	</div>
		<div class="container">
			<h2>Library html form - develope by Santo</h2>
			<?php
			if(($status)){
				echo '
				<div class="alert alert-info">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Page!</strong> '.$status.'
				</div>
				';
			}
			?><hr class="colorgraph"/><?php
			if(isset($error_message)){
				foreach ($error_message as $key => $value) {
					echo '
					<div class="alert alert-danger">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<strong>'.$value["field"].'!</strong> '.$value["message"].'
					</div>
					';
				}

			}
			?>
			<?php
		//----------------------------------------------------------------------------------
		// This block just use for tester
			if($status!="confirm"){
			?>
			<form action="" method="get">
<pre>
<h5>This gray box just use for tester !
Tester can choose mode [add item] or [edit item]</h5>
Form add new item <input type="radio" <?php echo ($this->input->get('case_form')=="addnew"?"checked":"") ?> name="case_form" value="addnew"> | Form edit item <input type="radio" <?php echo ($this->input->get('case_form')=="edit"?"checked":"") ?> name="case_form" value="edit"></pre>
			</form>
			<?php
		//
		//----------------------------------------------------------------------------------
		}

			?>


			<form method="post">
			<?php
			foreach ($form as $key => $value) {
				echo '
				<div class="form-group">
					<label for="">'.$value["lable"].'</label>
					<p>'. $value["html"].'</p>
				</div>
				';
			}
			?>
			<p class="text-center">
				<?php if ($status == "confirm"){
						?>
						<p>
							<span class="label label-info">You can back submit to re-edit input</span>
							<span class="label label-warning">Button submit to next step</span>
						</p>
						<button type="submit" name="submit" value="back"  class="btn btn-default"> Back </button>
						<button type="submit" name="submit" value="done"  class="btn btn-primary"> Submit </button>
						<?php
					}else{
						?>
						<button type="submit" name="submit" value="confirm"  class="btn btn-primary"> Confirm </button>
						<?php
					}
				?>

			</p>
			</form>
			 <hr class="colorgraph"/>
			<div style="margin:40px 0 ;">Library HtmlTag 1.0</div>
		</div>

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
		<script type="text/javascript">
		$("input[name='case_form']").change(function(){
			$(this).closest('form').submit();
		});
		$("#border_description button").click(function(){
			$(".description_library").toggle(400);
		});
		</script>
	</body>
</html>
<?php
 ?>
