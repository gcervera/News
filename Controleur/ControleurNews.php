<?php
require_once 'Controleur/Controleur.php';
require_once 'Modele/ModeleNews.php';

/**
 * Description of ControleurNews
 *
 * @author gcerv
 */
class ControleurNews extends Controleur
{
    private $modeleNews;
    
    public function __construct()
    {
        $this->modeleNews = new ModeleNews();
    }
    
    public function listerNews()
    {
        $news = $this->modeleNews->lireTout();
        $this->genererVue('listenews', array('news' => $news));
    }
    
    public function EnregistrerLaNews($titre, $contenu, $categorie)
    {
        $this->modeleNews->EnregistrerNews($titre, $contenu, $categorie);
        $news = $this->modeleNews->lireTout();
        $this->genererVue('listenews', array('news' => $news));
    }
}

?>
