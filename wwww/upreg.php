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
								
			<?php
			include "connect.php";
			$id= $_SESSION['id'];

        $result = "SELECT kod_pat,phone,mail,adress,fio,password FROM patient WHERE kod_pat = '$id'";
        $result1 = mysqli_query($dp, $result) or trigger_error(mysql_error()." in ". $result); //извлекаем из базы все данные о пользователе с введенным логином
        $myrow = mysqli_fetch_array($result1);



	?>

							
							<h2>Редактирование личных данных<br />
									</h2>
         <form action="upchek.php" method="post">
<p>Введите ФИО: <input type="text" name="name" value="<? echo $myrow['fio']; ?>"></p>
<p>Введите телефон: <input type="text" name="phone" value="<? echo $myrow['phone']; ?>"></p>
<p>Введите почту: <input type="text" name="mail"value="<? echo $myrow['mail']; ?>"></p>
<p>Место жительства: <input type="text" name="addr"value="<? echo $myrow['adress']; ?>" ></p>
<p>пароль: <input type="text" name="pas1"value="<? echo $myrow['password']; ?>"></p>

<p><input type="submit" value="Обновить" name="submit"></p>
</form>
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
