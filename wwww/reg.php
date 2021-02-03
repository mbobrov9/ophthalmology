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

									<h2>Регистрация<br />
									</h2>
         <form action="checkreg.php" method="post">
<p>Введите ФИО: <input type="text" name="name">
<p>Введите телефон: <input type="text" name="num"></p>
<p>Введите почту: <input type="text" name="mail"></p>
<p>Место жительства: <input type="text" name="addr"></p>
<p>пароль: <input type="password" name="pas1"></p>
<p>повторите пароль: <input type="password" name="pas2"></p>
<p><input type="submit" value="Зарегестрироваться" name="submit"></p>
</form>
							</article>
							<article>

									<h2>Вход<br /></h2>

		   <form action="in.php" method="post">

		   <p>Введите почту: <input type="text" name="mail"></p>
		   <p>пароль: <input type="password" name="pass"></p>
		   <p><input type="submit" value="Войти" name="submit"></p>
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
