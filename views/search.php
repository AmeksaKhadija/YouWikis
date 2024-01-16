<div id="results">
    <section class="light">
        <?php
        $uniqueArticles = array();
        foreach ($wikis as $article) {
            $articleId = $article[0]['id_wiki'];
            if (!isset($uniqueArticles[$articleId])) {
                $uniqueArticles[$articleId] = $article[0];
                $uniqueArticles[$articleId]['tags'] = array();
            }
            $uniqueArticles[$articleId]['tags'][] = $article[0]['nom'];
        }
        ?>
        <?php if (!empty($uniqueArticles)) : ?>
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
                                <li>
                                    <i></i>
                                    <?php if (isset($article['tags']) && is_array($article['tags'])) : ?>
                                        <?php foreach ($article['tags'] as $tag) : ?>
                                            <?php echo $tag; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
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
