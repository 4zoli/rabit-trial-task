<?php session_unset();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Users</h2>
                    </div>
                    <?php ;
                        if(sizeof($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";                                        
                                        echo "<th>User Name</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                    for ($i = 0; $i < sizeof($result); $i++) {
                                        echo "<tr>";
                                            echo "<td>" . $result[$i]->id . "</td>";
                                            echo "<td>" . $result[$i]->name. "</td>";
                                        echo "</tr>";
                                    }
                                echo "</tbody>";
                            echo "</table>";
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    ?>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>