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
   $username = $_POST["mail"];
   if ($username == '')
   {
   unset($username);
   }  //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
   $pass = $_POST["pass"];
   if ($pass =='')
   {
   unset($password);
   }
    //заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
if (empty($username) or empty($pass)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
    {
    exit ("Вы ввели не всю информацию, вернитесь назад и заполните все поля!");
    }
    //если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести

// подключаемся к базе

        include "connect.php";
       $result = "SELECT password,  mail,kod_pat  FROM patient WHERE mail = '$username'"; //извлекаем из базы все данные о пользователе с введенным логином'
        $result1 = mysqli_query($dp, $result) or trigger_error(mysql_error()." in ". $result); //извлекаем из базы все данные о пользователе с введенным логином
        $myrow = mysqli_fetch_array($result1);
        if (empty($myrow['password']))
        {
		 $result = "SELECT password,  mail,ID_doctor  FROM doctor WHERE mail = '$username'"; //извлекаем из базы все данные о пользователе с введенным логином'
         $result1 = mysqli_query($dp, $result) or trigger_error(mysql_error()." in ". $result); //извлекаем из базы все данные о пользователе с введенным логином
         $myrow = mysqli_fetch_array($result1);
		 if (empty($myrow['password']))
		 {
		 echo "Ошибка! нет такого пользователя.";
		 }
		 else
		 {
	       
		 $s=$pass;
		 $pas=$myrow['password'];
        //если существует, то сверяем пароли
            if ($myrow['password']==$pass)
		    {
           //если пароли совпадают, то запускаем пользователю сессию! Можете его поздравить, он вошел!
             $_SESSION['name']=$myrow['FIO'];
            $_SESSION['password']=$myrow['password'];
             $_SESSION['id']=$myrow['ID_doctor'];//эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
			 $_SESSION['type']=2;
            exit('<meta http-equiv="refresh" content="0; url=index.php" />');
            }
        else
		{
        echo "<br>Пароль или логин  неверные.";
        }
         }

		}
		 else
		{
		
		 $s=$pass;
		 $pas=$myrow['password'];
        //если существует, то сверяем пароли
            if ($myrow['password']==$pass)
		    {
           //если пароли совпадают, то запускаем пользователю сессию! Можете его поздравить, он вошел!
             $_SESSION['name']=$myrow['name'];
            $_SESSION['password']=$myrow['password'];
             $_SESSION['id']=$myrow['kod_pat'];//эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
			  $_SESSION['type']=1;
            exit('<meta http-equiv="refresh" content="0; url=lk.php" />');
            }
        else
		{
        echo "<br>Пароль или логин  неверные.";
        }
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
