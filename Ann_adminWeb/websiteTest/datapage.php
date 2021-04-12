<html>
<head>
    <title>Database</title>
    
</head>
<body>
<a href="index.php">home</a>
</body>
</html>
<?php
$sql_queryn = "INSERT into needs(Pizza_ID,Ingr_ID) values";
if(!empty($topping)) {
    $i=0;
    while($topping[$i]) {
        $sql_queryn .= "(".$PizzaIDvar.",";
        $toppingIDvar = "SELECT Ingr_ID from ingredients where Ingr_ID=\"".$toppping[$i]."\"";
        $sql_queryn .= $toppingIDvar.")";
    }
}
?>