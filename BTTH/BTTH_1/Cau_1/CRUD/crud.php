<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Bootstrap CRUD Data Table for Database with Modal Form</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
	<style>
		body {
			color: #566787;
			background: #f5f5f5;
			font-family: 'Varela Round', sans-serif;
			font-size: 13px;
		}

		.table-responsive {
			margin: 30px 0;
		}

		.table-wrapper {
			background: #fff;
			padding: 20px 25px;
			border-radius: 3px;
			min-width: 1000px;
			box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
		}

		.table-title {
			padding-bottom: 15px;
			background: #435d7d;
			color: #fff;
			padding: 16px 30px;
			min-width: 100%;
			margin: -20px -25px 10px;
			border-radius: 3px 3px 0 0;
		}

		.table-title h2 {
			margin: 5px 0 0;
			font-size: 24px;
		}

		.table-title .btn-group {
			float: right;
		}

		.table-title .btn {
			color: #fff;
			float: right;
			font-size: 13px;
			border: none;
			min-width: 50px;
			border-radius: 2px;
			border: none;
			outline: none !important;
			margin-left: 10px;
		}

		.table-title .btn i {
			float: left;
			font-size: 21px;
			margin-right: 5px;
		}

		.table-title .btn span {
			float: left;
			margin-top: 2px;
		}

		table.table tr th,
		table.table tr td {
			border-color: #e9e9e9;
			padding: 12px 15px;
			vertical-align: middle;
		}

		table.table tr th:first-child {
			width: 60px;
		}

		table.table tr th:last-child {
			width: 100px;
		}

		table.table-striped tbody tr:nth-of-type(odd) {
			background-color: #FCFCFCFF;
		}

		table.table-striped.table-hover tbody tr:hover {
			background: #B1D3FFFF;
		}

		table.table th i {
			font-size: 13px;
			margin: 0 5px;
			cursor: pointer;
		}

		table.table td:last-child i {
			opacity: 0.9;
			font-size: 22px;
			margin: 0 5px;
		}

		table.table td a {
			font-weight: bold;
			color: #566787;
			display: inline-block;
			text-decoration: none;
			outline: none !important;
		}

		table.table td a:hover {
			color: #2196F3;
		}

		table.table td a.edit {
			color: #FFC107;
		}

		table.table td a.delete {
			color: #F44336;
		}

		table.table td i {
			font-size: 19px;
		}

		table.table .avatar {
			border-radius: 50%;
			vertical-align: middle;
			margin-right: 10px;
		}

		.pagination {
			float: right;
			margin: 0 0 5px;
		}

		.pagination li a {
			border: none;
			font-size: 13px;
			min-width: 30px;
			min-height: 30px;
			color: #999;
			margin: 0 2px;
			line-height: 30px;
			border-radius: 2px !important;
			text-align: center;
			padding: 0 6px;
		}

		.pagination li a:hover {
			color: #666;
		}

		.pagination li.active a,
		.pagination li.active a.page-link {
			background: #03A9F4;
		}

		.pagination li.active a:hover {
			background: #0397d6;
		}

		.pagination li.disabled i {
			color: #ccc;
		}

		.pagination li i {
			font-size: 16px;
			padding-top: 6px
		}

		.hint-text {
			float: left;
			margin-top: 10px;
			font-size: 13px;
		}

		/* Custom checkbox */
		.custom-checkbox {
			position: relative;
		}

		.custom-checkbox input[type="checkbox"] {
			opacity: 0;
			position: absolute;
			margin: 5px 0 0 3px;
			z-index: 9;
		}

		.custom-checkbox label:before {
			width: 18px;
			height: 18px;
		}

		.custom-checkbox label:before {
			content: '';
			margin-right: 10px;
			display: inline-block;
			vertical-align: text-top;
			background: white;
			border: 1px solid #bbb;
			border-radius: 2px;
			box-sizing: border-box;
			z-index: 2;
		}

		.custom-checkbox input[type="checkbox"]:checked+label:after {
			content: '';
			position: absolute;
			left: 6px;
			top: 3px;
			width: 6px;
			height: 11px;
			border: solid #000;
			border-width: 0 3px 3px 0;
			transform: inherit;
			z-index: 3;
			transform: rotateZ(45deg);
		}

		.custom-checkbox input[type="checkbox"]:checked+label:before {
			border-color: #03A9F4;
			background: #03A9F4;
		}

		.custom-checkbox input[type="checkbox"]:checked+label:after {
			border-color: #fff;
		}

		.custom-checkbox input[type="checkbox"]:disabled+label:before {
			color: #b8b8b8;
			cursor: auto;
			box-shadow: none;
			background: #ddd;
		}

		/* Modal styles */
		.modal .modal-dialog {
			max-width: 400px;
		}

		.modal .modal-header,
		.modal .modal-body,
		.modal .modal-footer {
			padding: 20px 30px;
		}

		.modal .modal-content {
			border-radius: 3px;
			font-size: 14px;
		}

		.modal .modal-footer {
			background: #ecf0f1;
			border-radius: 0 0 3px 3px;
		}

		.modal .modal-title {
			display: inline-block;
		}

		.modal .form-control {
			border-radius: 2px;
			box-shadow: none;
			border-color: #dddddd;
		}

		.modal textarea.form-control {
			resize: vertical;
		}

		.modal .btn {
			border-radius: 2px;
			min-width: 100px;
		}

		.modal form label {
			font-weight: normal;
		}

		.mt-20 {
			margin-top: 20px !important;
		}
	</style>
	<script>
		$(document).ready(function () {
			// Activate tooltip
			$('[data-toggle="tooltip"]').tooltip();

			// Select/Deselect checkboxes
			var checkbox = $('table tbody input[type="checkbox"]');
			$("#selectAll").click(function () {
				if (this.checked) {
					checkbox.each(function () {
						this.checked = true;
					});
				} else {
					checkbox.each(function () {
						this.checked = false;
					});
				}
			});
			checkbox.click(function () {
				if (!this.checked) {
					$("#selectAll").prop("checked", false);
				}
			});
		});
	</script>
