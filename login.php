<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman login</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card mt-4">
                <div class="card-header text-center">
                    <h5>LOGIN</h5>
                </div>               
                <form action="actionLogin.php" method="post">
                        <div class="card-body">
                        <?php
                        if(isset($_GET['err'])){
                            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">' .
                            $_GET['err'] . '
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                        }
                        ?>
                        <div class="form-floating mb-3">
                            <input type="text" class="input form-control" name="username" placeholder="Username.." />
                            <label for="floatingInput">Username</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" name="password" class="input form-control" placeholder="Masukan password.." /><br>
                            <label for="floatingInput">Password</label>

                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary" type="submit" name="login" value="login">Login</button>
                    </div>
                    </form>
            </div>
        </div>
    </div>
  
   
  
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>