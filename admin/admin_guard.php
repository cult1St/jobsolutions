<?php

error_reporting(E_ALL);

if (!isset($_SESSION['adminonline'])) {
    $_SESSION['admin_errormsg'] = "You need to login to access this page";
    header("location:index.php");
    exit();
}
if (!function_exists('base_url')) {
    function base_url($url = '')
    {
        // Protocol
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';

        // Host
        $host = $_SERVER['HTTP_HOST'];

        // Base path (directory of current script)
        $basePath = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');

        // Clean incoming URL
        $url = ltrim($url, '/');

        // Build final URL
        return $protocol . '://' . $host . $basePath . '/' . $url;
    }
}



?>