    <div class="row">
      <div class="col-md-2">
		<hr>
		<center><img class="pp" src="<?php echo $image; ?>" height="140" width="160"></center>
		<hr>
		<a class="btn btn-success" href="change_pic.php">Change Profile Picture</a>
      </div>
		<div class="col-md-5">
			<hr>
			<p>Personal Info</p>
				<?php
			$query = $conn->query("select * from members where member_id = '$session_id'");
			$row = $query->fetch();
			$id = $row['member_id'];
			?>
			<hr>
			<p>Name:<?php echo $row['firstname']." ".$row['lastname']; ?><span class="margin-p"> </span>Gender:<?php echo $row['gender']; ?></p>
			<hr>
			<p>Address:<?php echo $row['address']; ?></p>
			<hr>
		</div>
      <div class="col-md-5">
			<form  id="upload_image"  class="form-horizontal" method="POST" enctype="multipart/form-data">
				<div class="control-group">
					<label class="control-label" for="input01">Image:</label>
					<div class="controls">
						<input type="file" name="image" class="font" required>
					</div>
				</div>
				<div class="control-group">
					<div class="controls">
						<button type="submit" name="submit" class="btn btn-success">Upload</button>
					</div>
				</div>
			</form>
							<?php
	// if (isset($_POST['submit'])) {
 
	// 	$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
	// 	$image_name = addslashes($_FILES['image']['name']);
	// 	$image_size = getimagesize($_FILES['image']['tmp_name']);
 
	// 	move_uploaded_file($_FILES["image"]["tmp_name"], "images/" . $_FILES["image"]["name"]);
	// 	$location = "images/" . $_FILES["image"]["name"];
	// 	$conn->query("update members set image = '$location' where member_id  = '$session_id' ");

	//=========FIX==============
	if (isset($_POST['submit'])) {
    $allowedExtensions = array('png', 'jpg'); // Các phần mở rộng tệp được cho phép
    $imageExtension = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

    if (in_array($imageExtension, $allowedExtensions)) {
        // Tiếp tục xử lý tệp ở đây, vì tệp có phần mở rộng hợp lệ

        $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        $image_name = addslashes($_FILES['image']['name']);
        $image_size = getimagesize($_FILES['image']['tmp_name']);

        move_uploaded_file($_FILES['image']['tmp_name'], 'images/' . $_FILES['image']['name']);
        $location = 'images/' . $_FILES['image']['name'];
        $conn->query("update members set image = '$location' where member_id = '$session_id'");
    } else {
        echo '<script>alert("Chỉ cho phép tải lên các tệp PNG và JPG.");</script>';
    }
	?>
	<script>
		window.location = 'home.php';
	</script>
	<?php
	}
	?>
      </div>
    </div> 