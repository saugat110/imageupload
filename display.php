<?php
require_once 'connection.php';
$query = "select * from person";
$stmt = $db ->prepare($query);
$stmt ->execute();
$result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="display.css">
</head>
<body>
    <div class="container">
        <table>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Image name</th>
                <th>Options</th>
            </tr>
            <?php foreach($result as $single){?>
                <tr>
                    <td id='image_cell'><img src="images/<?php echo $single['image']; ?>"></td>
                    <td><?php echo $single['name']; ?> </td>
                    <td><?php echo $single['image']; ?> </td>
                    <td>
                        <form action="delete.php" method="post">
                            <input type="hidden" value="<?php echo $single['id'];?>" name="id">
                            <input type="submit" value="delete">
                        </form>
                        <!-- <form action="update.php" method="post"> -->
                            <!-- <input type="hidden" value="<?php echo $single['id'];?>" name="id"> -->
                            <button type="button" onclick="updateform('<?php echo $single['name']; ?>', '<?php echo $single['id']; ?>')">Update</button>
                        <!-- </form> -->
                    </td>
                </tr>
            <?php }?>
        </table>
        <form action="update.php" id="update_form" method="post">
            <input type="text" name="cname" id="change_name"><br>
            <input type="hidden" id="t2" value="" name='change_id'><br>
            <input type="submit" value="update" name="sub">
            <button type='button' onclick="cancel()">Cancel</button>
        </form>
    </div>
    <script src="update.js"></script>
</body>
</html>