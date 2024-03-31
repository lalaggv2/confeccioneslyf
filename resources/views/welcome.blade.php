<!DOCTYPE html>
@guest @else
    @php
        header('Location: /home');
        exit;
    @endphp
@endguest
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



    <title>Confecciones L&F</title>
    <link rel="stylesheet" href="{{ asset('asset/style.css')}}">
    
</head>
<body>
    <header>
        <nav>


            <a href="">Quienes somos</a>
            <a href="nosotros">Trabaje con nosotros</a>
            <a href="">Contactenos</a>
            <a href="">Catalogo</a>
            <a href="login">Login</a>
        </nav>

        <section class="textos-header">
            <h1> Confecciones L&F</h1>


        </section>

    </header>
    <main>

        <section class="portafolio">
            <div class="contenedor">
                <h2 class="titulo2">Portafolio</h2>
            </div>
        </header>
        <br>


        <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->
        
        <div class="container">
                <div id="main_area">
                        <!-- Slider -->
                        <div class="row">
                            <div class="span12" id="slider">
                                <!-- Top part of the slider -->
                                <div class="row">
                                    <div class="span8" id="carousel-bounding-box">
                                        <div class="carousel slide" id="myCarousel">
                                            <!-- Carousel items -->
                                            <div class="carousel-inner">
                                                <div class="active item" data-slide-number="0">
                                                <img src="http://placehold.it/770x300&text=one"></div>
        
                                                <div class="item" data-slide-number="1">
                                                <img src="http://placehold.it/770x300&text=two"></div>
        
                                                <div class="item" data-slide-number="2">
                                                <img src="http://placehold.it/770x300&text=three"></div>
        
                                                <div class="item" data-slide-number="3">
                                                <img src="http://placehold.it/770x300&text=four"></div>
        
                                                <div class="item" data-slide-number="4">
                                                <img src="http://placehold.it/770x300&text=five"></div>
        
                                                <div class="item" data-slide-number="5">
                                                <img src="http://placehold.it/770x300&text=six"></div>
                                            </div><!-- Carousel nav -->
                                            <a class="carousel-control left" data-slide="prev" href="#myCarousel">‹</a> <a class="carousel-control right" data-slide="next" href="#myCarousel">›</a>
                                        </div>
                                    </div>
        
                                    <div class="span4" id="carousel-text"></div>
        
                                    <div id="slide-content" style="display: none;">
                                        <div id="slide-content-0">
                                            <h2>Slider One</h2>
                                            <p>Lorem Ipsum Dolor</p>
                                            <p class="sub-text">October 24 2012 - <a href="#">Read more</a></p>
                                        </div>
        
                                        <div id="slide-content-1">
                                            <h2>Slider Two</h2>
                                            <p>Lorem Ipsum Dolor</p>
                                            <p class="sub-text">October 24 2012 - <a href="#">Read more</a></p>
                                        </div>
        
                                        <div id="slide-content-2">
                                            <h2>Slider Three</h2>
                                            <p>Lorem Ipsum Dolor</p>
                                            <p class="sub-text">October 24 2012 - <a href="#">Read more</a></p>
                                        </div>
        
                                        <div id="slide-content-3">
                                            <h2>Slider Four</h2>
                                            <p>Lorem Ipsum Dolor</p>
                                            <p class="sub-text">October 24 2012 - <a href="#">Read more</a></p>
                                        </div>
        
                                        <div id="slide-content-4">
                                            <h2>Slider Five</h2>
                                            <p>Lorem Ipsum Dolor</p>
                                            <p class="sub-text">October 24 2012 - <a href="#">Read more</a></p>
                                        </div>
        
                                        <div id="slide-content-5">
                                            <h2>Slider Six</h2>
                                            <p>Lorem Ipsum Dolor</p>
                                            <p class="sub-text">October 24 2012 - <a href="#">Read more</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!--/Slider-->
        
                        <div class="row hidden-phone" id="slider-thumbs">
                            <div class="span12">
                                <!-- Bottom switcher of slider -->
        
                                <ul class="thumbnails">
                                    <li class="span2">
                                        <a class="thumbnail" id="carousel-selector-0"><img src="http://placehold.it/170x100&text=one"></a>
                                    </li>
        
                                    <li class="span2">
                                        <a class="thumbnail" id="carousel-selector-1"><img src="http://placehold.it/170x100&text=two"></a>
                                    </li>
        
                                    <li class="span2">
                                        <a class="thumbnail" id="carousel-selector-2"><img src="http://placehold.it/170x100&text=three"></a>
                                    </li>
        
                                    <li class="span2">
                                        <a class="thumbnail" id="carousel-selector-3"><img src="http://placehold.it/170x100&text=four"></a>
                                    </li>
        
                                    <li class="span2">
                                        <a class="thumbnail" id="carousel-selector-4"><img src="http://placehold.it/170x100&text=five"></a>
                                    </li>
        
                                    <li class="span2">
                                        <a class="thumbnail" id="carousel-selector-5"><img src="http://placehold.it/170x100&text=six"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                </div>
        </div>

        </div>
                
            </div>
        </section>
        <section class="contenedor sobre-nosotros">

            <h2 class="titulo1">Quienes somos</h2>

             <h5>En Confecciones L&F, nos dedicamos a la fabricación y diseño de Pantalones de alta calidad para hombres, mujeres y niños. Fundada en 2007, nos enorgullece ofrecer prendas que combinan estilo, comodidad y durabilidad.</h5>

            <div class="somos">

              <h4>Nuestros Valores
                 <p>Calidad: Nos comprometemos a utilizar materiales de primera calidad y procesos de fabricación meticulosos para garantizar la excelencia en cada prenda que sale de nuestra fábrica.</p>
                 <p>Innovación: Nos mantenemos al tanto de las últimas tendencias y tecnologías en la industria para ofrecer diseños vanguardistas que satisfagan las demandas cambiantes de nuestros clientes.</p>
                 <p>Integridad: Operamos con honestidad, transparencia y ética en todas nuestras interacciones, desde la producción hasta el servicio al cliente.</p>
                 <p></p>
             </h4>
             <div class="video">
             <video width="600" height="400" autoplay muted loop>
                 <source src="VIDEO F&L.mp4" type="video/mp4">
             </video>
         </div>

         </div>


     </section>



        <section class="Contacto">
            <h2 class="titulo3">Contactenos</h2>
            <div class="row" id="contatti">
                <div class="container mt-5" >

                    <div class="row1" style="height:550px;">
                        <div class="maps" >
                           
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d11880.492291371422!2d12.4922309!3d41.8902102!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x28f1c82e908503c4!2sColosseo!5e0!3m2!1sit!2sit!4v1524815927977" frameborder="0" style="border:0" allowfullscreen></iframe>
                         </div>

                      <div class="formulario">

                        <form action="https://formsubmit.co/confeccioneslyf2@gmail.com" method="POST">
                          <div class="row2">
                            <h1>Envianos un mensaje</h1>
                            <div class="col-lg-6">
                              <div class="form-group">
                                <input type="text" class="form-control mt-2" placeholder="Nombre y apellidos" required>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="form-group">
                                <input type="text" class="form-control mt-2" placeholder="Ciudad" required>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="form-group">
                                <input type="email" class="form-control mt-2" placeholder="Email" required>
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="form-group">
                                <input type="number" class="form-control mt-2" placeholder="Telefono" required>
                              </div>
                            </div>
                            <div class="col-12">
                              <div class="form-group">
                                <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="escriba su mensaje" rows="3" required></textarea>
                              </div>
                            </div>

                            <div class="col-12">
                              <button class="btn" type="submit">ENVIAR</button>
                            </div>
                          </div>
                        </form>
                        <div class="text-white">
                        <h6 class="text-uppercase mt-4 font-weight-bold">Donde estamos </h6>

                        <i class="fas fa-phone mt-3"></i> <a href="tel:+">(+57) 123456</a><br>
                        <i class="fas fa-phone mt-3"></i> <a href="tel:+">(+39) 123456</a><br>
                        <i class="fa fa-envelope mt-3"></i> <a href="">confeccionesl&f.com</a><br>
                        <i class="fa fa-envelope mt-3"></i> <a href="">confeccionesl&f@gmail.com</a><br>
                        <i class="fas fa-globe mt-3"></i> Colombia Antioquia<br>
                        <i class="fas fa-globe mt-3"></i> Colombia,Antioquia<br>
                        <div class="my-4">
                        <a href=""><i class="fab fa-facebook fa-3x pr-4"></i></a>
                        <a href=""><i class="fab fa-linkedin fa-3x"></i></a>
                        </div>
                        </div>
                      </div>

                    </div>
                </div>
                </div>

        </section>

    </div>



    </main>




</body>


</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Aquí va el script jQuery que proporcionaste
        jQuery(document).ready(function($) {
            $('#myCarousel').carousel({
                interval: 5000
            });

            $('#carousel-text').html($('#slide-content-0').html());

            //Handles the carousel thumbnails
            $('[id^=carousel-selector-]').click( function(){
                var id_selector = $(this).attr("id");
                var id = id_selector.substr(id_selector.length -1);
                var id = parseInt(id);
                $('#myCarousel').carousel(id);
            });

            // When the carousel slides, auto update the text
            $('#myCarousel').on('slid', function (e) {
                var id = $('.item.active').data('slide-number');
                $('#carousel-text').html($('#slide-content-'+id).html());
            });
        });
    </script>