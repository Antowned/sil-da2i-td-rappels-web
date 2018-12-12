<html lang='fr'>
	<head>
		<script src="jquery-3.3.1.slim.js"></script>
        <meta charset="utf-8"/>
        <link rel="stylesheet" href="style.css">
        <!-- 
              Titre de la page.
         -->
         <?php 
            function getBlock($file, $data = [])
            {
                require $file . '.php';
            }
            $link = mysqli_connect("mysql-antowny.alwaysdata.net", "antowny_2", "testtesttest", "antowny_bdd");
            
            if (mysqli_connect_errno()) {
                echo "Connect failed: %s\n". mysqli_connect_error();
                exit();
            }
         ?>
         <script type="text/javascript">
			function films($data)
			{
				document.getElementById('page').innerHTML = '';
				<?php
                    $query = "SELECT TITLE, RELEASE_DATE, SYNOPSIS FROM movie;";
                    if (!mysqli_multi_query($link, $query))
                        echo 'Echec Query';
				    do {
				        /* store first result set */
				        if ($result = mysqli_use_result($link)) {
				            while ($row = mysqli_fetch_row($result)) {
				                echo 'document.getElementById(\'page\').innerHTML += "'.$row[0].'";';
				                echo 'document.getElementById(\'page\').innerHTML += "<br/>";';
				                echo 'document.getElementById(\'page\').innerHTML += "'.$row[1].'";';
				                echo 'document.getElementById(\'page\').innerHTML += "<br/>";';
				                echo 'document.getElementById(\'page\').innerHTML += "'.str_replace("\r\n", "", $row[2]).'";';
				                echo 'document.getElementById(\'page\').innerHTML += "<br/>";';
				            }
				            mysqli_free_result($result);
				        }
				        /* print divider */
				        if (mysqli_more_results($link)) {
    				        echo "-----------------\n";
    				    }
    				} while (mysqli_next_result($link));
	            ?>
			}

			function actors($data)
			{
				document.getElementById('page').innerHTML = '';
				<?php
                    $query = "SELECT LAST_NAME, FIRST_NAME, BIRTH_DATE, BIOGRAPHY FROM person;";
                    if (!mysqli_multi_query($link, $query))
                        echo 'Echec Query';
				    do {
				        /* store first result set */
				        if ($result = mysqli_use_result($link)) {
				            for ($i = 1 ;$row = mysqli_fetch_row($result); $i = $i +1) {
				                echo 'document.getElementById(\'page\').innerHTML += "<div class=\'borders\' id=\'person'.$i.'\'></div>";';
				                echo 'document.getElementById(\'person'.$i.'\').innerHTML += "'.$row[0].'";';
				                echo 'document.getElementById(\'person'.$i.'\').innerHTML += "<br/>";';
				                echo 'document.getElementById(\'person'.$i.'\').innerHTML += "'.$row[1].'";';
				                echo 'document.getElementById(\'person'.$i.'\').innerHTML += "<br/>";';
				                echo 'document.getElementById(\'person'.$i.'\').innerHTML += "'.$row[2].'";';
				                echo 'document.getElementById(\'person'.$i.'\').innerHTML += "<br/>";';
				                echo 'document.getElementById(\'person'.$i.'\').innerHTML += "'.$row[3].'";';
				                echo 'document.getElementById(\'person'.$i.'\').innerHTML += "<br/>";';
				            }
				            mysqli_free_result($result);
				        }
				        /* print divider */
				        if (mysqli_more_results($link)) {
    				        echo "-----------------\n";
    				    }
    				} while (mysqli_next_result($link));
	            ?>
			}

			function directors($data)
			{
				document.getElementById('page').innerHTML = 'LISTE DES REALISATEURS';
			}

			function search($data)
			{
				document.getElementById('page').innerHTML = 'ENTREZ VOTRE RECHERCHE';
			}
         </script>
	</head>
	<body>
		<!-- 
		      Header
		 -->
		 <?php
		      getBlock('header');
		 ?>
		<!-- 
		      Menu
		 -->
		 <?php 
		      getBlock('menu');
		 ?>
		<!-- 
		      Infos du film ou de l'acteur ou du réalisateur
		 -->
		 <?php 
		      getBlock('page');
		 ?>
		<!-- 
		      Footer
		 -->
		 <?php 
		      getBlock('footer');
		 ?>
	</body>
</html>