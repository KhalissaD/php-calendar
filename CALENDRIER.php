<?php

// setlocale(LC_TIME, "fr_FR", "fra");
// setlocale(LC_ALL, "fr-FR");

// $today = strftime("%A %e %B %Y", time()) . "<br>";



$weekArray = [1 => 'Lundi', 'Mar', 'Mer','Jeu', 'Vend', 'Sam', 'Dim'];

$monthArray = [
    1 => "janvier",
    2 => "fevrier",
    3 => "mars",
    4 => "avril",
    5 => "mai",
    6 => "juin",
    7 => "juillet",
    8 => "aout",
    9 => "septembre",
    10 => "octobre",
    11 => "novembre",
    12 => "decembre"
];

 ?> 

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>INDEX</title>
</head>

<body>
<h1 class="display-5 tex-center">Calendrier</h1>

<!-- AVANT le clic sur SUBMIT, on boucle les options du SELECT -->
<?php if (!isset($_GET['submit'])) { ?>


<form action="calendrier.php" method="GET">

<select name="month" id="month">
    <?php foreach ($monthArray as $key => $value) { ?>
        <option value="<?=$key?>"><?=$value ?></option>
    <?php } ?>
</select>


<select name="year" id="year">
    <?php for($year = 2015; $year <= 2025; $year++) { ?>
        <option value="<?=$year?>"><?=$year ?></option>
    <?php } 
  ?>
</select>


<button type="submit" name="submit">Show</button>

</form>

<!-- Puis au SUBMIT, donc en 'ELSE', on définit les variables dont on a besoin pour l'affichage du calendrier. On ne le fait pas avant car sinon, 
nous aurions une erreur : tant qu'on a pas cliqué "SUBMIT", on ne peut pas récupérer $days_nb et $first_day puisqu'elles sont indéfinies.

<?php } else { 
        $month = $_GET['month'];
        $year = $_GET['year'];
        $days_nb = cal_days_in_month(CAL_GREGORIAN, $month, $year);
        $first_day = date("N", mktime(0, 0, 0, $month, 1, $year));
?>  

<form action="calendrier.php" method="GET">

<select name="month" id="month">
    <?php foreach ($monthArray as $key => $value) { ?>
        <option value="<?=$key?>"><?=$value ?></option>
    <?php } ?>
</select>


<select name="year" id="year">
    <?php for($year = 2015; $year <= 2025; $year++) { ?>
        <option value="<?=$year?>"><?=$year ?></option>
    <?php } 
  ?>
</select>


<button type="submit" name="submit">Show</button>

</form>

<table class="table">
<tr>
<?php
foreach ($weekArray as $day_of_week) {?>
<th>
<?php echo $day_of_week ?>
</th>
<?php } ?>
</tr>


<?php 

$count = 1;
$dayscount = 1;

for ($i = 1; $i <= 6; $i++) {?>

    <tr>
    <?php for ($cell = 1; $cell <= 7 ; $cell ++) {?>
        <td name=" <?= $count ?>">
        <?php
        if ($count >= $first_day && $count < $days_nb + $first_day) {
            echo $dayscount;
            $dayscount++;
        } ?>

        </td>

<?php $count++;
    }; ?>
</tr>
<?php }};?> 



</table>



 	
</body>

</html>




