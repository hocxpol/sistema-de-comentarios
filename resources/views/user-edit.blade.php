@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 my-md-2 my-2">
			<ol class="breadcrumb small">
				<li><a href="{{ url('/') }}">Home</a></li> 
				<li>&nbsp;/&nbsp;</li>
				<li><a href="{{ route('users.index') }}">Usuários</a></li>
				<li>&nbsp;/&nbsp;</li>
				<li class="active">Editar</li>
			</ol>
		</div>
	</div> 
	<div class="row">
		<div class="col-12 text-center my-md-2 my-2">
			<h1>Editar Usuário</h1>
		</div>
	</div>
	<div class="row">  
		<div class="col-md-12">

			@if ($message = Session::get('success'))
			<div class="alert alert-success alert-block text-center">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<strong>{{ $message }}</strong>
			</div>
			@endif

			@if ($message = Session::get('error'))
			<div class="alert alert-danger alert-block text-center">
				<button type="button" class="close" data-dismiss="alert">×</button>
				<strong>{{ $message }}</strong>
			</div>
			@endif
			
			@if ($errors->any())
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif

			<form method="post" action="{{route('users.update', $users->id)}}" enctype="multipart/form-data">
				{!! method_field('put') !!}
				{{ csrf_field() }}

				<div class="row">

					<div class="col-9">
						<div class="form-group row">
							<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

							<div class="col-md-8">
								<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$users->name}}" required autocomplete="name" autofocus>

								@error('name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

							<div class="col-md-8">
								<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$users->email}}" required autocomplete="email">

								@error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

							<div class="col-md-8">
								<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">

								@error('password')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
								@enderror
							</div>
						</div>

						<div class="form-group row">
							<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

							<div class="col-md-8">
								<input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
							</div>
						</div>
						@if( Auth::user()->type == 0)
						<div class="form-group row">
							<label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>

							<div class="col-md-8">
								<select name="type" id="type" class="form-control selectpicker" data-style="btn-dark">
									<option value="0" @if( $users->type == 0) {{'selected'}} @endif >Admin</option>
									<option value="1" @if( $users->type == 1) {{'selected'}} @endif >User</option>
								</select>
							</div>
						</div>
						@endif

						<hr>

						<div class="form-group row">
							<div class="col-md-4">
								<small id="fileHelp" class="form-text text-muted">Faça o upload de um arquivo de imagem válido. O tamanho da imagem não deve ser superior a 2 MB.</small>
							</div>
							<div class="col-md-8">
								<div class="input-group mb-3">
									<div class="input-group-prepend">
										<span class="input-group-text">Upload</span>
									</div>
									<div class="custom-file">
										<input type="file" class="form-control-file" id="avatar" name="avatar">
										<label class="custom-file-label" for="avatar">Escolher arquivo</label>
									</div>
								</div>
								
							</div>
						</div>

						<hr>
						<div class="row">
							<div class="col-12 text-center">
								<a href="{{ route('users.index') }}" class="btn btn-dark"><i class="fa fa-arrow-left"></i> Cancelar</a>
								<button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> {{ __('Alterar') }}</button>
							</div>
						</div>

					</div>

					@if ($users->avatar)
					<div class="col-3">
						<img class="img-fluid" src="/storage/avatars/{{ $users->avatar }}" />
					</div>
					@else 
					<div class="col-3">
						<img class="img-fluid" src="/storage/avatars/avatar.jpg" />
					</div>
					@endif

				</div>

			</form>

		</div>
	</div>
</div>
@endsection