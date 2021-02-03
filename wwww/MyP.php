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
			$id= $_SESSION['id'];
			
			include "connect.php";
			$result =  mysqli_query($dp,"SELECT  kod_pat, date, time kod_tal  FROM talon where kod_doc='$id' AND kod_pat IS NOT NULL");
			if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr>";
			
            $row = $result->fetch_assoc();
         
            echo "</tr>";
            echo "<tr>";
			$i=1;

			echo '<td>Пациент</td>';
			echo '<td>Дата</td>';
			echo '<td>Время</td>';
			echo "</tr>";
			echo "<tr>";
            foreach($row  as  $inner_key => $value)
            {
			    if($i==1)
				{
				 $result5 = "SELECT fio FROM patient WHERE kod_pat = '$value'";
                 $result6 = mysqli_query($dp, $result5) or trigger_error(mysql_error()." in ". $result5); //извлекаем из базы все данные о пользователе с введенным логином
                 $myrow = mysqli_fetch_array($result6);
				 echo '<td>'. $myrow['fio'].'</td>';
				}
				else 
				{
                echo '<td>'.$value.'</td>';
				
				}
			    $i=0;
            }
			
            echo "</tr>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
				$i=1;
                 foreach($row  as  $inner_key => $value)
                 {
			    if($i==1)
				{
				 $result5 = "SELECT FIO FROM doctor WHERE ID_doctor = '$value'";
                 $result6 = mysqli_query($dp, $result5) or trigger_error(mysql_error()." in ". $result5); //извлекаем из базы все данные о пользователе с введенным логином
                 $myrow = mysqli_fetch_array($result6);
				 echo '<td>'. $myrow['FIO'].'</td>';
				}
				else 
				{
                echo '<td>'.$value.'</td>';
				
				}
				$i=0;
            }
                echo "</tr>";
            }
            echo "</table>";
			
        }
		else
		echo "<br> К вам никто не записан";
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

