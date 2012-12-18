<?php
    ob_start();
    foreach ($news as $new):
?> 
    <article>
        <header>
            <h1 class="titreNews"><?php echo $new['NEWS_TITRE'] ?></h1>
            <time><?php echo $new['NEWS_DATE'] ?></time>
        </header>
        <p><?php echo $new['NEWS_CONTENU'] ?></p>
        <footer class="categorie">Catégorie : <?php echo $new['CAT_NOM'] ?></footer>
    </article>
    <hr />
<?php
    endforeach;
    $contenu = ob_get_clean();
    require('gabarit.php');
?>
