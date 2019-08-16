<!DOCTYPE html>
<html>
<head>
	<title>Insert new post</title>
</head>
<body>
<form method="post" action="insert_post.php" enctype="multipart/form-data">
	
	<table align="center" border="10" width="600">
		<tr>
			<td align="center" colspan="5" bgcolor="yellow">
				<h1>Insert New Post Here</h1></td>
		</tr>
		<tr>
			<td align="right">Post Title:</td>
			<td><input type="text" name="title" size="40"></td>
		</tr>
		<tr>
			<td align="right">Post Author:</td>
			<td><input type="text" name="author" size="30"></td>
		</tr>
		<tr>
			<td align="right">Post Image:</td>
			<td><input type="file" name="image"></td>
		</tr>
		<tr>
			<td align="right">Post Content:</td>
			<td><textarea name="content" cols="40" rows="20"></textarea></td>
		</tr>
		<tr>
			<td align="center" colspan="5"><input type="submit" name="submit" value="Published Now"></td>
		</tr>
	</table>
</form>
</body>
</html>

<?php
include("includes/connect.php");

if(isset($_POST['submit'])){


	 $title = $_POST['title'];
	 $date = date('y,m,d');
	 $author = $_POST['author'];
	 $content = $_POST['content'];
	 $image_name = $_FILES['image'] ['name'];
	 $image_type = $_FILES['image'] ['type'];
	 $image_size = $_FILES['image'] ['size'];
	 $image_tmp = $_FILES['image'] ['tmp_name'];

	 if($title =='' or $author=='' or $content==''){
	 	echo "<script>alert('Any field is empty')</script>";
	 	exit();
	 }
	 if($image_type=="image/jpeg" or $image_type=="image/png" or $image_type=="image/gif"){
	 	

	 	if($image_size<=5000000){
          move_uploaded_file($image_tmp,"images/$image_name");
	 	}
	 	else{
	 		echo "<script>alert('image size is larger only  1mb size is allowed')</script>";
	 	}
	 }
	 else {
	 	echo "<script>alert('image type is invalid')</script>";
	 }

	 $query = "insert into posts (post_title,post_date,post_author,post_image,post_content) values ('$title','$date','$author','$image_name','$content')";

	 if(mysqli_query($link,$query)){

	 	echo "<center><h1>Post Has been Published</h1></center>";
	 }
}
mysqli_close($link);
?>