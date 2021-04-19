<html>
<head>
	<style>
/* Style the tab */
		.tab {
  		float: left;
 		 	border: 1px solid #ccc;
  		background-color: #2F4F4F;
  		width: 20%;
  		height: 100%;
		}
		/* Style the buttons inside the tab */
		.tab button {
			display: block;
			background-color: inherit;
			color: white;
  		padding: 22px 16px;
  		width: 100%;
  		border: none;
  		outline: none;
  		text-align: left;
  		cursor: pointer;
  		transition: 0.3s;
  		font-size: 17px;
		}
		/* Change background color of buttons on hover */
		.tab button:hover {
  		background-color: #ddd;
		}
		/* Create an active/current "tab button" class */
		.tab button.active {
  		background-color: #A52A2A;
		}
		.header {
 		 	padding: 5px;
  		text-align: center;
  		background: #2F4F4F;
  		color: white;
  		font-size: 15px;
		}
		.panel{
			margin-top: 30px;
  		margin-bottom: 20px;
  		margin-right: 15px;
  		margin-left: 20%;
		}
		.body{
			background-color: #F8F8FF;
			font-family: "Century Gothic"
		}
		.footer {
  		position: fixed;
  		left: 20%;
  		bottom: 0;
			background-color: white;
  		width: 100%;
  		color: black;
  		text-align: left;
		}
		.footer_text{
			margin-top: 2px;
 		 	margin-bottom: 2px;
  		margin-left: 3%;
			color: gray;
		}
	</style>
</head>
<body class="body">
	<div class="header">
		<p>Lab-6</p>
	</div>
	<div class="tab">
		<button class="tablinks" onclick="parent.location='http://localhost:8000/account'" id="stud">ACCOUNT</button>
		<button class="tablinks" onclick="parent.location='http://localhost:8000/transaction'" id="srch">TRANSACTION</button>
	</div>
<script>
	var url = window.location.href;//odoogin url
	var i, tablinks;
	
	tablinks = document.getElementsByClassName("tablinks");
	if(url.includes("http://localhost:8000/account")){
		//herew button-ii class ni active baiwal boliulah
		for (i = 0; i < tablinks.length; i++) 
			tablinks[i].className = tablinks[i].className.replace(" active", "");
		document.getElementById("stud").classList.add("active");
	}
	if(url.includes("http://localhost:8000/transaction")){
		//herew button-ii class ni active baiwal boliulah
		for (i = 0; i < tablinks.length; i++) 
    	tablinks[i].className = tablinks[i].className.replace(" active", "");
		//search url-tai baiwal search button-g zowloh
		document.getElementById("srch").classList.add("active");
	}
</script>
<div class="panel" >@yield('content')</div>
<div class="footer">
  <div class="footer_text">2021 it301 B180910018</div>
</div>
	</body>
</html>