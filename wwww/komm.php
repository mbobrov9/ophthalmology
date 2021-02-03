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
					<?php

   include "connect.php";
   $d=$_POST["IDD"];
   
   if ($d==null)
   {
   $d=$_SESSION['d'];
   }
   echo '<article class="post featured">';
 $result = "SELECT Work_experience,mail,Qval,FIO FROM doctor WHERE ID_doctor = '$d'";
        $result1 = mysqli_query($dp, $result) or trigger_error(mysql_error()." in ". $result); //извлекаем из базы все данные о пользователе с введенным логином
        $myrow = mysqli_fetch_array($result1);
		?>
				<img width = "300" height = "300" src="images/d<?=$d?>.jpg" alt="" />
		<?
    echo "<br>имя :", $myrow['FIO'];
    echo "<br>квалификация :",$myrow['Qval'];
	echo "<br>опыт :",$myrow['Work_experience'];
	echo "<br>Отзывы :</br>";
    $result1 = "SELECT `id_pat`, `komm` FROM `komm` where `id_doc`='$d' ORDER by `id_kom`";
       

		$result2=$dp->query($result1);
            
			 
			 echo "<table>";
			 

               while ($row = mysqli_fetch_array($result2)):
                                        ?>
                                            <tr height="100">
                                                <td>
                                                <img width = "200" height = "200" src="<? echo "images/p",$row["id_pat"],".jpg";?>" alt="" />
                                                <br>
												<?
												$result3 = "SELECT kod_pat,phone,mail,adress,fio FROM patient WHERE kod_pat = '$id'";
                                                $result4 = mysqli_query($dp, $result3) or trigger_error(mysql_error()." in ". $result3); //извлекаем из базы все данные о пользователе с введенным логином
                                                $myrow = mysqli_fetch_array($result4);
                                                 echo $myrow["fio"]; 
												 ?>
                                                <br>
                                                </td>
                                                <td class="align-top">
                                                    <?php echo $row["komm"]; ?>
                                                </td>
                                                
                                              
                                               
                                                
                    
                                            </tr>
                                        <?php endwhile; 
			echo "</table>";

        

         
		if ($_SESSION['type']==1)
		{
		?>

		 <form action="komm.php" method="post">
         <p>Ваш комментарий: <input type="text" name="komm">
		 <input type="hidden" name="IDD" value="<?echo $d ?>">
		 <p><input type="submit" value="Оставить" name="submit"></p>
         </form>
		 <?
		
		$id=$_SESSION['id'];
		$komm=$_POST["komm"];
		if(isset($_POST['komm']))
		{
		$query4 = "INSERT INTO komm( id_doc, id_pat, komm)    values('$d','$id','$komm')";
    // Проверяем, есть ли ошибки
        if (mysqli_query($dp,$query4) === TRUE)
        {
		   $_SESSION['d']=$d;
           exit('<meta http-equiv="refresh" content="0; url=komm.php" />');
            
		  
        }
		}
		}
		else
		echo "<br> Чтобы оставить комментарий войдите в свой аккаунт";
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
