@extends('admin.layout')

@section('pageHeader')
	<div class="row">
		<div class="col-lg-12">
		<h1>Language Statistics</h1>
			<ol class="breadcrumb">
				<li><a href="index.html"><i class="icon-dashboard"></i> Languages</a></li>
				<li><a href="index.html"><i class="icon-dashboard"></i> Statistics</a></li>
			</ol>
		</div>
	</div>
@stop

@section('content')

	<div class="row">
        <div class="col-lg-3">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <i class="fa fa-comments fa-5x"></i>
                        </div>
                        <div class="col-xs-6 text-right">
                            <p class="announcement-heading">{{ $stats->messages }}</p>
                            <p class="announcement-text">Unique messages</p>
                            <p class="announcement-text">&nbsp;</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <i class="fa fa-bullhorn fa-5x"></i>
                        </div>
                        <div class="col-xs-6 text-right">
                            <p class="announcement-heading">{{ $stats->languages }}</p>
                            <p class="announcement-text">Enabled Languages out of {{ $stats->total_languages }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <i class="fa fa-check fa-5x"></i>
                        </div>
                        <div class="col-xs-6 text-right">
                            <p class="announcement-heading">{{ $stats->translated }}</p>
                            <p class="announcement-text">Translations</p>
                            <p class="announcement-text">out of {{ $stats->messages * $stats->languages }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <i class="fa fa-exclamation-triangle fa-5x"></i>
                        </div>
                        <div class="col-xs-6 text-right">
                            <p class="announcement-heading">{{ ($stats->messages*$stats->languages) - $stats->translated }}</p>
                            <p class="announcement-text">Missing</p>
                            <p class="announcement-text">out of {{ $stats->messages * $stats->languages }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<div class="row">
		<div class="col-lg-10 col-md-offset-1">
			<div class="table-responsive">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Language</th>
							<th width="20%">Translated</th>
							<th width="20%">Missing translations</th>
						</tr>
					</thead>							

					@foreach($languages as $language)
						<tr>
							<td><a href="{{ URL::route('admin.languages.show', [$language->language_id.'-'.$language->country_id]) }}">{{ $language->regional_name }}</a></td>
							<td>{{ $language->translated }}</td>
							<td>{{ $stats->messages-$language->translated }}</td>
						</tr>
					@endforeach
				</table>
			</div>
		</div>
	</div>	

@stop
