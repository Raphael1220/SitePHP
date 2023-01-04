<?php

$recherche_page = filter_input(INPUT_GET, 'page', FILTER_DEFAULT);

switch ($recherche_page) {
    case "header":
        include("pages/header.php");
        break;
    case "footer":
        include("pages/footer.php");
        break;
    case "nomdelapage":
        include("pages/nomdelapage.php");
        break;
    case "contact":
        include("pages/contact.php");
        break;
    default:
        include("pages/notfound.php");
}