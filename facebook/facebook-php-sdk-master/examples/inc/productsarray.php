<?php 

try { 
    $db = new PDO("mysql:host=10.1.1.73;dbname=dev;port=3306","ahoward","ah");
    $db->exec("SET NAMES 'utf8'");
} catch (Exception $e) {
    echo "Could not connect to the database.";
    exit;
}
 try { 
    $results = $db->query("SELECT hh_inventory.ID AS PID, hh_inventory.TITLE AS name, hh_inventory.IMG_URL AS img, hh_inventory.ORIGINAL AS ORAVAIL, 
        hh_inventory.ORIG_MED AS ORMED, hh_inventory.ORIG_DIM AS ORDIM, min(PRICE) AS price, giclee.IMG_DIM as IMGDIM, giclee.PAPER_DIM AS PAPERDIM, hh_inventory.STYLE AS STYLE
        FROM hh_inventory INNER JOIN giclee ON hh_inventory.ID=giclee.ID GROUP BY hh_inventory.ID");
 } catch (exception $e) {
    echo "FUCKING SHIT";
    exit;
 };

    $products = $results->fetchAll(PDO::FETCH_ASSOC);



$flowers = $db->query("SELECT hh_inventory.ID AS PID, hh_inventory.TITLE AS name, hh_inventory.IMG_URL AS img, min(PRICE) AS price, hh_inventory.ORIGINAL AS ORAVAIL, 
        hh_inventory.ORIG_MED AS ORMED, hh_inventory.ORIG_DIM AS ORDIM, giclee.PrimKey1 as PRIMKEY, giclee.IMG_DIM as IMGDIM, giclee.PAPER_DIM AS PAPERDIM, hh_inventory.STYLE AS STYLE
        FROM hh_inventory INNER JOIN giclee ON hh_inventory.ID=giclee.ID WHERE hh_inventory.ID BETWEEN 100 AND 199 GROUP BY hh_inventory.ID ");

$flowersrs = $flowers->fetchAll(PDO::FETCH_ASSOC);


$chinosieres = $db->query("SELECT hh_inventory.ID AS PID, hh_inventory.TITLE AS name, hh_inventory.IMG_URL AS img, min(PRICE) AS price, hh_inventory.ORIGINAL AS ORAVAIL, 
        hh_inventory.ORIG_MED AS ORMED, hh_inventory.ORIG_DIM AS ORDIM, giclee.PrimKey1 as PRIMKEY, giclee.IMG_DIM as IMGDIM, giclee.PAPER_DIM AS PAPERDIM, hh_inventory.STYLE AS STYLE
        FROM hh_inventory INNER JOIN giclee ON hh_inventory.ID=giclee.ID WHERE hh_inventory.ID BETWEEN 200 AND 299 GROUP BY hh_inventory.ID ");

$chinosieresr = $chinosieres->fetchAll(PDO::FETCH_ASSOC); 


$gardens = $db->query("SELECT hh_inventory.ID AS PID, hh_inventory.TITLE AS name, hh_inventory.IMG_URL AS img, min(PRICE) AS price, hh_inventory.ORIGINAL AS ORAVAIL, 
        hh_inventory.ORIG_MED AS ORMED, hh_inventory.ORIG_DIM AS ORDIM, giclee.PrimKey1 as PRIMKEY, giclee.IMG_DIM as IMGDIM, giclee.PAPER_DIM AS PAPERDIM, hh_inventory.STYLE AS STYLE
        FROM hh_inventory INNER JOIN giclee ON hh_inventory.ID=giclee.ID WHERE hh_inventory.ID BETWEEN 400 AND 499 GROUP BY hh_inventory.ID ");

$gardensrs = $gardens->fetchAll(PDO::FETCH_ASSOC); 


$miscellaneous = $db->query("SELECT hh_inventory.ID AS PID, hh_inventory.TITLE AS name, hh_inventory.IMG_URL AS img, min(PRICE) AS price, hh_inventory.ORIGINAL AS ORAVAIL, 
        hh_inventory.ORIG_MED AS ORMED, hh_inventory.ORIG_DIM AS ORDIM, giclee.PrimKey1 as PRIMKEY, giclee.IMG_DIM as IMGDIM, giclee.PAPER_DIM AS PAPERDIM, hh_inventory.STYLE AS STYLE
        FROM hh_inventory INNER JOIN giclee ON hh_inventory.ID=giclee.ID WHERE hh_inventory.ID BETWEEN 500 AND 599 GROUP BY hh_inventory.ID ");

$miscellaneousrs = $miscellaneous->fetchAll(PDO::FETCH_ASSOC); 


$shells = $db->query("SELECT hh_inventory.ID AS PID, hh_inventory.TITLE AS name, hh_inventory.IMG_URL AS img, min(PRICE) AS price, hh_inventory.ORIGINAL AS ORAVAIL, 
        hh_inventory.ORIG_MED AS ORMED, hh_inventory.ORIG_DIM AS ORDIM, giclee.PrimKey1 as PRIMKEY, giclee.IMG_DIM as IMGDIM, giclee.PAPER_DIM AS PAPERDIM, hh_inventory.STYLE AS STYLE
        FROM hh_inventory INNER JOIN giclee ON hh_inventory.ID=giclee.ID WHERE hh_inventory.ID BETWEEN 600 AND 699 GROUP BY hh_inventory.ID ");

$shellsrs = $shells->fetchAll(PDO::FETCH_ASSOC); 

return $shellsrs;

return $miscellaneousrs;

return $gardensrs;

return $chinosieresr;

return $flowersrs; 

return $products;

?>

<!--
$products = array();
$products[1] = array(
    "name" => "Carried Away by the Wind",
    "img" => "img/Artwork/Flower Ladies/A-1 CarriedAwaybytheWind LG.jpg",
    "price" => 350.00   
);
$products[2] = array(
    "name" => "Writing Desk",
    "img" => "img/Artwork/Flower Ladies/A2_big.jpg",
    "price" => 350.00
);
$products[3] = array(
    "name" => "Night Arbor",
    "img" => "img/Artwork/Flower Ladies/A-3 NightArbor LG.jpg",    
    "price" => 350.00
);
$products[4] = array(
    "name" => "The Pink Parasol",
    "img" => "img/Artwork/Flower Ladies/A-4 ThePinkParasol MD.jpg",    
    "price" => 350.00
);
$products[5] = array(
    "name" => "Shells With Black Coral",
    "img" => "img/Artwork/Shells/S-2 ShellsWithBlackCoral LG.jpg",    
    "price" => 350.00
);
$products[6] = array(
    "name" => "Red Sea Grass",
    "img" => "img/Artwork/Shells/SM-1 BeautifulVolute_RedSeaGrass LG.jpg",    
    "price" => 350.00
);
$products[7] = array(
    "name" => "Bibliophile",
    "img" => "img/Artwork/Chinosieres/C3_Bibliophile_Lg_HHH_Websi.jpg",    
    "price" => 350
);
$products[8] = array(
    "name" => "Tea for Two",
    "img" => "img/Artwork/Chinosieres/C18-Tea-for-Two-lg-hhh-web.jpg",    
    "price" => 25,
);
$products[9] = array(
    "name" => "Festival",
    "img" => "img/Artwork/Flower Ladies/A-16 Festival LG.jpg",    
    "price" => 350.00
);

?>
