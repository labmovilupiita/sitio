<?php
if(!isset($nav_active)){
    $nav_active="";
}
?>
<div class="navbar-fixed ">
    <nav>
        <div class="nav-wrapper white">
            <a id="logo-container" href="#" class="brand-logo">TT2016-A016</a>
            <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons red-text">menu</i></a>
<!--            <ul class="center-align black-text">
                <div class="input-field" style="
                     width: 250px;
                     position: absolute;
                     right: 39%;
                     ">             
                    <i class="material-icons prefix">search</i>
                    <input id="icon_prefix" type="text" class="validate">
                    <label for="icon_prefix">Buscar...</label>
                </div>  
            </ul>-->
            <ul class="side-nav" id="nav-mobile">
                <li class="<?php
                if ($nav_active == "pub") {
                    echo "active";
                }
                ?>" ><a href="home.php"><i class="material-icons">assignment</i> Publicaciones</a></li>
                <li class="<?php
                if ($nav_active == "fue") {
                    echo "active";
                }
                ?>"><a href="fuentes.php"><i class="material-icons">class</i> Fuentes</a></li>
                <li class="<?php
                if ($nav_active == "ext") {
                    echo "active";
                }
                ?>"><a href="extracciones.php"><i class="material-icons">get_app</i> Extracciones</a></li>
                <li><a href="index.php"><i class="material-icons">home</i> Web</a></li>
            </ul>
        </div>
    </nav>

</div>
