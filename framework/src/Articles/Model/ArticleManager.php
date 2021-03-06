<?php
namespace Articles\Model;
class ArticleManager {
    private  $_db;
    public function __construct( $db) {
        $this->setDb($db);
    }
    public function setDb( $db) {
        $this->_db = $db;
    }

    public function addArticle(array $article){
        $_article = new Article($article);
        $ADD_ARTICLE = $this->_db->prepare(
            'INSERT INTO poo.article SET titre=:titre, auteur=:auteur, date=:date, image=:image, message=:message'
        );

        $ADD_ARTICLE->bindValue(':titre', $_article->getTitre());
        $ADD_ARTICLE->bindValue(':auteur', $_article->getAuteur());
        $ADD_ARTICLE->bindValue(':image', $_article->getImage());
        $ADD_ARTICLE->bindValue(':message', $_article->getMessage());
        $ADD_ARTICLE->bindValue(':date', $_article->getDate());

        $ADD_ARTICLE->execute();
        
    }

    public function addArticle2(Article $article){
        $ADD_ARTICLE = $this->_db->prepare(
            'INSERT INTO poo.article SET titre=:titre, auteur=:auteur, date=:date, image=:image, message=:message'
        );

        $ADD_ARTICLE->bindValue(':titre', $article->getTitre());
        $ADD_ARTICLE->bindValue(':auteur', $article->getAuteur());
        $ADD_ARTICLE->bindValue(':image', $article->getImage());
        $ADD_ARTICLE->bindValue(':message', $article->getMessage());
        $ADD_ARTICLE->bindValue(':date', $article->getDate());

        $ADD_ARTICLE->execute();
        
    }

    public function getArticles(){
        $sql = "SELECT * FROM article";
        $stmt= $this->_db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getArticle($id){
        $sql = "SELECT * FROM article WHERE id=:id";
        $stmt= $this->_db->prepare($sql);

        $stmt->bindValue(':id', $id);

        $stmt->execute();
        return $stmt->fetch();
    }

    public function deleteArticle($id){
        $sql = "DELETE FROM article WHERE id=:id";
        $stmt= $this->_db->prepare($sql);

        $stmt->bindValue(':id', $id);

        $stmt->execute();

    }

    public function updateArticle($id , array $article){
        $_article = new Article($article);
        $sql = "UPDATE article SET titre=:titre, auteur=:auteur, date=:date, image=:image, message=:message  WHERE id=:id";
        $stmt= $this->_db->prepare($sql);

        $stmt->bindValue(':id', $id);

        $stmt->bindValue(':titre', $_article->getTitre());
        $stmt->bindValue(':auteur', $_article->getAuteur());
        $stmt->bindValue(':image', $_article->getImage());
        $stmt->bindValue(':message', $_article->getMessage());
        $stmt->bindValue(':date', $_article->getDate());

        $stmt->execute();

    }

    public function updateArticle2($id , Article $article){
        
        $sql = "UPDATE article SET titre=:titre, auteur=:auteur, date=:date, image=:image, message=:message  WHERE id=:id";
        $stmt= $this->_db->prepare($sql);

        $stmt->bindValue(':id', $id);

        $stmt->bindValue(':titre', $article->getTitre());
        $stmt->bindValue(':auteur', $article->getAuteur());
        $stmt->bindValue(':image', $article->getImage());
        $stmt->bindValue(':message', $article->getMessage());
        $stmt->bindValue(':date', $article->getDate());

        $stmt->execute();

    }

    
    
}