</head>

<body>
	<!-- Navbar -->
	<nav class="navbar navbar-expand-lg bg-primary fixed-top">
		<a class="navbar-brand text-white" href="#">Sunshine Shop</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item">
					<a class="nav-link active text-white" aria-current="page" href="#">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link text-white" href="#">Manage</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown"
						aria-expanded="false">
						Dropdown
					</a>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="#">Action</a></li>
						<li><a class="dropdown-item" href="#">Another action</a></li>
						<li>
							<hr class="dropdown-divider">
						</li>
						<li><a class="dropdown-item" href="#">Something else here</a></li>
					</ul>
				</li>
				<li class="nav-item">
					<a class="nav-link disabled text-white" aria-disabled="true">Disabled</a>
				</li>
			</ul>
			<form class="d-flex" role="search">
				<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
				<button class="btn btn-outline-light" type="submit">Search</button>
			</form>
		</div>
	</nav>
	<div class="container-fluid">
		<a class="navbar-brand" href="#">Navbar</a>
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>`
		</button>
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav me-auto mb-2 mb-lg-0">
				<li class="nav-item">
					<a class="nav-link active" aria-current="page" href="#">Home</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Link</a>
				</li>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
						aria-expanded="false">
						Dropdown
					</a>
					<ul class="dropdown-menu">
						<li><a class="dropdown-item" href="#">Action</a></li>
						<li><a class="dropdown-item" href="#">Another action</a></li>
						<li>
							<hr class="dropdown-divider">
						</li>
						<li><a class="dropdown-item" href="#">Something else here</a></li>
					</ul>
				</li>
				<li class="nav-item">
					<a class="nav-link disabled" aria-disabled="true">Disabled</a>
				</li>
			</ul>
			<form class="d-flex" role="search">
				<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
				<button class="btn btn-outline-success" type="submit">Search</button>
			</form>
		</div>
	</div>
	</nav>
	<div class="container-xl pt-5"></div>

	<!-- Page Content -->
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Manage <b>Products</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i
								class="material-icons">&#xE147;</i> <span>Add New Product</span></a>
						<a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i
								class="material-icons">&#xE15C;</i> <span>Delete</span></a>
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
						<th>ID</th>
						<th>Title</th>
						<th>Price</th>
						<th>Description</th>
						<th>Category</th>
						<th>Image</th>
						<th>Rating rate</th>
						<th>Rating count</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					require_once '../config.php';
					// Tính toán phân trang
					$limit = 5;
					$page = isset($_GET["page"]) ? $_GET["page"] : 1;
					$start_from = ($page - 1) * $limit;

					// Chỉ giữ lại một truy vấn SELECT với LIMIT
					$stmt = $conn->query("SELECT * FROM products LIMIT $start_from, $limit");
					while ($row = $stmt->fetch()) {
						?>
						<tr>
							<td>
								<span class="custom-checkbox">
									<input type="checkbox" id="checkbox<?= $row['id'] ?>" name="options[]"
										value="<?= $row['id'] ?>">
									<label for="checkbox<?= $row['id'] ?>"></label>
								</span>
							</td>
							<td><?= htmlspecialchars($row['id']) ?></td>
							<td><?= htmlspecialchars($row['title']) ?></td>
							<td>$<?= number_format($row['price'], 2) ?></td>
							<td><?= htmlspecialchars($row['description']) ?></td>
							<td><?= date('Y-m-d', strtotime($row['category'])) ?></td>
							<td><img src="<?= htmlspecialchars($row['image']) ?>" alt="Product Image" width="150"
									height="150"></td>
							<td><?= htmlspecialchars($row['rating_rate']) ?></td>
							<td><?= htmlspecialchars($row['rating_count']) ?></td>
							<td>
								<a href="edit.php?id=<?= $row['id'] ?>" class="edit">
									<i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i>
								</a>
								<a href="delete.php?id=<?= $row['id'] ?>" class="delete"
									onclick="return confirm('Are you sure you want to delete this product?');">
									<i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
								</a>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
			<?php
			// Pagination logic
			$limit = 5; // Number of entries to show in a page.
			// Look for a GET variable page if not found default is 1.
			if (isset($_GET["page"])) {
				$page = $_GET["page"];
			} else {
				$page = 1;
			}
			$start_from = ($page - 1) * $limit;

			$stmt = $conn->query("SELECT * FROM products LIMIT $start_from, $limit");
			$total_records = $conn->query("SELECT COUNT(*) FROM products")->fetchColumn();
			$total_pages = ceil($total_records / $limit);
			?>

			<div class="clearfix">
				<div class="hint-text">Showing <b><?= $limit ?></b> out of <b><?= $total_records ?></b> entries
				</div>
				<ul class="pagination">
					<li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
						<a href="<?= ($page <= 1) ? '#' : '?page=' . ($page - 1) ?>" class="page-link">Previous</a>
					</li>
					<?php for ($i = 1; $i <= $total_pages; $i++): ?>
						<li class="page-item <?= ($page == $i) ? 'active' : '' ?>">
							<a href="?page=<?= $i ?>" class="page-link"><?= $i ?></a>
						</li>
					<?php endfor; ?>
					<li class="page-item <?= ($page >= $total_pages) ? 'disabled' : '' ?>">
						<a href="<?= ($page >= $total_pages) ? '#' : '?page=' . ($page + 1) ?>"
							class="page-link">Next</a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	</div>


	<!-- Footer -->
	<footer class="text-center text-lg-start text-white" style="background-color: #1c2331">
		<!-- Section: Social media -->
		<section class="d-flex justify-content-between p-4" style="background-color: #6351ce">
			<!-- Left -->
			<div class="me-5">
				<span>Get connected with us on social networks:</span>
			</div>
			<!-- Left -->

			<!-- Right -->
			<div>
				<a href="" class="text-white me-4">
					<i class="fab fa-facebook-f"></i>
				</a>
				<a href="" class="text-white me-4">
					<i class="fab fa-twitter"></i>
				</a>
				<a href="" class="text-white me-4">
					<i class="fab fa-google"></i>
				</a>
				<a href="" class="text-white me-4">
					<i class="fab fa-instagram"></i>
				</a>
				<a href="" class="text-white me-4">
					<i class="fab fa-linkedin"></i>
				</a>
				<a href="" class="text-white me-4">
					<i class="fab fa-github"></i>
				</a>
			</div>
			<!-- Right -->
		</section>
		<!-- Section: Social media -->

		<!-- Section: Links  -->
		<section class="">
			<div class="container text-center text-md-start mt-5">
				<!-- Grid row -->
				<div class="row mt-3">
					<!-- Grid column -->
					<div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
						<!-- Content -->
						<h6 class="text-uppercase fw-bold">Company name</h6>
						<hr class="mb-4 mt-0 d-inline-block mx-auto"
							style="width: 60px; background-color: #7c4dff; height: 2px" />
						<p>
							Here you can use rows and columns to organize your footer
							content. Lorem ipsum dolor sit amet, consectetur adipisicing
							elit.
						</p>
					</div>
					<!-- Grid column -->

					<!-- Grid column -->
					<div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
						<!-- Links -->
						<h6 class="text-uppercase fw-bold">Products</h6>
						<hr class="mb-4 mt-0 d-inline-block mx-auto"
							style="width: 60px; background-color: #7c4dff; height: 2px" />
						<p>
							<a href="#!" class="text-white">MDBootstrap</a>
						</p>
						<p>
							<a href="#!" class="text-white">MDWordPress</a>
						</p>
						<p>
							<a href="#!" class="text-white">BrandFlow</a>
						</p>
						<p>
							<a href="#!" class="text-white">Bootstrap Angular</a>
						</p>
					</div>
					<!-- Grid column -->

					<!-- Grid column -->
					<div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
						<!-- Links -->
						<h6 class="text-uppercase fw-bold">Useful links</h6>
						<hr class="mb-4 mt-0 d-inline-block mx-auto"
							style="width: 60px; background-color: #7c4dff; height: 2px" />
						<p>
							<a href="#!" class="text-white">Your Account</a>
						</p>
						<p>
							<a href="#!" class="text-white">Become an Affiliate</a>
						</p>
						<p>
							<a href="#!" class="text-white">Shipping Rates</a>
						</p>
						<p>
							<a href="#!" class="text-white">Help</a>
						</p>
					</div>
					<!-- Grid column -->

					<!-- Grid column -->
					<div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
						<!-- Links -->
						<h6 class="text-uppercase fw-bold">Contact</h6>
						<hr class="mb-4 mt-0 d-inline-block mx-auto"
							style="width: 60px; background-color: #7c4dff; height: 2px" />
						<p><i class="fas fa-home mr-3"></i> New York, NY 10012, US</p>
						<p><i class="fas fa-envelope mr-3"></i> info@example.com</p>
						<p><i class="fas fa-phone mr-3"></i> + 01 234 567 88</p>
						<p><i class="fas fa-print mr-3"></i> + 01 234 567 89</p>
					</div>
					<!-- Grid column -->
				</div>
				<!-- Grid row -->
			</div>
		</section>
		<!-- Section: Links  -->

		<!-- Copyright -->
		<div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
			© 2020 Copyright:
			<a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
		</div>
		<!-- Copyright -->
	</footer>
	<!-- Footer -->
</body>
<?php
include 'create.php';
?>

</html>