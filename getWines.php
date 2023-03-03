<!DOCTYPE html>
<html>
<head>
    <title>Winecrawler Demo</title>
    <link rel="stylesheet" href="winecards.css" type="text/css" />
</head>
<body>


<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<center>
    <h1>Dave's Wonderful Washington Wine Finder</h1>
</center>
<?php
$selected_varietal = $_POST['varietal'];
$selected_area = $_POST['area'];
$selected_price = $_POST['price'];
$selected_sort = $_POST['sortBy'];

$sqlStmnt = "SELECT 
	winery.name as wineryname,
    winery.address,
    winery.city,
    winery.state,
    winery.zip,
    winery.phone,
    winery.email,
    winery.mapembed,
    winery.maplink,
    wines.name,
    wines.description,
    wines.vintage,
    wines.price,
    wines.winePrice,
    wines.url,
    wines.imagesource
FROM winery
INNER JOIN wines on winery.idwinery=wines.idwinery";

//Add varietal to select
if ($selected_varietal != "ALL")
{
    $sqlStmnt .= " WHERE wines.varietal LIKE '%$selected_varietal%'";
}
else
{
    $sqlStmnt .= " WHERE wines.name LIKE '%%'";
}

//add area to select
if ($selected_area != "ALL")
{
    $sqlStmnt .= " AND city LIKE '%$selected_area%'";
}
else
{
    $sqlStmnt .= " AND city LIKE '%%'";
}

// add price to select
if ($selected_price != "ALL")
{
    $sqlStmnt .= " AND winePrice ";
    $sqlStmnt .= $selected_price;
}
$sqlStmnt .= " AND price >0";
$sqlStmnt .= $selected_sort;

//echo $sqlStmnt;

require_once 'dbconnect.php';
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // execute the sql select statement
    $q = $pdo->query($sqlStmnt);
    $q->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error occurred:" . $e->getMessage());
}
?>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
<div class="container">
    <h3 class="pb-3 mb-4 font-italic border-bottom">
    </h3>
    <div class="row">


<table>
    <?php while ($r = $q->fetch()): ?>
<tr>
        <div class="card flex-md-row mb-4 shadow-sm h-md-250" style="width: 100rem;">
            <div class="card-body d-flex flex-column align-items-start">
                <strong class="d-inline-block mb-2 text-primary"><?php echo $r['wineryname'] ?></strong>
                <p class="card-text mb-auto"><?php echo $r['address'] ?></p>
                <p class="card-text mb-auto">Phone: <?php echo $r['phone'] ?></p>
                <br>
                <strong class="d-inline-block mb-2 text-primary"><?php echo $r['name'] ?></strong>
                <div class="mb-1 text-muted small">$<?php echo $r['price'] ?> </div>
                <p class="card-text mb-auto"><?php echo $r['description'] ?>.</p>

                <a class="btn btn-primary btn-sm" role="button" href=<?php echo $r['url'] ?>>Go to Wine</a>
            </div>
            <img class="card-img-right flex-auto d-none d-lg-block" alt="Thumbnail [200x250]" src=<?php echo $r['imagesource'] ?> style=" height: 250px;">
        </div>
</tr>
    <?php endwhile; ?>
</table>
</body>
</html>