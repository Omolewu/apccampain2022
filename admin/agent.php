<?php
require 'header.php';
require('../inc/db.php');
// get all the agents
$sql = "SELECT * FROM admin_user WHERE role = 'user'";
$result = $dbc->query($sql);

if ($result->num_rows > 0) {
    $allagents = $result->fetch_all(MYSQLI_ASSOC);
}

?>
<!-- <div class="wrapper"> -->
<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
    Osun APC Campaign 2020
</div>
<?php require('inc/nav-section.php'); ?>
<!-- Tabable-->
<section class="content mt-4">
    <div class="container-fluid ">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"> All Registeration Agent</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Username</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (count($allagents) > 0) {
                                    $i = 0;
                                    foreach ($allagents as $agent) {
                                        $name = $agent['username'];
                                        $i++;    
                                        echo "<tr>
                                        <td> $i </td>
                                        <td> $name </td> 
                                </tr>";
                                    }
                                     } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>S/N</th>
                                    <th>Username</th>
                                  </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.section -->
<?php
require 'footer.php';

?>