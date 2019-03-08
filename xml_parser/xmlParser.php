<?php

require_once('./imagesParser.php');
require_once('./database/conn.php');


$products = simplexml_load_file("./src/products_1927a13ce63d227pl.xml")
or die("Error: Nie można utworzyć objektu");

//$products = $products->xpath('item');

echo "<pre>";

$inserted = 0;
$exist = 0;
$errors= 0;

foreach ($products->item as $product) {


    $data = [];

    foreach ($product as $key => $val) {

        if ($key == 'prod_symbol') {
            $path = "./images/$val/".date('Y_m_d-H_i_s')."/";

        }

        if ($key == 'prod_img') {


            $images = $val->img;

            $val = "'".json_encode(($images))."'";


//                POBIERANIE ZDJĘC NA DYSK

     /*       foreach ( $images as $url){
                imagesParser($url, $path);
            }*/

        } else {


            if ($val == '') {
                $val = null;
            } elseif (strpos($val, '<![CDATA') == false) {
                $val = "'".(string)$val."',";
            }

        }

        array_push($data, $val);


    }


    $query = 'INSERT INTO '.$config['database'].".products(
prod_name,
prod_id,
prod_price,
prod_tax_id,
taxpercent,
prod_oldprice,
prod_buy_price_net,
prod_amount,
prod_hidden,
prod_symbol,
prod_weight,
prd_name,
prod_pkwiu,
prod_ean,
prod_isbn,
prod_barcode,
prod_ship_days,
prod_desc,
prod_shortdesc,
prod_info1_pl,
prod_info2_pl,
prod_info3_pl,
prod_info4_pl,
prod_info5_pl,
prod_note,
prod_seotitle_pl,
prod_seodesc_pl,
prod_keywords_pl,
prod_sales_gain,
prod_link,
prod_price_base,
prod_price_net_base,
prod_price_net,
cat_path,
prod_img) VALUES (";

    for ($i = 0; $i < 34; $i++) {
        $query .= " ?,";
    }

    $query .= " ?)";


    try {
        $stmt = $conn->prepare($query);

        if ($stmt->execute($data)) {
            $inserted++;
        }

    } catch (Exception $e) {

        if($e->getCode()){
            $exist++;
        }
        else{
            $errors++;
        }

    }

}
$conn = null;

echo "<h1>PLIK SPARSOWANY<br>Podsumowanie:<hr>";
echo "<h3>Liczba wgranych produktów: $inserted<hr></h3>";
echo "<h3>Liczba nie wgranych produktów: $exist <br>
        (zaktualizowano folder ze zdjęciami, nie zapisano nowego rekordu do bazy - duplikaty 'prod_symbol' )<hr></h3>";
echo "<h3>Liczba nie wgranych produktów (inne wyjątki): $errors<hr></h3>";


