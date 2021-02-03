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
		
 if (isset($_POST['new']))
	{
		$name=$_POST['name'];
		$tel=$_POST['tel'];
		$email=$_POST['email'];
		$descr=$_POST['message'];
		
		$message="Сообщение от ".$name."\r\n"."Телефон: ".$tel."\r\nE-mail: ".$email."\r\nСообщение:".$descr;
		
		if (mail('vzglad@mail.ru', 'Сообщение с сайта', $message,"From:".$email.""))
			echo "<p>Сообщение отправдено!</p>";
		
		else
			echo "<p>Почта не отправлена!</p>";

		

	}
 
    
	 
   	?>
    
		
	<form method='post' action=''>
	
	
	
	<fieldset>
		  <legend>Написать письмо</legend>
			<label>Как к вам обращаться<span class="red"></span></label><input type="text" name="name" required>
			<label>E-mail, на который прислать ответ<span class="red"></span></label><input type="email" name="email" required>
			
			
			<label>Сообщение<span class="red"></span></label>
			<textarea name="message" required></textarea>
		</fieldset>
		<input type='hidden' name='new' value='1'>
	<button type='submit' style='margin:10px auto;'>Отправить</button>
	</form>
	

							
						
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

