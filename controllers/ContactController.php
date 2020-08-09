<?php


class ContactController extends Controller {
    
    public function addContact(){

        if(isset($_POST['email'])) {
            $contact = new Contact();

            $contact->setEmail($_POST['email']);
            $contact->setContenue($_POST['contenue']);
            $contact->setSujet($_POST['sujet']);

            $contact->add();
            header('Content-Type: application/json');
            echo json_encode(["result" => 'success']);
            exit;
        }
        $this->render('front/contact');

    }


}