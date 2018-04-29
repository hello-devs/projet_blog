<?php
class View {
    // Nom du fichierView.php
    protected $file;

    // Titre défini dans le fichierView.php
    protected $title;

    //Position
    protected $office;


    public function __construct($action,$office)
    {
        //Emplacement de la vue en fonction de l'action et de la localisation.
        $this->file = "view/".$office."/". $action . "View.php";
        $this->office = $office;
    }

    //Générer et afficher la vue
    public function generer($donnees)
    {
        //Association des données à la vue
        $content = $this->genererFichier($this->file, $donnees);

        //Integration au template
        $view = $this->genererFichier('view/'.$this->office.'/template.php',array('title' => $this->title, 'content' => $content));

        //Renvoi la vue au navigateur
        echo $view;
    }


    // Générer un fichier vue et renvoie le résultat produit
    private function genererFichier($file, $donnees)
    {
        if (file_exists($file))
        {
            // Rend les éléments du tableau $donnees accessibles dans la vue
            extract($donnees);

            // Integration dans le fichier
            ob_start();

            require $file;

            return ob_get_clean();
        }
        else
        {
            throw new Exception("Fichier '$file' introuvable");
        }
    }
}
