<?php
require 'header.php';
require('../inc/db.php');
require('inc/usersserver.php')
?>
<!-- <div class="wrapper"> -->
<!-- Preloader -->
<!-- <div class="preloader flex-column justify-content-center align-items-center">
    Osun APC Campaign 2020
</div> -->
<?php require('inc/nav-section.php');
?>
<!-- Tabable-->
<section class="content mt-4">
    <div class="container-fluid ">
        <div class="row">
            <div class="col-12">
                <form action="index.php" method="post">
                    <div class="row justify-content-center">
                        <div class="col-md-2 col-sm-10 ">
                            <div class="form-group">
                                <select name="agent" class="form-control">
                                    <option value="">Select Agent</option>
                                    <?php
                                    if (count($allagent) > 0) {
                                        foreach ($allagent as $agent) {
                                            $username = $agent['username'];
                                            $id = $agent['id'];
                                            echo "<option value='$id'>$username</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-10">
                            <div class="form-group">
                                <select name="ward" class="form-control" id="">
                                    <option value="">Select Ward</option>
                                    <?php
                                    if (count($allwards) > 0) {
                                        foreach ($allwards as $ward) {
                                            $ward = $ward['ward'];

                                            echo "<option value='$ward'>$ward</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2  col-sm-10">
                            <div class="form-group">
                                <select name="unit" class="form-control" id="">
                                    <option value="">Select Unit</option>
                                    <?php
                                    if (count($allpolls) > 0) {
                                        foreach ($allpolls as $polls) {
                                            $polls = $polls['poll_unit'];
                                            echo "<option value='$polls'>$polls</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-1  col-sm-8">
                            <div class="form-group">
                                <button type="submit" name="search" class="form-control btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title"> All Registered Members</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>LG</th>
                                    <th>Ward</th>
                                    <th>Polling Unit</th>
                                    <th>Card No</th>
                                    <th>Voting APC</th>
                                    <th>Reason</th>
                                    <th>Coment</th>
                                    <th> Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (count($allmembers) > 0) {
                                    $i = 0;
                                    foreach ($allmembers as $member) {
                                        $name = $member['fullname'];
                                        $phone = $member['phone'];
                                        $lg = $member['lg'];
                                        $ward = $member['ward'];
                                        $polling = $member['poll_unit'];
                                        $card = $member['card_no'];
                                        $voting = $member['vote'];
                                        $reason = $member['reason'];
                                        $comment = $member['comment'];
                                        $date = $member['reg_date'];
                                        $i++;
                                        echo "<tr>
                                        <td> $i </td>
                                    <td> $name </td>
                                    <td>$phone
                                    </td>
                                    <td>$lg</td>
                                    <td> $ward</td>
                                    <td>$polling</td>
                                    <td>$card</td>
                                    <td>$voting</td>
                                    <td>$reason</td>
                                    <td>$comment</td>
                                    <td>$date</td>
                                </tr>";
                                    }
                                } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>S/N</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>LG</th>
                                    <th>Ward</th>
                                    <th>Polling Unit</th>
                                    <th>Card No</th>
                                    <th>Voting APC</th>
                                    <th>Reason</th>
                                    <th>Coment</th>
                                    <th> Date</th>
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