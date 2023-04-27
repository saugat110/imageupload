<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        button[type='button'] {
            background-color: red;
            height: 30px;
            width: 190px;
            color: white;
            border: 0;
            border-radius: 7px;
        }

        button[type='button']:hover {
            background-color: rgb(205, 2, 2);
        }

        #file-info p{
            margin:-1px auto;
            width: fit-content;
            margin-top:-5px;

        }
        #file-info{
            height: auto;
            width: fit-content;
            /* margin:5px 0; */
        }
    </style>
</head>

<body>
    <?php if(isset($_GET['error'])){?>
        <?php echo '<p>image not uploaded</p>'; ?>
    <?php }else{ ?>
        <!-- <?php echo '<p>image not uploaded</p>'; ?> -->
    <?php }?>
    <form action="image.php" enctype="multipart/form-data" method="post">
        <input type="text" name="name" placeholder="Enter name"><br>
        <input type="file" id="file-input" style="display:none" onchange="displaySelectedFile(this)" name="ifile">
        <button type="button" onclick="document.getElementById('file-input').click()">Choose a image..</button>

        <div id="file-info"> <!--for thumbnail-->
            <img id="thumbnail-image" width="100">
            <p id="file-name"></p>
        </div>
          
        <input type="submit" name="submit">
    </form>

    <script>
        function displaySelectedFile(input) {
            var file = input.files[0];
            var fileReader = new FileReader();

            // Read the selected file as a data URL and create a thumbnail
            fileReader.readAsDataURL(file);
            fileReader.onload = function () {
                var thumbnailUrl = this.result;
                var thumbnailImage = document.getElementById('thumbnail-image');
                thumbnailImage.src = thumbnailUrl;
                var fileName = document.getElementById('file-name');
                fileName.textContent = file.name;
            };
        }

    </script>



</body>

</html>