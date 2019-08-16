<div class="post_body">
	<?php
	include("includes/connect.php");

 	 $query = "select * from posts order by rand() LIMIT 0,5";

 	 $run = mysqli_query($link,$query);

 	 while ($row=mysqli_fetch_array($run))
 {
        $post_id = $row['post_id'];
 	 	$title = $row['post_title'];
 	 	$date = $row['post_date'];
 	 	$author = $row['post_author'];
 	 	$image = $row['post_image'];
 	 	$content = substr($row['post_content'],0,200);
 	 
 	?>
 	<h2><a href="pages.php?id=<?php echo $post_id; ?>">
 	<?php echo $title; ?></a></h2>
 	<p>Published on: &nbsp;&nbsp;<b><?php echo $date; ?></b></p>
     <p align="right"> Posted By: &nbsp;&nbsp;<b><?php echo $author; ?></b>
 	</p>

 	<center><img style=" width: 330px; height: 150px; "src="images/<?php echo $image; ?>">
 	</center>
 	<p align="justify">
 		<?php echo $content; ?>

 	</p>
 	<p align="right"><a href="pages.php?id=<?php echo $post_id;?>">Read More</a></p>
    <?php }
	?>
</div>