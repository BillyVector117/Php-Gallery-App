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
    <title>Upload images</title>
</head>

<body>
    <header class="container">
        <div class="container">
            <h1 class="title">Upload your image</h1>
        </div>
    </header>

    <div class="container text-center align-items-center container">

        <form class="form" method="POST" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
            <div class="input-group mb-3">
                <input class="form-control" type="file" id="pic" name="pic" aria-label="Upload">
            </div>

            <div class="row">
                <div class="col-12 col-md-8">

                    <div class="input-group-sm m-3">
                        <label for="title" class="form-label">File name: </label>
                        <input class="form-control" type="text" id="title" name="title">
                    </div>
                </div>
                <div class="col-12 col-md-4">
                    <label for="text">Description: </label>
                    <textarea class="form-control" name="text" id="text" placeholder="Your description" style="height: 100px"></textarea>
                    <!-- Error message -->
                    <?php if (isset($error)) : ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error ?>
                        </div>
                    <?php endif ?>
                    <!-- End error message -->
                    <input type="submit" class="btn btn-outline-warning submit mt-3" value="Upload image!">

                </div>
            </div>


        </form>

    </div>
</body>

</html>