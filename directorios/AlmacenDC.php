<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<?php

$error = false;
$config = include '../config.php';

try {
    $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
    $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

    $consultaSQL = "SELECT DISTINCT departamento FROM directorios WHERE locacion = 'AlmacenDC'";

    $sentencia = $conexion->prepare($consultaSQL);
    $sentencia->execute();

    $directorios = $sentencia->fetchAll();
} catch (PDOException $error) {
    $error = $error->getMessage();
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <?php header('Content-Type: text/html; charset=ISO-8859-1'); ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="../assets/images/BBB.jpg">

    <title>BBB Industries de Mexico | Directory</title>

    <!-- google fonts -->
    <link href="//fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="//fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="../assets/css/style-starter.css">
    <link href="../path/to/lightbox.css" rel="stylesheet" />

    <!-- Font awesome icons from homero resendiz account -->
    <script src="https://kit.fontawesome.com/8219103dfb.js" crossorigin="anonymous"></script>
</head>

<body>
    <!-- about breadcrumb -->
    <section class="w3l-about-breadcrumb">
        <div class="breadcrumb-bg breadcrumb-bg-about py-5">
            <div class="container pt-lg-5 pt-md-3 p-lg-4 pb-md-3">
                <h2 class="title">Distribution Center Directory</h2>
                <ul class="breadcrumbs-custom-path mt-2 text-center">
                </ul>
            </div>
        </div>
    </section>
    <!-- //about breadcrumb -->

    <section class="w3l-about1" id="about">
        <div id="content-with-photo4-block" class="py-5">
            <div class="container">
                <div class="cwp4-two row">
                    <div class="text-center cwp4-text col-lg-12">
                        <!-- <span class="title-small">Our Story</span> -->
                        <!-- Load icon library -->
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



                        <style>
                            * {
                                box-sizing: border-box;
                            }

                            /* Style the search field */
                            form.example input[type=text] {
                                padding: 10px;
                                font-size: 17px;
                                border: 1px solid grey;
                                float: left;
                                width: 80%;
                                background: #f1f1f1;
                            }

                            /* Style the submit button */
                            form.example button {
                                float: left;
                                width: 20%;
                                padding: 10px;
                                background: #fe5a0e;
                                color: white;
                                font-size: 17px;
                                border: 1px solid grey;
                                border-left: none;
                                /* Prevent double borders */
                                cursor: pointer;
                            }

                            form.example button:hover {
                                background: #0b7dda;
                            }

                            /* Clear floats */
                            form.example::after {
                                content: "";
                                clear: both;
                                display: table;
                            }
                        </style>
                        <!-- The form -->
                        <!-- <form method="POST" action="" onSubmit="return validarForm(this)">
                            <input type="text" placeholder="Search.." name="palabra">
                            <button type="submit" name="buscar"><i class="fa fa-search"></i></button>
                        </form> -->

                        <?php
                        if (isset($_POST['buscador'])) {
                            // Tomamos el valor ingresado
                            $buscar = mysqli_real_escape_string($conexion2, $_POST['palabra']);

                            // Si está vacío, lo informamos, sino realizamos la búsqueda
                            if (empty($buscar)) {
                                echo "No se ha ingresado una cadena a buscar";
                            } else {
                                $sql = "SELECT * FROM directorios WHERE nombre like '%$buscar%' ORDER BY id DESC";
                                $result = mysqli_query($conexion2, $sql);
                                if ($result === false) {
                                    echo mysqli_error($conexion2);
                                } else {
                                    $total = mysqli_num_rows($result);
                                    // Imprimimos los resultados
                                    if ($row = mysqli_fetch_array($result)) {
                                        echo "Resultados para: <b>$buscar</b>";
                                        do {
                        ?>
                                            <p><b><a href="productos.php?id=<?= $row['cve_imagenes']; ?>"><?= $row['nombre']; ?></a></b></p>
                        <?php
                                        } while ($row = mysqli_fetch_array($result));
                                        echo "<p>Resultados: $total</p>";
                                    } else {
                                        // En caso de no encontrar resultados
                                        echo "No se encontraron resultados para: $buscar";
                                    }
                                }
                            }
                        }
                        ?>
                        


                        <?php
                        if ($directorios && $sentencia->rowCount() > 0) {
                            foreach ($directorios as $fila) {
                        ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" data-parent="#phpecho" href="#custom-collapse-0-3" aria-expanded="true"><?php echo ($fila["departamento"]); ?></a>
                                        </h4>
                                    </div>
                                    <div id="custom-collapse-0-3" class="panel-collapse in collapse show" aria-expanded="true">
                                        <div class="panel-body">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th><strong>Name</strong></th>
                                                        <th><strong>Area/Ocupation</strong></th>
                                                        <th><strong>Ext</strong></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $consultaSQL1 = "SELECT * FROM directorios WHERE departamento = '" . $fila["departamento"] . "' AND locacion = 'AlmacenDC'";

                                                    $sentencia1 = $conexion->prepare($consultaSQL1);
                                                    $sentencia1->execute();

                                                    $directorios1 = $sentencia1->fetchAll();

                                                    if ($directorios1 && $sentencia1->rowCount() > 0) {
                                                        foreach ($directorios1 as $fila1) {
                                                    ?>
                                                            <tr>
                                                                <td><?php echo ($fila1["nombre"]); ?></td>
                                                                <td><?php echo ($fila1["area"]); ?></td>
                                                                <td><?php echo ($fila1["extension"]); ?></td>
                                                            </tr>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                <tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                        <?php
                            }
                        }
                        ?>

                    </div>
                </div>
                <!-- /main-slider -->
    </section>
    <!-- footer -->
    <section class="w3l-footer">
        <div class="w3l-footer-16-main py-5">
            <div class="container pt-lg-4">
                <h3>Contact </h3>
                <div class="row">
                    <div class="col-lg-5 col-md-12 column column4 mt-lg-0 mt-5">
                        <h4>Keep in contact with us.</h4>
                        <h4 href="mailto:controldocumentos@bbbmex.com">controldocumentos@bbbmex.com</h4><br>
                    </div>
                    <div class="col-lg-5 col-md-12 column column4 mt-lg-0 mt-5">
                        <h4>899 958 0039</h4>
                        <h4>899 958 0040</h4>
                    </div>
                </div>
                <div class="d-flex below-section justify-content-between align-items-center pt-4 mt-5">
                    <div class="columns text-lg-left text-center">
                        <p>&copy;
                            <script>
                                document.write(new Date().getFullYear())
                            </script> BBB Industries de Mexico. All
                            rights reserved. Developed by <a href="http://emirhernandez.epizy.com/" target="_blank" style="color:#fe5a0e;">Emir Hernandez</a> and <a href="https://homeroresendiz.dev/" target="_blank" style="color:#fe5a0e;">Homero Resendiz</a> from <strong>Business Information Department</strong>.
                        </p>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- move top -->
        <button onclick="topFunction()" id="movetop" title="Go to top">
            <span class="fa fa-angle-up"></span>
        </button>
        <script>
            // When the user scrolls down 20px from the top of the document, show the button
            window.onscroll = function() {
                scrollFunction()
            };

            function scrollFunction() {
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    document.getElementById("movetop").style.display = "block";
                } else {
                    document.getElementById("movetop").style.display = "none";
                }
            }

            // When the user clicks on the button, scroll to the top of the document
            function topFunction() {
                document.body.scrollTop = 0;
                document.documentElement.scrollTop = 0;
            }
        </script>
        <!-- //move top -->
        <script>
            $(function() {
                $('.navbar-toggler').click(function() {
                    $('body').toggleClass('noscroll');
                })
            });
        </script>
    </section>
    <!-- //footer -->
    <!-- Template JavaScript -->
    <!-- <script src="assets/js/jquery-3.3.1.min.js"></script> -->

    <script src="../assets/js/jquery-1.9.1.min.js"></script>

    <script src="../assets/js/theme-change.js"></script>
    <!-- responsive tabs -->
    <script src="../assets/js/easyResponsiveTabs.js"></script>

    <!--Plug-in Initialisation-->
    <script type="text/javascript">
        $(document).ready(function() {
            //Horizontal Tab
            $('#parentHorizontalTab').easyResponsiveTabs({
                type: 'default', //Types: default, vertical, accordion
                width: 'auto', //auto or any width like 600px
                fit: true, // 100% fit in a container
                tabidentify: 'hor_1', // The tab groups identifier
                activate: function(event) { // Callback function if tab is switched
                    var $tab = $(this);
                    var $info = $('#nested-tabInfo');
                    var $name = $('span', $info);
                    $name.text($tab.text());
                    $info.show();
                }
            });
        });
    </script>

    <script src="../assets/js/owl.carousel.js"></script>
    <!-- script for banner slider-->
    <script>
        $(document).ready(function() {
            $('.owl-one').owlCarousel({
                loop: true,
                margin: 0,
                nav: false,
                responsiveClass: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplaySpeed: 1000,
                autoplayHoverPause: false,
                responsive: {
                    0: {
                        items: 1,
                        nav: false
                    },
                    480: {
                        items: 1,
                        nav: false
                    },
                    667: {
                        items: 1,
                        nav: true
                    },
                    1000: {
                        items: 1,
                        nav: true
                    }
                }
            })
        })
    </script>
    <!-- //script -->
    <script>
        $(document).ready(function() {
            $('.owl-three').owlCarousel({
                margin: 20,
                nav: false,
                dots: false,
                responsiveClass: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplaySpeed: 1000,
                autoplayHoverPause: false,
                responsive: {
                    0: {
                        items: 2
                    },
                    480: {
                        items: 2
                    },
                    767: {
                        items: 3
                    },
                    992: {
                        items: 4
                    },
                    1280: {
                        items: 5
                    }
                }
            })
        })
    </script>

    <!-- script for testimonials -->
    <script>
        $(document).ready(function() {
            $('.owl-testimonial').owlCarousel({
                loop: true,
                margin: 0,
                nav: true,
                responsiveClass: true,
                autoplay: false,
                autoplayTimeout: 5000,
                autoplaySpeed: 1000,
                autoplayHoverPause: false,
                responsive: {
                    0: {
                        items: 1,
                        nav: false
                    },
                    480: {
                        items: 1,
                        nav: false
                    },
                    667: {
                        items: 1,
                        nav: true
                    },
                    1000: {
                        items: 1,
                        nav: true
                    }
                }
            })
        })
    </script>
    <!-- //script for testimonials -->

    <script src="../assets/js/jquery.magnific-popup.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.popup-with-zoom-anim').magnificPopup({
                type: 'inline',

                fixedContentPos: false,
                fixedBgPos: true,

                overflowY: 'auto',

                closeBtnInside: true,
                preloader: false,

                midClick: true,
                removalDelay: 300,
                mainClass: 'my-mfp-zoom-in'
            });

            $('.popup-with-move-anim').magnificPopup({
                type: 'inline',

                fixedContentPos: false,
                fixedBgPos: true,

                overflowY: 'auto',

                closeBtnInside: true,
                preloader: false,

                midClick: true,
                removalDelay: 300,
                mainClass: 'my-mfp-slide-bottom'
            });
        });
    </script>

    <!-- disable body scroll which navbar is in active -->
    <script>
        $(function() {
            $('.navbar-toggler').click(function() {
                $('body').toggleClass('noscroll');
            })
        });
    </script>
    <!-- disable body scroll which navbar is in active -->

    <!--/MENU-JS-->
    <script>
        $(window).on("scroll", function() {
            var scroll = $(window).scrollTop();

            if (scroll >= 80) {
                $("#site-header").addClass("nav-fixed");
            } else {
                $("#site-header").removeClass("nav-fixed");
            }
        });

        //Main navigation Active Class Add Remove
        $(".navbar-toggler").on("click", function() {
            $("header").toggleClass("active");
        });
        $(document).on("ready", function() {
            if ($(window).width() > 991) {
                $("header").removeClass("active");
            }
            $(window).on("resize", function() {
                if ($(window).width() > 991) {
                    $("header").removeClass("active");
                }
            });
        });
    </script>
    <!--//MENU-JS-->

    <script src="../assets/js/bootstrap.min.js"></script>

    <!--Script image popup-->
    <script src="../path/to/lightbox.js"></script>

    <!--Script image popup 2-->
    <script>
        function onClick(element) {
            document.getElementById("img01").src = element.src;
            document.getElementById("modal01").style.display = "block";
        }
    </script>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

</body>

</html>