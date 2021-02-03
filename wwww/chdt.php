<?php
    //  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
    session_start();
    ?>

<HTML>

	<head>
		<title>index</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper" class="fade-in">

				<!-- Intro -->


   	<!-- Header -->
   	<header id="header">

					<h1>Взгляд
						</h1>
						<p>Вот уже 50 лет мы возвращает людям зрение.</p>

					</header>

   	<!-- Nav -->
					<nav id="nav">
						<ul class="links">
							<li><a href="index.php">О нас</a></li>
							<?php
							$id= $_SESSION['id'];
							if ($id=="")
							{
							echo'<li><a href="reg.php">Личный кабинет</a></li>';
							}
							else {

							echo '<li><a href="lk.php">Личный кабинет</a></li>';
							}
							?>
						</ul>

					</nav>

				<!-- Main -->
					<div id="main">

						<!-- Posts -->
      <section class="posts">
								<article>
<?php
		$fil=$_GET["Type"];
			include "connect.php";
			
			$result =  mysqli_query($dp,"SELECT  kod_tal, date,time FROM talon where kod_doc='$fil' AND kod_pat IS NULL");
        if ($result->num_rows > 0) {

		echo '<form action="zap.php" method="post">';
		echo'<p>Выбирете талоны, на которые хотите записаться</p>';
            $row = $result->fetch_assoc();
			
          echo "<table>";
		    echo '<article>';
            echo "<tr>";
		    echo "<tr>";
			  echo  '<td>Дата</td><td>Время</td>';
			 echo "</tr>";
			 $i=1;
			 $y=1;
            foreach($row  as  $inner_key => $value)
            {
			 if($i==1)
			 {
			 echo '<td>';
			 ?>
			<div class='from-line'>
    <input type="checkbox" id="lang<?=$y?>" name="lang<?=$y?>" value=<?=$value?> checked>
    <label for="lang<?=$y?>">Выбрать</label>
</div>
			 <?
			 echo'</td>';
			  $i=0;
			 }
			 else 
			 {
                echo '<td>'.$value.'</td>';
			  }
            }
			  echo "</tr>";
			 
            while($row = $result->fetch_assoc()) {

			   
			 
			
            echo "<tr>";
		    $y=$y+1;

			$i=1;
            foreach($row  as  $inner_key => $value)
            {
			 if($i==1)
		    {
			 echo '<td>';
			?>
			<div class='from-line'>
    <input type="checkbox" id="lang<?=$y?>" name="lang<?=$y?>" value=<?=$value?> checked>
    <label for="lang<?=$y?>">Выбрать</label>
</div>
			 <?
			
			 echo'</td>';
			  $i=0;
			 }
			 else 
			 {
                echo '<td>'.$value.'</td>';
			  }
            }
				$f="images/d$d.jpg";
                echo "</tr>";
				 
				 
				

            }
			echo "</table>";
			echo '<p><input type="submit" value="Отправить"></p>';
			echo'</form>';
			echo '</article>';
			
        }
		else
		echo "<br> Нет свободных талонов";

	?>

							</article>

							</section>



					</div>

				<!-- Footer -->
					<footer id="footer">

						<section class="split contact">
							<section class="alt">
								<h3>Адресс</h3>
								<p>Фрунзенская 125</p>
							</section>
							<section>
								<h3>Телефон</h3>
								<p>8-800-008-22-67></p>
							</section>
							<section>
								<h3>Почта</h3>
								<p>vzglyad@mail.ru</a></p>
							</section>

						</section>
					</footer>



			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</HTML>

