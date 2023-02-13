<?php

/**
 * htmlspecialchars
 * 
 * @param string $str
 * @return string
 */
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

/**
 * hbr
 * 
 * @param string $str
 * @return string
 */
function hbr($str)
{
    return nl2br(h($str));
}

/**
 * 
 */
function getJsonRequestAsArray()
{
    return json_decode(file_get_contents('php://input'), true);
}


/**
 * Response JSON
 * 
 * @param int $status
 * @param string $body
 * @return void
 */
function response($status, $body)
{
    http_response_code($status);
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode([
        'status' => $status,
        'body' => $body,
    ]);
    exit;
}

/**
 * Redirect
 * 
 * @param string $url
 * @return void
 */
function redirect($url)
{
    header('Location: ' . $url);
    exit;
}

/**
 * Session
 * 
 * @param string $key
 * @param string $value
 * @return string|null
 */
function session($key, $value = null)
{
    if (is_null($value) && isset($_SESSION[$key])) {
        return $_SESSION[$key];
    } else {
        $_SESSION[$key] = $value;
    }
    return null;
}

/**
 * Check Request Method
 * 
 * @param string $method
 * @return string
 */
function isMethod($method)
{
    return $_SERVER['REQUEST_METHOD'] === $method;
}

/**
 * Debug Dump
 * 
 * @param mixed $var
 * @return void
 */
function dd(...$var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
    exit;
}
