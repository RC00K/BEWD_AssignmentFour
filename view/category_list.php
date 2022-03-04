<?php include 'header.php'; ?>
<?php if($categories) { ?>
	<header>
		<h2>
			Category List
		</h2>
		<form action="." method="POST" class="todo-form">
		<input type="hidden" name="action" value="add_category">
		<input type="text" class="todo-input" aria-label="todo-input" placeholder="Category Name" aria-placeholder="new-todo..." required>
		<button type="submit" id="addBtn" name="submit" value="submit" class="submit-btn">Add</button>
		</form>
	</header>

	<br>

	<p><a href=".">View &amp; Add Category</a></p>

	<div class="table-box">
		<div class="table-row table-head">
			<div class="table-cell first-cell">
				<p>ID</p>
			</div>
			<div class="table-cell">
				<p>Category</p>
			</div>
			<div class="table-cell last-cell">
				<p>Delete</p>
			</div>
		</div>

		<?php foreach($categories as $category) : ?>
		<div class="table-row">
			<div class="table-cell first-cell">
				<p><?= $category['categoryID']; ?></p>
			</div>
			<div class="table-cell">
				<p><?= $category['categoryName']; ?></p>
			</div>
			<div class="table-cell last-cell">
				<button class="submit">Delete</button>
			</div>
		</div>
		<?php endforeach; ?>
	<?php } else { ?>
	<p>No categories exist yet</p>
	<?php } ?>
</div>
<?php include 'footer.php'; ?>