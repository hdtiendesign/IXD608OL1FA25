<?php
ini_set('display_errors',1);
error_reporting(E_ALL);

include_once "../lib/php/function.php";

$output = [];

$data = json_decode(file_get_contents("php://input"));

if(!$data) {
    echo json_encode(["error"=>"No Valid Type"]);
    exit;
}

$type = $data->type ?? "";

switch ($type) {


    case "products_all":
        $output['result'] = makeQuery(
            makeConn(),
            "SELECT *
            FROM `products`
            ORDER BY `date_create` DESC"
        );
        break;


    case "product_search":
        $search = $data->search ?? "";

        $output['result'] = makeQuery(
            makeConn(),
            "SELECT *
            FROM `products`
            WHERE
                `name` LIKE '%$search%' OR
                `description` LIKE '%$search%' OR
                `category` LIKE '%$search%'
            ORDER BY `date_create` DESC"
        );
        break;


    case "product_filter":
        $column = $data->column;
        $value  = $data->value;

        $output['result'] = makeQuery(
            makeConn(),
            "SELECT *
            FROM `products`
            WHERE `$column` LIKE '%$value%'
            ORDER BY `date_create` DESC"
        );
        break;


    case "product_sort":
        $column = $data->column;
        $dir    = $data->dir;

        $output['result'] = makeQuery(
            makeConn(),
            "SELECT *
            FROM `products`
            ORDER BY `$column` $dir"
        );
        break;


    default:
        $output['error'] = "No Valid Type";
        break;
}

echo json_encode($output);
?>
