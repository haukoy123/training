<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../cs.css" type="text/css" />
</head>

<body>
    <div id="header">
        <a href="http://localhost/index.php"><button id="new">Back</button></a>
    </div>
    <div id="content">
        <table id="center">
            <tr>
                <th style="width: 50px;">ID</th>
                <th style="width: 200px;">Thumb</th>
                <th>Description</th>
            </tr>
            <?php
            echo "<tr>";
            echo "<td>" . $val["id"] . "</td>";
            echo "<td><img src=../images/" . $val['image'] . " width='100' height='100'></td>";
            echo "<td style='text-align: left;'>" . $val["description"] . "</td>";
            echo "</tr>";
            ?>
        </table>
    </div>
</body>

</html>