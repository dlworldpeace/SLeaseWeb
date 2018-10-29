<!DOCTYPE html>

<html>
    <head>
        <title>Slease</title>
        <link rel="stylesheet" href="https://bootswatch.com/4/minty/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="<?php echo base_url(); ?>">Slease</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url(); ?>">Home<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>items">Browse</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo base_url(); ?>about">About</a>
                    </li>
                </ul>
                <form class="form-inline my-2 my-lg-0" action="<?php echo site_url('/items/search') ?>"  method = "post"> 
                    <input class="form-control mr-sm-2" name="searchBy" id="searchBy" type="text" placeholder="Browse by name">
                    <button class="btn btn-secondary my-2 my-sm-0"  type="submit">Search</button>
                </form>
                <a class="btn btn-warning" style="margin-left:10px" href="<?php echo site_url('/auths/logout'); ?>" role="button">Log out</a>
            </div>
        </nav>

        <div class="container">