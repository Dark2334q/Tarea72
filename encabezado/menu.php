<header class="site-header">
    <div class="container-fluid">
        <a href="home.php" class="site-logo-text">
            <img src="bootstrap/img/logo_EY.png" alt="Logo de ELYON YIREH" width="240" height="60">
        </a>
        <button class="hamburger hamburger--htla">
            <span>toggle menu</span>
        </button>
        <div class="site-header-content">
            <div class="site-header-content-in">
                <div class="site-header-shown">

                    <div class="dropdown user-menu">
                        <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="bootstrap/img/avatar-2-64.png" alt="">
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
                            <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-cog"></span>Settings</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="salir.php"><span class="font-icon glyphicon glyphicon-log-out"></span> Salir</a>
                        </div>
                    </div>
                </div>
                <div class="mobile-menu-right-overlay"></div>
                <div class="site-header-collapsed">
                    <div class="site-header-collapsed-in">
                        <!--Investigar-->
                        <div class="site-header-search-container">
                            <form class="site-header-search closed">
                                <input type="text" placeholder="Search" />
                                <button type="submit">
                                    <span class="font-icon-search"></span>
                                </button>
                                <div class="overlay"></div>
                            </form>
                        </div>
                    </div><!--.site-header-collapsed-in-->
                </div><!--.site-header-collapsed-->
            </div><!--site-header-content-in-->
        </div><!--.site-header-content-->
    </div><!--.container-fluid-->
</header>

<div class="mobile-menu-left-overlay"></div>
<nav class="side-menu">
    <div class="side-menu-avatar">
        <div class="avatar-preview avatar-preview-100">
            <img src="bootstrap/img/avatar-1-256.png" alt="">
        </div>
    </div>
    <ul class="side-menu-list">
        <li class="orange-red with-sub">
            <a href="home.php">
                <i class="font-icon font-icon-home"></i>
                <span class="lbl">HOME</span>
            </a>
        </li>
        <li class="orange-red with-sub">
            <span>
                <i class="font-icon font-icon-users"></i>
                <span class="lbl">DOCENTES</span>
            </span>
            <ul>
                <li><a href="L_docente.php"><span class="lbl">INFORMACION</span></a></li>
                <li><a href="L_pago_doce.php"><span class="lbl">PAGOS</span></a></li>
            </ul>
        </li>
        <li class="orange-red with-sub">
            <span>
                <span class="font-icon font-icon-users-group"></span>
                <span class="lbl">ALUMNOS</span>
            </span>
            <ul class="side-menu-list">
                <li class="with-sub">
                    <span>
                        <span class="lbl">NUEVAS INCRIPCIONES</span>
                    </span>
                    <ul>
                        <li><a href="L_estudiante.php"><span class="lbl">ESTUDIANTES</span></a></li>
                        <li><a href="L_inscri_carrera.php"><span class="lbl">CARRERAS</span></a></li>
                        <li><a href="L_inscri_modulo.php"><span class="lbl">MODULOS</span></a></li>
                        <li><a href="L_inscri_seminario.php"><span class="lbl">SEMINARIO</span></a></li>
                    </ul>
                </li>
                <li><a href="#"><span class="lbl">PAGOS</span></a></li>
                <li><a href="#"><span class="lbl">NOTAS</span></a></li>

            </ul>
        </li>
        <li class="orange-red with-sub">
            <span>
                <i class="font-icon font-icon-case-2"></i>
                <span class="lbl">INFORMES</span>
            </span>
            <ul>
                <li><a href="#"><span class="lbl">NUEVAS INCRIPCIONES</span></a></li>
                <li><a href="#"><span class="lbl">NOTAS GENERALES</span></a></li>
                <li><a href="#"><span class="lbl">CARRERAS</span></a></li>
                <li><a href="#"><span class="lbl">ESTUDIANTES</span></a></li>
                <li><a href="#"><span class="lbl">NOTAS</span></a></li>
                <li><a href="#"><span class="lbl">TIPOS PAGO</span></a></li>
            </ul>
        </li>
        <li class="orange-red with-sub">
            <span>
                <i class="font-icon font-icon-notebook"></i>
                <span class="lbl">ADMINISTRADOR</span>
            </span>
            <ul>
                <li><a href="L_carrera.php"><span class="lbl">CARRERAS</span></a></li>
                <li><a href="L_modulo.php"><span class="lbl">MODULOS</span></a></li>
                <li><a href="L_seminario.php"><span class="lbl">SEMINARIOS</span></a></li>
            </ul>
        </li>
    </ul>
</nav><!--.side-menu-->