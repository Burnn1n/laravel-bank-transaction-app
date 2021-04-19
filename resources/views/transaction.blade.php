@extends('layouts.master')
@section('content')
<?php

$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "it301";
$conn = mysqli_connect($servername, $username, $password, $dbname);
//on submit
if(isset($_GET['submit'])) {
	//oroltiin utguudiin hyzgaarlalt
	if(!empty($_GET["from"])&&!empty($_GET["to"])&&!empty($_GET["amount"])&&!empty($_GET["desc"])){
		$from = $_GET["from"];
		$to = $_GET["to"];
		$amount = $_GET["amount"];
		$desc = $_GET["desc"];
		$sql = "SELECT * FROM acc WHERE acc_number=$from;";
		$result = mysqli_query($conn, $sql);
		//shiljiileh dans zow
		if (mysqli_num_rows($result) > 0){
			$sql = "SELECT * FROM acc WHERE acc_number=$to;";
			$result = mysqli_query($conn, $sql);
			//2 dans adilhan baih
			if($from != $to){
				//huleen awah dans zow
			if (mysqli_num_rows($result) > 0){
				$sql = "SELECT acc_balance FROM acc WHERE acc_number=$from";
				$result = mysqli_query($conn, $sql);
				$row = mysqli_fetch_row($result);
				$balance = $row[0];//shiljuulegch dansnii uldegdel
				if($amount > $balance)
					$error = "Дансны үлдэгдэл хүрэлцэхгүй байна";
				//Амжилттай гүйлгээ хийгдсэн
				else{
					$sql = "insert into trans(transaction_from,transaction_to,transaction_amount,transaction_description) 
					values($from,$to,$amount,'$desc');";
					mysqli_query($conn, $sql);
					//guilgeenii toog update hiih shiljuulsen bol dansnii uldegdlees hasah geh met
					$sql = "UPDATE acc SET acc_balance=acc_balance-$amount,updated_at=NOW() WHERE acc_number=$from";
					mysqli_query($conn, $sql);
					$sql = "UPDATE acc SET acc_balance=acc_balance+$amount,updated_at=NOW() WHERE acc_number=$to";
					mysqli_query($conn, $sql);
					$success = "Гүйлгээ амжилттай хийгдлээ";
				}
			}
			else
				$error = "Хүлээн авах дансны дугаар буруу";
			}
			else
				$error = "Өөрлүүгээ мөнгө шилжүүлэх боломжгүй";
		}
		else
			$error = "Шилжүүлэх дансны дугаар буруу";
	}
	else
		$error = "Бүгдийг бөглөнө үү";
		
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title></title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
				<style>
					.error{
						color: #D8000C;
						background-color: #FFBABA;
						}
					.success{
						color: white;
						background-color: #22bb33;
					}
					label{
						display:inline-block;
						color: gray;
					}
					.error{
						color: #D8000C;
						background-color: #FFBABA;
						}
				</style>
    </head>
    <body>
        <div class="container">
					<form action="transaction" method="get">
						<div class="card">
							<div class="card-header bg-transparent"><div class="col-sm-6"><h3>CREATE TRANSACTION</h3></div></div>
							<div class="card-body">
								
								<div class="col-sm-6">
                  <label >Шилжүүлэх данс:</label>
                  <input style="display:block;" type="number" name="from" class="form-control"><br>	
                </div>
								<div class="col-sm-6">
                  <label >Хүлээн авах данс:</label>
                  <input style="display:block;" type="number" name="to" class="form-control"><br>	
                </div>
								<div class="col-sm-6">
                  <label >Гүйлгээний дүн:</label>
                  <input style="display:block;" type="number" name="amount" class="form-control"><br>	
                </div>
								<div class="col-sm-6">
                  <label >Гүйлгээний утга:</label>
                  <input style="display:block;" type="text" name="desc" class="form-control"><br>	
                </div>
								<div class="col-sm-6">
								<div class='error'><?php if(isset($error)) echo $error?></div>
								<div class='success'><?php if(isset($success)) echo $success?></div>
                </div>
								<div class="col-sm-6">
									<input type="submit" class = "btn btn-primary"  value="Гүйлгээ хийх" name="submit">
								</div>
							</div>
						</div>
					</form>
        </div>
    </body>
</html>
@endsection