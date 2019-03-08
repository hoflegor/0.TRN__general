
* ##### CREATE DATABASE...
````
 CREATE DATABASE xml_parser CHARACTER SET utf8 COLLATE utf8_general_ci
 ````

* ##### CREATE TABLE...

````
CREATE TABLE xml_parser.products (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  `prod_name` VARCHAR(255),
  `prod_id` INT,
  `prod_price` INT,
  `prod_tax_id` INT,
  `taxpercent` INT,
  `prod_oldprice` INT,
  `prod_buy_price_net` INT,
  `prod_amount` INT,
  `prod_hidden` SMALLINT(1),
  `prod_symbol` VARCHAR(255) UNIQUE ,
  `prod_weight` INT,
  `prd_name` VARCHAR(255),
  `prod_pkwiu` VARCHAR(255),
  `prod_ean` BIGINT,
  `prod_isbn` INT,
  `prod_barcode` INT,
  `prod_ship_days` VARCHAR(255),
  `prod_desc` TEXT,
  `prod_shortdesc` VARCHAR(255),
  `prod_info1_pl` VARCHAR(255),
  `prod_info2_pl` VARCHAR(255),
  `prod_info3_pl` VARCHAR(255),
  `prod_info4_pl` VARCHAR(255),
  `prod_info5_pl` VARCHAR(255),
  `prod_note` VARCHAR(255),
  `prod_seotitle_pl` VARCHAR(255),
  `prod_seodesc_pl` VARCHAR(255),
  `prod_keywords_pl` VARCHAR(255),
  `prod_sales_gain` VARCHAR(255),
  `prod_link` VARCHAR(255),
  `prod_price_base` VARCHAR(255),
  `prod_price_net_base` VARCHAR(255),
  `prod_price_net` VARCHAR(255),
  `cat_path` VARCHAR(255),
  `prod_img` TEXT
)
````