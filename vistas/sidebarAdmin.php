<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <!-- User Info -->
    <div class="user-info">


       <img src="../assets/images/Imagen1.png" width="230" height="80" alt="User" style="border-radius:5px" />

        <div class="info-container">
        <?php if(is_null($sesion_nombre) == true || strcmp($sesion_nombre, "") !== 0){
         echo '<div class="name" data-toggle="dropdown">'.$sesion_nombre.'</div>
         <div class="name" data-toggle="dropdown">ADMINISTRADOR</div>';
       }else{  echo '<div class="name" data-toggle="dropdown">Nom defecto</div>';}?>
        </div>


    </div>
    <!-- #User Info -->
    <!-- Menu -->
    <div class="menu">
        <ul class="list">
            <li class="header">Menu de navegacion</li>
            <li> <a href="#" id="workspaceAdmin" ><i class="zmdi zmdi-apps"></i><span>Principal</span> </a>
            </li>
            <li> <a href="#" id="menuBolivar" ><i class="zmdi zmdi-case"></i><span>Seguros Bolivar</span> </a>
            </li>
            <li> <a href="#" id="menuUsuarios" ><i class="zmdi zmdi-accounts-alt"></i><span>Usuarios</span> </a>
            </li>
            <li> <a href="#" id="menuActividades" ><i class="zmdi zmdi-group-work"></i><span>Actividades</span> </a>
            </li>
            <li> <a href="#" id="menuEmpresas"><i class="zmdi zmdi-globe"></i><span>Empresas</span> </a>
            </li>
            <li> <a href="#" id="menuServicios"><i class="zmdi zmdi-developer-board"></i><span>Servicios</span> </a>
            </li>
            <li> <a href="#" id="menuConfiguracion"><i class="zmdi zmdi-input-composite"></i><span>Configuracion</span> </a>
            </li>
            <!-- <li> <a href="#" id="menuConfiguracion"><i class="zmdi zmdi-input-composite"></i><span>Configuracion</span> </a>
            </li> -->
            <li class="header">SEGCONTROL GPS</li>
            <li> <a href="https://p3plcpnl0781.prod.phx3.secureserver.net:2096/logout/?locale=es"><i class="zmdi zmdi-email"></i><span>Web Mail </span> </a> </li>
            <li> <a href="http://www.segcontrol.com.co/"><i class="zmdi zmdi-view-web"></i><span>Sitio Web</span> </a> </li>
        </ul>
    </div>
    <!-- #Menu -->
</aside>
