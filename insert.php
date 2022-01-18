<!DOCTYPE html>
<html>

<head>
	<title>Duomenų Atvaizdavimas</title>
</head>

<body>
		<?php

		// duomenu baze => localhost
		// slapyvardis => root
		// slaptazodis => tuscias
		// duomenu bazes pavadinimas => duomenys
		$conn = mysqli_connect("localhost", "root", "", "duomenys");
		
		// Patikrinamas prisijungimas
		if($conn === false){
			die("ERROR: Nepavyko prisijungti. "
				. mysqli_connect_error());
		}
		
		// Paimamos 4 įvestys
		$vardas = $_REQUEST['vardas'];
		$pavarde = $_REQUEST['pavarde'];
		$adresas = $_REQUEST['adresas'];
		$email = $_REQUEST['email'];
		
		// Irašome duomenis
		// lenteles pavadinimas lentele
		$sql = "INSERT INTO lentele VALUES ('$vardas',
			'$pavarde','$adresas','$email')";
		
		if(mysqli_query($conn, $sql)){
			echo "<h3>Duomenų perdavimas pavyko."
				. " Duomenys perduoti localhost/phpmyadmin"
				. " Perkraukite localhost/phpmyadmin</h3>";

			echo nl2br("\n$vardas\n $pavarde\n "
				. "$adresas\n $email");
		} else{
			echo "ERROR: Duomenų perdavimas nepavyko... $sql. "
				. mysqli_error($conn);
		}
		
		// Uzdaromas prisijungimas
		mysqli_close($conn);
		?>
</body>

</html>
