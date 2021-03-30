<?php
  require_once ('DBA.php');
  require_once ('ArticleManager.php');
    $dba = new DBA();
    $mgt = new ArticleManager($dba->getPDO());
    var_dump($_POST);
    if(isset($_POST) && isset($_POST['id'])){
        
        $mgt->updateArticle($_POST['id'],$_POST);
        header('Location: ./index.php');
exit();
    }
     
  
?>

