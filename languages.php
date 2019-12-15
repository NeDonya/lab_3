<html>
<head>
    <meta charset="UTF-8">
    <title>Лабораторная №3</title>
</head>
<body>
<?php
$id = $_GET['id'];
$dbConnect = pg_connect("host=127.0.0.1 port=5432 dbname=testdb user=postgres");
$query = pg_query($dbConnect,
    "SELECT title_ru, title_ua, title_be, title_en, title_es, title_pt, title_de, title_fr, title_it,
title_pl, title_ja, title_lt, title_lv, title_cz FROM _cities WHERE city_id = $id");
$result = pg_fetch_all($query);
?>
<table align='center'>
    <?php
foreach ($result as $value) {
    echo "<tr>
    <td>".$value["title_ru"]."</td>
    <td>".$value["title_ua"]."</td>
    <td>".$value["title_be"]."</td>
    <td>".$value["title_en"]."</td>
    <td>".$value["title_es"]."</td>
    <td>".$value["title_pt"]."</td>
    <td>".$value["title_pl"]."</td>
    <td>".$value["title_ja"]."</td>
    <td>".$value["title_de"]."</td>
    <td>".$value["title_fr"]."</td>
    <td>".$value["title_it"]."</td>
    <td>".$value["title_lt"]."</td>
    <td>".$value["title_lv"]."</td>
    <td>".$value["title_cz"]."</td>
    </tr>";
}
    ?>
</table>
<br>
<button onclick="window.location.href = 'index.php';">К областям</button>
</body>
</html>