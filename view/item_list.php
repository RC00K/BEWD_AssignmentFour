<?php include 'header.php'; ?>
	<header>
		<h2>ToDo List</h2>
		<div class="search">
		<form action="." method="POST" class="todo-form" aria-label="todo-input">			
			<input type="text" id="title" class="todo-input" aria-label="todo-input" 
			placeholder="Title" aria-placeholder="new-todo..." required>

			<select name="category_id">
				<option value="">Select Category</option>
				<?php foreach ($categories as $category) : ?>
				<option value="<?= $category['categoryID']; ?>">
					<?= $category['categoryName']; ?>
				</option>
				<?php endforeach; ?>
			</select>
			
			<button type="submit" id="addBtn" name="submit" value="submit" class="submit-btn">Add Item</button>
		</form>
	</div>
	</header>

	<br>

	<p><a href=".?action=list_categories">View/Edit Categories</a></p>

	<div class="table-box">
		<div class="table-row table-head">
			<div class="table-cell first-cell">
				<p>Title</p>
			</div>
			<div class="table-cell">
				<p>Description</p>
			</div>
			<div class="table-cell last-cell">
				<p>Delete</p>
			</div>
		</div>

		<?php if($items) { ?>
		<?php foreach($items as $todoitem) : ?>
		<div class="table-row">
			<div class="table-cell first-cell">
				<p><?= "{$todoitem['Title']}" ?></p>
			</div>

			<div class="table-cell">
				<p><?= $todoitem['Description']; ?></p>
			</div>
			
			<div class="table-cell last-cell">
				<button class="submit">Delete</button>
			</div>
		</div>
		<?php endforeach; ?>
	<?php } else { ?>
	<br>
	<?php if($category_id) { ?>
	<p>No todo items exists yet.</p>
	<?php } else { ?>
	<p>No todo items exist</p>
	<?php } ?>
	<br>
	<?php } ?>
	</div>
<?php include 'footer.php'; ?>