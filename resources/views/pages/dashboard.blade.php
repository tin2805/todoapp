@extends('layout')
@section('content')
<h3>Hôm nay bạn sẽ làm gì </h3>
		<div class="col-md-6 w3agile-notifications">
			<div class="notifications">
				<!--notification start-->
				
					<header class="panel-heading">
						Notification 
					</header>
					<div class="notify-w3ls">
						<div class="alert alert-danger">
							<span class="alert-icon"><i class="fa fa-facebook"></i></span>
							<div class="notification-info">
								<ul class="clearfix notification-meta">
									<li class="pull-left notification-sender"><span><a href="#">Hôm nay có {{count($red)}} deadline</a></span>, vui lòng làm </li>
								</ul>
								<p>
									Nhấp để xem
								</p>
							</div>
						</div>
						<div class="alert alert-success ">
							<span class="alert-icon"><i class="fa fa-comments-o"></i></span>
							<div class="notification-info">
								<ul class="clearfix notification-meta">
									<li class="pull-left notification-sender">Bạn đã hoàn thành {{count($green)}} công việc trong tuần này</li>
								</ul>
								<p>
									Nhấp để xem.
								</p>
							</div>
						</div>
						<div class="alert alert-warning ">
							<span class="alert-icon"><i class="fa fa-bell-o"></i></span>
							<div class="notification-info">
								<ul class="clearfix notification-meta">
									<li class="pull-left notification-sender">Tuần này vẫn còn {{count($yellow)}} công việc chưa làm nhé</li>
								</ul>
								<p>
									Nhấp để xem
								</p>
							</div>
						</div>
					</div>
				
				<!--notification end-->
				</div>
			</div>
@endsection