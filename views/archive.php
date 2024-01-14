
<?php 
require_once ('../Controller/WikiController.php');
$wikicontroller = new WikiController();
$wikis = $wikicontroller->getAllwikis();
$categories = $wikicontroller->getAllCategories();
$tags = $wikicontroller->getAlltags();
// print_r($tags);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/css/select2.min.css" rel="stylesheet" /> 

  
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        body {
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        header {
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
        }

        .container-fluid {
            display: flex;
            height: 95vh;
        }

        .aside {
            width: 200px;
            background-color: #343a40;
            color: white;
            padding: 20px;
        }

        .content {
            flex: 1;
            padding: 20px;
        }

        aside li a {
            text-decoration: none;
            color: white;
        }

        aside li {
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            transition: .3s;
        }

        aside li:hover {
            background-color: white;
        }

        aside li:hover a {
            color: black;
        }
       
    </style>
</head>

<body>

    <header class="bg-light p-2">
        <div class="container d-flex justify-content-between align-items-center">
            <div>
                <h4>Wiki™</h4>
            </div>

            <div class="dropdown">
                <button class="btn btn-dark dropdown-toggle" type="button"data-bs-toggle="modal" data-bs-target="#exampleModal">
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="../logique/logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </header>

    <div class="container-fluid">
        <aside class="col-md-2 bg-dark text-light p-4 aside">
        <ul class="list-unstyled">
                <li><h5>dashboard</h5></li>
                <li><a href="http://localhost/youwikis/views/Categorie.php">CATEGORIES</a></li>
                <li><a href="http://localhost/youwikis/views/Tag.php">TAGS</a></li>
                
                <li><a href="http://localhost/youwikis/views/archive.php">ARCHIVER</a></li>
                <li><a href="http://localhost/youwikis/views/statistique.php">STATISTIQUES</a></li>
            </ul>
        </aside>
        <div class="container">
            <div class="content">
                <table class="agent table align-middle bg-white">
                    <thead class="bg-light">
                        <tr>
                            <th class="col-8">Title</th>
                            <th class="col-8">Contenu</th>
                            <th class="col-8">Category</th>
                            <th class="col-8">Tags</th>
                            <th class="col-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                  $uniqueArticles = array();
                  foreach ($wikis as $article) :
                    $articleId = $article['id_wiki'];
                    if (!isset($uniqueArticles[$articleId])) {
                      $uniqueArticles[$articleId] = $article;
                      $uniqueArticles[$articleId]['tags'] = array();
                    }
                    $uniqueArticles[$articleId]['tags'][] = $article['nom'];
                  endforeach;
                  ?>
                        <?php 
                        if(!empty($wikis)){
                            foreach ($uniqueArticles as $article) {
                        ?>
                        <tr>
                            <td >
                          <?php echo $article['titre'];?>
                            </td>
                            <td>
                          <?php echo $article['contenu'];?>
                            </td>
                            <td>
                          <?php echo $article['category_name'];?>
                            </td>
                            <td>
                            <?php foreach ($article['tags'] as $tag) : ?>
                          
                          <?php echo $tag; ?>
                        
                      <?php endforeach; ?>
                            </td>
                            <td>
                                <a href="../../youwikis/Helprs/archiveHelprs.php?idwiki=<?php echo $article['id_wiki']; ?>"><button class="btn btn-secondary">Archiver</button></a>
                             
                            </td>
                        </tr>

                        <?php
                        }
                            
                    }else {
                        echo "Vide";
                    }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>    
    </div>

      

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
