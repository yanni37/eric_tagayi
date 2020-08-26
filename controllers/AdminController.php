<?php


class AdminController extends Controller{

    public function __construct()
    {

        $session = new Session();
        if (!$session->isLogged())
        {
            $this->redirectTo("user", "login");
        }
    }

    // affichage du back_office de l'administrateur
    public function index()
    {

        // récupération de la liste de tous les soins
        $soins = Soin::getAllSoins();

        //afficher la vue
        $this->render("admin/dashboard",
            ['soins' => $soins] // transmission de données du contrôleur à la vue
            );
    }


    // ajouter un nouveau soin
    public function ajouter()
    {
        $categories = Category::getAllCategories();
        if(isset($_POST['titre']))
        {
            
            // récupération et insertion de l'image
            if($image = $this->uploadImage("public".DIRECTORY_SEPARATOR."img".DIRECTORY_SEPARATOR."soins".DIRECTORY_SEPARATOR, "image"))
            {
                // création d'un nouvel objet de type soin
                $soin = new Soin();

                // remplissage de l'objet
                $soin->setTitre($_POST['titre']);
                $soin->setCategory($_POST['category']);
                $soin->setContenu($_POST['contenu']);
                $soin->setImage($image);

                // essai de faire l'insertion
                try {
                    $soin->insert();
                } catch (Exception $e) {
                    // affichage d'exception en cas d'échec
                    die($e->getMessage());
                }

            }

        }
        // afficher la vue (formulaire d'ajout)
        $this->render("admin/add_soin", ['categories' => $categories]);
    }

    // suppression d'un soin
    public function deleteSoin()
    {
        if(isset($_GET['id']))
        {
            // récupération d'un soin
            $soin = Soin::getOne($_GET['id']);

            // vérification s'il existe un soin avec l'id fourni
            if($soin)
            {
                // essayer de faire la suppression du soin de la BDD
                try {
                    $soin->delete();
                } catch (Exception $e) {
                    // récupération de l'exeption en cas d'échec
                    die($e->getMessage());
                }

                // suppression de l'image associé
                if(file_exists("public".DIRECTORY_SEPARATOR."img".DIRECTORY_SEPARATOR."soins".DIRECTORY_SEPARATOR.$soin->getImage()))
                {
                    unlink("public".DIRECTORY_SEPARATOR."img".DIRECTORY_SEPARATOR."soins".DIRECTORY_SEPARATOR.$soin->getImage());
                }
            }
        }
        // redirection vers le back-office admin
       $this->redirectTo("admin");
    }

    public function editSoin()
    {
        $categories = Category::getAllCategories();
        if(isset($_GET['id']))
        {
            // récupérer les détails d'un soin en format objet
            $soin = Soin::getOne($_GET['id']);

            // si le formulaire a été validé
            if (isset($_POST['titre']))
            {

                $soin->setTitre($_POST['titre']);
                $soin->setCategory($_POST['category']);
                $soin->setContenu($_POST['contenu']);

                // si on veut modifier l'image
                if($image = $this->uploadImage("public".DIRECTORY_SEPARATOR."img".DIRECTORY_SEPARATOR."soins".DIRECTORY_SEPARATOR, "image"))
                {
                    // vérifier l'existance du fichier
                    if(file_exists("public".DIRECTORY_SEPARATOR."img".DIRECTORY_SEPARATOR."soins".DIRECTORY_SEPARATOR.$soin->getImage()))
                    {
                        // supprimer l'ancienne image
                        unlink("public".DIRECTORY_SEPARATOR."img".DIRECTORY_SEPARATOR."soins".DIRECTORY_SEPARATOR.$soin->getImage());
                    }
                    $soin->setImage($image);

                }
                // appliquer la modification
                $soin->edit();
            }


            $this->render("admin/edit_soin", [
                "soin" => $soin, // transmission de données du contrôleur à la vue
                "categories" => $categories
            ]);
            exit();
        }

        // renvoi vers le dashboard si l'id du soin n'existe pas dans l'url
        $this->redirectTo("admin");
    }

    // récupérer tous les messages
    public function messages()
    {
        $messages = Contact::getAll();

        $this->render('admin/messages',
            ['messages' => $messages]
            );
    }

    public function afficherMessage()
    {
        if(isset($_GET['id'])){
            $message = Contact::getOne($_GET['id']);

            $this->render("admin/show_message", ['message' => $message]);
        }else{
            $this->redirectTo("admin");
        }
    }

    public function supprimerMessage()
    {
        if(isset($_GET['id']))
        {
            // récupération d'un message
            $message = Contact::getOne($_GET['id']);

            // vérification s'il existe un message avec l'id fourni
            if($message)
            {
                // essayer de faire la suppression du message de la BDD
                try {
                    $message->delete();
                } catch (Exception $e) {
                    // récupération de l'exeption en cas d'échec
                    die($e->getMessage());
                }

            }
        }
        // redirection vers le back-office admin
        $this->redirectTo("admin", "messages");
    }
}