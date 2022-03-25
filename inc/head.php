<header id="header" class="fixed-top <?php if(isset($back)){echo "header-inner-pages";} ?>">
    <div class="container d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="<?php if(isset($back)){echo $back;} ?>index.php"><img src="<?php if(isset($back)){echo $back;} ?>assets/img/Logo.png"/></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="<?php if(isset($back)){echo $back;} ?>index.php#hero">Inicio</a></li>
          <li><a class="nav-link scrollto" href="<?php if(isset($back)){echo $back;} ?>index.php#about">Nosotros</a></li>
          <li><a class="nav-link scrollto" href="<?php if(isset($back)){echo $back;} ?>index.php#services">Servicios</a></li>
          <li><a class="nav-link scrollto " href="<?php if(isset($back)){echo $back;} ?>index.php#portfolio">Productos</a></li>
          <!-- <li><a class="nav-link scrollto" href="#team">Equipo</a></li> -->
          <!-- <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> -->
          <li><a class="nav-link scrollto" href="#contact">Contacto</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="<?php if(isset($back)){echo $back;} ?>cotiza.php" class="get-started-btn scrollto">¡Cotiza!</a>

    </div>
  </header><!-- End Header -->
    <!-- ======= Header ======= -->