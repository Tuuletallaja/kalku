<?php

class UserController {
    
    public function index() {
        
        return view('login');

    }



    public function login() {

        $username = filter_input(INPUT_POST,'username',FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST,'password',FILTER_SANITIZE_STRING);
        $action = filter_input(INPUT_POST,'action',FILTER_SANITIZE_STRING);
        
        
        if (isset($action) && $action =='checkUser') {
            
            if (empty($username)) {
                $error['username'] = 'Username is invalid';
            }
            if (empty($password)) {
                $error['password'] = 'Password is empty';
            }
            
            if (empty($error)) {
                $user = $this->auth($username, $password);

                if ($user) {
                    session_start();
                    $_SESSION['is_admin'] = $user->role;
                    $_SESSION['is_logged_in'] = true;
                    $_SESSION['user'] = $username;
                    
                    return view('index');
                } else {
                    session_destroy();
                    echo 'Username and password did not match';
                }
            }

        }

        
    }

    public function auth($username, $password) {

        global $app;

        $user = $app['database']->getUserByUsername('user', $username);

        
        if (!empty($user)) {

            if ($user->password === $password) {
                
                return $user;
            }
        }
        
        return false;

        //print_r($_SESSION);
        //print_r($_REQUEST);
//        $app['database']->insert('user', [
//            'username' => $username,
//            'password' => sha1($password),
//            'reg_date' => date("Y-m-d H:i:s")
//        ]);

    }

    public function logout() {
        session_destroy();
        header('Location: /');
    }

}