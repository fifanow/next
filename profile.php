<?php include 'include/mainheader.php';?>
<body>

    <!-- container -->
    <div class="container">
      <div class="row">
      <div class="col-md-12 col-xs-12">
        <div class="page-header">
        <br>    <h1>Editing the Profile</h1>
        </div>

    <!-- html form to create product will be here -->

<!-- html form here where the product information will be entered -->
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" encodedtype="multipart/form-data">
    
                   <?php 
            include 'config/database.php';?>
            <?php
echo "<table class='table table-bordered table-responsive table-condensed'>";

            foreach ($con->query("SELECT * FROM name where username='{$_SESSION["username"]}';")as $row) {

                
                echo"<tr>";
                echo"<td>";
echo $row['id'] . '<br />';
echo "</td>";
                echo "<td>";
echo $row['name'] . '<br />';
echo "</td>";
echo "<td>";
echo "<a href='deleteit.php?id=$row[id]' class='btn btn-primary m-r-1em'><i class='glyphicon glyphicon-trash'></i></a>";
echo "</td>";
echo "<tr>";

            };
            echo "</table>";
          ?>



        

</div>
          </div>
    </div> <!-- end .container -->

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->


</body>
</html>