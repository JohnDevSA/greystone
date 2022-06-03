<?php $movies = json_decode(file_get_contents("storage/movies.json"),true); ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Movie List</title>

    <!-- Scripts -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                Movie List
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>

    <main class="py-4">
        <div class="container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 my-3">
                        <div class="pull-right">
                            <div class="btn-group">
                                <button class="btn btn-info" id="list">
                                    List View
                                </button>
                                <button class="btn btn-danger" id="grid">
                                    Grid View
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="products" class="row view-group">
                 <?php  for ($i = 0;$i < count($movies);$i++) { ?>

                    <div class="item col-xs-4 col-lg-4">
                        <div class="thumbnail card">
                            <div class="img-event">
                                <img class="group list-group-image img-fluid" src="<?= $movies[$i]['posterurl'] ?>" alt="" />
                            </div>
                            <div class="caption card-body">
                                <h4 class="group card-title inner list-group-item-heading"><b><?=$movies[$i]['title']?></b><small>[<?=$movies[$i]['year']?>]</small></h4>
                                <p class="group inner list-group-item-text">
                                    <small><?=$movies[$i]['storyline']?></small>
                                </p>
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <p>Genres : <?php for ($z = 0;$z < count($movies[$i]['genres']);$z++){ echo $movies[$i]['genres'][$z]; } ?></p>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <p>Starring : <?php for ($z = 0;$z < count($movies[$i]['genres']);$z++){ echo $movies[$i]['actors'][$z]; } ?></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <p class="lead"></p>
                                        <p>Rating : <?=$movies[$i]['imdbRating']?><i class="bi bi-star-fill"></i></p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <p class="pull-right">Duration : <?=$movies[$i]['duration']?></p>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <p class="pull-right">Content Rating: <?=$movies[$i]['contentRating']?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
    </main>

</div>
</body>
</html>
<script>
    $(document).ready(function() {
        $('#list').click(function(event){event.preventDefault();
            $('#products .item').addClass('list-group-item');});
        $('#grid').click(function(event){event.preventDefault();
            $('#products .item').removeClass('list-group-item');
            $('#products .item').addClass('grid-group-item');});
    });
</script>