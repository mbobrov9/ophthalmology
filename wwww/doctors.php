<?php
    //  вся процедура работает на сессиях. Именно в ней хранятся данные  пользователя, пока он находится на сайте. Очень важно запустить их в  самом начале странички!!!
    session_start();
    ?>
	<?php

$f=fopen("stat2.dat","a+");
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
					<?php

   include "connect.php";
   echo '<article class="post featured">';
  echo'<form action="doctors.php" method="GET">';
   $result_set = mysqli_query($dp,"SELECT ID_Spec, Name FROM spec");
            echo "<label>Выбирете специализацию:";
            echo '<select name="Type">';
            while($row = $result_set->fetch_assoc()) {
                $catName=$row["Name"];
                $catID=$row["ID_Spec"];
                echo "<option value='$catID'>$catName</option>";
            }
            echo'</select>';
            echo "</label>";

        echo '<input type="submit" value="Выбрать">';
		echo'</form>';
		?>
			<form action="doctors.php" method="POST">
			               
                                <input type="hidden" name="" value="abc">
                                <input type="submit" name="heyrasp" value="сбросить фильтр">
                            </form>
							
	    </article>
		<section class="posts">
						<!-- Posts -->
					
       <?php

   include "connect.php";
		$fil=$_GET["Type"];
		if ($_POST['name']=="abc") {
	    exit('<meta http-equiv="refresh" content="0; url=komm.php" />');
        }

		if ($fil=="")
		{
                $result =  mysqli_query($dp,"SELECT  ID_doctor, FIO, Qval, Work_experience FROM doctor ORDER by FIO");
        if ($result->num_rows > 0) {


            $row = $result->fetch_assoc();

			 echo '<article>';
			 echo "<table>";
			  echo "<tr>";
			  echo  '<td>"Фио"</td><td>"Квалификация"</td><td>"Опыт"</td>';
			 echo "</tr>";

                echo "<tr>";
				$i=1;
			 foreach($row  as  $inner_key => $value)
                {
				if($i==1)
				{
				$d=$value;
				}
				else{
                    echo '<td>'.$value.'</td>';
                   }
				   $i=0;
                }
				
              
                echo "</tr>";
				?>
				<a class="image fit"><img width = "200" height = "300" src="images/d<?=$d?>.jpg" alt="" /></a>
				<?
				 echo "</table>";
				 
				?>
				
			<form action="komm.php" method="POST">
			               
                                <input type="hidden" name="IDD" value="<?echo $d ?>">
                                <input type="submit" name="heyrasp" value="Посмотреть комментарии">
                            </form>
							<?
				echo '</article>';

            while($row = $result->fetch_assoc()) {

			   echo '<article>';
			 echo "<table>";
			 echo "<tr>";
			  echo  '<td>"Фио"</td><td>"Квалификация"</td><td>"Опыт"</td>';
			 echo "</tr>";
                echo "<tr>";
				$i=1;
                foreach($row  as  $inner_key => $value)
                {
				if($i==1)
				{
				$d=$value;
				}
				else{
                    echo '<td>'.$value.'</td>';
                   }
				   $i=0;
                }
				
                echo "</tr>";
				?>
				<a class="image fit"><img width = "200" height = "300" src="images/d<?=$d?>.jpg" alt="" /></a>
				<?
				 echo "</table>";
				 ?>
				 <form action="komm.php" method="POST">
                              <input type="hidden" name="IDD" value="<?php echo $d ?>">
                                <input type="submit" name="KOMM" value="Посмотреть комментарии">
                            </form>

				 <?
				echo '</article>';

            }

        }
		else
		{
            echo "0 results";
        }
		}
		else {
	    $result1 =  mysqli_query($dp,"SELECT ID_doctor, FIO, Qval, Work_experience FROM doctor where ID_Spec='$fil' ORDER by FIO");
        if ($result1->num_rows > 0) {


            $row = $result1->fetch_assoc();
			 echo '<article>';
			 echo "<table>";
			  echo "<tr>";
			  echo  '<td>"Фио"</td><td>"Квалификация"</td><td>"Опыт"</td>';
			 echo "</tr>";

                echo "<tr>";
				$i=1;
			 foreach($row  as  $inner_key => $value)
                {
				if($i==1)
				{
				$d=$value;
				}
				else{
                    echo '<td>'.$value.'</td>';
                   }
				   $i=0;
                }
				
              
                echo "</tr>";
				?>
				<a class="image fit"><img width = "200" height = "300" src="images/d<?=$d?>.jpg" alt="" /></a>
				<?
				 echo "</table>";
			?>
				 <form action="komm.php" method="POST">
                              <input type="hidden" name="IDD" value="<?php echo $d ?>">
                                <input type="submit" name="KOMM" value="Посмотреть комментарии">
                            </form>

				 <?
				echo '</article>';
				

            while($row = $result1->fetch_assoc()) {

			   echo '<article>';
			 echo "<table>";
			 echo "<tr>";
			  echo  '<td>"Фио"</td><td>"Квалификация"</td><td>"Опыт"</td>';
			 echo "</tr>";

                echo "<tr>";
				$i=1;
                foreach($row  as  $inner_key => $value)
                {
				if($i==1)
				{
				$d=$value;
				}
				else{
                    echo '<td>'.$value.'</td>';
                   }
				   $i=0;
                }
				
                echo "</tr>";
				?>
				<a class="image fit"><img width = "200" height = "300" src="images/d<?=$d?>.jpg" alt="" /></a>
				<?
				 echo "</table>";
			?>
				 <form action="komm.php" method="POST">
                              <input type="hidden" name="IDD" value="<?php echo $d ?>">
                                <input type="submit" name="KOMM" value="Посмотреть комментарии">
                            </form>

				 <?
				echo '</article>';

            }

        }
		else {
            echo "0 results";
        }


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
