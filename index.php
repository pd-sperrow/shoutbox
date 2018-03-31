<?php

	include_once 'classes/Shout.php';

	$shout = new Shout();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Basic souting box</title>
	<link rel="stylesheet" href="style.css"/>
</head>
<body>
	<div class="wrapper clr">

		<div class="headsection clr">
			<h2>Basic shouting box with PHP and MySQLi</h2>
		</div>
		<section class="content clr">
			<div class="box">
				<ul>
					<?php
						$getData = $shout->getAllData();
						if($getData){
							while ($data = $getData ->fetch_assoc()) { ?>
								<li><span><?php echo $data['time']; ?></span> -  <b><?php echo $data['name']; ?></b> <?php echo $data['body']; ?></li>

					<?php	}
						}
					?>
					
				</ul>
			</div>

			<?php
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$shoutdata = $shout->insertData($_POST);
				}
			?>

			<div class="shoutform clr">
				<form action="" method="POST">
					<table>
						<tr>
							<td>Name</td>
							<td>:</td>
							<td><input type="text" name="name" required placeholder="Please Input Your name Like Rahim"></td>
						</tr>

						<tr>
							<td>body</td>
							<td>:</td>
							<td><input type="text" name="body" required placeholder="Please input Your Text..."></td>
						</tr>

						<tr>
							<td>shout it</td>
							<td>:</td>
							<td><input type="submit" value="shout it" required></td>
						</tr>

					</table>
				</form>
			</div>
		</section>

		<footer class="footersection clr">
			<h2>&copy; Copyright sperrow</h2>
		</footer>
	</div>
</body>
</html>