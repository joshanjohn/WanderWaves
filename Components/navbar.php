<?php

/**
 * Author: Joshan John, Anna Gromyko, Getrude Langat  
 * This is an reuseable navigation bar 
 * 
 */

 
echo '<nav class="navbar navbar-expand-lg bg-body-tertiary">';
echo '<div class="container-fluid">';
// Navigation title
echo '<a class="navbar-brand" href="#">Wander Waves</a>';
echo '<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">';
echo '<span class="navbar-toggler-icon"></span>';
echo '</button>';
echo '<div class="collapse navbar-collapse" id="navbarSupportedContent">';
echo '<ul class="navbar-nav me-auto mb-2 mb-lg-0">';
echo '<li class="nav-item">';
// home
echo '<a class="nav-link active" aria-current="page" href="#">Home</a>';
echo '</li>';
echo '<li class="nav-item">';
//link
echo '<a class="nav-link" href="#">Link</a>';
echo '</li>';
//drop down section
echo '<li class="nav-item dropdown">';
echo '<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">';
echo 'Dropdown';
echo '</a>';
echo '<ul class="dropdown-menu">';
echo '<li><a class="dropdown-item" href="#">Action</a></li>';
echo '<li><a class="dropdown-item" href="#">Another action</a></li>';
echo '<li><hr class="dropdown-divider"></li>';
echo '<li><a class="dropdown-item" href="#">Something else here</a></li>';
echo '</ul>';
echo '</li>';
echo '</ul>';

//search
echo '<form class="d-flex" role="search">';
echo '<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">';
echo '<button class="btn btn-outline-success" type="submit">Search</button>';
echo '</form>';
echo '</div>';
echo '</div>';
echo '</nav>';
?>