<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
</head>

<body>
    <form action="http://localhost/index.php?controller=admin&action=oke" method="POST">

        <table style="text-align: left;">
            <tr>
                <th style="width: 100px;">Title</th>
                <td>
                    <input type="text" name="title" placeholder="Title" />
                </td>
            </tr>
            <tr>
                <th style="width: 100px; vertical-align: top;">Description</th>
                <td>
                    <!-- <input type="text" name="description" /> -->
                    <textarea style="width: 400px; height: 150px;" class="form-control" placeholder="Description" name="description"></textarea>
                </td>
            </tr>
            <tr>
                <th style="width: 200px;vertical-align: top;">Image</th>
                <td>
                    <input id="file" type="file" name="file" />
                    <br>
                    <br>
                    <img id="image" src="#" width="150px" height="150px" />
                </td>
            </tr>
            <tr>
                <th style="width: 200px;">Status</th>
                <td>
                    <select name="status" >
                        <option value="1">Endable</option>
                        <option value="2">Disable</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th style="width: 100px;"></th>
                <td>
                    <input type="submit" value="Submit" name="add" />
                </td>
            </tr>

        </table>

    </form>
</body>
<script>
    document.getElementById("file").onchange = function() {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById("image").src = e.target.result;
        };
        reader.readAsDataURL(this.files[0]);
    };
</script>

</html>