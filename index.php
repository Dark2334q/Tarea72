<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login | SYSTEM GEST CORPORACION</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="bootstrap/img/logo_EY3.png" rel="shortcut icon">
    <link rel="stylesheet" href="bootstrap/cssMAU.css">
</head>
<body class="bg-dark">
    <section>
        <div class="row g-0">
            <div class="col-lg-7 d-none d-lg-block">
                <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active img-1 min-vh-100">
                        </div>
                        <div class="carousel-item img-2 min-vh-100">
                        </div>
                        <div class="carousel-item img-3 min-vh-100">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col-lg-5 d-flex flex-column align-itemns-end min-vh-100 ">
                <div class="px-lg-5 pt-lg-4 pb-lg-3 p-4 w-100">
                    <img src="bootstrap/img/logo_EY2.png" class="img-fluid">
                </div>
                <div class="px-lg-5 pt-lg-4 pb-lg-3 p-4 w-100">
                    <h1 class="font-weight-bold mb-4">BIENVENIDO</h1>
                    <form method="post">
                        <fieldset class="mb-4">
                            <label class="form-label">USUARIO</label>
                            <input name="user" type="text" class="form-control bg-dark-x border-0" placeholder="INGRESE USUARIO">
                        </fieldset>
                        <fieldset class="mb-4">
                            <label class="form-label">CONTRASEÑA</label>

                            <input name="pass" type="password" class="form-control bg-dark-x border-0" placeholder="INGRESE CONTRASEÑA">
                        </fieldset>
                        <?php include "seguridad/autenticacion.php"; ?>
                        <fieldset class="form-group">
                            <button type="submit" name="boton" id="boton" class="btn btn-primary w-100">INGRESAR</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>