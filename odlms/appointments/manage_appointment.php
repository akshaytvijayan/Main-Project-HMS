<?php
require_once('./../config.php');

// Function to handle file upload
function uploadFile($file)
{
    $target_dir = "./uploads/"; // Directory where files will be uploaded
    $target_file = $target_dir . basename($file["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check file size
    if ($file["size"] > 5000000) { // 5MB limit
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($fileType != "pdf") {
        echo "Sorry, only PDF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            return $target_file;
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    return null;
}

// Handle file upload if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["prescription"]) && $_FILES["prescription"]["error"] == 0) {
        $prescription_file = uploadFile($_FILES["prescription"]);
        if ($prescription_file) {
            // File uploaded successfully, proceed to database insertion
            $id = isset($_POST['id']) ? $_POST['id'] : '';
            $sql = "UPDATE appointment_list SET prescription_path = '$prescription_file' WHERE id = '$id'";
            if ($conn->query($sql) === TRUE) {
                echo "Prescription uploaded successfully.";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }
}
?>
<style>
    img#cimg {
        height: 17vh;
        width: 25vw;
        object-fit: scale-down;
    }
</style>
<div class="container-fluid">
    <form action="" id="appointment-form" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo isset($id) ? $id : '' ?>">
        <div class="row">
            <div class="form-group col-md-12">
                <label for="schedule" class="control-label">Schedule</label>
                <input type="datetime-local" name="schedule" id="schedule" class="form-control form-control-border" placeholder="Enter appointment Schedule" value="<?php echo isset($schedule) ? date("Y-m-d\TH:i", strtotime($schedule)) : '' ?>" required>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="test_ids" class="control-label">Test</label>
                <select name="test_ids[]" id="test_ids" class="form-control form-control-border select2" placeholder="Enter appointment Name" multiple required>
                    <?php
                    $tests = $conn->query("SELECT * FROM `test_list` where delete_flag = 0 and status = 1 order by `name` asc");
                    while ($row = $tests->fetch_assoc()) :
                    ?>
                        <option value="<?= $row['id'] ?>" <?= isset($test_ids) && in_array($row['id'], $test_ids) ? 'selected' : "" ?>><?= $row['name'] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="prescription" class="control-label">Prescription <small><em>(If Any)</em></small></label>
                <input type="file" name="prescription" accept="application/msword, .doc, .docx, .txt, application/pdf" id="prescription" class="form-control form-control-border">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>
<script>
    $(function() {
        $('#uni_modal').on('shown.bs.modal', function() {
            $('#test_ids').select2({
                dropdownParent: $('#uni_modal'),
                width: '100%',
                placeholder: 'Please Select Test(s) Here',
            })
        })
        $('#uni_modal #appointment-form').submit(function(e) {
            e.preventDefault();
            var _this = $(this)
            $('.pop-msg').remove()
            var el = $('<div>')
            el.addClass("pop-msg alert")
            el.hide()
            start_loader();
            $.ajax({
                url: _base_url_ + "classes/Master.php?f=save_appointment",
                data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                dataType: 'json',
                error: err => {
                    console.log(err)
                    alert_toast("An error occured", 'error');
                    end_loader();
                },
                success: function(resp) {
                    if (resp.status == 'success') {
                        location.href = './?page=appointments/view_appointment&id=' + resp.aid;
                    } else if (!!resp.msg) {
                        el.addClass("alert-danger")
                        el.text(resp.msg)
                        _this.prepend(el)
                    } else {
                        el.addClass("alert-danger")
                        el.text("An error occurred due to unknown reason.")
                        _this.prepend(el)
                    }
                    el.show('slow')
                    $('html,body,.modal').animate({
                        scrollTop: 0
                    }, 'fast')
                    end_loader();
                }
            })
        })
    })
</script>