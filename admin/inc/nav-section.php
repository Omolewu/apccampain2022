<?php
$sql = "SELECT * FROM members";
$result = $dbc->query($sql);
$total_mem = $result->num_rows;
// Get the total number of registered memember generated from query in index page where Member query was
$total_mem = $result->num_rows;
// get total ;g
$count = mysqli_query($dbc, "SELECT COUNT(DISTINCT lg) AS total  FROM members ");
$get = mysqli_fetch_assoc($count);

// get total number of registration agent
$agent_sql = mysqli_query($dbc, "SELECT COUNT(id) AS total_agent FROM admin_user WHERE role ='user'");
$res = mysqli_fetch_assoc($agent_sql);
?>

<!-- Heading coutn -->
<section class="content mt-5">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-2 col-6 offset-lg-1">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3> <?php echo $total_mem  ?> </h3>

                        <p>Members Registered</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="index.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-2 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>
                            <?php echo $get['total']; ?>
                        </h3>

                        <p> Available Local Government</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="lg.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-2 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3> <?php echo $res['total_agent']; ?></h3>
                        <p>Registered Agents</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="agent.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->

            <div class="col-lg-2 col-6">
                <!-- small box -->
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3 class="p-3"> </h3>
                        <p class="p-1"> Register Agent</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="add-agent.php" class="small-box-footer"> <i class="fas fa-arrow-circle-right"> Add Agent</i></a>
                </div>
            </div>

            <!-- ./col -->
            <div class="col-lg-2 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3 class="p-3"> </h3>
                        <p class="p-1">Log-Out</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="../logout.php" class="small-box-footer"> <i class="fas fa-arrow-circle-right">Click here to log out</i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
    </div>
    <!-- /.container-fluid -->
</section>