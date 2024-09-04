<?php

function createResponse($error, $message, $data) {
    return [
        'error' => $error,
        'message' => $message,
        'data' => $data
    ];
}

function response($res) {
    print(json_encode($res));
}

?>