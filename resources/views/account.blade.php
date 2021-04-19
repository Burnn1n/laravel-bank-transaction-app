@extends('layouts.master')
@section('content')
<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "it301";
$conn = mysqli_connect($servername, $username, $password, $dbname);
?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
				<style>
				thead{
					background-color:#2F4F4F;
					color: white;
				}
				</style>
    </head>
    <body>
        <div class="container">
					<form action="search">
						<div class="card">
							<div class="card-header bg-transparent"><div class="col-sm-6"><h3>Бүх данс</h3></div></div>
							<div class="card-body">
								{{ csrf_field()}}
								<div class="col-sm-12">
								<?php

								$sql = "select * from acc";
                $result = mysqli_query($conn,$sql);
                echo "<table class='table'>";
                echo "<thead><tr><th>#</th><th>Дансны дугаар</th>
								<th>Дансны нэр</th><th>Дансны үлдэгдэл</th></tr></thead><tbody>";
                while($row = mysqli_fetch_assoc($result)){
                    $id = $row["id"];
                    $num = $row["acc_number"];
                    $name = $row["acc_name"];
                    $balance = $row["acc_balance"];
                    echo "<tr>";
                    echo "<td>$id</td><td>
										<a href = 'account/$num'>$num</a>
										</td><td>$name</td><td>$balance</td>";
                }
								echo "</tr></tbody><table>";
            		?>

								</div>
							</div>
						</div>
					</form>
        </div>
    </body>
</html>
@endsection