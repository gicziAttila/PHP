<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Ulesrend</title>
</head>

<?php
    $fejlec = array("1. oszlop", "2. oszlop", "3. oszlop", "4. oszlop", "5.oszlop");
    $ulesrend = [
        ["-", "Tanár úr", "Máté", "Áron", "-"],
        ["Marcell", "Domonkos", "Bercel", "Balázs", "-"],
        ["Melinda","Roland", "Dávid", "Leon", "Viktor"],
        ["-", "-", "Attila", "Ákos", "Miklós"],
    ];
?>
<body>
    <table class="table caption-top table-striped table-bordered">
        <thead>
            <tr>
                <?php foreach ($fejlec as $oszlop) { 
                    echo "<th>" . $oszlop . "</th>";
                    } 
                ?>
            </tr>
        </thead>
        <caption>13.i Ülésrend</caption>
        <tbody class="table-group-divider">
            <tr>
                <?php
                foreach($ulesrend as $sor){
                    echo "<tr>";
                    foreach($sor as $tanulok) {
                        echo "<td>" . $tanulok . "</td>";
                    }
                    echo "</tr>"; 
                }
                ?>
            </tr>
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
    <style>
        body{
            text-align: center;
            display: flex;
            justify-content: center;
            padding: 100px;
        }
        th, td{
            padding: 10px;
        }
    </style>
</html>