<?php include("confs/auth.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<title>Book List</title>
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<h1>Book List</h1>
	<ul class="menu">
		<li><a href="book-list.php">Manage Books</a></li>
		<li><a href="cat-list.php">Manage Categories</a></li>
		<li><a href="orders.php">Manage Orders</a></li>
		<li><a href="logout.php">Logout</a></li>
	</ul>
	<?php
		include("confs/config.php");

		$result = mysqli_query($conn, "
			SELECT books.*, categories.name
			FROM books LEFT JOIN categories
			ON books.category_id = categories.id
			ORDER BY books.created_date DESC
		");
	?>
	<ul class="books">

		<?php while($row = mysqli_fetch_assoc($result)): ?>
			<li>
				<img src="covers/<?php echo $row['cover'] ?>"
					alt="" align="right" width="200" height="140">
				<b><?php echo $row['title'] ?></b>
				<span>Sources for this pet project of mine can be found at nic.funet.fi (128.214.6.100) in the directory /pub/OS/Linux.  The directory also contains some README-file and a couple of binaries to work under linux (bash, update and gcc, what more can you ask for :-).  Full kernel source is provided, as no minix code has been used.  Library sources are only partially free, so that cannot be distributed currently. The system is able to compile "as-is" and has been known to work. Heh. Sources to the binaries (bash and gcc) can be found at the same place in /pub/gnu.</span>
				<i>by <?php echo $row['author'] ?></i>
				<small>(in <?php echo $row['name'] ?>)</small>
				<span>$<?php echo $row['price'] ?></span>
				<div><b><?php echo $row['summary'] ?></b></div>

				[<a href="book-del.php?id=<?php echo $row['id'] ?>" class="del">del</a>]
				[<a href="book-edit.php?id=<?php echo $row['id'] ?>">edit</a>]
			</li>
		<?php endwhile; ?>
	</ul>
	<a href="book-new.php" class="new">New Book</a>
</body>
</html>