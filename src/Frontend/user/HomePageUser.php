<?php
function asset_url($path)
{
    $base_url = "http://" . $_SERVER['HTTP_HOST'] . "/E-Commerce-Project/";
    return $base_url . $path;
}

function render_section($section_name)
{
    include BASE_PATH . "Frontend/user/HomePage/$section_name.php";
}

include BASE_PATH . 'Frontend/assets/usernavbar.php';


render_section('HP-main-headline');
render_section('HP-Find-Your-Style');
render_section('HP-product-recommend');
render_section('HP-list-product');
render_section('HP-list-Accesories');
render_section('HP-customer-Priority');
render_section('HP-supported-Brand');

include BASE_PATH . 'Frontend/assets/footer.php';
