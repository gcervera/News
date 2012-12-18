<?php

require_once 'Modele/Modele.php';

/**
 * Description of ModeleNews
 *
 * @author gcerv
 */
class ModeleNews extends modele
{
    public function lireTout()
    {
        $requete = "SELECT * FROM t_news tn JOIN t_categorie tc ON tn.CAT_ID = tc.CAT_ID ORDER BY NEWS_ID desc";
        return $this->executerLecture($requete);
    }
    public function EnregistrerNews($titre, $contenu, $categorie)
    {
        // addslashes ajoute des \ devant les ', les "" et les \
        $titre = addslashes($_POST['titre']);
        $contenu = addslashes($_POST['contenu']);
        $date = date(DATE_W3C);
        $requete = "select CAT_ID from T_CATEGORIE where CAT_NOM='$categorie'";
        $resultatRequete = $this->executerLecture($requete, TRUE);
        $idCategorie = $resultatRequete["CAT_ID"];
        
        $requete = "INSERT INTO t_news(NEWS_DATE,NEWS_TITRE,NEWS_CONTENU,CAT_ID) values('$date','$titre','$contenu ','$idCategorie');";
        $this->exectuerInsertion($requete);
    }
}

?>
