<?php
namespace Articles\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Services\DBA;
use Articles\Model\ArticleManager;
use Articles\Model\Article;

class ArticlesController {
    

    public function __construct(){
        
    }
    
    public function index(Request $request){
        $dba = new DBA();
        $mgt = new ArticleManager($dba->getPDO());
        //return new Response(require_once __DIR__.'/../Views/ArticleView.php');
        $response = new Response();
        
        /*$response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE');
        $response->headers->set('Access-Control-Allow-Headers', '*');   */   
        
        $response->setContent(json_encode($mgt->getArticles()));
        return $response;
    }

    public function getArticle(Request $request , $id){
        $dba = new DBA();
        $mgt = new ArticleManager($dba->getPDO());
        //return new Response(require_once __DIR__.'/../Views/ArticleView.php');
        $response = new Response();
        
        /*$response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Methods', 'GET,POST,PUT,DELETE');
        $response->headers->set('Access-Control-Allow-Headers', '*');*/       
        
        $response->setContent(json_encode($mgt->getArticle($id)));
        return $response;
    }

    public function delete(Request $request , $id){
        $dba = new DBA();
        $mgt = new ArticleManager($dba->getPDO());
        //var_dump($request , $id);
        $mgt->deleteArticle($id);
        //header('Location: /articles');
        //return new Response(require_once __DIR__.'/../Views/ArticleView.php');
        $response = new Response();
        /*$response->headers->set('Access-Control-Allow-Origin', '*');
        $response->headers->set('Access-Control-Allow-Methods', 'DELETE');
        $response->headers->set('Access-Control-Allow-Headers', 'AccountKey,x-requested-with, Content-Type, origin, authorization, accept, client-security-token, host, date, cookie, cookie2');       
        */
        $response->setContent(json_encode($mgt->getArticles()));
        return $response;
    }

    public function add(Request $request){
        $dba = new DBA();
        $mgt = new ArticleManager($dba->getPDO());
        $content =  $request->toArray();
        //var_dump($content);
        $article = new Article();
        $article->setTitre($content['titre']);
        $article->setAuteur($content['auteur']);
        $article->setDate($content['date']);
        $article->setImage($content['image']);
        $article->setMessage($content['message']);
        $mgt->addArticle2($article);
        //header('Location: /articles');
        //return new Response(require_once __DIR__.'/../Views/ArticleView.php');
        return new Response(json_encode($mgt->getArticles()));
    }

    public function update(Request $request , $id){
        $dba = new DBA();
        $mgt = new ArticleManager($dba->getPDO());
        $content =  $request->toArray();
        //var_dump($content);
        $article = new Article();
        $article->setTitre($content['titre']);
        $article->setAuteur($content['auteur']);
        $article->setDate($content['date']);
        $article->setImage($content['image']);
        $article->setMessage($content['message']);
        $mgt->updateArticle2($id,$article);
        //header('Location: /articles');
        //return new Response(require_once __DIR__.'/../Views/ArticleView.php');
        return new Response(json_encode($mgt->getArticles()));
    }
}