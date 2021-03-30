<?php
require_once ('DBA.php');
require_once ('ArticleManager.php');
  $dba = new DBA();
  $mgt = new ArticleManager($dba->getPDO());
  
  $mgt->addArticle($_POST);
header('Location: ./index.php');
exit();
?>