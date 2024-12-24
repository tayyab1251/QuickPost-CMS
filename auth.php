<?php

function require_auth()
{

    /*
        RewriteEngine On
        RewriteCond %{HTTP:Authorization} ^(.)
        RewriteRule . - [e=HTTP_AUTHORIZATION:%1]
    */

    $AUTH_USER = 'myUser';
    $AUTH_PASS = 'myPass';

    header('Cache-Control: no-cache, must-revalidate, max-age=0');

    if (! empty($_SERVER['REDIRECT_HTTP_AUTHORIZATION'])) {
        preg_match('/^Basic\s+(.*)$/i', $_SERVER['REDIRECT_HTTP_AUTHORIZATION'], $AUTH_PASS);

        $str = base64_decode($AUTH_PASS[1]);

        list($_SERVER['PHP_AUTH_USER'], $_SERVER['PHP_AUTH_PW']) = explode(':', $str);
    }

    $has_supplied_credentials = !(empty($_SERVER['PHP_AUTH_USER']) && empty($_SERVER['PHP_AUTH_PW']));

    $is_not_authenticated = (
        !$has_supplied_credentials ||
        $_SERVER['PHP_AUTH_USER'] != $AUTH_USER || $_SERVER['PHP_AUTH_PW']   != $AUTH_PASS
    );

    if ($is_not_authenticated) {
        header('HTTP/1.1 401 Authorization Required');
        header('WWW-Authenticate: Basic realm="Access denied"');
        exit;
    }
}

