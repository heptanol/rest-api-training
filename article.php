<?php


use App\Managers\ArticleManager;
use App\Models\Article;

require "vendor/autoload.php";

/**
 * URL de l'api: http://localhost/rest-exercice/
 */
$request_method = $_SERVER["REQUEST_METHOD"];

$am = new ArticleManager();


switch($request_method)
{
    case 'GET':
        break;
    case 'POST':

        break;
    case 'PUT':

        break;
    case 'DELETE':
    default:
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}




