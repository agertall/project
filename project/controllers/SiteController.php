<?php
use components;
class IndexController 
{

     //Экшен профиля
     //если не авторизован - рендерим форму авторизации

    public function indexAction()
    {
        if ($this->auth->isAuth()) {
            $this->view->set('user', $this->auth->getUser());
            $this->view->render('index.php', true);
            
        }
    }

    //  авторизация 
    public function loginAction()
    {
        if (isset($_POST['password']) and isset($_POST['email'])) {
            $login = trim($_POST['email']);
            $password = md5(trim($_POST['password']));

            if ($this->auth->doAuth($login, $password)) {
                // если авторизация прошла редиректим на главную
                header('Location: /');
            } else {
                $this->view->set('error', $_SESSION['error']);
                unset($_SESSION['error']);
            }

        }
        $this->view->render('login.php', true);
    }

    /**
     * Экшен выхода пользователя из профиля
     */
    public function logoutAction()
    {
        $this->auth->out();
        header('Location: /');
    }
    /**
     * Экшен регистрации
     */
    public function registrationAction()
    {
        $errors = array();

        if (isset($_POST['password']) or isset($_POST['email'])) {
            $name = trim($_POST['name']);
            $surname = trim($_POST['surname']);
            $login = trim($_POST['email']);
            $password = trim($_POST['password']);
            
            //Валидация почты 
            $mail_pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
            if(!preg_match($mail_pattern, $login)){
                $errors['email'] = _("Please enter a valid email address.");
            }

            $min_message = _("Please enter no more than {0} characters.");
            $max_message = _("Please enter at least {0} characters.");

            // Валидация имени и фамилии
            $name_length = mb_strlen($name);
            if($name_length < 3){
                $errors['name'] = str_replace('{0}', 3, $max_message);
            }
            if($name_length > 15){
                $errors['name'] = str_replace('{0}', 15, $min_message);
            }

            $surname_length = mb_strlen($surname);
            if($surname_length < 5){
                $errors['surname'] = str_replace('{0}', 5, $max_message);
            }
            if($name_length > 15){
                $errors['surname'] = str_replace('{0}', 15, $min_message);
            }


            // Валидация пароля
            $pas_length = mb_strlen($password);
            if($pas_length < 3){
                $errors['password'] = str_replace('{0}', 3, $max_message);
            }
            if($pas_length > 15){
                $errors['password'] = str_replace('{0}', 15, $min_message);
            }
        }
    }
}
?>