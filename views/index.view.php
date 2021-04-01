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
    <title>Gallery-Billy Rodriguez M.</title>
</head>

<body>
    <header class="container">
        <nav class="navbar navbar-light bg-dark justify-content-between">
            <a class="navbar-brand" href="#">
                <img src="views/gallery.svg" width="30" height="30" class="d-inline-block align-top" alt="">
                GALLERY APP
            </a>
            <button class="btn btn-danger"><a href="../gallery/upload.php"> UPLOAD A PIC!</a></button>
        </nav>
    </header>
    <section class="pics">
        <div class="container">
            <div class="row">
                <!-- Each data/document iteration ($pics is collected data from Database in 'index.php') -->
                <?php foreach ($pics as $pic) : ?>
                    <div class="col-md-3 mt-4">
                        <div class="card">
                            <!-- Each clicked pic redirect to 'pic.php' with its own Url-Params (pic :id) -->
                            <a class="image-container justify-content-center " href="pic.php?id=<?php echo $pic['id'] ?>">
                                <img class="rounded image card-img-top" src="pics/<?php echo $pic['image'] ?>" alt="<?php echo $pic['title'] ?>">
                            </a>
                            <div class="card-body">
                                <h4 class="card-title d-flex justify-content-between align-items-center">
                                    <?php echo $pic['title'] ?>
                                </h4>
                                <p><?php echo $pic['text'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>

                <!-- Pagination  -->
                <div class="mt-5 d-flex justify-content-between">
                    <!-- Left arrow (activated)-->
                    <?php if ($current_page > 1) : ?>
                        <nav class="" aria-label="Page navigation">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="?page=<?php echo $current_page - 1 ?>">Previous</a></li>
                            </ul>
                        </nav>
                    <?php endif ?>

                    <!-- Right arrow (activated-->
                    <?php if ($current_page != $total_pages) : ?>
                        <nav class="" aria-label="Page navigation">
                            <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="?page=<?php echo $current_page + 1 ?>">Next</a></li>
                            </ul>
                        </nav>
                    <?php endif ?>
                </div>
                <hr>

                <?php
                require './partials/footer.php';
                ?>

                <!-- Prototype iteration Start (template)-->
                <template>
                    <div class="col-md-3 mt-4">
                        <div class="card">
                            <a href="#">
                                <img class="card-img-top" src="pics/1.jpg" alt="Image1">
                            </a>
                            <div class="card-body">
                                <h4 class="card-title d-flex justify-content-between align-items-center">
                                    IMAGE 1
                                </h4>
                                <p>description pic</p>
                            </div>
                        </div>
                    </div>
                </template>
                <!-- Prototype iteration ends -->
                <!-- prototype pagination start (Template) -->
                <template>
                    <div class="mt-5 d-flex justify-content-between">
                        <nav class="" aria-label="Page navigation">
                            <ul class="pagination">
                                <li class="page-item <?php if ($current_page <= 1) : ?> disabled" <?php endif ?>><a class="page-link" href="?page=<?php echo $current_page - 1 ?>">Previous</a></li>
                            </ul>
                        </nav>
                        <nav class="" aria-label="Page navigation">
                            <ul class="pagination">
                                <li class="page-item<?php if ($total_pages == $current_page) : ?> disabled <?php endif ?>"><a class="page-link" href="?page=<?php echo $current_page + 1 ?>">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                </template>
                <!-- Prototype pagination Ends (template) -->
            </div>
        </div>
    </section>
</body>

</html>