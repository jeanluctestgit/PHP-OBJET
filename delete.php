<?php
require_once ('DBA.php');
require_once ('ArticleManager.php');
  $dba = new DBA();
  $mgt = new ArticleManager($dba->getPDO());
  
  $mgt->deleteArticle($_POST['id']);
header('Location: ./index.php');
exit();
?>