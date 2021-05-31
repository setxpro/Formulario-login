<?php 
    require '../config/config.php';

    $nome = filter_input(INPUT_POST, 'nome');
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha');



    if($nome && $email && $senha) {
        $sql = $db->prepare("SELECT * FROM register WHERE nome = :nome");
        $sql->bindValue(":nome", $nome);
        $sql->execute();

        if ($sql->rowCount() === 0) {

            $options = [
                'cost' => 10,
            ];
            $senhaSegura = password_hash($senha, PASSWORD_DEFAULT,  $options);

            $sql = $db->prepare("INSERT INTO register (nome, email, senha) VALUES (:nome, :email, :senha)");
            $sql->bindValue(":nome", $nome);
            $sql->bindValue(":email", $email);
            $sql->bindValue(":senha", $senhaSegura);
            $sql->execute();

            header("Location: ../index.php");
            exit;

        } else {
            header("Location: ../index.php");
            exit;
        }
     
    } else {
        header("Location: ../index.php");
        exit;
    }

?>