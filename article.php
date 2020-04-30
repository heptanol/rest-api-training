<?php

use App\Managers\ArticleManager;
use App\Models\Article;

require 'vendor/autoload.php';

/**
 * URL de l'api: http://localhost/rest-api-training/article
 * récupérer tous les articles GET http://localhost/rest-api-training/article
 * récupérer un article ?
 * créer un article ?
 * modifier un article ?
 * supprimer un article ?
 */
$request_method = $_SERVER['REQUEST_METHOD'];

$am = new ArticleManager();

switch($request_method)
{
    case 'GET':
        if(!empty($_GET['id']))
        {
            // Récupérer un seul produit
            $id = intval($_GET['id']);
            $response = $am->findOneById($id);
        }
        else {
            // Récupérer tous les produits
            $response = $am->findAll();
        }

        break;
    case 'POST':
        break;
    case 'PUT':
        break;
    case 'DELETE':
        break;
    default:
        header('HTTP/1.0 405 Method Not Allowed');
        break;
}

header('Content-Type: application/json');
if (isset($response)) {
    echo json_encode($response);
}







