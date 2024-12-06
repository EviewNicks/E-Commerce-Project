<?php
function asset_url($path)
{
    $base_url = "http://" . $_SERVER['HTTP_HOST'] . "/E-Commerce-Project/";
    return $base_url . $path;
}




include BASE_PATH . 'Frontend/assets/usernavbar.php';
function render_section($section_name)
{
    include BASE_PATH . "Frontend/user/HomePage/$section_name.php";
}

render_section('HP-main-headline');
render_section('HP-Find-Your-Style');

render_section('HP-product-recommend');
render_section('HP-list-product');
render_section('HP-list-Accesories');
render_section('HP-customer-Priority');
render_section('HP-supported-Brand');
render_section('HP-Footer');
