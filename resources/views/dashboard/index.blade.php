<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!---- MATERIAL  ICONS-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp"
	rel="stylesheet">
    <!--------------- FAVICON ---------------->
    <link rel="shortcut icon" href="{{asset('assets/website/images/favicon.svg')}}" type="image/svg+xml">
	    <!--------------- TOAST NOTIFICATIONS ---------------->

	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="{{asset('assets/Dashboard/css/style.bundle.css')}}">
	<title>SingleCart</title>
</head>
<body>
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand"><img src="{{asset('assets/Dashboard/images/mdi--graph-box (1).svg')}}">&nbsp;<h4 style="color: black;">Single<span class="primary">Cart</span></h3></a>
		<ul class="side-menu">
			<li><a href="{{route('dashboard.home')}}" class="active"><i class='bx bxs-dashboard icon' ></i> Dashboard</a></li>
			<li class="divider" data-text="pages">Pages</li>
			<li>
				<a href="#" ><i class='bx bxs-calculator icon' ></i> Sales <i class='bx bx-chevron-right icon-right' ></i></a>
				<ul class="side-dropdown">
					<li><a href="{{route('dashboard.sales')}}">Sales Centre</a></li>
					<li><a href="{{route('dashboard.sale_history')}}">Sale History</a></li>
				
				</ul>
			</li>
			<li>
				<a href="#"><i class='bx bxs-cart-alt icon' ></i> Inventory Items <i class='bx bx-chevron-right icon-right' ></i></a>
				<ul class="side-dropdown">
					<li><a href="{{route('dashboard.item')}}">Item List</a></li>
					<li><a href="{{route('dashboard.item-create')}}">Add List</a></li>
					<li><a href="#">Import List</a></li>
				</ul>
			</li>
			<li>
				<a href="#" ><i class='bx bxs-category icon' ></i> Categories <i class='bx bx-chevron-right icon-right' ></i></a>
				<ul class="side-dropdown">
					<li><a href="{{route('dashboard.category')}}">Category List</a></li>
					<li><a href="{{route('dashboard.category-create')}}">Add Category </a></li>
					
				</ul>
			</li>
			<li>
				<a href="#"><i class='bx bxs-wallet-alt icon' ></i> Expenses <i class='bx bx-chevron-right icon-right' ></i></a>
				<ul class="side-dropdown">
					<li><a href="{{route('dashboard.expenses')}}">Expenses List</a></li>
					<li><a href="{{route('dashboard.expenses-create')}}">Add New Expenses</a></li>
					
				</ul>
			</li>
			<li class="divider" data-text="account management">Account Management</li>
			<li>
				<a href="#"><i class='bx bxs-user-pin icon' ></i>Customers <i class='bx bx-chevron-right icon-right' ></i></a>
				<ul class="side-dropdown">
					<li><a href="{{route('dashboard.customers')}}">Customer List</a></li>
					<li><a href="{{route('dashboard.customer-create')}}">Add Customer</a></li>
					<li><a href="#">Import Customer</a></li>
					
				</ul>
			</li>
			
			<li>
				<a href="#"><i class='bx bxs-cog icon' ></i>Account Settings<i class='bx bx-chevron-right icon-right' ></i></a>
				<ul class="side-dropdown">
					<li><a href="{{route('dashboard.business-update')}}">Business  List</a></li>
					<li><a href="{{route('dashboard.business-choose')}}">Change Business</a></li>
					<li><a href="{{route('dashboard.profile')}}">Edit Profile</a></li>
					
				</ul>
			</li>
			<li class="divider" data-text="reports">Reports</li>
			<li><a href="{{route('dashboard.sales-report')}}" class="reports"><i class='bx bxs-bar-chart-square icon' ></i>Sales Report</a></li>
			<li><a href="{{route('dashboard.sales-by-product-report')}}" class="reports"><i class='bx bxs-bar-chart-alt-2 icon' ></i>Sales By Products Report</a></li>
			<li><a href="{{route('dashboard.customers-report')}}" class="reports"><i class='bx bxs-user-rectangle icon' ></i>Customer Reports</a></li>
			<li><a href="{{route('dashboard.expenses-report')}}" class="reports"><i class='bx bxs-credit-card-front icon' ></i>Expenses Reports</a></li>
			<li><a href="{{route('dashboard.purchases-report')}}" class="reports"><i class='bx bxs-credit-card-front icon' ></i>Purchases Reports</a></li>
			<li><a href="{{route('dashboard.current-stock-report')}}" class="reports"><i class='bx bxs-book-content icon' ></i>Current Stock Reports</a></li>
			<li><a href="{{route('dashboard.stock-activity-report')}}" class="reports"><i class='bx bxs-book-reader icon' ></i>Stock Activity Log</a></li>
			<li><a href="{{route('dashboard.stock-sheet-report')}}" class="reports"><i class='bx bxs-spreadsheet icon' ></i>Restock Sheet</a></li>
			<li><a href="{{route('dashboard.financial-report')}}" class="reports"><i class='bx bxs-pie-chart-alt-2 icon' ></i>Financial Reports</a></li>


		</ul>
		<div class="ads">
			<div class="wrapper">
				<a href="{{ route('dashboard.logout')}}" class="btn-upgrade">End Session</a>
				<p>Become a <span>PRO</span> member and enjoy <span>All Features</span></p>
			</div>
		</div>
	</section>
	<!-- SIDEBAR -->

	<!-- NAVBAR -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu toggle-sidebar' ></i>
			<form action="#">
				<div class="form-group">
					<input type="text" placeholder="Search...">
					<i class='bx bx-search icon' ></i>
				</div>
			</form>
			<div class="theme-toggler">
				<span class="material-icons-sharp active">light_mode</span>
				<span class="material-icons-sharp">dark_mode</span>
			</div>
			<p>Hey, 
				@if (auth()->check())
				<b>{{ auth()->user()->first_name }}</b>
				@endif
			</p>
			<span class="divider"></span>
			<div class="profile">
				<img src="{{asset('assets/Dashboard/images/user.png')}}" alt="">
				<ul class="profile-link">
					<li><a href="{{route('dashboard.profile')}}"><i class='bx bxs-user-circle icon' ></i> Profile</a></li>
					<li><a href="{{route('dashboard.business-update')}}"><i class='bx bxs-cog' ></i> Settings</a></li>
					<li><a href="{{route('dashboard.logout')}}"><i class='bx bxs-log-out-circle' ></i> Logout</a></li>
				</ul>
			</div>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<h1 class="title">Dashboard</h1>
			<ul class="breadcrumbs">
				<li><a href="#">Home /</a></li>
				<li class="divider"></li>
				<li><a href="#" class="active">Summary Overview</a></li>
			</ul>
			<div class="info-data">
				<div class="card">
					<div class="head">
						<div>
							<h2>kshs {{$totalSales}}</h2>
							<p>Sales this Month</p>
						</div>
						<span class="material-icons-sharp" >analytics</span>
					</div>
					<span class="progress" data-value="100%"></span>
					<br>
					<small class="text-muted">Last 24 Hours</small>
				</div>
				<div class="card">
					<div class="head">
						<div>
							<h2>{{$pendingExpensesCount}}</h2>
							<p>Expenses Unpaid</p>
						</div>
						<span class="material-icons-sharp" style=" background: var(--color-danger);">wallet</span>
					</div>
					<span class="progress" data-value="100%"></span>
					<br>
					<small class="text-muted">Last 24 Hours</small>
				</div>
				<div class="card">
					<div class="head">
						<div>
							<h2>1</h2>
							<p>Active Users</p>
						</div>
						<span class="material-icons-sharp" >person</span>
					</div>
					<span class="progress" data-value="100%"></span>
					<br>
					<small class="text-muted">Last 24 Hours</small>
				</div>
				<div class="card">
					<div class="head">
						<div>
							<h2>{{$totalLowStockCount}}</h2>
							<p>Out of Stock</p>
						</div>
						<span class="material-icons-sharp" style=" background: var(--color-success);">stacked_line_chart</span>
					</div>
					<span class="progress" data-value="100%"></span>
					<br>
					<small class="text-muted">Last 24 Hours</small>
				</div>
			</div>
			<div class="data">
				<div class="content-data">
					<div class="head">
						<h3>Sales Report</h3>
						<div class="menu">
							<i class='bx bx-dots-horizontal-rounded icon'></i>
							<ul class="menu-link">
								<li><a href="#">Edit</a></li>
								<li><a href="#">Save</a></li>
								<li><a href="#">Remove</a></li>
							</ul>
						</div>
					</div>
					<div class="chart">
						<div id="chart"></div>
					</div>
				</div>
				<div class="content-data">
					<div class="head">
						</div>
						<div class="recent-logins">
							<h2>Recent Login</h2>
							<br><br>
							<table>
								<thead>
									<tr>
										<th>Device Details</th>
										<th>Date/Time</th>
										
									<tr>
								</thead>
								<tbody>
		           @foreach(auth()->user()->user_log_activity()->orderBy('login_at', 'desc')->take(4)->get() as $index => $activity)
                        <tr>
						<td class="primary">@if($activity->device === '1')
						<p class="primary">Desktop {{ $activity->platform }} {{ $activity->browser }}  </p>
						@else
						<p class="primary">Mobile {{ $activity->platform }} {{ $activity->browser }}</p>
						@endif </td>
						<td>{{ $activity->login_at }}</td>
                        </tr>
                    @endforeach
					</tbody>
					</table>
			    </div>  
			    </div>
			
		</main>
		<!-- MAIN -->
		<div class="container">
			<div class="recent-order">
				<h2>Recent Items</h2>
				<table>
					<thead>
						<tr>
							<th class="table-light">No</th>
							<th class="table-light">SKU</th>
							<th class="table-light">Item Name</th>
							<th class="table-light">Item Type</th>
							<th class="table-light">Category</th>
							<th class="table-light">Price</th>
							<th class="table-light">Reoder Level</th>
							<th class="table-light">Status</th>
						<tr>
					</thead>
					<tbody>
						@foreach ($items as $item)
						<tr>
						 <td>{{$loop->iteration}}</td>
						 <td>{{$item->sku}}</td>
						 <td>{{$item->name}}</td>
						 <td class="warning">{{strtoupper($item->item_type)}}</td>
						 <td>{{$item->category->name}}</td>
						 <td>{{$item->selling_price}}</td>
						 <td class="danger">{{$item->low_stock_count}}</td>
						 <td class="primary">@if ($item->enabled == '1') Enabled
							@else
							Disabled    
						@endif
						 </td>
						@endforeach
	   
					</tbody>
				</table><br>
				<a href="{{route('dashboard.item')}}">Show All</a>
			 </div>  
		</div>

	</section>
	<!-- NAVBAR -->

	<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
	<script src="{{asset('assets/Dashboard/js/main.dashboard.js')}}"></script>

</body>
</html>