
<?php 
require_once ('../Controller/WikiController.php');
$wikicontroller = new WikiController();
$wikis = $wikicontroller->getAllwikisNonarchives();
$categories = $wikicontroller->getAllCategories();
$tags = $wikicontroller->getAlltags();
// print_r($tags);

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        JobEase
    </title>

    <link rel="stylesheet" href="../Assets/styles/homestyle.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <header>


        <nav class="navbar navbar-expand-md navbar-dark">
            <div class="container">
                <!-- Brand/logo -->
                <a class="navbar-brand" href="#">
                    <i class="fas fa-code"></i>
                    <h1>Wiki™</h1>
                </a>

                <!-- Toggler/collapsibe Button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar links -->
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Features</a>
                        </li>
                            <li class="nav-item">
                                <a class="nav-link" href="?route=notification">Notifications</a>

                            </li>
                            
                        <li class="nav-link ">
                            <div class="dropdown">
                                <a class=" dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    Language
                                </a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="?lang=fr">FR</a>
                                    <a class="dropdown-item" href="?lang=en">EN</a>
                                </div>
                            </div>
                        </li>

                        <span class="nav-item active">
                            <a class="nav-link" href="#">EN</a>
                        </span>
                        <li class="nav-item">
                            <a href="http://localhost/youwikis/views/register.php" class="nav-link" href="?route=logout">Register</a>
                            <a href="http://localhost/youwikis/views/login.php" class="nav-link" href="?route=login">Login</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <section class="search">
    <form class="form-inline" method="post" onsubmit="event.preventDefault(); filterwiki();">
            <div class="form-group mb-2">
                <input type="text" id="title" placeholder="title">
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <input type="text" id="categorie" placeholder="categorie">
            </div>
            <div class="form-group mx-sm-3 mb-2">
                <input type="text" id="tag" placeholder="tag">
            </div>
            <a href="?route=search">
                <button type="submit" class="btn btn-primary mb-2">
                   chercher
                </button>
            </a>


        </form>
    </section>
  
    <div id="results">
        <section class="light">
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
            <?php if (!empty($wikis)) : ?>
             <?php foreach ($uniqueArticles as $article) : ?>
                <div class="container py-2">
                    <article class="postcard light green">
                        <a class="postcard__img_link" href="#">
                            <img class="postcard__img" src="../Assets/images/wiki.png" alt="Image Title" />
                        </a>
                        <div class="postcard__text t-dark">
                            <h3 class="postcard__title green">
                                <a href="#">
                                    <?php echo $article['titre']; ?>
                                </a>
                            </h3>
                            <div class="postcard__subtitle small">
                                <time datetime="2020-05-25 12:00:00">
                                    <i class="fas fa-calendar-alt mr-2"></i>
                                    <?php echo $article['category_name']; ?>
                                </time>
                            </div>
                            <div class="postcard__bar"></div>
                            <div class="postcard__preview-txt">
                                <?php echo $article['contenu']; ?>
                            </div>
                            <ul class="postcard__tagbox">
                                <p>Tags :</p> 
                                <li class="tag__item">
                                    <i class="fas fa-tag"></i>
                                    <?php foreach ($article['tags'] as $tag) : ?>
                                        <?php echo $tag; ?>
                                    <?php endforeach; ?>
                                    
                                </li>
                               
                            </ul>
                        </div>
                    </article>
                </div>
            <?php endforeach; ?>
            
            <?php else : ?>
             <p>Aucun wiki disponible.</p>
            <?php endif; ?>
        </section>
    </div>

    <footer>
        <p>© 2023 Wiki™ </p>
    </footer>

    <script>
        	
		function filterwiki() {
    let title = document.getElementById('title').value;
    let categorie = document.getElementById('categorie').value;
    let tag = document.getElementById('tag').value;
    let results = document.getElementById("results");

    let data = {};

    if (title.trim() !== '') {
        data.title = title;
    }

    if (categorie.trim() !== '') {
        data.categorie = categorie;
    }

    if (tag.trim() !== '') {
        data.tag = tag;
    }

    if (Object.keys(data).length === 0) {
        window.location.href = "../views/home.php";
        return;
    }

    $.ajax({
        method: "POST",
        url: "../Helprs/searchHelprs.php",
        data: data,
        success: function (response) {
            results.innerHTML = response;
        },
        error: function (error) {
            alert("La recherche n'a pas fonctionné.");
        },
    });

    return false;
}





(function () {
    $.ajax({
        method: "GET",
        url: "../Helprs/searchHelprs.php",
        data: {},
        success: function (response) {
            console.log("the response is :", response);

        },
        error: function () {
            alert("it doesn't work");
        },
    });
})();
    </script>
</body>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

<script src="/assets/js/script.js"></script>

</html>