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
       <article class="post featured">
						<header>

										<h2> Наша Статситика<br />
										</a></h2>
									</header>	
									<?php
									 $f=fopen("stat.dat","a+");
                                flock($f,LOCK_EX);
                                $count=fread($f,100);
                                flock($f,LOCK_UN);
                                fclose($f);
								echo "<br>";
								echo "Количество посещений главной страницы: $count"; 
									?>
									<?php
									 $f=fopen("stat1.dat","a+");
                                flock($f,LOCK_EX);
                                $count=fread($f,100);
                                flock($f,LOCK_UN);
                                fclose($f);
								echo "<br>";
								echo "Количество посещений страницы c историей: $count"; 
									?>
									<?php
									 $f=fopen("stat2.dat","a+");
                                flock($f,LOCK_EX);
                                $count=fread($f,100);
                                flock($f,LOCK_UN);
                                fclose($f);
								echo "<br>";
								echo "Количество посещений страницы с врачами: $count"; 
									?>
										<?php
									 $f=fopen("zap.dat","a+");
                                flock($f,LOCK_EX);
                                $count=fread($f,100);
                                flock($f,LOCK_UN);
                                fclose($f);
								echo "<br>";
								echo "За всё время, наши пациенты запсались на приём $count раз"; 
									?>
									
										<?php
									 $f=fopen("reg.dat","a+");
                                flock($f,LOCK_EX);
                                $count=fread($f,100);
                                flock($f,LOCK_UN);
                                fclose($f);
								echo "<br>";
								echo "За всё время зарегистрировалось $count пользователей"; 
									?>

									


	</article>

							



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
