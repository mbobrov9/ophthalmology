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

$name=$_POST["name"];
$num=$_POST["num"];
$mail=$_POST["mail"];

$addr=$_POST["addr"];
$pas1=$_POST["pas1"];
$pas2=$_POST["pas2"];


    //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
    if ($name=="" or $num=='' or $mail==''  or $addr=='' or $pas1=='') //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
	{
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
    //если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
   $result = "SELECT password,  mail,kod_pat  FROM patient WHERE mail = '$mail'"; //извлекаем из базы все данные о пользователе с введенным логином'
        $result1 = mysqli_query($dp, $result) or trigger_error(mysql_error()." in ". $result); //извлекаем из базы все данные о пользователе с введенным логином
        $myrow = mysqli_fetch_array($result1);
        if (empty($myrow['password']))
		{
    if($pas1==$pas2)
	{
    $query4 = "INSERT INTO patient( fio, phone,mail, adress, password)
    values('$name','$num','$mail','$addr','$pas1')";
    // Проверяем, есть ли ошибки
    if (mysqli_query($dp,$query4) === TRUE)
    {
	        $f=fopen("reg.dat","a+");
             flock($f,LOCK_EX);
             $count=fread($f,100);
             @$count++;
             ftruncate($f,0);
             fwrite($f,$count);
             fflush($f);
             flock($f,LOCK_UN);
             fclose($f);
    echo  "Вы зарегистрированы :D ";


    }
    else
    {
    echo "Ошибка! Вы не зарегистрированы.";
    }
	}
	else
	{
	echo "Ошибка! Пароли не совпадают.";
	}
	}

	else
	{
	echo "Пользователь с такой почтой уже существует";
	}


    ?>

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
