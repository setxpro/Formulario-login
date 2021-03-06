<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="shortcut icon" href="/caminho/favicon.ico"> -->
    <link rel="stylesheet" href="assets/css/form.css">
    <script src="https://kit.fontawesome.com/9fc84ca737.js" crossorigin="anonymous"></script>
    <title>Loguin</title>
</head>
<body>
    <div class="container-form">
        <i class="fas fa-user-tie avatar"></i>
        <form method="POST" class="validator" action="./actions/action_add.php">
            
            <label for="name">
                <i class="fas fa-user icon"></i>
                <input type="text" name="nome" placeholder="Username" data-rules="required|min=2"/>
            </label><br/><br/>

            <label for="email">
                <i class="fas fa-user icon"></i>
                <input type="email" name="email" placeholder="Email" data-rules="required|email"/>
            </label><br/><br/>

            <label for="password">
                <i class="fas fa-lock icon"></i>
                <input type="password" name="senha" placeholder="Password" data-rules="required|min=4"/>
            </label><br/><br/>

            <div class="area-input-check-forget">
                <div class="area-chekbox">
                    <input type="checkbox" class="chek"><p>Remember me</p>
                </div>

                <div class="forget">
                    <a href="index.php">Voltar para login</a>
                </div>
            </div>
            <input type="submit" value="Register" class="button"/>
        </form>
    </div>

    <script src="./assets/js/script.js"></script>
</body>
</html>