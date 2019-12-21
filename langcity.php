<html>
<head>
    <meta charset="UTF-8">
    <title>Language</title>
</head>
<body>
<?php
$id = $_GET['id'];
$dsn = new PDO("pgsql:host=localhost;dbname=testdb;user=postgres;password=''");
$sql = "SELECT title_ru, title_ua, title_be, title_en, title_es, title_pt,
 title_de, title_fr, title_it, title_pl, title_ja, title_lt, title_lv, title_cz 
 FROM _cities 
 WHERE city_id = $id";
$countries = $dsn->query($sql);
echo "<table align='center'>";
foreach ($countries as $key => $title) {
    echo "<tr>
    <td>" . $title["title_ru"] . "</td>
    <td>" . $title["title_ua"] . "</td>
    <td>" . $title["title_be"] . "</td>
    <td>" . $title["title_en"] . "</td>
    <td>" . $title["title_es"] . "</td>
    <td>" . $title["title_pt"] . "</td>
    <td>" . $title["title_de"] . "</td>
    <td>" . $title["title_fr"] . "</td>
    <td>" . $title["title_it"] . "</td>
    <td>" . $title["title_pl"] . "</td>
    <td>" . $title["title_ja"] . "</td>
    <td>" . $title["title_lt"] . "</td>
    <td>" . $title["title_lv"] . "</td>
    <td>" . $title["title_cz"] . "</td>
    </tr>";
}
echo "</table>";
?>
<br><br><br>
<h4 align="center">
    <button onclick="window.location.href = 'index.php';">К областям</button>
</h4>
</body>
</html>