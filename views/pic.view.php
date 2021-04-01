<!-- This is the visual module for 'pic.php' and it receives through Url-Params :id pic property -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel='stylesheet' type="text/css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/ff6a64be3e.js" crossorigin="anonymous"></script>
    <title>Gallery Pics</title>
</head>

<body>
    <header class="container">
        <div class="container">
            <!-- Store data from array extracted in database (pic.php) -->
            <h1 class="title">
                Pic: <?php if (!empty($pic['title'])) {
                            echo $pic['title'];
                        } else {
                            echo $pic['image'];
                        }
                        ?>
            </h1>
        </div>
    </header>

    <div class="container text-center align-items-center">
        <!-- Store all info data available from each pic properties-->
        <img src="pics/<?php echo $pic['image']; ?>" class="rounded img-fluid float-right image3" alt="image1">
        <p class="text-center text-uppercase mt-3"><?php echo $pic['text']; ?></p>
        <div class="d-inline border border-primary p-2 border-2 mt-5">
            <a class="text-decoration-none text-center" href="index.php"><i class="fa fa-long-arrow-left"></i> Go back</a>
        </div>

    </div>
</body>
<?php
require './partials/footer.php';

?>

</html>