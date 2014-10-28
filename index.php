<?php require "lib/Database.php";

// PDO

/*$stmt = $db->query("SELECT * FROM customers");

$customers = $stmt->fetchAll(PDO::FETCH_OBJ);
 	SELECT customers.customerName, payments.amount FROM customers INNER JOIN payments WHERE 
 	customers.customerNumber = payments.customerNumber AND (SELECT SUM((payments.amount + payments.customerNumber)> 100000) AS TotalAmount)
foreach ($customers as $customer) {
 	echo $customer->customerName . '<br>';
 } */

/*
$stmt = $db->query("SELECT employees.lastName, employees.firstName, offices.country FROM employees INNER JOIN offices WHERE employees.officeCode = offices.officeCode AND offices.country = 'USA'");

$productlines = $stmt->fetchAll(PDO::FETCH_OBJ);

foreach ($productlines as $productline) {
	echo "<h5>" . $productline->country . '</h5>';
 	echo $productline->firstName . ' ';
 	echo $productline->lastName . '<br>';*/

$db = new Database('classicmodels', '', 'root', 'localhost');

$db->query("SELECT * FROM products GROUP BY productLine");

$products = $db->getall();

var_dump($products);
foreach ($products as $product) : 
	$productline1 = $product->productLine;
	$db->query("SELECT * FROM products WHERE productLine = '$product->productLine'");

	$products1 = $db->getall();

	?>

	<thead>  
			<tr>
				<td class="col-sm-2"><?= $product->productLine?></td>
				<br>
				<?php foreach ($products1 as $product1) : ?>
				<td class="col-sm-2"><?= "  -".$product1->productName?></td>
				<br>


<?php 	endforeach;?>
			</tr>
		</thead>
<?php 	endforeach;?>




<!-- 
/*foreach ($products as $product) {
	$productname = explode(" ", $product->productName);
	if(is_numeric($productname[0]))
		{
			unset($productname[0]);
		}
	$productname = implode($productname, " ");
	echo $productname;*/

/*	echo $product->productName;*/
	echo "<br>";
 -->


 	
