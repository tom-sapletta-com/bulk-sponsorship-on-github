<?php
// http://localhost:8080/list.php
error_reporting(E_ERROR | E_PARSE);
require('.apifunc/apifunc.php');

header('Content-Type: application/json');

try {
    $file_path_list = [];
    $file_content_list = [];
    $file_list = [];

    apifunc([
        'https://php.letjson.com/let_json.php',
        'https://php.defjson.com/def_json.php',
        'https://php.letpath.com/let_path.php',
        'https://php.eachfunc.com/each_func.php',
    ], function () {


        $path = '/*/*/.gitattributes';
        //$path = '/*/*/index.html';
        //$path = [    '/*/*/.github/FUNDING.yml'        ];
        $result = [];

        $list = let_path($path, function($file_path){
            //echo "<hr>";
            //var_dump($file_path);
            //global $file_path_list;
            //$file_path_list[] = $file_path;

            $file = file_get_contents($file_path, true);
            //var_dump($file);
            //global $file_content_list;
            //$file_content_list[] = $file;
            global $file_list;
            $file_list[] = [
                $file_path => $file
            ];
        });

        //var_dump($list);

        if (empty($list)) {
            throw new Exception("domain list is empty");
        }

        global $file_list;
        echo def_json('', [
            'file_list' => $file_list,
            'error' => false
        ]);

    });

} catch (Exception $e) {
    // Set HTTP response status code to: 500 - Internal Server Error
    echo def_json('', [
        'message' => $e->getMessage(),
        'error' => true
    ]);
}

