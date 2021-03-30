<?php
 require_once ('DBA.php');
 require_once ('ArticleManager.php');
 var_dump($_POST);
 $dba = new DBA();
 $mgt = new ArticleManager($dba->getPDO());
 //$mgt->addArticle($_POST);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Document</title>
    <style>
      .round{
          border-radius : 10%;
      }
    </style>
</head>
<body>
    <div class="container">
    <div class="card mb-3">
    <div class="card-header">
     <h3><?php
         if(!isset($_POST['id']))
           echo 'Ajouter un article';
         else 
           echo 'Modifier un article';
      ?></h3>
    </div>

    <div class="card-body p-3">
    <form action="<?= isset($_POST['id']) ? 'update.php': 'add.php' ?>" method="post">
    <div class="row">

    <div class="form-group col">
      <label for="titre">Titre</label>
      <input type="text" class="form-control" name="titre" id="titre" value = "<?= isset($_POST['titre']) ? $_POST['titre']: '' ?>">
    </div>
    <div class="form-group col">
      <label for="id"></label>
      <input type="hidden" class="form-control" name="id" id="id" value = "<?= isset($_POST['id']) ? $_POST['id']: '' ?>" >
    </div>
    
    </div>
    <div class="row">
    <div class="form-group col">
      <label for="auteur">Auteur</label>
      <input type="text" class="form-control" name="auteur" id="auteur" value = "<?= isset($_POST['auteur']) ? $_POST['auteur']: '' ?>">
    </div>
    <div class="form-group col">
      <label for="date">Date</label>
      <input type="date" class="form-control" name="date" id="date" value = "<?= isset($_POST['date']) ? $_POST['date']: '' ?>">
    </div>
    <div class="form-group col">
      <label for="image">Image</label>
      <select class="form-control" name="image" id="image" value = "<?= isset($_POST['image']) ? $_POST['image']: '' ?>">
        <option value="JPEG" selected = "<?= isset($_POST['image']) && ($_POST['image']== 'JPEG')? 'selected':'' ?>">JPEG</option>
        <option value="PNG" selected = "<?= isset($_POST['image']) && ($_POST['image']== 'PNG') ? 'selected':'' ?>" >PNG</option>
        <option value="BMP" >BMP</option>
      </select>
    </div>
    </div>
    
    <div class="form-group">
    <label for="message">Message</label>
    <textarea class="form-control" name="message" id="message" rows="3">
      <?= isset($_POST['message']) ? $_POST['message']: '' ?>
    </textarea>
    </div>
    <div class="form-group">
    <button type="submit" class="btn btn-primary ">
      <?php
         if(!isset($_POST['id']))
           echo 'ADD';
         else 
           echo 'UPDATE';
      ?>
    </button>
    </div>
    
  </form>
    </div>
    
    </div>
    <div class = "card">
    <div class="card-header">
      <h3>Liste des articles</h3>
    </div>

    <div class="card-body p-3">
    <?php
      $articles = $mgt->getArticles();
      if(!empty($articles)){
        print("<ul class='list-group'>");
        foreach ($articles as $key => $value) {
            echo "<li class = 'list-group-item' >";
            echo "<img class='round' src='https://picsum.photos/64/64'/>";
            echo '<span class="ml-3 mr-3">' . $value['titre'] . '</span>';
            echo '<div class="blockquote-footer">' . "Créé par " . $value['auteur'] . " Le : " . $value['date'] . '</div>';
            
            echo '<span class= "float-right ml-3" >' . '<form action="index.php" method="post">' 
                          . '<input type="hidden" class="form-control" name="id" id="id" value = "' . $value['id'] .'" >' 
                          . '<input type="hidden" class="form-control" name="titre" id="titre" value = "' . $value['titre'] .'" >' 
                          . '<input type="hidden" class="form-control" name="auteur" id="auteur" value = "' . $value['auteur'] .'" >' 
                          . '<input type="hidden" class="form-control" name="date" id="date" value = "' . $value['date'] .'" >' 
                          . '<input type="hidden" class="form-control" name="image" id="image" value = "' . $value['image'] .'" >' 
                          . '<input type="hidden" class="form-control" name="message" id="message" value = "' . $value['message'] .'" >' 
                          . '<button type="submit" class="btn btn-primary">Update</button>' .'</form>' . '</span>';
            echo '<span class="float-right">' . '<form action="delete.php" method="post">' . '<input type="hidden" class="form-control" name="id" id="id" value = "' . $value['id'] .'" >' . '<button type="submit" class="btn btn-danger ">X</button>' .'</form>' . '</span>';
            
            echo "</li>";
        }
        print("</ul>");
      }else {
        print("<p>Aucuns articles</p>");
      }
      
    ?>
    </div>
    
    </div>
    </div>
</body>
</html>


