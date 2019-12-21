<html>
    <head>
        <meta charset="UTF-8">
        <title>Лабораторная №3</title>
    </head>
    <body>
    <?php
        $dsn = new PDO("pgsql:host=localhost;dbname=testdb;user=postgres;password=''");
        $sql = "SELECT title_ru, region_id from _regions where country_id=2";
        $result = $dsn->query($sql);
    ?>
    <table align='center'>
        <?php
        foreach ($result as $value) {
            echo "<tr><td><a href='cities.php?id=".$value["region_id"]."'>".$value["title_ru"]."</a></td>";
        }
        ?>
		
    </table>
    </body>
</html>