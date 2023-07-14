<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar sesión - Administrador</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    body {
      background: linear-gradient(aqua, white);
    }

    .login-container {
      margin-top: 100px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      padding: 30px;
      text-align: center;
    }

    .login-container h3 {
      margin-bottom: 30px;
    }

    .login-container .form-group {
      margin-bottom: 20px;
    }

    .login-container .form-group label {
      font-weight: bold;
    }

    .login-container .form-group input {
      border-radius: 5px;
    }

    .login-container .form-group input:focus {
      box-shadow: none;
    }

    .login-container .btn-primary {
      border-radius: 5px;
      width: 100%;
    }

    .login-container .text-center {
      margin-top: 20px;
    }

    .login-container img {
      border-radius: 50%;
      width: 150px;
      height: 150px;
      object-fit: cover;
      object-position: center;
      margin-bottom: 20px;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6 login-container">
        <img src="../img/descarga.png" alt="Logo" class="img-fluid">
        <h3>Iniciar sesión</h3>
        <form action="/app/agenda.php" method="POST">
          <div class="form-group">
            <label for="username">Correo</label>
            <input type="text" class="form-control" id="username" name="username" required>
          </div>
          <div class="form-group">
            <label for="password">Contraseña:</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <button type="submit" class="btn btn-primary">Iniciar sesión</button>
        </form>
        <div class="text-center">
          <a href="#">¿Olvidaste tu contraseña?</a>
        </div>
      </div>
    </div>
  </div>
</body>

</html>


