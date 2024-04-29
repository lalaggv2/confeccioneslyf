<!DOCTYPE html>
@guest @else
    @php
        header('Location: /home');
        exit;
    @endphp
@endguest
<html dir="ltr" lang="en-US">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <title>CONFECCIONES L&F</title>
    <link href="assets/images/favicon/favicon.png" rel="icon"/>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i%7CSource+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i"
          rel="stylesheet"/>
    <link href="{{asset('assets-landing/css/vendor.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('assets-landing/css/style.css')}}" rel="stylesheet"/>
</head>
<body>
<div class="wrapper clearfix" id="wrapperParallax">
    <header class="header header-1 header-light header-topbar" id="navbar-spy">
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <ul class="list-unstyled top--contact text-center text-lg-start">
                            <li><span>Avenida del Libertador No. 23-87</span></li>
                            <li><a href="tel:1602 987 654 3210">602 987 654 3210</a></li>
                            <li><a href="mailto:confecciioneslyf@gmail.com"> confecciioneslyf@gmail.com </a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-lg-6 text-center text-lg-end">
                        <div class="module module-social"><a href="javascript:void(0)"><i class="fab fa-facebook-f"></i><i
                                        class="fab fa-facebook-f"></i></a><a href="javascript:void(0)"><i
                                        class="fab fa-instagram"></i><i class="fab fa-instagram"></i></a></div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg navbar-dark navbar-bordered navbar-sticky" id="primary-menu">
            <div class="container"><a class="navbar-brand" href="index.html">
                    <img class="logo logo-dark" src="{{ asset('/assets/images/lyflogo5v2SM.png')}}"
                         alt="Confecciones L&F"/></a>
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false"
                        aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item  item-home  active"><a href="javascript:void(0)" onclick="internalClick('home')"><span>Inicio</span></a>
                        </li>
                        <li class="nav-item item-about"><a href="javascript:void(0)" onclick="internalClick('about')"><span>Nosotros</span></a>
                        </li>
                        <li class="nav-item item-catalog"><a href="javascript:void(0)" onclick="internalClick('catalog')"><span>Catalogo</span></a>
                        </li>
                        <li class="nav-item item-contacts"><a href="javascript:void(0)" onclick="internalClick('contacts')"><span>Contactos</span></a>
                        </li>
                        <li class="nav-item"><a href="{{route('login')}}"><span>Login</span></a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <section class="slider slider-2 slider-4" id="home">
        <div class="container-fluid pr-0 pl-0">
            <div class="carousel owl-carousel carousel-navs carousel-dots" data-slide="1" data-slide-rs="1"
                 data-autoplay="true" data-nav="true" data-dots="true" data-space="0" data-loop="true" data-speed="800">
                <!-- Slide #1-->
                <div class="slide bg-overlay bg-overlay-dark">
                    <div class="bg-section"><img src="{{asset('assets/images/bg2.webp')}}" alt="CONFECCIONES L&F"/>
                    </div>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-10">
                                <div class="slider-content">
                                    <h1 class="slider-headline">CONFECCIONES L&F</h1>
                                    <p class="slider-desc">
                                        Nuestra experiencia de 2 decadas<br>
                                        Nos permite garantizar un producto de excelente calidad a un precio justo
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slide bg-overlay bg-overlay-dark">
                    <div class="bg-section"><img src="{{asset('assets/images/pexels-neosiam-603022.jpg')}}"
                                                 alt="CONFECCIONES L&F"/></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-10">
                                <div class="slider-content">
                                    <h1 class="slider-headline">CONFECCIONES L&F</h1>
                                    <p class="slider-desc">
                                        Queremos convertirnos en su proveedor de confianza para vestir a sus empleados y
                                        estudiantes.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="about about-1" id="about">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-6"><img class="img-fluid mx-auto d-block pe-lg-5"
                                                           src="{{asset('assets/images/outfits-4926399_640.jpg')}}"
                                                           alt="CONFECCIONES L&F"/></div>
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="heading heading-1 mb-0">
                        <p class="heading-subtitle">Único, creativo y sin limites.</p>
                        <h2 class="heading-title">SOMOS<br>CONFECCIONES L&F</h2>
                        <p class="heading-desc mb-40 pe-lg-5">Nuestra experiencia de 2 decadas nos permite garantizar
                            un producto de excelente calidad a un precio justo y queremos convertirnos en su proveedor
                            de confianza para vestir a sus empleados y estudiantes.</p>
                        <a class="btn btn--primary" href="javascript:void(0)" onclick="internalClick('contacts')">
                            Contactenos</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="work work-grid work-gallery pb-90" id="catalog">
        <div class="container-fluid pr-0 pl-0">
            <div class="row">
            </div>
            <div class="row row-no-padding" id="work-all">
                <div class="col-12">
                    <div class="heading heading-3 text--center">
                        <p class="heading-subtitle">Catalogo </p>
                        <h2 class="heading-title">Estos son los estilos que producimos, estilos tanto femeninos<br>como
                            masculinos e infantiles</h2>
                    </div>
                </div>
                @include('catalogo')
            </div>
        </div>
    </section>
    <section class="contact contact-1 bg-gray pt-0 pb-0" id="contacts">
        <div class="contact-container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-6">
                    <div class="contact-card bg-gray">
                        <div class="heading heading-1 mb-40">
                            <h2 class="heading-title"> Escribanos</h2>
                        </div>
                        <div class="contact-body">
                            <form class="contactForm mb-0" method="post" action="">
                                <div class="row">
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <input class="form-control" type="text" name="contact-name"
                                               placeholder="Nombre:"
                                               required=""/>
                                    </div>
                                    <div class="col-sm-6 col-md-6 col-lg-6">
                                        <input class="form-control" type="text" name="contact-email"
                                               placeholder="Correo:" required=""/>
                                    </div>
                                    <div class="col-sm-12 col-md-12 col-lg-12">
                                        <input class="form-control" type="text" name="contact-phone"
                                               placeholder="Télefono:" required=""/>
                                    </div>
                                    <div class="col-lg-12">
                                        <textarea class="form-control" name="contact-message" cols="30" rows="10"
                                                  placeholder="mensaje:" required=""></textarea>
                                    </div>
                                    <div class="col-lg-12">
                                        <input class="btn btn--primary" type="button" value="ENVIAR MENSAJE"/>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="contact-result"></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 position-relative">
                    <iframe class="map-gray map-gray"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31804.905931648518!2d-75.70055105045365!3d4.836284401949117!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3880df4d6b2487%3A0x9b7ff86649390b78!2sDosquebradas%2C%20Risaralda!5e0!3m2!1ses-419!2sco!4v1714364390842!5m2!1ses-419!2sco"
                            width="600" height="450" style="border:0" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </section>
    <footer class="footer footer-1">
        <div class="footer-bottom">
            <div class="row">
                <div class="col-md-12 col-md-12 text--center footer-copyright">
                    <div class="copyright"><span>@php  echo date('Y') @endphp &copy; CONFECCIONES L&F</span></div>
                    <div class="module module-social"><a class="share-facebook" href="javascript:void(0)"><i
                                    class="fab fa-facebook-f"> </i><i class="fab fa-facebook-f"> </i></a><a
                                class="share-instagram" href="javascript:void(0)"><i class="fab fa-instagram"></i><i
                                    class="fab fa-instagram"></i></a></div>
                </div>

            </div>
        </div>
    </footer>
    <div class="backtop" id="back-to-top"><i class="fas fa-long-arrow-alt-up"></i></div>
</div>
<script src="{{asset('assets-landing/js/vendor/jquery-3.6.0.min.js')}}"></script>
<script src="{{asset('assets-landing/js/vendor.min.js')}}"></script>
<script src="{{asset('assets-landing/js/functions.js')}}"></script>
<script>
  function internalClick(id) {
    let element = document.getElementById(id);
    if (element) {
      $('.nav-item').removeClass('active');
      element.scrollIntoView({behavior: "smooth"});
      $(`.item-${id}`).addClass('active');
    } else {
      console.error('Element with id ' + id + ' not found.');
    }
  }
</script>
</body>
</html>