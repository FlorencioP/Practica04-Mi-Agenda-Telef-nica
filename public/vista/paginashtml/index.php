

<!DOCTYPE html>
<html lang="es">




<head>
    <meta charset="UTF-8">
    <title>El rincón F</title>


    <link rel="stylesheet" type="text/css" href="../Css/home.css"/>
    <link rel="stylesheet" type="text/css" href="../Css/reglasCSS.css"/>


</head>

<body>
    
    <header>
        <a href="index.php"><img id="logo" src="../imagenes/logof.png"  alt="Se escribe con F" /></a>
        <p id="busca"> <input type="text" placeholder="Disque Busqueda" id="busqueda">   </p>
        
        <?php
                    session_start(); 
                    include '../../../config/conexionBD.php'; 

                    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
                        
                        $id = $_GET['id'];

                        $sqln = "SELECT usu_nombres FROM usuarios WHERE usu_id = '$id'";
                            $resultn = $conn->query($sqln);
                            while ($row = $resultn -> fetch_assoc()){
                                $nombreP = $row['usu_nombres']; 
                            } 

                        $sqlr = "SELECT usu_rol FROM usuarios WHERE usu_id = '$id'";

                            $resultr = $conn->query($sqlr);
                            while ($row = $resultr -> fetch_assoc()){
                                $rolusu = $row['usu_rol']; 
                            } 
                            
                            
                        
                    }
                ?>
        
        

            <blockquote class="icon" id="perf">
                <img  src="../imagenes/user.png" alt="Perfil">
                <!--<br> <br>
                <p>Perfil</p> 
                <a href=""  id = "nombre"> <?php echo $nombreP?> </a> <br><br>-->
                    

                <a href="" onclick="usuarios('<?php echo $rolusu ?>','<?php echo $id ?>')" id = "nombre" >   <?php echo $nombreP?>  </a>


                 <!--onclick="usuarios(<?php $rolusu ?>)"-->
               

                <a href="" id='opcion1' >  </a>  <br> 

                <a href="" id='opcion2' > </a>

                <a href=""></a>


            </blockquote>
            
            <blockquote class="icon" id="msg">
                <img  src="../imagenes/mensaje.png" alt="Mensaje">
                <p>Enviar Mensaje</p>
            
            
            </blockquote>

            <blockquote class="icon" id="guia">
                <img src="../imagenes/about.png" alt="Guia TElefonica">


                <a href="" onclick="guia('<?php echo $rolusu ?>','<?php echo $id ?>')" id = 'guiatef' >   </a>

                


            </blockquote>


            
    <?php 
        if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){ 

            echo "<script src='../scripts/indexopclog.js?id=$id' ></script>";
            
            //header("Location: /SistemaDeGestion/public/vista/login.html"); 
            
        } else{ 

            echo "<script src='../scripts/indexopc.js'></script>";
            
        }
    ?>
        
        <!--<p>  = dasoidhaoisupd</p> -->



        <nav>
            <ul>
                <li><a href="index.html">Inicio</a></li>
                <li><a href="imagenes.html">Imagenes</a></li>
                <li><a href="video.html">Video</a></li>
                <li><a href="videointeresante.html">Video Interesante</a></li>
                <li><a href="musica.html">Musica</a></li>
                <li><a href="sobretiktok.html">Info. Tik Tok</a></li>
                <li><a href="perritomax.html">El Maxwell</a></li>
                <li><a href="cosasvarias2.html">Vario</a></li>
                <li><a href="cosasvarias3.html">Vario 2</a></li>
            </ul>
        </nav>

       

    </header>


    <section id="intro">
        <div>
            <h1>Esta es una página web donde pondré distintas cosas que me llamen la atención</h1>
            <p>Pues se podría decir que por falta de creatividad o talvez por simplemente no saber de qué hacer la página web
            pues decidí hacerla
            acerca de cosas que me rodean o que me llamen la atención -<cite>Florencio Peralta</cite></p>
        </div>
    </section>
    <img src="../imagenes/main.gif" alt="Kirby en una Estrella">

    <br>

    <section id="kirbys">

        <h2>Unos kirbys: </h2>
        <img src="../imagenes/ufoKirb.gif" alt="UFO Kirby" >
        <img src="../imagenes/morador7.gif" alt="Kirby con una espada">
        <img src="../imagenes/pargkirby.gif" alt="Kirby con un paraguas">
        <img src="../imagenes/kirbyCam.gif" alt="Kirby caminando">
        <img src="../imagenes/martkirbi2.gif" alt="Kirby com un martillo" > <br>
        <input class="btn" type="submit" value="Son kirbys">



    </section>



    <section id="medio">

        <div id="imeg"><img src="../imagenes/imgBlog.png" alt="Blog Personal"></div>

        <div id="text">
            <h2>¿Que mismo?</h2>
            <p>Pues tal como la cita anterior lo acaba de explicar, el <strong>AUTOR</strong> de este sitio web se dedicará netamente
            a <em>Publicar Cosas</em>, 
            pero antes de que piensen que voy a publicar cosas sin sentido y aleatorias dedo hacer que queden claro algunas cosas</p>

            <article>
                <h2>¿Qué es un blog personal?</h2>
                <p>La definición de blog personal puede resultar <sub>simple</sub> y a la vez <sup>compleja</sup>. Se podría decir que 
                un blog personal es una especie de diario digital en la que vas contando y compartiendo tus experiencias de vida.
                <strong><u>El contenido que se escribe tiene que ver con los intereses de su autor</u> </strong>, en algunos casos 
                está asociado con algún hobby y en otros con un tema de trabajo.</p>
                <br>
            </article>
        </div>


    </section>


    <section id="equipo">

        <h2>El Equipo:</h2>

        <blockquote class="perf">
            <img  src="../imagenes/Rakrad07.png" alt="rakrad"><br><br><br>
            <p>Rakrad07#9012</p>
        </blockquote>
        
        <blockquote class="perf">
            <img  src="../imagenes/Charly.png" alt="charly"><br><br><br>
            <p>charly#6869</p>
        </blockquote>

        <blockquote class="perf">
            <img  src="../imagenes/peml1231.png" alt="pelmaso"><br><br><br>
            <p>pelm1231#1106</p>
        </blockquote>

        <blockquote class="perf">
            <img  src="../imagenes/MANIIII.png" alt="mani"><br><br><br>
            <p>MANIIII#3034</p>
        </blockquote>






    </section>







    <section id="final">
        <h2>Razones:</h2>

        <article>
            <div>
                <h2>¿Por qué escogí como tema un blog personal?</h2>
                <p>Además de la razón ya antes expuesta al principio de la página existen 2 razones más por cual escogí hacer esto:</p>
            </div>

            <aside id="c1">
                <h3>Porque puedo</h3>
                <p>Así es, como el tema era libre pues nada me impidió hacer un blog personal</p><br><br>
            </aside> 


            <aside id="c2">
                <h3>Porque quiero</h3>
                <p>Así es, siempre me ha gustado escribir sobre mí mismo cuando se trata de un tema libre.... y escribir unas 
                cuantas cosas divertidas.
                <br>
            <small>Con <q>divertidas</q> me refiero a cosas que a mí me divierten, <em>No todos tenemos el mismo humor</em> </small>
                <br></p>

            </aside>

                


        </article>

    </section>





    <footer>

        <a class="soci" href="https://www.facebook.com/profile"><img  src="../imagenes/face.png"  alt="Facebook" /></a>
        <a class="soci" href="https://www.instagram.com/florencio.peralta.1/?hl=es-la"><img  src="../imagenes/insta.png"  alt="Instagram" /></a> <br>


        <a href="index.php"><img src="../imagenes/logof.png"  alt="Se escribe con F" /></a> <br>
        Carlos Florencio Peralta Bautista &#8225; <br> Universidad Politécnica Salesiana &#8225; <br>
        <a href="mailto:cperaltab1@est.ups.edu.ec">cperaltab1@est.ups.edu.ec</a>  &#8225; <br> <a href="tel:+5930998027181">
        (593) 099-802-7181</a>  &#8225; <br> &#169; Todos los derechos reservados. 
    </footer> 


    



    
</body>


</html>
