@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 my-md-2 my-2">
			<ol class="breadcrumb small">
				<li><a href="{{ url('/') }}">Home</a></li> 
				<li>&nbsp;/&nbsp;</li>
				<li><a href="{{ route('comments.index') }}">Comentários</a></li>
				<li>&nbsp;/&nbsp;</li>
				<li class="active">Editar</li>
			</ol>
		</div>
	</div> 
	<div class="row">
		<div class="col-12 text-center my-md-2 my-2">
			<h1>Editar Comentário</h1>
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

			<form method="post" action="{{route('comments.update', $comments->id)}}">
				{!! method_field('put') !!}
				{{ csrf_field() }}
				<textarea name="message" id="message" class="form-control" rows="6" required>{{$comments->message}}</textarea>
				
				<hr>
				<div class="row">
					<div class="col-6">
						Criado em: {{ date('d/m/Y', strtotime($comments->created_at)) }}  às {{ date('H:i:s', strtotime($comments->created_at)) }}
					</div>
					<div class="col-6 text-right">
						Atualizado em: {{ date('d/m/Y', strtotime($comments->updated_at)) }}  às {{ date('H:i:s', strtotime($comments->updated_at)) }}
					</div>
				</div>
				<hr class="mb-5">
				<div class="row">
					<div class="col-12 text-center">
						<a href="{{ route('comments.index') }}" class="btn btn-dark"><i class="fa fa-arrow-left"></i> Voltar</a>
						<button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Alterar</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection