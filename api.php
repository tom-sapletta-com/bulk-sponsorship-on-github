<?php
// http://localhost:8080/api.php?path=/*/index.html

error_reporting(E_ERROR | E_PARSE);

require('.apifunc/apifunc.php');

header('Content-Type: application/json');

try {
    $path = $_GET['path'];
    $path_content_list = [];

    apifunc([
        'https://php.letjson.com/let_json.php',
        'https://php.defjson.com/def_json.php',
        'https://php.letpath.com/let_path.php',
        'https://php.eachfunc.com/each_func.php',
    ], function () {

        global $path;

        $list = let_path($path, function ($file_path) {
            $file = file_get_contents($file_path, true);
            global $path_content_list;
            $path_content_list[] = [
                $file_path => $file
            ];
        });

        if (empty($list)) {
            throw new Exception("domain list is empty");
        }

        global $path_content_list;
        echo def_json('', [
            'path_content' => $path_content_list,
            'path' => $path,
            'error' => false
        ]);

    });

} catch (Exception $e) {
    // Set HTTP response status code to: 500 - Internal Server Error
    echo def_json('', [
        'message' => $e->getMessage(),
        'path' => $path,
        'error' => true
    ]);
}

