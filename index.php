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
         ?>
         <script type="text/javascript">
			function films()
			{
				document.getElementById('page').innerHTML = 'LISTE DES FILMS';
			}

			function actors()
			{
				document.getElementById('page').innerHTML = 'LISTE DES ACTEURS';
			}

			function directors()
			{
				document.getElementById('page').innerHTML = 'LISTE DES REALISATEURS';
			}

			function search()
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