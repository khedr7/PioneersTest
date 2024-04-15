<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard</title>
	<!-- Bootstrap CSS -->
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
	<!-- Custom styles for dashboard -->
	<style>
		/* Custom styles for sidebar */
		.sidebar {
			height: 100vh;
			background-color: #f8f9fa;
		}

		/* Style for sidebar links */
		.sidebar-link {
			display: block;
			padding: 10px 15px;
			color: #333;
			text-decoration: none;
		}

		.sidebar-link:hover {
			background-color: #e9ecef;
		}

		.map {
			width: 1100px;
			height: 650px;
		}
	</style>
</head>

<body>
	<!-- Navigation Bar -->
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container">
			<!-- Left side of navbar -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" href="#">Dashboard</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Vehicles</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Users</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">transaction</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Order History</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Complaints</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">System log</a>
				</li>

			</ul>

			<!-- Right side of navbar -->
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="{{ route('auth.logout') }}"
						onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout</a>
					<form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
						@csrf
					</form>
				</li>
			</ul>
		</div>
	</nav>

	<!-- Main Content Area -->
	<div class="container-fluid mt-3">
		<div class="row">

			<!-- Main Content -->
			<div class="col-md-9">
				<div class="map" id="map"></div>
			</div>

			<!-- Sidebar -->
			<div class="col-md-3 sidebar">
				<h5 class="mt-3 mb-3">Active orders</h5>
				<ul class="list-unstyled">
					<li><a href="#" class="sidebar-link">order 1</a></li>
					<li><a href="#" class="sidebar-link">order 2</a></li>
					<li><a href="#" class="sidebar-link">order 3</a></li>
					<li><a href="#" class="sidebar-link">order 4</a></li>
					<li><a href="#" class="sidebar-link">order 5</a></li>
				</ul>
			</div>


		</div>
	</div>

	<!-- Bootstrap JS and dependencies -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCPsxZeXKcSYK1XXw0O0RbrZiI_Ekou5DY&callback=initMap" async
		defer></script>

	<script>
		document.addEventListener('DOMContentLoaded', function() {
			// Wait for the DOM to be fully loaded
			initMapAfterLoad();
		});

		function initMapAfterLoad() {
			// Check if the map element is available
			const mapElement = document.getElementById('map');
			if (mapElement) {
				// Initialize the map
				initMap();
			} else {
				// If the map element is not available, wait and try again
				setTimeout(initMapAfterLoad, 100);
			}
		}

		// تهيئة الخريطة
		function initMap() {
			const map = new google.maps.Map(document.getElementById('map'), {
				center: {
					lat: 33.510414,
					lng: 36.278336
				},
				zoom: 8,
			});
		}
	</script>

</body>

</html>
