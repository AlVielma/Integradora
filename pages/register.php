<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
   <!--Css-->
    <link rel="stylesheet" href="../css/index.css">
    <!--Icon-->
    <link rel="icon" href="images/icon.png">
    <title>Pop Ópticos</title>
   
</head>
<body>
    <!--Header-->
    <header class="header">
        <!--Barra navegacion-->
        <nav class="navbar navbar-expand-lg bg-black">
            <div class="container-fluid">
    
                <a class="navbar-brand text-white" href="#">
                    <img src="../images/icon.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top mx-auto">
                    Pop Ópticos
                </a>
            </div>
        </nav>
    </header>

    <div class="container mt-4">
        <div class="row justify-content-center ">
            <div class="col-lg-8 ">
                <div class="border rounded border-light shadow-sm p-4 bg-white">
                    <div class="text-center mb-4">
                        <img src="../images/icon.png" alt="Imagen" class="img-fluid col-6 col-md-4 col-lg-3">
                    </div>
                    <h2 class="mb-4">Nuevo Usuario Pop</h2>
                    <form>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" placeholder="Ingresa tu nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="apellido" placeholder="Ingresa tu apellido" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Correo</label>
                            <input type="email" class="form-control" id="email" placeholder="Ingresa tu correo electrónico" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="password" class="form-label">Contraseña</label>
                            <input type="password" class="form-control" id="password" placeholder="Ingresa tu contraseña" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Confirmar contraseña</label>
                            <input type="password" class="form-control" id="confpassword" placeholder="Confirma tu contraseña" required>
                        </div>
                        <div class="text-center">
                            <a href="#" class="btn btn-light btn-outline-dark">Crear cuenta</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    
    
    
    <!-- Scripts de Bootstrap -->
    <script src="js/bootstrap.bundle.min.js"></script>


</body>

</html>