<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

  
    <title>Hangar for WP Rocket</title>
  </head>
  <body>
    
  <nav class="navbar navbar-expand-lg  navbar-light bg-light p-4">
    <a class="navbar-brand" href="index.php"><i class="fas fa-rocket"></i> the hangar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

      <form class="form-inline my-4 my-lg-0 w-100 ml-auto" method="get">
        <input name="url" class="form-control mr-sm-4 w-75 ml-auto" type="search" placeholder="URL to test" aria-label="Search" value="<?php echo $url?>">
        <button class="btn btn-dark my-4 my-sm-0" type="submit">Go</button>
      </form>
    </div>
  </nav>

<?php if ($url) : ?>

  <div id="filters" class="filter-button-group">
    <button type="button" class="btn btn-primary btn-sm" data-filter="*">All</button>
    <button type="button" class="btn btn-outline-dark btn-sm" data-filter=".rocket">WP Rocket</button>
    <button type="button" class="btn btn-outline-dark btn-sm" data-filter=".information">Info</button>
    <button type="button" class="btn btn-outline-dark btn-sm" data-filter=".js">JS</button>
    <button type="button" class="btn btn-outline-dark btn-sm" data-filter=".css">CSS</button>
    <button type="button" class="btn btn-outline-dark btn-sm" data-filter=".files">Files</button>
    <button type="button" class="btn btn-outline-dark btn-sm" data-filter=".performance">Performance</button>
  </div>

<?php endif; ?>

  <div class="container-fluid">
    <div class="grid">