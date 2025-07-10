<?php
class ControllerUser{
    public function oneUserById(int $id){
        $modelUser = new ModelUser();
        $user = $modelUser->getOneUserById($id);
        
        if ($user == null){
            http_response_code(404);
            require './view/404.php';
            exit;
        }

        require 'view/user/one-user.php';
    }

    public function deleteUserById(int $id) {
    $modelUser = new ModelUser();
    $sucesso = $modelUser->deleteUser($id);

    if($sucesso){
        header('Location: /mangatheque/');
    }else{
        $error = 'aucun user supprime';
        http_response_code(400);
    }

    header('Location: /mangatheque/');
    exit;

    }

    public function updateUserById( int $id){
        $modelUser = new ModelUser();
        $user = $modelUser->getOneUserById($id);
        if(!$user){
            http_response_code(404);
        echo "Utilisateur non trouvé.";
        exit;
        }
        require 'view/user/update-user.php';
    }

    public function saveUpdateUserById(int $id){
        $modelUser = new ModelUser();

        $pseudo = $_POST['pseudo'] ?? '';
        $email = filter_var(trim($_POST['email'] ?? ''),FILTER_SANITIZE_EMAIL);
        $password = $_POST['password'] ?? '';
        $created_at = $_POST['created_at'] ?? '';

        $sucess = $modelUser->updateUser($id, $pseudo, $email, $password, $created_at);

        if($sucess){
            header('Location: /mangatheque/');
            exit;
        }else{
            $error = 'aucun user modifie';
            require 'view/user/update-user.php';

        }
    }

}