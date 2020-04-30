<?php

namespace App\Managers;

use App\Config\ConnexionDB;
use App\Models\Article;

class ArticleManager
{

    private $_db = null;

    public function __construct()
    {
        $this->_db = ConnexionDB::getInstance();
    }

    /**
     * Fonction create crée un article dans la DB
     * @param Article $article
     */
    public function create(Article $article)
    {

    }

    /**
     * Fonction findAll récupére tous les articles
     */
    public function findAll()
    {

    }

    /**
     * Fonction findAll récupére un article par son id
     * @param $id
     */
    public function findOneById($id)
    {

    }

    /**
     * Fonction findAll supprime un article par son id
     * @param $id
     */
    public function remove($id)
    {

    }

    /**
     * Fonction findAll modifie un article par son id
     * @param Article $article
     */
    public function update(Article $article)
    {

    }
}