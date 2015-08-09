<?php
set_include_path( '.' . PS . realpath( '../src' ) . DS . PS . get_include_path());

spl_autoload_register(
    function( $classname ){
        require_once str_replace( '\\', DIRECTORY_SEPARATOR, $classname ) . '.php';
});
?>