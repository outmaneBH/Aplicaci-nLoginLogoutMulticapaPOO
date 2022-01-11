<?php

/*
 * @author: OUTMANE BOUHOU
 * @updated: 02/1/2022
 * @see : Desarrollo de una aplicación (Proyecto LoginLogout MultiCapa) con control de acceso e identificación del
  usuario basado en un formulario */

/* Si el usuario ha pulsado el button cancelar */
if (isset($_REQUEST['btncancelar'])) {
    $_SESSION['paginaEnCurso'] = $controllers['inicio'];
    header("Location:index.php");
    exit;
}

/* los variables de la session */
$objectUsuario = $_SESSION['usuario202DWESLoginLogoutMulticapaPOO'];
$USER = $objectUsuario->get_codUsuario();
$Desc = $objectUsuario->get_descUsuario();

/* Si el usuario ha pulsado el button delete,llamamos al metodo borrar del clase usuarioPdo y volver nos a login */
if (isset($_REQUEST['btndelete'])) {
    $borrar = UsuarioPDO::borrarUsuario($USER);
    if ($borrar) {
        session_destroy();
        $_SESSION['paginaEnCurso'] = $controllers['login'];
        header("Location:index.php");
        exit;
    }
}

$paginaEnCurso = $views['borrar'];
/* meter la vista de borrar en un variable y devolver layout */
require_once $views['layout'];
?>