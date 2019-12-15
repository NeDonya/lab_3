<html>
    <head>
        <meta charset="UTF-8">
        <title>Лабораторная №3</title>
    </head>
    <body>
    <?php
        $dbConnect = pg_connect("host=127.0.0.1 port=5432 dbname=testdb user=postgres");

        $query = pg_query($dbConnect,
            "SELECT title_ru, region_id FROM _regions WHERE country_id = 2 ORDER BY title_ru");
        $result = pg_fetch_all($query);
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