<?php


class UserController extends Controller
{



   public function login()
    {
        $error = NULL;

        if(isset($_POST['mail']))
        {
            $user = User::getByMail($_POST['mail']);
            if ($user)
            {
                if (password_verify($_POST['password'], $user->getPassword()))
                {
                    $session = new Session();
                    $session->login();

                    $this->redirectTo("admin");
                }else{
                    $error = "mot de passe erroné";
                }
            }else{
                $error = "Cette adresse email n'existe pas";
            }
        }

        $this->render("front/login", ["error" => $error]);

    }

    public function logout() {
        $session = new Session();
        $session->logout();

        $this->redirectTo("front");
    }


    public function editProfile(){
        if($u = User::getById(1))
        {
            if(isset($_POST["mail"]) && isset($_POST["password"]) && isset($_POST["valider"]))
            {
                
                $u->setMail($_POST["mail"]);
                $u->setPassword($_POST["password"]);
            $verif = $u->verif();
            
            if ($verif)
            {
                $u->edit();
                $this->redirectTo("user","index");
    
            }else echo "Remplis toutes les cases ma biche";
                
            }
            $this->render("admin/edit_profile");
        } else {
            $this->render('front/index');
        }
        
    }

}