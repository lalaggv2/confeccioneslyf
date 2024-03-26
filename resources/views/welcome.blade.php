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


        <div class="container-items">
            <div class="item">
                <figure>
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS8u2hZfn1Bjjp2oWbObdGSjmkpTTWmcaVygQ&usqp=CAU" alt="producto">
                </figure>
                <div class="info-product">
                    <h2>Pantalones  Rectos</h2>

                </div>
            </div>
            <div class="item">
                <figure>
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRcdSqLtwIyzH07QPoZEMUSDp6QdkF9xF3tqQ&usqp=CAU" alt="producto">
                </figure>
                <div class="info-product">
                    <h2>Pantalones Capri</h2>

                </div>
            </div>
            <div class="item">
                <figure>
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQscwYsqDECByjhi6i-gwvNpjXrCgmZRJa8KQ&usqp=CAU" alt="producto">
                </figure>
                <div class="info-product">
                    <h2>Pantalones Skinny</h2>

                </div>
            </div>
            <div class="item">
                <figure>
                    <img src="data:image/jpeg;base64,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" alt=" alt="producto>
                </figure>
                <div class="info-product">
                    <h2>Pantalones bootcut</h2>

                </div>
            </div>
            <div class="item">
                <figure>
                    <img src="data:image/jpeg;base64,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" alt="producto">
                </figure>
                <div class="info-product">
                    <h2>Pantalones Acampanado</h2>

                </div>
            </div>
        </div>
        <div class="container-items1">
            <div class="item">
                <figure>
                    <img src="data:image/jpeg;base64,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" alt="producto">
                </figure>
                <div class="info-product">
                    <h2>Pantalones Boyfriend</h2>

                </div>
            </div>
            <div class="item">
                <figure>
                    <img src="data:image/jpeg;base64,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" alt="producto">
                </figure>
                <div class="info-product">
                    <h2>Pantalones Cargo</h2>

                </div>
            </div>
            <div class="item">
                <figure>
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQsepWJ3OuhdQDoAm_CAlTN_1G0ZEobNFVUOg&usqp=CAU" alt="producto">
                </figure>
                <div class="info-product">
                    <h2>Pantalones Palazzo</h2>

                </div>
            </div>
            <div class="item">
                <figure>
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQDmGTi9sRWYqlzIGZ9BzY5DGXdSCC4You1kg&usqp=CAU" alt="producto">
                </figure>
                <div class="info-product">
                    <h2>Pantalones Harem</h2>

                </div>
            </div>
            <div class="item">
                <figure>
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRyjaxMznbHjqox_QNrdFNFZ-xOUspTCf31Ew&usqp=CAU" alt="producto">
                </figure>
                <div class="info-product">
                    <h2>Pantalones Shorts</h2>

                </div>
            </div>

        </div>
                .
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
