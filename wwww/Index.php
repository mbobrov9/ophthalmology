<?php
    //  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
    session_start();
    ?>
	
<?php

$f=fopen("stat.dat","a+");
flock($f,LOCK_EX);
$count=fread($f,100);
@$count++;
ftruncate($f,0);
fwrite($f,$count);
fflush($f);
flock($f,LOCK_UN);
fclose($f);

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
									<header>

										<h2><a href="#">История<br />
										</a></h2>
									</header>
									<a href="history.php" class="image fit"><img height = "315" src="images/pic1.jpg" alt="" /></a>
									<p>Долгая история.</p>
									<ul class="actions special">
										<li><a href="history.php" class="button">Узнать больше</a></li>
									</ul>
								</article>
								<article>
									<header>

										<h2>Наши врачи<br />
										</a></h2>
									</header>
									<a href="doctors.php" class="image fit"><img height = "315" src="images/i.jpg" alt="" /></a>
									<p>У нас работают только высококлассные спеиалисты, с большим опытом работы.</p>
									<ul class="actions special">
										<li><a href="doctors.php" class="button">Узнать о них больше</a></li>
									</ul>
								</article>
								<article>
									<header>

										<h2>Остались вопросы?<br />
										</a></h2>
									</header>
									<a href="mail.php" class="image fit"><img height = "315" src="images/m.jpg" alt="" /></a>
									<p>Наши операторы ответят вам в ближайшее время.</p>
									<ul class="actions special">
										<li><a href="mail.php" class="button">Напишите нам!</a></li>
									</ul>
								</article>
								<article>
									<header>

										<h2>Статситика <br />
										</a></h2>
									</header>
									<a href="stat.php" class="image fit"><img height = "315" src="images/stat.jpg" alt="" /></a>
									<p>Мы ведём статистику просмотров и не только.</p>
										<ul class="actions special">
										<li><a href="stat.php" class="button">Посмотреть её</a></li>
									</ul>
									<?php

                                

                                
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
