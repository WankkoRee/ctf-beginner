<?php
highlight_file(__FILE__);

if( isset( $_REQUEST[ 'ip' ] ) ) {
    $target = $_REQUEST[ 'ip' ];
    $substitutions = array(
        '&'  => '',
        ';'  => '',
        '| ' => '',
        '-'  => '',
        '$'  => '',
        '('  => '',
        ')'  => '',
        '`'  => '',
        '||' => '',
    );
    $target = str_replace( array_keys( $substitutions ), $substitutions, $target );
    $cmd = shell_exec( "ping -c 1 $target" );
    echo "<pre>{$cmd}</pre>";
}
