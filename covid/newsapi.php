<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<link rel="stylesheet" href="./style.css">   
<title>News API</title>
</head>
<body>
    <?php 
        $url = 'https://newsapi.org/v2/top-headlines?country=us&category=business&apiKey=a101631781b6490b832268a38bad5901';
        $response = file_get_contents($url);
        $newsData = json_decode($response);
  ?>

<div class="nav mb-3 header-news"> 
</div>
<div class="container">
    <?php 
        foreach($newsData->articles as $news) {
    ?>
    <div class="row mt-5">
            <div class="col-md-3">
                    <img class="img-news" src="<?php echo $news->urlToImage ?>" alt="News Image">
            </div>
            <div class="col-md-9">
                <h2><?php echo $news->title ?></h2>
                <h5>Description: <?php echo $news->description ?></h5>
                <p>Content: <?php echo $news->content ?> </p>
                <h6>Author: <?php echo $news->author ?></h6>
                <h6>Published: <?php echo $news->publishedAt ?></h6>
            </div>
    </div> 
    <?php 
        }
    ?>
</div>
</body>
</html>