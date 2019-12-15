<html>
<head>
    <meta charset="UTF-8">
    <title>Лабораторная №3</title>
</head>
<body>
<?php
$dbConnect = pg_connect("host=127.0.0.1 port=5432 dbname=testdb user=postgres");

if(isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}
$id = $_GET['id'];

$limit = 40;
$offset = ($page - 1) * $limit;

$query = pg_query($dbConnect,
    "SELECT title_ru, city_id FROM _cities WHERE region_id=$id AND country_id = 2 ORDER BY title_ru LIMIT $limit OFFSET $offset");
$result = pg_fetch_all($query);
?>
<table align='center'>
    <?php
foreach ($result as $city) {
    echo "<tr><td><a href='languages.php?id=" . $city["city_id"] . "'>" . $city["title_ru"] . "</a></td>";
}
?>
</table>
    <?php
$countQuery = pg_query($dbConnect,
    "SELECT count(city_id) as count FROM _cities WHERE region_id=$id");
$count = pg_fetch_assoc($countQuery)['count'];
$pagesCount = ceil($count / $limit);
for ($i = 1; $i <= $pagesCount; $i++) {
?>
<a href="/cities.php?id=<?php echo $id ?>&page=<?php echo $i ?>"><?php echo $i ?> </a>
<?
}
?>
<br>
<button onclick="window.location.href = 'index.php';">К областям</button>
</body>
</html>