<?php
require_once 'Controleur/ControleurNews.php';

/**
 * Description of ControleurFrontal
 *
 * @author gcerv
 */
class ControleurFrontal extends Controleur
{
    private $ctrlnews;
    
    public function __construct()
    {
        $this->ctrlnews = new ControleurNews();
    }
    
    public function routerRequete()
    {
        try
        {
            if (isset($_GET['action']))
            {
                if ($_GET['action'] == 'ajoutnews')
                {
                    $this->genererVue('ajoutnews', array());
                }
                elseif(($_GET['action'] == 'inserernews'))
                {
                    $this->ctrlnews->EnregistrerLaNews($_POST['titre'], $_POST['contenu'], $_POST['categorie']);
                }
                else
                {
                    throw new Exception("action non valide");
                }
            }
            else
            {
                $this->ctrlnews->listerNews();
            }
        }
        catch (Exception $ex)
        {
            $this->afficherErreur($ex->getMessage());
        }
    }
}
?>
