<?php include 'layouts/session.php'; ?>
<?php include 'layouts/head-main.php'; ?>
<?php
require_once "layouts/config.php";
if (isset($_POST['title'])) {
    $total = count($_FILES['image']['name']);
    if ($_FILES['image']['name'][0] != "") {
        $result = $link->query("select * from branches where id = '" . $_GET['id'] . "'");
        while($row = $result->fetch_assoc()) {
            $prev = $row['image'];
            break;
        }
        $tmp = explode(",", $prev);
        for ($i = 0; $i < count($tmp); $i++) {
            unlink($tmp[$i]);
        }
        $files = [];
        for( $i = 0 ; $i < $total ; $i++ ) {
            $tmpFilePath = $_FILES['image']['tmp_name'][$i];
            if ($tmpFilePath != ""){
                $newFilePath = "uploads/" . generateRandomString() . $_FILES['image']['name'][$i];
                if(move_uploaded_file($tmpFilePath, $newFilePath)) {
                    array_push($files, $newFilePath);
                } else {
                    echo "<script>alert('File could not be uploaded');</script>";
                }
            }
        }
        $paths = implode(",", $files);
        $result = $link->query("update branches set
                title = '" . $_POST['title'] . "',
                detail = '" . $_POST['detail'] . "',
                image = '" . $paths . "',
                user_id = '" . $_SESSION['id'] . "'
            where id = '" . $_POST['id'] . "'
        ");
    } else {
        $result = $link->query("update branches set
                title = '" . $_POST['title'] . "',
                detail = '" . $_POST['detail'] . "',
                user_id = '" . $_SESSION['id'] . "'
            where id = '" . $_POST['id'] . "'
        ");
    }
    if ($result) {
        echo "<script>alert('Branch has been updated');</script>";
    } else {
        echo "<script>alert('An Error Occurred');</script>";
    }
}

$result = $link->query("select * from branches where id = '" . $_GET['id'] . "'");
while($row = $result->fetch_assoc()) {
    $title = $row['title'];
    $detail = $row['detail'];
    $image = $row['image'];
}
?>
<head>
    <title>GiGi</title>

    <?php include 'layouts/head.php'; ?>

    <link href="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <link href="assets/libs/choices.js/public/assets/styles/choices.min.css" rel="stylesheet" type="text/css" />
    
    <?php include 'layouts/head-style.php'; ?>
</head>

<?php include 'layouts/body.php'; ?>

<!-- Begin page -->
<div id="layout-wrapper">

    <?php include 'layouts/menu.php'; ?>

    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Edit Branch</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">GiGi</a></li>
                                    <li class="breadcrumb-item active">Edit Branch</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-md-12">
                        <!-- card -->
                        <div class="card card-h-100">
                            <div class="card-body p-4">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mt-3 mt-lg-0">
                                                <div class="mb-3">
                                                    <label for="title" class="form-label">Title</label>
                                                    <input class="form-control" type="text" id="title" name="title" value="<?php echo $title; ?>" required>
                                                </div>
                                                <div class="mb-3">
                                                    <?php
                                                    $img = explode(",", $image);
                                                    for ($i = 0; $i < count($img); $i++) {
                                                        echo "<img style='width: 100px;' src='" . $img[$i] . "' />";
                                                    }
                                                    ?>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="image" class="form-label">Image</label>
                                                    <input class="form-control" type="file" id="image" name="image[]" multiple>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mt-3 mt-lg-0">
                                                <!--
                                                <div class="mb-3">
                                                    <label for="gmaps-markers" class="form-label">Location</label>
                                                    <div id="gmaps-markers" class="gmaps" style="position: relative; overflow: hidden;"><div style="height: 100%; width: 100%; position: absolute; top: 0px; left: 0px; background-color: rgb(229, 227, 223);"><div class="gm-style" style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px;"><div><button draggable="false" aria-label="Keyboard shortcuts" title="Keyboard shortcuts" type="button" style="background: none transparent; display: block; border: none; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: absolute; cursor: pointer; user-select: none; z-index: 1000002; outline-offset: 3px; right: 0px; bottom: 0px; transform: translateX(100%);"></button></div><div tabindex="0" aria-label="Map" aria-roledescription="map" role="group" style="position: absolute; z-index: 0; left: 0px; top: 0px; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; cursor: url(&quot;https://maps.gstatic.com/mapfiles/openhand_8_8.cur&quot;), default; touch-action: pan-x pan-y;"><div style="z-index: 1; position: absolute; left: 50%; top: 50%; width: 100%; transform: translate(0px, 0px);"><div style="position: absolute; left: 0px; top: 0px; z-index: 100; width: 100%;"><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div style="position: absolute; z-index: 985; transform: matrix(1, 0, 0, 1, -182, -96);"><div style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: -256px; top: 0px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: -256px; top: -256px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: 0px; top: -256px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: 256px; top: -256px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div><div style="position: absolute; left: 256px; top: 0px; width: 256px; height: 256px;"><div style="width: 256px; height: 256px;"></div></div></div></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 101; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 102; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 103; width: 100%;"><div style="width: 27px; height: 43px; overflow: hidden; position: absolute; left: -53px; top: -43px; z-index: 0;"><img alt="" src="https://maps.gstatic.com/mapfiles/api-3/images/spotlight-poi2.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 27px; height: 43px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: -1;"><div style="position: absolute; z-index: 985; transform: matrix(1, 0, 0, 1, -182, -96);"><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 0px; top: 0px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -256px; top: 0px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: -256px; top: -256px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 0px; top: -256px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 256px; top: -256px;"></div><div style="width: 256px; height: 256px; overflow: hidden; position: absolute; left: 256px; top: 0px;"></div></div></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 0;"><div style="position: absolute; z-index: 985; transform: matrix(1, 0, 0, 1, -182, -96);"><div style="position: absolute; left: 0px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.google.com/maps/vt?pb=!1m5!1m4!1i15!2i9372!3i17488!4i256!2m3!1e0!2sm!3i593324092!2m3!1e2!6m1!3e5!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyCtSAR45TFgZjOs4nBFFZnII-6mMHLfSYI&amp;token=89680" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: -256px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.google.com/maps/vt?pb=!1m5!1m4!1i15!2i9371!3i17488!4i256!2m3!1e0!2sm!3i593324092!2m3!1e2!6m1!3e5!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyCtSAR45TFgZjOs4nBFFZnII-6mMHLfSYI&amp;token=77590" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: -256px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.google.com/maps/vt?pb=!1m5!1m4!1i15!2i9371!3i17487!4i256!2m3!1e0!2sm!3i593324092!2m3!1e2!6m1!3e5!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyCtSAR45TFgZjOs4nBFFZnII-6mMHLfSYI&amp;token=107818" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 0px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.google.com/maps/vt?pb=!1m5!1m4!1i15!2i9372!3i17487!4i256!2m3!1e0!2sm!3i593324092!2m3!1e2!6m1!3e5!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyCtSAR45TFgZjOs4nBFFZnII-6mMHLfSYI&amp;token=119908" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 256px; top: -256px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.google.com/maps/vt?pb=!1m5!1m4!1i15!2i9373!3i17487!4i256!2m3!1e0!2sm!3i593324080!2m3!1e2!6m1!3e5!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyCtSAR45TFgZjOs4nBFFZnII-6mMHLfSYI&amp;token=61215" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div><div style="position: absolute; left: 256px; top: 0px; width: 256px; height: 256px; transition: opacity 200ms linear 0s;"><img draggable="false" alt="" role="presentation" src="https://maps.google.com/maps/vt?pb=!1m5!1m4!1i15!2i9373!3i17488!4i256!2m3!1e0!2sm!3i593324092!2m3!1e2!6m1!3e5!3m17!2sen-US!3sUS!5e18!12m4!1e68!2m2!1sset!2sRoadmap!12m3!1e37!2m1!1ssmartmaps!12m4!1e26!2m2!1sstyles!2zcC5zOi02MHxwLmw6LTYw!4e0&amp;key=AIzaSyCtSAR45TFgZjOs4nBFFZnII-6mMHLfSYI&amp;token=101770" style="width: 256px; height: 256px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"></div></div></div></div><div style="z-index: 3; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px; touch-action: pan-x pan-y;"><div style="z-index: 4; position: absolute; left: 50%; top: 50%; width: 100%; transform: translate(0px, 0px);"><div style="position: absolute; left: 0px; top: 0px; z-index: 104; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 105; width: 100%;"></div><div style="position: absolute; left: 0px; top: 0px; z-index: 106; width: 100%;"><span id="DF64EEB4-AD15-4DFA-A56E-2A71780E952A" style="display: none;">To navigate, press the arrow keys.</span><div aria-label="Lima" role="button" tabindex="0" aria-describedby="DF64EEB4-AD15-4DFA-A56E-2A71780E952A" style="width: 27px; height: 43px; overflow: hidden; position: absolute; left: -53px; top: -43px; z-index: 0;"><img alt="" src="https://maps.gstatic.com/mapfiles/transparent.png" draggable="false" usemap="#gmimap0" style="width: 27px; height: 43px; user-select: none; border: 0px; padding: 0px; margin: 0px; max-width: none;"><map name="gmimap0" id="gmimap0"><area log="miw" coords="13.5,0,4,3.75,0,13.5,13.5,43,27,13.5,23,3.75" shape="poly" tabindex="-1" title="Lima" style="display: inline; position: absolute; left: 0px; top: 0px; cursor: pointer; touch-action: none;"></map></div></div><div style="position: absolute; left: 0px; top: 0px; z-index: 107; width: 100%;"></div></div></div><div class="gm-style-moc" style="z-index: 4; position: absolute; height: 100%; width: 100%; padding: 0px; border-width: 0px; margin: 0px; left: 0px; top: 0px; opacity: 0;"><p class="gm-style-mot"></p></div></div><iframe aria-hidden="true" frameborder="0" tabindex="-1" style="z-index: -1; position: absolute; width: 100%; height: 100%; top: 0px; left: 0px; border: none;"></iframe><div style="pointer-events: none; width: 100%; height: 100%; box-sizing: border-box; position: absolute; z-index: 1000002; opacity: 0; border: 2px solid rgb(26, 115, 232);"></div><div><div class="gmnoprint gm-bundled-control" draggable="false" data-control-width="40" data-control-height="81" style="margin: 10px; user-select: none; position: absolute; left: 0px; top: 0px;"><div class="gmnoprint" data-control-width="40" data-control-height="81" style="position: absolute; left: 0px; top: 0px;"><div draggable="false" style="user-select: none; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px; cursor: pointer; background-color: rgb(255, 255, 255); width: 40px; height: 81px;"><button draggable="false" aria-label="Zoom in" title="Zoom in" type="button" class="gm-control-active" style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; overflow: hidden; width: 40px; height: 40px; top: 0px; left: 0px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23666%22%20d%3D%22M18%207h-7V0H7v7H0v4h7v7h4v-7h7z%22/%3E%3C/svg%3E" alt="" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23333%22%20d%3D%22M18%207h-7V0H7v7H0v4h7v7h4v-7h7z%22/%3E%3C/svg%3E" alt="" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23111%22%20d%3D%22M18%207h-7V0H7v7H0v4h7v7h4v-7h7z%22/%3E%3C/svg%3E" alt="" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23d1d1d1%22%20d%3D%22M18%207h-7V0H7v7H0v4h7v7h4v-7h7z%22/%3E%3C/svg%3E" alt="" style="height: 18px; width: 18px;"></button><div style="position: relative; overflow: hidden; width: 30px; height: 1px; margin: 0px 5px; background-color: rgb(230, 230, 230); top: 0px;"></div><button draggable="false" aria-label="Zoom out" title="Zoom out" type="button" class="gm-control-active" style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; overflow: hidden; width: 40px; height: 40px; top: 0px; left: 0px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23666%22%20d%3D%22M0%207h18v4H0V7z%22/%3E%3C/svg%3E" alt="" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23333%22%20d%3D%22M0%207h18v4H0V7z%22/%3E%3C/svg%3E" alt="" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23111%22%20d%3D%22M0%207h18v4H0V7z%22/%3E%3C/svg%3E" alt="" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23d1d1d1%22%20d%3D%22M0%207h18v4H0V7z%22/%3E%3C/svg%3E" alt="" style="height: 18px; width: 18px;"></button></div></div></div></div><div></div><div></div><div></div><div><button draggable="false" aria-label="Toggle fullscreen view" title="Toggle fullscreen view" type="button" class="gm-control-active gm-fullscreen-control" style="background: none rgb(255, 255, 255); border: 0px; margin: 10px; padding: 0px; text-transform: none; appearance: none; position: absolute; cursor: pointer; user-select: none; border-radius: 2px; height: 40px; width: 40px; box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; overflow: hidden; top: 0px; right: 0px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23666%22%20d%3D%22M0%200v6h2V2h4V0H0zm16%200h-4v2h4v4h2V0h-2zm0%2016h-4v2h6v-6h-2v4zM2%2012H0v6h6v-2H2v-4z%22/%3E%3C/svg%3E" alt="" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23333%22%20d%3D%22M0%200v6h2V2h4V0H0zm16%200h-4v2h4v4h2V0h-2zm0%2016h-4v2h6v-6h-2v4zM2%2012H0v6h6v-2H2v-4z%22/%3E%3C/svg%3E" alt="" style="height: 18px; width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2018%22%3E%3Cpath%20fill%3D%22%23111%22%20d%3D%22M0%200v6h2V2h4V0H0zm16%200h-4v2h4v4h2V0h-2zm0%2016h-4v2h6v-6h-2v4zM2%2012H0v6h6v-2H2v-4z%22/%3E%3C/svg%3E" alt="" style="height: 18px; width: 18px;"></button></div><div></div><div></div><div></div><div></div><div><div class="gmnoprint gm-bundled-control gm-bundled-control-on-bottom" draggable="false" data-control-width="0" data-control-height="0" style="margin: 10px; user-select: none; position: absolute; display: none; bottom: 14px; right: 0px;"><div class="gmnoprint" data-control-width="40" data-control-height="40" style="display: none; position: absolute;"><div style="background-color: rgb(255, 255, 255); box-shadow: rgba(0, 0, 0, 0.3) 0px 1px 4px -1px; border-radius: 2px; width: 40px; height: 40px;"><button draggable="false" aria-label="Rotate map clockwise" title="Rotate map clockwise" type="button" class="gm-control-active" style="background: none; display: none; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; left: 0px; top: 0px; overflow: hidden; width: 40px; height: 40px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h24v24H0V0z%22/%3E%3Cpath%20fill%3D%22%23666%22%20d%3D%22M12.06%209.06l4-4-4-4-1.41%201.41%201.59%201.59h-.18c-2.3%200-4.6.88-6.35%202.64-3.52%203.51-3.52%209.21%200%2012.72%201.5%201.5%203.4%202.36%205.36%202.58v-2.02c-1.44-.21-2.84-.86-3.95-1.97-2.73-2.73-2.73-7.17%200-9.9%201.37-1.37%203.16-2.05%204.95-2.05h.17l-1.59%201.59%201.41%201.41zm8.94%203c-.19-1.74-.88-3.32-1.91-4.61l-1.43%201.43c.69.92%201.15%202%201.32%203.18H21zm-7.94%207.92V22c1.74-.19%203.32-.88%204.61-1.91l-1.43-1.43c-.91.68-2%201.15-3.18%201.32zm4.6-2.74l1.43%201.43c1.04-1.29%201.72-2.88%201.91-4.61h-2.02c-.17%201.18-.64%202.27-1.32%203.18z%22/%3E%3C/svg%3E" style="width: 20px; height: 20px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h24v24H0V0z%22/%3E%3Cpath%20fill%3D%22%23333%22%20d%3D%22M12.06%209.06l4-4-4-4-1.41%201.41%201.59%201.59h-.18c-2.3%200-4.6.88-6.35%202.64-3.52%203.51-3.52%209.21%200%2012.72%201.5%201.5%203.4%202.36%205.36%202.58v-2.02c-1.44-.21-2.84-.86-3.95-1.97-2.73-2.73-2.73-7.17%200-9.9%201.37-1.37%203.16-2.05%204.95-2.05h.17l-1.59%201.59%201.41%201.41zm8.94%203c-.19-1.74-.88-3.32-1.91-4.61l-1.43%201.43c.69.92%201.15%202%201.32%203.18H21zm-7.94%207.92V22c1.74-.19%203.32-.88%204.61-1.91l-1.43-1.43c-.91.68-2%201.15-3.18%201.32zm4.6-2.74l1.43%201.43c1.04-1.29%201.72-2.88%201.91-4.61h-2.02c-.17%201.18-.64%202.27-1.32%203.18z%22/%3E%3C/svg%3E" style="width: 20px; height: 20px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h24v24H0V0z%22/%3E%3Cpath%20fill%3D%22%23111%22%20d%3D%22M12.06%209.06l4-4-4-4-1.41%201.41%201.59%201.59h-.18c-2.3%200-4.6.88-6.35%202.64-3.52%203.51-3.52%209.21%200%2012.72%201.5%201.5%203.4%202.36%205.36%202.58v-2.02c-1.44-.21-2.84-.86-3.95-1.97-2.73-2.73-2.73-7.17%200-9.9%201.37-1.37%203.16-2.05%204.95-2.05h.17l-1.59%201.59%201.41%201.41zm8.94%203c-.19-1.74-.88-3.32-1.91-4.61l-1.43%201.43c.69.92%201.15%202%201.32%203.18H21zm-7.94%207.92V22c1.74-.19%203.32-.88%204.61-1.91l-1.43-1.43c-.91.68-2%201.15-3.18%201.32zm4.6-2.74l1.43%201.43c1.04-1.29%201.72-2.88%201.91-4.61h-2.02c-.17%201.18-.64%202.27-1.32%203.18z%22/%3E%3C/svg%3E" style="width: 20px; height: 20px;"></button><div style="position: relative; overflow: hidden; width: 30px; height: 1px; margin: 0px 5px; background-color: rgb(230, 230, 230); display: none;"></div><button draggable="false" aria-label="Rotate map counterclockwise" title="Rotate map counterclockwise" type="button" class="gm-control-active" style="background: none; display: none; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; left: 0px; top: 0px; overflow: hidden; width: 40px; height: 40px; transform: scaleX(-1);"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h24v24H0V0z%22/%3E%3Cpath%20fill%3D%22%23666%22%20d%3D%22M12.06%209.06l4-4-4-4-1.41%201.41%201.59%201.59h-.18c-2.3%200-4.6.88-6.35%202.64-3.52%203.51-3.52%209.21%200%2012.72%201.5%201.5%203.4%202.36%205.36%202.58v-2.02c-1.44-.21-2.84-.86-3.95-1.97-2.73-2.73-2.73-7.17%200-9.9%201.37-1.37%203.16-2.05%204.95-2.05h.17l-1.59%201.59%201.41%201.41zm8.94%203c-.19-1.74-.88-3.32-1.91-4.61l-1.43%201.43c.69.92%201.15%202%201.32%203.18H21zm-7.94%207.92V22c1.74-.19%203.32-.88%204.61-1.91l-1.43-1.43c-.91.68-2%201.15-3.18%201.32zm4.6-2.74l1.43%201.43c1.04-1.29%201.72-2.88%201.91-4.61h-2.02c-.17%201.18-.64%202.27-1.32%203.18z%22/%3E%3C/svg%3E" style="width: 20px; height: 20px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h24v24H0V0z%22/%3E%3Cpath%20fill%3D%22%23333%22%20d%3D%22M12.06%209.06l4-4-4-4-1.41%201.41%201.59%201.59h-.18c-2.3%200-4.6.88-6.35%202.64-3.52%203.51-3.52%209.21%200%2012.72%201.5%201.5%203.4%202.36%205.36%202.58v-2.02c-1.44-.21-2.84-.86-3.95-1.97-2.73-2.73-2.73-7.17%200-9.9%201.37-1.37%203.16-2.05%204.95-2.05h.17l-1.59%201.59%201.41%201.41zm8.94%203c-.19-1.74-.88-3.32-1.91-4.61l-1.43%201.43c.69.92%201.15%202%201.32%203.18H21zm-7.94%207.92V22c1.74-.19%203.32-.88%204.61-1.91l-1.43-1.43c-.91.68-2%201.15-3.18%201.32zm4.6-2.74l1.43%201.43c1.04-1.29%201.72-2.88%201.91-4.61h-2.02c-.17%201.18-.64%202.27-1.32%203.18z%22/%3E%3C/svg%3E" style="width: 20px; height: 20px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2024%2024%22%3E%3Cpath%20fill%3D%22none%22%20d%3D%22M0%200h24v24H0V0z%22/%3E%3Cpath%20fill%3D%22%23111%22%20d%3D%22M12.06%209.06l4-4-4-4-1.41%201.41%201.59%201.59h-.18c-2.3%200-4.6.88-6.35%202.64-3.52%203.51-3.52%209.21%200%2012.72%201.5%201.5%203.4%202.36%205.36%202.58v-2.02c-1.44-.21-2.84-.86-3.95-1.97-2.73-2.73-2.73-7.17%200-9.9%201.37-1.37%203.16-2.05%204.95-2.05h.17l-1.59%201.59%201.41%201.41zm8.94%203c-.19-1.74-.88-3.32-1.91-4.61l-1.43%201.43c.69.92%201.15%202%201.32%203.18H21zm-7.94%207.92V22c1.74-.19%203.32-.88%204.61-1.91l-1.43-1.43c-.91.68-2%201.15-3.18%201.32zm4.6-2.74l1.43%201.43c1.04-1.29%201.72-2.88%201.91-4.61h-2.02c-.17%201.18-.64%202.27-1.32%203.18z%22/%3E%3C/svg%3E" style="width: 20px; height: 20px;"></button><div style="position: relative; overflow: hidden; width: 30px; height: 1px; margin: 0px 5px; background-color: rgb(230, 230, 230); display: none;"></div><button draggable="false" aria-label="Tilt map" title="Tilt map" type="button" class="gm-tilt gm-control-active" style="background: none; display: block; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; top: 0px; left: 0px; overflow: hidden; width: 40px; height: 40px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2016%22%3E%3Cpath%20fill%3D%22%23666%22%20d%3D%22M0%2016h8V9H0v7zm10%200h8V9h-8v7zM0%207h8V0H0v7zm10-7v7h8V0h-8z%22/%3E%3C/svg%3E" style="width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2016%22%3E%3Cpath%20fill%3D%22%23333%22%20d%3D%22M0%2016h8V9H0v7zm10%200h8V9h-8v7zM0%207h8V0H0v7zm10-7v7h8V0h-8z%22/%3E%3C/svg%3E" style="width: 18px;"><img src="data:image/svg+xml,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%2018%2016%22%3E%3Cpath%20fill%3D%22%23111%22%20d%3D%22M0%2016h8V9H0v7zm10%200h8V9h-8v7zM0%207h8V0H0v7zm10-7v7h8V0h-8z%22/%3E%3C/svg%3E" style="width: 18px;"></button></div></div><div style="position: absolute; left: 0px; top: 0px;"></div></div></div><div><div style="margin: 0px 5px; z-index: 1000000; position: absolute; left: 0px; bottom: 0px;"><a target="_blank" rel="noopener" title="Open this area in Google Maps (opens a new window)" aria-label="Open this area in Google Maps (opens a new window)" href="https://maps.google.com/maps?ll=-12.043333,-77.028333&amp;z=15&amp;t=m&amp;hl=en-US&amp;gl=US&amp;mapclient=apiv3" style="display: inline;"><div style="width: 66px; height: 26px;"><img alt="Google" src="https://maps.gstatic.com/mapfiles/api-3/images/google4.png" draggable="false" style="position: absolute; left: 0px; top: 0px; width: 66px; height: 26px; user-select: none; border: 0px; padding: 0px; margin: 0px;"></div></a></div></div><div></div><div><div class="gmnoprint" style="z-index: 1000001; position: absolute; right: 345px; bottom: 0px;"><div draggable="false" class="gm-style-cc" style="user-select: none; height: 14px; line-height: 14px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><button draggable="false" aria-label="Keyboard shortcuts" title="Keyboard shortcuts" type="button" style="background: none; display: inline-block; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; color: rgb(0, 0, 0); font-family: inherit; line-height: inherit;">Keyboard shortcuts</button></div></div></div><div class="gmnoprint" style="z-index: 1000001; position: absolute; right: 258px; bottom: 0px; width: 87px;"><div draggable="false" class="gm-style-cc" style="user-select: none; height: 14px; line-height: 14px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><button draggable="false" aria-label="Map Data" title="Map Data" type="button" style="background: none; display: none; border: 0px; margin: 0px; padding: 0px; text-transform: none; appearance: none; position: relative; cursor: pointer; user-select: none; color: rgb(0, 0, 0); font-family: inherit; line-height: inherit;">Map Data</button><span>Map data ©2022</span></div></div></div><div style="position: absolute; user-select: none; height: 14px; line-height: 14px; right: 168px; bottom: 0px;" draggable="false" class="gm-style-cc"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><span>200 m&nbsp;</span><div style="position: relative; display: inline-block; height: 8px; bottom: -1px; width: 47px;"><div style="width: 100%; height: 4px; position: absolute; left: 0px; top: 0px;"></div><div style="width: 4px; height: 8px; left: 0px; top: 0px; background-color: rgb(255, 255, 255);"></div><div style="width: 4px; height: 8px; position: absolute; background-color: rgb(255, 255, 255); right: 0px; bottom: 0px;"></div><div style="position: absolute; background-color: rgb(102, 102, 102); height: 2px; left: 1px; bottom: 1px; right: 1px;"></div><div style="position: absolute; width: 2px; height: 6px; left: 1px; top: 1px; background-color: rgb(102, 102, 102);"></div><div style="width: 2px; height: 6px; position: absolute; background-color: rgb(102, 102, 102); bottom: 1px; right: 1px;"></div></div></div></div><div class="gmnoprint gm-style-cc" draggable="false" style="z-index: 1000001; user-select: none; height: 14px; line-height: 14px; position: absolute; right: 96px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a href="https://www.google.com/intl/en-US_US/help/terms_maps.html" target="_blank" rel="noopener" style="text-decoration: none; cursor: pointer; color: rgb(0, 0, 0);">Terms of Use</a></div></div><div draggable="false" class="gm-style-cc" style="user-select: none; height: 14px; line-height: 14px; position: absolute; right: 0px; bottom: 0px;"><div style="opacity: 0.7; width: 100%; height: 100%; position: absolute;"><div style="width: 1px;"></div><div style="background-color: rgb(245, 245, 245); width: auto; height: 100%; margin-left: 1px;"></div></div><div style="position: relative; padding-right: 6px; padding-left: 6px; box-sizing: border-box; font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); white-space: nowrap; direction: ltr; text-align: right; vertical-align: middle; display: inline-block;"><a target="_blank" rel="noopener" title="Report errors in the road map or imagery to Google" dir="ltr" href="https://www.google.com/maps/@-12.043333,-77.028333,15z/data=!10m1!1e1!12b1?source=apiv3&amp;rapsrc=apiv3" style="font-family: Roboto, Arial, sans-serif; font-size: 10px; color: rgb(0, 0, 0); text-decoration: none; position: relative;">Report a map error</a></div></div><div class="gmnoscreen" style="position: absolute; right: 0px; bottom: 0px;"><div style="font-family: Roboto, Arial, sans-serif; font-size: 11px; color: rgb(0, 0, 0); direction: ltr; text-align: right; background-color: rgb(245, 245, 245);">Map data ©2022</div></div></div></div></div></div>
                                                </div>
                                                -->
                                                <div class="mb-3">
                                                    <label for="detail" class="form-label">Details</label>
                                                    <textarea class="form-control" id="detail" name="detail" style="height: 200px;" required><?php echo $detail; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mt-3 mt-lg-0">
                                                <div class="mb-3">
                                                    <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
                                                    <input type="submit" class="btn btn-primary" value="Submit" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- end card -->
                        </div><!-- end col -->
                    </div>
                    <!-- end row -->
                </form>
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <?php include 'layouts/footer.php'; ?>
    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->

<!-- Right Sidebar -->
<?php include 'layouts/right-sidebar.php'; ?>
<!-- /Right-bar -->

<!-- JAVASCRIPT -->
<?php include 'layouts/vendor-scripts.php'; ?>

<!-- Plugins js-->
<script src="assets/libs/admin-resources/jquery.vectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="assets/libs/admin-resources/jquery.vectormap/maps/jquery-jvectormap-world-mill-en.js"></script>
<script src="assets/libs/choices.js/public/assets/scripts/choices.min.js"></script>
<script src="assets/libs/gmaps/gmaps.min.js"></script>
<script src="assets/js/pages/gmaps.init.js"></script>
<script src="https://maps.google.com/maps/api/js?key=AIzaSyCtSAR45TFgZjOs4nBFFZnII-6mMHLfSYI"></script>
<script src="assets/js/pages/form-advanced.init.js"></script>

<!-- App js -->
<script src="assets/js/app.js"></script>

</body>

</html>