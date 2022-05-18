<?php
$user = "user";
$sql = "SELECT * FROM admin_user WHERE role=?";
$select = $dbc->prepare($sql);
$select->bind_param('s', $user);
$select->execute();
$result = $select->get_result();
if ($result->num_rows > 0) {
    $allagent = $result->fetch_all(MYSQLI_ASSOC);
}

$sql = "SELECT DISTINCT ward FROM members ORDER BY id DESC";
$select = $dbc->query($sql);
if ($select->num_rows > 0) {
    $allwards = $select->fetch_all(MYSQLI_ASSOC);
}
$sql = "SELECT DISTINCT poll_unit FROM members ORDER BY id DESC";
$select = $dbc->query($sql);
if ($select->num_rows > 0) {
    $allpolls = $select->fetch_all(MYSQLI_ASSOC);
}
if (isset($_POST['search'])) {
    if (!empty($_POST['agent']) && !empty($_POST['ward']) && !empty($_POST['unit'])) {
        $agent = $_POST['agent'];
        $ward = $_POST['ward'];
        $unit = $_POST['unit'];
        $sql = "SELECT * FROM members WHERE agent_id='$agent' AND ward ='$ward' AND poll_unit ='$unit' ORDER BY id DESC";
        $result = $dbc->query($sql);
        $total_mem = $result->num_rows;
        if ($result->num_rows > 0) {
            $allmembers = $result->fetch_all(MYSQLI_ASSOC);
        } else {
            $allmembers = [];
        }
    }
    if (empty($_POST['agent']) && !empty($_POST['ward']) && !empty($_POST['unit'])) {
        $ward = $_POST['ward'];
        $unit = $_POST['unit'];
        $sql = "SELECT * FROM members WHERE ward ='$ward' AND poll_unit ='$unit' ORDER BY id DESC";
        $result = $dbc->query($sql);
        $total_mem = $result->num_rows;
        if ($result->num_rows > 0) {
            $allmembers = $result->fetch_all(MYSQLI_ASSOC);
        } else {
            $allmembers = [];
        }
    }
} else {
    $sql = "SELECT * FROM members ORDER BY id DESC";
    $result = $dbc->query($sql);
    $total_mem = $result->num_rows;
    if ($result->num_rows > 0) {
        $allmembers = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        $allmembers = [];
    }
}
