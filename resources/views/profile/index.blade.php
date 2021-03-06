@extends('layouts.frontend')

@section('jumbotron')
	<div class="jumbotron">
		<div class="jumbotron-background">
			<div class="jumbotron-overlay"></div>
		</div>
		<div class="container">
			<div class="page-heading">
				<h1>Profil</h1>
			</div>
		</div>
	</div>
@stop

@section('page')
	<div class="container">
		<div class="row">
			<div class="col-sm-8 col-xs-12">
				<div class="panel panel-default">
					<div class="panel-heading">Alap adatok</div>
					<div class="panel-body">
						<form action="" method="post">
							<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
								<label for="name" class="control-label">Neved: </label>
								<input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
								@if($errors->has('name'))
									<span class="help-block">{{ $errors->first('name') }}</span>
								@endif
							</div>

							<div class="form-group{{ $errors->has('displayed_name') ? ' has-error' : '' }}">
								<label for="displayed_name" class="control-label">Megjelenítendő neved: </label>
								<select name="displayed_name" id="displayed_name" class="form-control">
									<option value="username" @if(Auth::user()->displayed_name == 'username') selected @endif>Felhasználónév</option>
									<option value="name" @if(Auth::user()->displayed_name == 'name') selected @endif>Teljes név</option>
								</select>
								@if($errors->has('displayed_name'))
									<span class="help-block">{{ $errors->first('displayed_name') }}</span>
								@endif
							</div>

							<div class="form-group{{ $errors->has('avatar_image') ? ' has-error' : '' }}">
								<label for="avatar_image" class="control-label">Megjelenő profilkép: </label>
								<select name="avatar_image" id="avatar_image" class="form-control">
									<option value="gravatar" @if(Auth::user()->avatar_image == 'gravatar') selected @endif>Gravatár</option>
									<option value="skin" @if(Auth::user()->avatar_image == 'skin') selected @endif>Skin</option>
								</select>
								@if($errors->has('avatar_image'))
									<span class="help-block">{{ $errors->first('avatar_image') }}</span>
								@endif
							</div>

							<div class="form-group{{ $errors->has('subscribe_newsletter') ? ' has-error' : '' }}">
								<label for="subscribe_newsletter" class="control-label">Hírlevél: </label>
								<select name="subscribe_newsletter" id="subscribe_newsletter" class="form-control">
									<option value="0" @if(Auth::user()->subscribe_newsletter == 0) selected @endif>Leiratkozva</option>
									<option value="1" @if(Auth::user()->subscribe_newsletter == 1) selected @endif>Feliratkozva</option>
								</select>
								@if($errors->has('subscribe_newsletter'))
									<span class="help-block">{{ $errors->first('subscribe_newsletter') }}</span>
								@endif
							</div>

							{{ csrf_field() }}
							<button type="submit" class="btn btn-primary">Mentés</button>
						</form>
					</div>
				</div>
			</div>

			<div class="col-sm-4 hidden-xs" style="position: absolute; bottom: 0; right: 0">
				<img src="images/endergirl_2.png" class="img-responsive" alt="Skeleton girl">
			</div>
		</div>
	</div>
@stop

@push('footer_js')
	<script>
		$(function () {
			$('[data-toggle="popover"]').popover()
		})
	</script>
@endpush