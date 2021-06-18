<pre>
<?php
// http://localhost:8080/list.php
error_reporting(E_ERROR | E_PARSE);
require('.apifunc/apifunc.php');



//let_query(, "/*/*/.github/FUNDING.yml", function(){
//let_path(, "/*/*/.github/FUNDING.yml", function(){
//
//    if
//})
try {

    apifunc([
        'https://php.letjson.com/let_json.php',
        'https://php.defjson.com/def_json.php',
        'https://php.letpath.com/let_path.php',
        'https://php.eachfunc.com/each_func.php',
    ], function () {

         $path = [
             '/tom-sapletta-com/bulk-sponsorship-on-github/.github/FUNDING.yml',
             '/letpath/php/.github/FUNDING.yml',
             '/lettxt/php/.github/FUNDING.yml',
             '/letjson/php/.github/FUNDING.yml'
         ];

         $list = let_path($path, function($file_path){
             echo "<hr>";
             var_dump($file_path);
             $file = file_get_contents($file_path, true);
             var_dump($file);
         });

        var_dump($list);

        if (empty($list)) {
            throw new Exception("domain list is empty");
        }

    }, '.apifunc');

} catch (Exception $e) {
    // Set HTTP response status code to: 500 - Internal Server Error
    echo $e->getMessage();
}

