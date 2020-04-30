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
    public function save(Article $article)
    {
    }

    /**
     * Fonction findAll récupére tous les articles
     */
    public function findAll()
    {
        try {
            $articles = [];
            $req = $this->_db->query('SELECT * FROM article');
            while ($res = $req->fetch(\PDO::FETCH_ASSOC)) {
                $articles[] = new Article($res);
            }
            return $articles;
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    /**
     * Fonction findAll récupére un article par son id
     * @param $id
     */
    public function findOneById($id)
    {
        try {
            $req = $this->_db->prepare('SELECT * FROM article WHERE id = :id');
            $req->bindValue(':id', $id, \PDO::PARAM_INT);
            if ($req->execute()) {
                return new Article($req->fetch(\PDO::FETCH_ASSOC));
            }
        } catch (\PDOException $e) {
            throw $e;
        }
        throw new \Exception();
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