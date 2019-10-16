@extends('layouts.app')

@if (Auth::check())

@section('content')
<div class="container">
	<div class="row">
		<div class="col-12 text-center my-md-2 my-2">
			<h1>Meus Comentários {{$total}}</h1>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12 my-md-2 my-2">
			<ol class="breadcrumb">
				<li><a href="{{ url('/') }}">Home</a></li> 
				<li>&nbsp;/&nbsp;</li>
				<li class="active">Meus Comentários</li>
			</ol>
		</div>
	</div> 
	<div class="row">
		<div class="col-12">

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

			<table class="table table-hover">
				<thead>
					<tr>
						<tr>
							<col width="">
							<col width="80%">
							<col width="">
						</tr>
					</tr>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Comentário</th>
						<th scope="col" class="text-center">Ações</th>
					</tr>
				</thead>
				<tbody>
					@foreach($comments as $comment)
					<tr>
						<th scope="row">{{$comment->id}}</th>
						<td>{{$comment->message}}</td>
						<td class="text-center">
							
							<span href="" class="btn btn-sm btn-dark" data-toggle="tooltip" data-placement="top" title="Criado em: {{$comment->created_at}} | Atualizado em: {{$comment->updated_at}}"><i class="fa fa-info-circle"></i></span>
							
							<a href="{{route('comments.edit', $comment->id)}}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Alterar"><i class="fa fa-edit"></i></a>
							
							<form class="d-inline" method="POST" action="{{route('comments.destroy', $comment->id)}}" data-toggle="tooltip" data-placement="top" title="Excluir" onsubmit="return confirm('Confirma exclusão?')">
								{{method_field('delete')}}{{ csrf_field() }} 
								<button type="submit" class="btn btn-danger btn-sm">
									<i class="fa fa-trash"></i>
								</button>
							</form>

						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

</div>
@endsection
@endif