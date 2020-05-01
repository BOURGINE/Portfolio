<?php
namespace Portfolio\Controller;


class Security
{
    /**
     * déconnecte
     * @Route("/logout", name="index.php?tsk=logout")
     * @return void
     */
    public function logout():void
    {
        $this::clean_php_session();
        $this->view->redirectTo("index.php");
    }

   /*
    * Initialise la session
    */
    public static function init_php_session():bool
    {
        if(!session_id())
        {
            session_start();
            session_regenerate_id();
            return true;
        }
        return false;
    }

    /**
     * 
     */
    public static function clean_php_session():void
    {
        session_unset();
        session_destroy();
    }

    public static function is_logged():bool
    {
        if(isset($_SESSION['pseudo']) && isset($_SESSION['role_user']))
            return true;
        return false;
    }

    /**
     * Check if user is logged and his user_role
     */
    public static function is_admin():bool
    {
        if(Security::is_logged())
            if(isset($_SESSION['role_user']) && ($_SESSION['role_user'])=="ROLE_ADMIN")
                return true;
        return false;
    }

    /**
     * Error 404
     */
    public function error_404():void
    {
        $this->view->render("frontend/errors/404");
    }

    public function contact()
    {
        // On vérifie que la méthode POST est utilisée
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            // On vérifie si le champ "recaptcha-response" contient une valeur
            if(empty($_POST['recaptcha-response']))
            {
                $message="Problème de soumission de google recaptcha.";
                $this->view->render('frontend/home', compact('message'));
            }else{
                // On prépare l'URL
                $url = "https://www.google.com/recaptcha/api/siteverify?secret=".GOOGLE-SECRET-KEY."&response={$_POST['recaptcha-response']}";
        
                // On vérifie si curl est installé
                if(function_exists('curl_version')){
                    $curl = curl_init($url);
                    curl_setopt($curl, CURLOPT_HEADER, false);
                    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($curl, CURLOPT_TIMEOUT, 1);
                    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
                    $response = curl_exec($curl);
                }else{
                    // On utilisera file_get_contents
                    $response = file_get_contents($url);
                }
        
                // On vérifie qu'on a une réponse
                if(empty($response) || is_null($response)){
                    header('Location: index.php');
                }else{
                    $data = json_decode($response);
                    if($data->success){
                        if(
                            isset($_POST['identity']) && !empty($_POST['identity']) &&
                            isset($_POST['subject']) && !empty($_POST['subject']) &&
                            isset($_POST['email']) && !empty($_POST['email']) &&
                            isset($_POST['content']) && !empty($_POST['content'])
                        ){
                            // On nettoie le contenu
                            $expediteur = strip_tags($_POST['identity']);
                            $subject = strip_tags($_POST['subject']);
                            $email = strip_tags($_POST['email']);
                            $msg = htmlspecialchars($_POST['content']);
        
                            // Ici vous traitez vos données
                            $sendIsOk=$this->sendMail($expediteur,$subject,$email,$msg);
                            if($sendIsOk){
                                $message="Votre message a été envoyé avec succès.";
                                  $this->view->render('frontend/home', compact('message'));
                            }
                            else{
                                $message="Désolé votre massage n'a pas pu être envoyé. Essayez à nouveau.";
                                  $this->view->render('frontend/home', compact('message'));
                            }
                            
                        }
                    }else{
                        header('Location: index.php');
                    }
                }
            }
        }else{
            http_response_code(405);
            echo 'Méthode non autorisée';
        }
    }


    private function sendMail($expediteur,$subject,$email,$msg)
    {
        // Déclaration de l'adresse de destination.
        $mail = 'bourgine.fagade@gmail.com'; 

        // On filtre les serveurs qui rencontrent des bugs.
        if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) 
        {$passage_ligne = "\r\n";}
        else
        {$passage_ligne = "\n";}
        //=====Déclaration des messages au format texte et au format HTML.
        $message_txt = $msg;
        $message_html = "<html>
                            <head></head>
                            <body>
                                <b> Contenu du message: </b> 
                                <div>$msg </div>
                            </body>
                        </html>";
        //==========

        //=====Création de la boundary
        $boundary = "-----=".md5(rand());
        //==========

        //=====Définition du sujet.
        $sujet = $subject;
        //=========

        //=====Création du header de l'e-mail.
        $header = "From: \"WeaponsB\"<weaponsb@mail.fr>".$passage_ligne;
        $header.= "Reply-to: \"WeaponsB\" <weaponsb@mail.fr>".$passage_ligne;
        $header.= "MIME-Version: 1.0".$passage_ligne;
        $header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;
        //==========

        //=====Création du message.
        $message = $passage_ligne."--".$boundary.$passage_ligne;
        //=====Ajout du message au format texte.
        $message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
        $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
        $message.= $passage_ligne.$message_txt.$passage_ligne;
        //==========
        $message.= $passage_ligne."--".$boundary.$passage_ligne;
        //=====Ajout du message au format HTML
        $message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
        $message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
        $message.= $passage_ligne.$message_html.$passage_ligne;
        //==========
        $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
        $message.= $passage_ligne."--".$boundary."--".$passage_ligne;
        //==========

        //=====Envoi de l'e-mail.
        $send_response=mail($mail,$sujet,$message,$header);
        if($send_response)
           return true;
        return false;
        //==========
    }
    

}