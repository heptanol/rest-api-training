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
        try {
            $req = $this->_db->prepare('INSERT INTO article (id, libelle, prix, quantite) VALUES (:id, :libelle, :prix, :quantite)');
            $req->bindValue(':id', $article->getId(), \PDO::PARAM_STR);
            $req->bindValue(':libelle', $article->getLibelle(), \PDO::PARAM_STR);
            $req->bindValue(':prix', $article->getPrix(), \PDO::PARAM_STR);
            $req->bindValue(':quantite', $article->getQuantite(), \PDO::PARAM_STR);
            if ($req->execute()) {
                $article->setId($this->_db->lastInsertId());
                return $article;
            }
        } catch (\PDOException $e) {
            throw $e;
        }
        throw new \Exception();
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
        try {
            $req = $this->_db->prepare('DELETE FROM article WHERE id = :id');
            $req->bindValue(':id', $id, \PDO::PARAM_INT);
            return $req->execute();
        } catch (\PDOException $e) {
            throw $e;
        }
    }

    /**
     * Fonction findAll modifie un article par son id
     * @param Article $article
     */
    public function update(Article $article)
    {
        try {
            $req = $this->_db->prepare('UPDATE article SET libelle = :libelle, prix = :prix,  quantite = :quantite  WHERE id = :id');
            $req->bindValue(':id', $article->getId(), \PDO::PARAM_STR);
            $req->bindValue(':libelle', $article->getLibelle(), \PDO::PARAM_STR);
            $req->bindValue(':prix', $article->getPrix(), \PDO::PARAM_STR);
            $req->bindValue(':quantite', $article->getQuantite(), \PDO::PARAM_STR);
            if ($req->execute()) {
                return $article;
            }
        } catch (\PDOException $e) {
            throw $e;
        }
        return null;
    }

}