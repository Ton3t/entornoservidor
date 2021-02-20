<?php

//TODO: Escribir SECRET_KEY
define("RECAPTCHA_V3_SECRET_KEY", "6LfyOeoZAAAAAOOkgTYv1KP6h_LmsHOM0scPxvO4");

if (isset($_POST["email"]) && $_POST["email"]) 
{
    $email = filter_var($_POST["email"], FILTER_SANITIZE_STRING);
} 
else 
{
    die("email falla");
    header("location: index.html");
    exit;
}

if (isset($_POST["token"]) && $_POST["token"]) 
{
    $token = filter_var($_POST["token"], FILTER_SANITIZE_STRING);
} 
else 
{
    die("token falla");
    header("location: index.html");
    exit;
}

if (isset($_POST["action"]) && $_POST["action"]) 
{
    $action = filter_var($_POST["action"], FILTER_SANITIZE_STRING);
} 
else 
{
    die("Action falla");
    header("location: index.html");
    exit;
}

$url = "https://www.google.com/recaptcha/api/siteverify";
$data = array("secret" => RECAPTCHA_V3_SECRET_KEY, "response" => $token);

$options = array(
    "http" => array(
        "header"  => "Content-type: application/x-www-form-urlencoded",
        "method"  => "POST",
        "content" => http_build_query($data)
    )
);

$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);

if ($result === FALSE) 
{
    echo "Error con la petición";
} 
else 
{
    $response = json_decode($result, true);

    if ($response["success"] == "1" && $response["action"] == $action && $response["score"] >= 0.5) 
    {
        echo "Todo OK";
    } 
    else 
    {
        echo "Error";
    }
}
?>