<?php
$dbServername = "localhost";
$dbUsername = "user";
$dbPassword = "";
$dbName = "yournetflixwebsite";
$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
   die("Connection failed: ". mysqli_connect_error());
   exit();
}
$dbconfig = mysqli_select_db($conn, $dbName);

if (!$dbconfig) {
    echo `
        <div class = "container">
            <div class = "row">
                <div class = "col-md-8 mr-auto ml-auto text-center py-5 mt-5">
                <div class = "card">
                    <div class = "card-body">
                        <h1 class = "card-title bg-danger text-white">Database Connection Failed</h1>
                        <p class = "card-text">Please Check Your Database Connection.</p>
                        <a href = "#" class = "btn btn-primary">:(</a>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    `;
};

?>