@extends('layout')
@section('content')
		<div class="agil-info-calendar">
		<!-- calendar -->
		<div class="col-md-6 agile-calendar">
			<div class="calendar-widget">
                <div class="panel-heading ui-sortable-handle">
					<span class="panel-icon">
                      <i class="fa fa-calendar-o"></i>
                    </span>
                    <span class="panel-title"> Calendar Widget</span>
                </div>
				<!-- grids -->
					<div class="agile-calendar-grid">
						<div class="page">
							
							<div class="w3l-calendar-left">
								<div class="calendar-heading">
									
								</div>
								<div class="monthly" id="mycalendar"></div>
							</div>
							
							<div class="clearfix"> </div>
						</div>
					</div>
			</div>
		</div>
		<!-- //calendar -->

		<!-- calendar -->
	<script type="text/javascript" src="{{asset('public/frontend/js/monthly.js')}}"></script>
	<script type="text/javascript">
	@if($jobs == 0)
		var Events = {
			"monthly": [
				{
				"id": 1,
				"name": "",
				"startdate": "",
				"enddate": "",
				"starttime": "",
				"endtime": "",
				"color": "#99CCCC",
				"url": ""
				},
			]
		};
	@else
		var Events = {
			"monthly": [
				@foreach ($jobs as $job) 
				{
				"id": 1,
				"name": "{{$job['job_title']}}",
				"startdate": "{{$job['job_deadline']}}",
				"enddate": "",
				"starttime": "",
				"endtime": "",
				"color": "#99CCCC",
				"url": ""
				},
				@endforeach
			]
			};
	@endif


		$(window).load( function() {

			$('#mycalendar').monthly({
				dataType: "json",
				mode: 'event',
				eventList: true,
				showTrigger: 'hahahah',
				events: Events,

			});
			{{-- $('#mycalendar').monthly({
				mode: 'picker',
				target: 'Mon',
				setWidth: '250x',
				startHidden: true,
				showTrigger: '2022-8-21',
				stylePast: true,
				disablePast: true
			}); --}}
		switch(window.location.protocol) {
		case 'http:':
		case 'https:':
		// running on a server, should be good.
		break;
		case 'file:':
		alert('Just a heads-up, events will not work when run locally.');
		}

		});
	</script>
	<!-- //calendar -->
@endsection