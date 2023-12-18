<?php 
 session_start();
 $session = false;
 if(!isset($_SESSION['user_id'])){
    $session = false;
 } else {
    $session = true;
    include("connection.php");
    if (isset($_GET['id'])) {
        $txtid = (isset($_GET["id"]) ? $_GET["id"] : "");
        $stm = $connection->prepare("SELECT * FROM users WHERE id=:txtid");
        $stm->bindParam(":txtid", $txtid);
        $stm->execute();
        $register = $stm->fetch(PDO::FETCH_LAZY);

        $name = $register['name'];
        $lastname = $register['lastname'];
    }
 }
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      rel="shortcut icon"
      type="image/png"
      href="assets/images/icon/favicon.ico"
    />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/css/themify-icons.css" />
    <link rel="stylesheet" href="assets/css/metisMenu.css" />
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css" />
    <link rel="stylesheet" href="assets/css/slicknav.min.css" />
    <!-- amchart css -->
    <link
      rel="stylesheet"
      href="https://www.amcharts.com/lib/3/plugins/export/export.css"
      type="text/css"
      media="all"
    />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css" />
    <link rel="stylesheet" href="assets/css/default-css.css" />
    <link rel="stylesheet" href="assets/css/styles.css" />
    <link rel="stylesheet" href="assets/css/responsive.css" />
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
  </head>

  <body>
    <p><?php echo $session; ?></p>
    <div id="preloader">
      <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
      <!-- sidebar menu area start -->
      <div class="sidebar-menu">
        <div class="sidebar-header">
          <div class="logo">
            <h4>Racket The Champion</h4>
          </div>
        </div>
        <div class="main-menu">
          <div class="menu-inner">
            <nav>
              <ul class="metismenu" id="menu">
                <li class="active">
                  <a href="#"
                    ><i class="ti-blackboard"></i><span>Dashboard</span></a
                  >
                </li>
                <li>
                  <a href="#"
                    ><i class="ti-pencil-alt"></i><span>Notas</span></a
                  >
                </li>
                <li>
                  <a href="#"
                    ><i class="ti-stats-up"></i><span>Estadísticas</span></a
                  >
                </li>
                <li>
                  <a href="#"
                    ><i class="ti-bookmark-alt"></i><span>Noticias</span></a
                  >
                </li>
                <li>
                  <a href="#"><i class="ti-gallery"></i><span>Galeria</span></a>
                </li>
              </ul>
            </nav>
          </div>
        </div>
      </div>
      <!-- sidebar menu area end -->
      <!-- main content area start -->
      <div class="main-content">
        <!-- header area start -->
        <div class="header-area">
          <div class="row align-items-center">
            <!-- nav and search button -->
            <div class="col-md-6 col-sm-8 clearfix">
              <div class="nav-btn pull-left">
                <span></span>
                <span></span>
                <span></span>
              </div>
              <div class="search-box pull-left">
                <form action="#">
                  <input
                    type="text"
                    name="search"
                    placeholder="Search..."
                    required
                  />
                  <i class="ti-search"></i>
                </form>
              </div>
            </div>
            <!-- profile info & task notification -->
            <div class="col-md-6 col-sm-4 clearfix">
              <ul class="notification-area pull-right">
                <li id="full-view"><i class="ti-fullscreen"></i></li>
                <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                <li class="dropdown">
                  <i class="ti-bell dropdown-toggle" data-toggle="dropdown">
                    <span>2</span>
                  </i>
                  <div class="dropdown-menu bell-notify-box notify-box">
                    <span class="notify-title"
                      >Tienes 3 notificationes <a href="#">Ver todo</a></span
                    >
                    <div class="nofity-list">
                      <a href="#" class="notify-item">
                        <div class="notify-thumb">
                          <i class="ti-key btn-danger"></i>
                        </div>
                        <div class="notify-text">
                          <p>Has cambiado tu contraseña</p>
                          <span>Justo ahora</span>
                        </div>
                      </a>
                      <a href="#" class="notify-item">
                        <div class="notify-thumb">
                          <i class="ti-comments-smiley btn-info"></i>
                        </div>
                        <div class="notify-text">
                          <p>Nuevo post en el blog</p>
                          <span>Hace 30 segundos</span>
                        </div>
                      </a>
                      <a href="#" class="notify-item">
                        <div class="notify-thumb">
                          <i class="ti-key btn-primary"></i>
                        </div>
                        <div class="notify-text">
                          <p>Camilo ha ganado las semifinales</p>
                          <span>Justo ahora</span>
                        </div>
                      </a>
                    </div>
                  </div>
                </li>
                <li class="dropdown">
                  <i
                    class="fa fa-envelope-o dropdown-toggle"
                    data-toggle="dropdown"
                    ><span>1</span></i
                  >
                  <div class="dropdown-menu notify-box nt-enveloper-box">
                    <span class="notify-title"
                      >Tienes un nuevo mensaje <a href="#">Ver todo</a></span
                    >
                    <div class="nofity-list">
                      <a href="#" class="notify-item">
                        <div class="notify-thumb">
                          <img
                            src="assets/images/author/author-img1.jpg"
                            alt="image"
                          />
                        </div>
                        <div class="notify-text">
                          <p>Camilo</p>
                          <span class="msg">Hola Entrenador...</span>
                          <span>3:15 PM</span>
                        </div>
                      </a>
                    </div>
                  </div>
                </li>
                <li class="settings-btn">
                  <i class="ti-settings"></i>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <!-- header area end -->
        <!-- page title area start -->
        <div class="page-title-area">
          <div class="row align-items-center">
            <div class="col-sm-6">
              <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Dashboard</h4>
                <ul class="breadcrumbs pull-left">
                  <li><a href="index.html">Inicio</a></li>
                  <li><span>Dashboard</span></li>
                </ul>
              </div>
            </div>
            <div class="col-sm-6 clearfix">
              <div class="user-profile pull-right">
                <img
                  class="avatar user-thumb"
                  src="assets/images/author/avatar.png"
                  alt="avatar"
                />
                <h4 class="user-name dropdown-toggle" data-toggle="dropdown">
                <?php echo $name; ?> <?php echo $lastname; ?> <i class="fa fa-angle-down"></i>
                </h4>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">Mensajes</a>
                  <a class="dropdown-item" href="#">Ajustes</a>
                  <a class="dropdown-item" href="logout.php">Cerrar Sesión</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- page title area end -->
        <div class="main-content-inner">
          <div class="sales-report-area mt-5 mb-5">
            <div class="row">
              <div class="col-md-4">
                <div class="single-report mb-xs-30">
                  <div class="s-report-inner pr--20 pt--30 mb-3">
                    <div class="icon"><i class="fa fa-user"></i></div>
                    <div class="s-report-title d-flex justify-content-between">
                      <h4 class="header-title mb-0">Juan Esteban</h4>
                      <p>24 H</p>
                    </div>
                    <div class="d-flex justify-content-between pb-2">
                      <h2>30 puntos</h2>
                      <span>1</span>
                    </div>
                  </div>
                  <canvas id="coin_sales1" height="100"></canvas>
                </div>
              </div>
              <div class="col-md-4">
                <div class="single-report mb-xs-30">
                  <div class="s-report-inner pr--20 pt--30 mb-3">
                    <div class="icon"><i class="fa fa-user"></i></div>
                    <div class="s-report-title d-flex justify-content-between">
                      <h4 class="header-title mb-0">Catalina</h4>
                      <p>24 H</p>
                    </div>
                    <div class="d-flex justify-content-between pb-2">
                      <h2>27 puntos</h2>
                      <span>2</span>
                    </div>
                  </div>
                  <canvas id="coin_sales2" height="100"></canvas>
                </div>
              </div>
              <div class="col-md-4">
                <div class="single-report">
                  <div class="s-report-inner pr--20 pt--30 mb-3">
                    <div class="icon"><i class="fa fa-user"></i></div>
                    <div class="s-report-title d-flex justify-content-between">
                      <h4 class="header-title mb-0">Felipe</h4>
                      <p>24 H</p>
                    </div>
                    <div class="d-flex justify-content-between pb-2">
                      <h2>24 puntos</h2>
                      <span>3</span>
                    </div>
                  </div>
                  <canvas id="coin_sales3" height="100"></canvas>
                </div>
              </div>
            </div>
          </div>
          <h2>Próximos partidos</h2>
          <div class="row">
            <div class="col-xl-4 col-lg-5 col-md-12 mt-5">
              <div class="card">
                <div class="card-body">
                  <div
                    class="d-sm-flex flex-wrap justify-content-between mb-4 align-items-center"
                  >
                    <h4 class="header-title mb-0">Juan VS Felipe</h4>
                  </div>
                  <div class="member-box">
                    <div class="s-member">
                      <div class="media align-items-center">
                        <img
                          src="assets/images/team/team-author1.jpg"
                          class="d-block ui-w-30 rounded-circle"
                          alt=""
                        />
                        <div class="media-body ml-5">
                          <p>Juan</p>
                          <span>U. Bolivariana</span>
                        </div>
                        <div class="tm-social">
                          <a href="#"><i class="fa fa-phone"></i></a>
                          <a href="#"><i class="fa fa-envelope"></i></a>
                        </div>
                      </div>
                    </div>
                    <div class="s-member">
                      <div class="media align-items-center">
                        <img
                          src="assets/images/team/team-author2.jpg"
                          class="d-block ui-w-30 rounded-circle"
                          alt=""
                        />
                        <div class="media-body ml-5">
                          <p>Felipe</p>
                          <span>U. Nacional</span>
                        </div>
                        <div class="tm-social">
                          <a href="#"><i class="fa fa-phone"></i></a>
                          <a href="#"><i class="fa fa-envelope"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-12 mt-5">
              <div class="card">
                <div class="card-body">
                  <div
                    class="d-sm-flex flex-wrap justify-content-between mb-4 align-items-center"
                  >
                    <h4 class="header-title mb-0">Juan VS Felipe</h4>
                  </div>
                  <div class="member-box">
                    <div class="s-member">
                      <div class="media align-items-center">
                        <img
                          src="assets/images/team/team-author1.jpg"
                          class="d-block ui-w-30 rounded-circle"
                          alt=""
                        />
                        <div class="media-body ml-5">
                          <p>Juan</p>
                          <span>U. Bolivariana</span>
                        </div>
                        <div class="tm-social">
                          <a href="#"><i class="fa fa-phone"></i></a>
                          <a href="#"><i class="fa fa-envelope"></i></a>
                        </div>
                      </div>
                    </div>
                    <div class="s-member">
                      <div class="media align-items-center">
                        <img
                          src="assets/images/team/team-author2.jpg"
                          class="d-block ui-w-30 rounded-circle"
                          alt=""
                        />
                        <div class="media-body ml-5">
                          <p>Felipe</p>
                          <span>U. Nacional</span>
                        </div>
                        <div class="tm-social">
                          <a href="#"><i class="fa fa-phone"></i></a>
                          <a href="#"><i class="fa fa-envelope"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-5 col-md-12 mt-5">
              <div class="card">
                <div class="card-body">
                  <div
                    class="d-sm-flex flex-wrap justify-content-between mb-4 align-items-center"
                  >
                    <h4 class="header-title mb-0">Juan VS Felipe</h4>
                  </div>
                  <div class="member-box">
                    <div class="s-member">
                      <div class="media align-items-center">
                        <img
                          src="assets/images/team/team-author1.jpg"
                          class="d-block ui-w-30 rounded-circle"
                          alt=""
                        />
                        <div class="media-body ml-5">
                          <p>Juan</p>
                          <span>U. Bolivariana</span>
                        </div>
                        <div class="tm-social">
                          <a href="#"><i class="fa fa-phone"></i></a>
                          <a href="#"><i class="fa fa-envelope"></i></a>
                        </div>
                      </div>
                    </div>
                    <div class="s-member">
                      <div class="media align-items-center">
                        <img
                          src="assets/images/team/team-author2.jpg"
                          class="d-block ui-w-30 rounded-circle"
                          alt=""
                        />
                        <div class="media-body ml-5">
                          <p>Felipe</p>
                          <span>U. Nacional</span>
                        </div>
                        <div class="tm-social">
                          <a href="#"><i class="fa fa-phone"></i></a>
                          <a href="#"><i class="fa fa-envelope"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- MAIN CONTENT GOES HERE -->
          <div class="row">
            <div class="col-lg-6 mt-5">
              <div class="card">
                <div class="card-body">
                  <div id="ambarchart1"></div>
                </div>
              </div>
            </div>
            <div class="col-xl-6 mt-5">
              <div class="card">
                <div class="card-body">
                  <h4 class="header-title">Próximos Juegos</h4>
                  <div id="mapamchart6"></div>
                </div>
              </div>
            </div>
            <div class="col-12 mt-5">
              <div class="card">
                <div class="card-body">
                  <h4 class="header-title">Tabla de progreso</h4>
                  <div class="single-table">
                    <div class="table-responsive">
                      <table
                        class="table table-hover progress-table text-center"
                      >
                        <thead class="text-uppercase">
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Jugador</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Progreso</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Accion</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>09 / 07 / 2018</td>
                            <td>
                              <div class="progress" style="height: 8px">
                                <div
                                  class="progress-bar"
                                  role="progressbar"
                                  style="width: 50%"
                                  aria-valuenow="25"
                                  aria-valuemin="0"
                                  aria-valuemax="100"
                                ></div>
                              </div>
                            </td>
                            <td>
                              <span class="status-p bg-primary">Pendiente</span>
                            </td>
                            <td>
                              <ul class="d-flex justify-content-center">
                                <li class="mr-3">
                                  <a href="#" class="text-secondary"
                                    ><i class="fa fa-edit"></i
                                  ></a>
                                </li>
                                <li>
                                  <a href="#" class="text-danger"
                                    ><i class="ti-trash"></i
                                  ></a>
                                </li>
                              </ul>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">2</th>
                            <td>Mark</td>
                            <td>09 / 07 / 2018</td>
                            <td>
                              <div class="progress" style="height: 8px">
                                <div
                                  class="progress-bar bg-warning"
                                  role="progressbar"
                                  style="width: 80%"
                                  aria-valuenow="25"
                                  aria-valuemin="0"
                                  aria-valuemax="100"
                                ></div>
                              </div>
                            </td>
                            <td>
                              <span class="status-p bg-warning">Pendiente</span>
                            </td>
                            <td>
                              <ul class="d-flex justify-content-center">
                                <li class="mr-3">
                                  <a href="#" class="text-secondary"
                                    ><i class="fa fa-edit"></i
                                  ></a>
                                </li>
                                <li>
                                  <a href="#" class="text-danger"
                                    ><i class="ti-trash"></i
                                  ></a>
                                </li>
                              </ul>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">3</th>
                            <td>Mark</td>
                            <td>09 / 07 / 2018</td>
                            <td>
                              <div class="progress" style="height: 8px">
                                <div
                                  class="progress-bar bg-success"
                                  role="progressbar"
                                  style="width: 100%"
                                  aria-valuenow="25"
                                  aria-valuemin="0"
                                  aria-valuemax="100"
                                ></div>
                              </div>
                            </td>
                            <td>
                              <span class="status-p bg-success">Completo</span>
                            </td>
                            <td>
                              <ul class="d-flex justify-content-center">
                                <li class="mr-3">
                                  <a href="#" class="text-secondary"
                                    ><i class="fa fa-edit"></i
                                  ></a>
                                </li>
                                <li>
                                  <a href="#" class="text-danger"
                                    ><i class="ti-trash"></i
                                  ></a>
                                </li>
                              </ul>
                            </td>
                          </tr>
                          <tr>
                            <th scope="row">4</th>
                            <td>Mark</td>
                            <td>09 / 07 / 2018</td>
                            <td>
                              <div class="progress" style="height: 8px">
                                <div
                                  class="progress-bar bg-warning"
                                  role="progressbar"
                                  style="width: 85%"
                                  aria-valuenow="25"
                                  aria-valuemin="0"
                                  aria-valuemax="100"
                                ></div>
                              </div>
                            </td>
                            <td>
                              <span class="status-p bg-warning">Pendiente</span>
                            </td>
                            <td>
                              <ul class="d-flex justify-content-center">
                                <li class="mr-3">
                                  <a href="#" class="text-secondary"
                                    ><i class="fa fa-edit"></i
                                  ></a>
                                </li>
                                <li>
                                  <a href="#" class="text-danger"
                                    ><i class="ti-trash"></i
                                  ></a>
                                </li>
                              </ul>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- main content area end -->
      <!-- footer area start-->
      <!-- footer area end-->
    </div>
    <!-- page container area end -->
    <!-- offset area start -->
    <div class="offset-area">
      <div class="offset-close"><i class="ti-close"></i></div>
      <ul class="nav offset-menu-tab">
        <li>
          <a class="active" data-toggle="tab" href="#activity">Tu actividad</a>
        </li>
        <li><a data-toggle="tab" href="#settings">Ajustes</a></li>
      </ul>
      <div class="offset-content tab-content">
        <div id="activity" class="tab-pane fade in show active">
          <div class="recent-activity">
            <div class="timeline-task">
              <div class="icon bg1">
                <i class="fa fa-envelope"></i>
              </div>
              <div class="tm-title">
                <h4>Rashed te envió un email</h4>
                <span class="time"><i class="ti-time"></i>09:35</span>
              </div>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse
                distinctio itaque at.
              </p>
            </div>
            <div class="timeline-task">
              <div class="icon bg2">
                <i class="fa fa-check"></i>
              </div>
              <div class="tm-title">
                <h4>Añadido</h4>
                <span class="time"><i class="ti-time"></i>Hace 7 minutos</span>
              </div>
              <p>Lorem ipsum dolor sit amet consectetur.</p>
            </div>
            <div class="timeline-task">
              <div class="icon bg2">
                <i class="fa fa-exclamation-triangle"></i>
              </div>
              <div class="tm-title">
                <h4>Olvidaste tu contraseña!</h4>
                <span class="time"><i class="ti-time"></i>09:20 Am</span>
              </div>
            </div>
            <div class="timeline-task">
              <div class="icon bg3">
                <i class="fa fa-bomb"></i>
              </div>
              <div class="tm-title">
                <h4>Miembro esperando tu atención</h4>
                <span class="time"><i class="ti-time"></i>09:35</span>
              </div>
              <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse
                distinctio itaque at.
              </p>
            </div>
          </div>
        </div>
        <div id="settings" class="tab-pane fade">
          <div class="offset-settings">
            <h4>Ajustes Generales</h4>
            <div class="settings-list">
              <div class="s-settings">
                <div class="s-sw-title">
                  <h5>Notificaciones</h5>
                  <div class="s-swtich">
                    <input type="checkbox" id="switch1" />
                    <label for="switch1">Toggle</label>
                  </div>
                </div>
                <p>Mantenlo encendido si quieres recibir notificaciones.</p>
              </div>
              <div class="s-settings">
                <div class="s-sw-title">
                  <h5>Mostrar actividad reciente</h5>
                  <div class="s-swtich">
                    <input type="checkbox" id="switch2" />
                    <label for="switch2">Toggle</label>
                  </div>
                </div>
                <p>Personaliza</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- offset area end -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCbeBYsZSDkbIyfUkoIw1Rt38eRQOQQU0o"></script>
    <script>
      function initialize() {
        var e = {
            zoom: 15,
            scrollwheel: !1,
            center: new google.maps.LatLng(40.712764, -74.005667),
            styles: [
              {
                elementType: "geometry",
                stylers: [
                  {
                    color: "#1d2c4d",
                  },
                ],
              },
              {
                elementType: "labels.text.fill",
                stylers: [
                  {
                    color: "#8ec3b9",
                  },
                  {
                    saturation: -100,
                  },
                  {
                    weight: 2,
                  },
                ],
              },
              {
                elementType: "labels.text.stroke",
                stylers: [
                  {
                    color: "#1a3646",
                  },
                ],
              },
              {
                featureType: "administrative.country",
                elementType: "geometry.stroke",
                stylers: [
                  {
                    color: "#4b6878",
                  },
                ],
              },
              {
                featureType: "administrative.country",
                elementType: "labels.text",
                stylers: [
                  {
                    saturation: 30,
                  },
                  {
                    lightness: -100,
                  },
                ],
              },
              {
                featureType: "administrative.land_parcel",
                elementType: "labels",
                stylers: [
                  {
                    visibility: "off",
                  },
                ],
              },
              {
                featureType: "administrative.land_parcel",
                elementType: "labels.text.fill",
                stylers: [
                  {
                    color: "#64779e",
                  },
                ],
              },
              {
                featureType: "administrative.province",
                elementType: "geometry.stroke",
                stylers: [
                  {
                    color: "#4b6878",
                  },
                ],
              },
              {
                featureType: "landscape.man_made",
                elementType: "geometry.stroke",
                stylers: [
                  {
                    color: "#334e87",
                  },
                ],
              },
              {
                featureType: "landscape.natural",
                elementType: "geometry",
                stylers: [
                  {
                    color: "#023e58",
                  },
                ],
              },
              {
                featureType: "poi",
                elementType: "geometry",
                stylers: [
                  {
                    color: "#283d6a",
                  },
                ],
              },
              {
                featureType: "poi",
                elementType: "labels.text",
                stylers: [
                  {
                    visibility: "off",
                  },
                ],
              },
              {
                featureType: "poi",
                elementType: "labels.text.fill",
                stylers: [
                  {
                    color: "#6f9ba5",
                  },
                ],
              },
              {
                featureType: "poi",
                elementType: "labels.text.stroke",
                stylers: [
                  {
                    color: "#1d2c4d",
                  },
                ],
              },
              {
                featureType: "poi.park",
                elementType: "geometry.fill",
                stylers: [
                  {
                    color: "#023e58",
                  },
                ],
              },
              {
                featureType: "poi.park",
                elementType: "labels.text.fill",
                stylers: [
                  {
                    color: "#3C7680",
                  },
                ],
              },
              {
                featureType: "road",
                elementType: "geometry",
                stylers: [
                  {
                    color: "#304a7d",
                  },
                ],
              },
              {
                featureType: "road",
                elementType: "labels.text.fill",
                stylers: [
                  {
                    color: "#98a5be",
                  },
                ],
              },
              {
                featureType: "road",
                elementType: "labels.text.stroke",
                stylers: [
                  {
                    color: "#1d2c4d",
                  },
                ],
              },
              {
                featureType: "road.highway",
                elementType: "geometry",
                stylers: [
                  {
                    color: "#2c6675",
                  },
                ],
              },
              {
                featureType: "road.highway",
                elementType: "geometry.stroke",
                stylers: [
                  {
                    color: "#255763",
                  },
                ],
              },
              {
                featureType: "road.highway",
                elementType: "labels.text.fill",
                stylers: [
                  {
                    color: "#b0d5ce",
                  },
                ],
              },
              {
                featureType: "road.highway",
                elementType: "labels.text.stroke",
                stylers: [
                  {
                    color: "#023e58",
                  },
                ],
              },
              {
                featureType: "road.local",
                elementType: "labels",
                stylers: [
                  {
                    visibility: "off",
                  },
                ],
              },
              {
                featureType: "transit",
                elementType: "labels.text.fill",
                stylers: [
                  {
                    color: "#98a5be",
                  },
                ],
              },
              {
                featureType: "transit",
                elementType: "labels.text.stroke",
                stylers: [
                  {
                    color: "#1d2c4d",
                  },
                ],
              },
              {
                featureType: "transit.line",
                elementType: "geometry.fill",
                stylers: [
                  {
                    color: "#283d6a",
                  },
                ],
              },
              {
                featureType: "transit.station",
                elementType: "geometry",
                stylers: [
                  {
                    color: "#3a4762",
                  },
                ],
              },
              {
                featureType: "water",
                elementType: "geometry",
                stylers: [
                  {
                    color: "#0e1626",
                  },
                ],
              },
              {
                featureType: "water",
                elementType: "geometry.fill",
                stylers: [
                  {
                    color: "#0e0e26",
                  },
                ],
              },
              {
                featureType: "water",
                elementType: "labels.text.fill",
                stylers: [
                  {
                    color: "#4e6d70",
                  },
                ],
              },
            ],
          },
          l = new google.maps.Map(document.getElementById("google_map"), e);
        new google.maps.Marker({
          position: l.getCenter(),
          animation: google.maps.Animation.BOUNCE,
          map: l,
        });
      }

      google.maps.event.addDomListener(window, "load", initialize);
    </script>
    <script src="https://cdn.auth0.com/js/auth0-spa-js/2.0/auth0-spa-js.production.js"></script>
    <!-- jquery latest version -->
    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
    <!-- bootstrap 4 js -->
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script>

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
      zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
      ZC.LICENSE = [
        "569d52cefae586f634c54f86dc99e6a9",
        "ee6b7db5b51705a13dc2339db3edaf6d",
      ];
    </script>
    <!-- start amchart js -->
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/serial.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
    <!-- start amchart js -->
    <script src="https://www.amcharts.com/lib/3/pie.js"></script>
    <script src="https://www.amcharts.com/lib/3/ammap.js"></script>
    <script src="https://www.amcharts.com/lib/3/ammap_amcharts_extension.js"></script>
    <script src="https://www.amcharts.com/lib/3/maps/js/worldLow.js"></script>
    <script src="https://www.amcharts.com/lib/3/maps/js/continentsLow.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
    <!-- maps js -->
    <script src="assets/js/maps.js"></script>
    <!-- all line chart activation -->
    <script src="assets/js/line-chart.js"></script>
    <!-- all bar chart activation -->
    <script src="assets/js/bar-chart.js"></script>
    <!-- all pie chart -->
    <script src="assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
  </body>
</html>
