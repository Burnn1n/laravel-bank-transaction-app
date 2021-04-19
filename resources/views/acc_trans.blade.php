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
				.link{
					float: right;
				}
				</style>
    </head>
    <body>
        <div class="container">
					<form action="search" method="post">
						<div class="card">
							<div class="card-header bg-transparent">
								<div class="col-sm-12">
									<h3>Бүх гүйлгээ
										<div class="link"><a href="http://localhost:8000/account">Бүх данс</a></div>
									</h3>
								</div>
							</div>
							<div class="card-body">
								{{ csrf_field()}}
								<div class="col-sm-12">
									<h2>Зарлага</h2>
								</div>
								<div class="col-sm-12">
								<?php
								//print table
								$sql = "select * from trans where transaction_from = $acc_number";
                $result = mysqli_query($conn,$sql);
                echo "<table class='table table-striped mt-3'>";
                echo "<tr><th>#</th><th>Хэнээс</th>
								<th>Хэнд</th><th>Гүйлгээний дүн</th><th>Гүйлгээний утга</th></tr>";
								$id = 1;
                while($row = mysqli_fetch_assoc($result)){
                    $from = $row["transaction_from"];
                    $to = $row["transaction_to"];
                    $amount = $row["transaction_amount"];
										$desc = $row["transaction_description"];
                    echo "<tr>";
                    echo "<td>$id</td><td>$from</td><td>$to</td><td>$amount</td><td>$desc</td>";
										$id +=1;
                }
								echo "</tr><table>";
            		?>

								</div>

								<div class="col-sm-12">
									<h2>Орлого</h2>
								</div>
								<div class="col-sm-12">
								<?php
								//print table	
								$sql = "select * from trans where transaction_to = $acc_number";
                $result = mysqli_query($conn,$sql);
                echo "<table class='table table-striped mt-3'>";
                echo "<tr><th>#</th><th>Хэнээс</th>
								<th>Хэнд</th><th>Гүйлгээний дүн</th><th>Гүйлгээний утга</th></tr>";
								$id = 1;
                while($row = mysqli_fetch_assoc($result)){
                    $from = $row["transaction_from"];
                    $to = $row["transaction_to"];
                    $amount = $row["transaction_amount"];
										$desc = $row["transaction_description"];
                    echo "<tr>";
                    echo "<td>$id</td><td>$from</td><td>$to</td><td>$amount</td><td>$desc</td>";
										$id +=1;
                }
								echo "</tr><table>";
            		?>

								</div>
							</div>
						</div>
					</form>
        </div>
    </body>
</html>
@endsection