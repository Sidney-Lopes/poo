<?php
set_include_path( '.' . PATH_SEPARATOR . realpath( 'src' ) . DIRECTORY_SEPARATOR . PATH_SEPARATOR . get_include_path());

spl_autoload_register(
    function( $classname ){
        require_once str_replace( '\\', DIRECTORY_SEPARATOR, $classname ) . '.php';
});