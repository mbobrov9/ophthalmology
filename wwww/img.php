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
			include "connect.php";
			$id= $_SESSION['id'];
			if ($_SESSION['type']==1)
			{
        $result = "SELECT kod_pat,phone,mail,adress,fio FROM patient WHERE kod_pat = '$id'";
        $result1 = mysqli_query($dp, $result) or trigger_error(mysql_error()." in ". $result); //извлекаем из базы все данные о пользователе с введенным логином
        $myrow = mysqli_fetch_array($result1);
    echo "<br>ваше имя :", $myrow['fio'];
    echo "<br>ваш номер :",$myrow['phone'];
	echo "<br>ваш адрес :",$myrow['adress'];
    echo "<br>ваша почта :", $myrow['mail'],"<br>";
	}
	else {
	  $result = "SELECT Work_experience,mail,Qval,FIO FROM doctor WHERE ID_doctor = '$id'";
        $result1 = mysqli_query($dp, $result) or trigger_error(mysql_error()." in ". $result); //извлекаем из базы все данные о пользователе с введенным логином
        $myrow = mysqli_fetch_array($result1);
    echo "<br>ваше имя :", $myrow['FIO'];
    echo "<br>ваша квалификация :",$myrow['Qval'];
	echo "<br>ваш опыт :",$myrow['Work_experience'];
    echo "<br>ваша почта :", $myrow['mail'],"<br>";
         }

	?>
							</article>
							<article>
							<?php
							if ($_SESSION['type']==1)
							{
							echo '<br><li><a href="chsp.php" class="button">Взять талон</a></li>';
							echo '<br><li><a href="MyT.php" class="button">Мои талоны</a></li>';
							echo  '<br><li><a href="upreg.php" class="button">Редактировать личные данные</a></li>';
							echo  '<br><li><a href="ex.php" class="button">Выход</a></li><br>';
							}
							else
							{
							      echo '<br><li><a href="MyT.php" class="button">Мои пациенты</a></li>';
								  echo  '<br><li><a href="ex.php" class="button">Выход</a></li><br>';
                            }

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

