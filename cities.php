<html>
<head>
    <meta charset="UTF-8">
    <title>Лабораторная №3</title>
</head>
<body>
<?php
$id = $_GET['id'];
$dsn = new PDO("pgsql:host=localhost;dbname=testdb;user=postgres;password=''");

$limit = 3;
$page = 1;
if ($_GET['page']) {
    $page = $_GET['page'];
}
$offset = ($page-1)*$limit;
$sql = "SELECT count(*) from _cities where region_id=:id";
$stmt = $dsn->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$res = $stmt->fetch();
$count = $res['count'];
$sql = "SELECT title_ru, city_id from _cities where region_id=:id order by title_ru limit :limit offset :offset";
$sth = $dsn->prepare($sql);
$sth->bindParam(':limit', $limit, PDO::PARAM_INT);
$sth->bindParam(':id', $id, PDO::PARAM_INT);
$sth->bindParam(':offset', $offset, PDO::PARAM_INT);
$sth->execute();
$countries = $sth->fetchAll();
echo "<table align='center'>";

foreach ($countries as $cit) {
    echo "<tr><td><a href='langcity.php?id=" . $cit["city_id"] . "'>" . $cit["title_ru"] . "</a></td>";
}
echo "</table>";
for ($i = 1; $i <= $count / $limit; $i++) {
    ?>
    <a href="/cities.php?id=<?php echo $id ?>&page=<?php echo $i ?>"><?php echo $i ?> </a>
    <?
}
?>
<br><br><br>
<button onclick="window.location.href = 'index.php';">К областям</button>
</body>
</html>