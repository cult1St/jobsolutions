<?php

function base_url($url = "") {
    // Determine the protocol (HTTP or HTTPS)
    $protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 'https' : 'http';
    
    // Get the host (e.g., example.com)
    $host = $_SERVER['HTTP_HOST'];
    
    // Get the directory path of the current script (without the file name)
    $basePath = dirname($_SERVER['PHP_SELF']);
    
    // Make sure the base path has a trailing slash
    $basePath = rtrim($basePath, '/') . '/';
    
    // Construct and return the base URL
    return $protocol . '://' . $host . $basePath. "/". $url;
  }