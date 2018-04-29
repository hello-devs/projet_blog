<?php

class ControllerRouter
{
    protected $ctrlFrontEnd, $ctrlBackEnd;

    public function __construct()
    {
        $this->ctrlFrontEnd = new ControllerFrontEnd();
        $this->ctrlBackEnd = new ControllerBackEnd();
    }


    public function routerRequete()
    {
        try
        {
            if (isset($_GET['action']))
            {
                if ($_GET['action'] == 'listPosts')
                {
                    $this->ctrlFrontEnd->listPosts();
                }
                elseif ($_GET['action'] == 'post')
                {
                    if (isset($_GET['id']) && $_GET['id'] > 0)
                    {
                        $this->ctrlFrontEnd->post($_GET['id']);
                    }
                    else
                    {
                        // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                        throw new Exception('Aucun identifiant de billet envoyé');
                    }
                }
                elseif ($_GET['action'] == 'addComment')
                {
                    if (isset($_GET['id']) && $_GET['id'] > 0)
                    {
                        if (!empty($_POST['author']) && !empty($_POST['comment']))
                        {
                            $this->ctrlFrontEnd->addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                        }
                        else
                        {
                            // Autre exception
                            throw new Exception('Tous les champs ne sont pas remplis !');
                        }
                    }
                    else
                    {
                        // Autre exception
                        throw new Exception('Aucun identifiant de billet envoyé');
                    }
                }
                elseif ($_GET['action'] == 'signalCom')
                {
                    if (isset($_GET['id']) && $_GET['id'] > 0 && isset($_GET['postId']) && $_GET['postId'] > 0)
                    {
                        //
                        $this->ctrlFrontEnd->signalComment($_GET['id'],$_GET['postId']);
                    }
                    else
                    {
                        // Autre exception
                        throw new Exception('Aucun identifiant de commentaire envoyé');
                    }
                }
                elseif ($_GET['action'] == 'bio')
                {
                    //
                    $this->ctrlFrontEnd->bio();
                }
                elseif ($_GET['action'] == 'contact')
                {
                    if(isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['message']) && isset($_POST['email']))
                    {
                        $this->ctrlFrontEnd->sendMail();
                    }
                    else
                    {
                        $this->ctrlFrontEnd->contact();
                    }
                }


        /////////////////////////////////////////////Admin

                elseif($_SESSION['authentified'] != true)
                {
                    if ($_GET['action'] == 'adminConnect')
                    {
                        $this->ctrlFrontEnd->connectManagerBlog();
                    }
                    elseif($_GET['action'] == 'verifUserAuth')
                    {
                        if(isset($_POST['logName']) && isset($_POST['pwd']))
                        {
                            $this->ctrlBackEnd->verifUserAuth($_POST['logName'],$_POST['pwd']);
                        }
                        else
                        {
                            throw new ExceptionBack('Identifiants ou mot de passe non conforme!');
                        }
                    }
                    else
                    {
                        $this->ctrlFrontEnd->listPosts();
                    }
                }

                elseif($_SESSION['authentified'] == true)
                {
                    if ($_GET['action'] == 'manageBlog')  //Tableau de bord de l'admin
                    {
                        $this->ctrlBackEnd->manageBlog();
                    }


                    ///////////////////////////////////////////***Commentaires

                    elseif ($_GET['action'] == 'manageComs')  //Gestion de tous les commentaires
                    {
                        $this->ctrlBackEnd->manageComs();
                    }
                    elseif ($_GET['action'] == 'validCom')   //Validation d'un commentaire
                    {
                         if (isset($_GET['id']) && $_GET['id'] > 0)
                        {
                            $this->ctrlBackEnd->validCom($_GET['id']);
                        }
                        else
                        {
                            // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                            throw new ExceptionBack('Aucun identifiant de commentaire envoyé');
                        }

                    }
                    elseif ($_GET['action'] == 'deleteCom')  //Suppression d'un commentaire
                    {
                         if (isset($_GET['id']) && $_GET['id'] > 0)
                        {
                            $this->ctrlBackEnd->deleteCom($_GET['id']);
                        }
                        else
                        {
                            // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                            throw new ExceptionBack('Aucun identifiant de commentaire envoyé');
                        }
                    }


                    //////////////////////////////////////////***Articles

                    elseif ($_GET['action'] == 'manageArticles')   //Gestion de tous les articles
                    {
                        $this->ctrlBackEnd->managePosts();
                    }
                    elseif ($_GET['action'] == 'createArticle')    //Création d'un article
                    {
                        if(isset($_POST['titre']) AND isset($_POST['contenu']))
                        {
                            $this->ctrlBackEnd->ajouterPost();  //Ajout à la bdd
                        }
                        else
                        {
                            $this->ctrlBackEnd->createArticle();   //Rédaction de l'article
                        }
                    }


                    elseif ($_GET['action'] == 'managePost')     //Gestion d'un article
                    {
                        if (isset($_GET['id']) && $_GET['id'] > 0)
                        {
                            $this->ctrlBackEnd->managePost($_GET['id']);
                        }
                        else
                        {
                            // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                            throw new ExceptionBack('Aucun identifiant d\'article envoyé');
                        }
                    }
                    elseif ($_GET['action'] == 'editPost')     //Edition d'un article
                    {
                        if (isset($_GET['id']) && $_GET['id'] > 0)
                        {
                            if(!empty($_POST['titre']) AND !empty($_POST['contenu']))
                            {
                                $this->ctrlBackEnd->editPost($_GET['id']);  //Maj du post
                            }
                            else
                            {
                                throw new ExceptionBack('Le champ "Titre de l\'article" et son contenu ne peuvent être vide');
                            }

                        }
                        else
                        {
                            // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                            throw new ExceptionBack('Aucun identifiant d\'article envoyé');
                        }
                    }
                    elseif ($_GET['action'] == 'deletePost')     //Suppression de l'article
                    {
                        if (isset($_GET['id']) && $_GET['id'] > 0)
                        {
                            $this->ctrlBackEnd->deletePost($_GET['id']);
                        }
                        else
                        {
                            // Autre exception
                            throw new ExceptionBack('Aucun identifiant de billet envoyé');
                        }
                    }
                    elseif ($_GET['action'] == 'changerEtatPost')
                    {
                        if (isset($_GET['id']) && $_GET['id'] > 0)
                        {

                            if (isset($_GET['etat']))
                            {
                                if($_GET['etat']=='publié' || $_GET['etat']=='brouillon')
                                {
                                    $this->ctrlBackEnd->changerEtatPost($_GET['id'],$_GET['etat']);  //Maj du status
                                }
                                else
                                {
                                    throw new ExceptionBack('Cet état ne convient pas a un article');
                                }
                            }
                            else
                            {
                                // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                                throw new ExceptionBack('Aucun état d\'article envoyé');
                            }
                        }
                        else
                        {
                            // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                            throw new ExceptionBack('Aucun identifiant d\'article envoyé');
                        }
                    }
                    elseif($_GET['action'] == 'decoAdmin')
                    {
                        $this->ctrlBackEnd->decoAdmin();
                    }
                    else
                    {
                        $this->ctrlBackEnd->manageBlog();
                    }
                }
        /////////////////////////////////////////////Fin Admin
            }
            else
            {
                $this->ctrlFrontEnd->listPosts();
            }
        }
        /////////////////////////////////////////////Erreurs
        //Affichage des erreurs du backend
        catch(ExceptionBack $e)  // S'il y a eu une erreur, alors...
        {
            $errorMessage = $e;
            $view = new View('error','backend');
            $view->generer(['errorMessage' => $errorMessage]);
        }
        //Affichage des erreurs du frontend
        catch(Exception $e)  // S'il y a eu une erreur, alors...
        {
            $errorMessage = $e->getMessage();
            $view = new View('error','frontend');
            $view->generer(['errorMessage' => $errorMessage]);
        }


    }

}
