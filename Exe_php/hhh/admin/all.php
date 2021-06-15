<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../cs.css" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div>
        <div id="header">
            <div style="float: left; font-size: 24px;">Manage</div>
            <a href="http://localhost/index.php?controller=admin&action=add"><button id="new">New</button></a>
        </div>
        <div id="content">
            <table id="center">
                <tr>
                    <th>ID</th>
                    <th>Thumb</th>
                    <th style="width: 50%;">Title</th>
                    <th>Status</th>
                    <th style="width: 170px;">Action</th>
                </tr>

                <?php
                if ($val->num_rows > 0) {
                    while ($row = mysqli_fetch_assoc($val)) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td style='padding: 15px 0;'><img src=../images/" . $row['image'] . " width='100' height='100'></td>";
                        echo "<td style='text-align: left;'>" . $row["title"] . "</td>";
                        if ($row["status"] == 1) {
                            echo "<td>Enabled</td>";
                        } else
                            echo "<td>Disable</td>";

                        echo "<td><a href='http://localhost/index.php?controller=admin&action=show&id=" . $row['id'] . "'>Show</a> 
                    | <a href='http://localhost/index.php?controller=admin&action=edit&id=" . $row['id'] . "'>Edit</a> 
                    | <a href='http://localhost/index.php?controller=admin&action=delete&id=" . $row['id'] . "'>Delete</a></td>";
                        echo "</tr>";
                    }
                }
                ?>
            </table>
        </div>

        <div id="fooder" style="display: flow-root;">

            <form method="GET" action="http://localhost/index.php">
                <div style="float: left;">
                    Page
                    <select style="width: 50px;height: 25px;" class="pagination" name="limit" id="limit">
                        <option value="3" <?php if ($limit == '3') echo ' selected="selected"'; ?>>3</option>
                        <option value="5" <?php if ($limit == '5') echo ' selected="selected"'; ?>>5</option>
                        <option value="10" <?php if ($limit == '10') echo ' selected="selected"'; ?>>10</option>
                    </select>
                </div>
            </form>

            <div style="float: right;">
                <ul class="pagination">
                    <?php
                    for ($i = 1; $i <= ceil($count / $limit); $i++) {
                        echo '<li><a href="?page=' . $i . '&limit=' . $limit . '">' . $i . '</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#limit").change(function() {
                $('form').submit();
            })
        })
    </script>
</body>

</html>