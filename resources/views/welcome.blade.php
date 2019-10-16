@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-12 text-center my-md-5 my-2">
			<h1>Produto Novo</h1>
			<p>Este é o lançamento de um novo produto</p>
			<img src="http://placehold.it/800x300" alt="Produto Novo" class="img-fluid mx-auto d-block my-3">
		</div>
	</div>

	<div class="row">
		<div class="col-12 text-center mb-md-5 mb-3">
			<h2>O que você achou do nosso novo produto?</h2>
			
			@guest
			Para comentar é preciso fazer o <a href="{{route('login')}}">login</a> ou <a href="{{route('register')}}">registrar</a>
			@else 
			<a href="{{route('comments.index')}}" class="btn btn-dark"><i class="fa fa-edit"></i> Meus Comentários</a>
			@endif

		</div>

		<div class="col-12">
			<form action="">

			</form>
		</div>
	</div>
</div>

<div class="container pb-5">
	<div class="row">
		<div class="col-md-8 mx-auto">
			<h3>Comentários</h3>
			<hr>

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

		</div>
	</div>

	<div class="row">
		<div class="col-md-8 mx-auto">
			@foreach($comments as $comment)
			<div class="row mb-2">
				<div class="col-md-2 col-2">
					<img src="storage\avatars\{{Sistema\Users::find($comment->user_id)->user['avatar']}}" class="img-fluid" alt="" />
				</div>
				<div class="col-md-10 col-10">
					<div>
						{{$comment->message}}
					</div>
					<div class="text-muted small">
						Postado por: {{ Sistema\Users::find($comment->user_id)->user['name'] }} em 
						{{ date('d/m/Y', strtotime($comment->updated_at)) }}  às {{ date('H:i:s', strtotime($comment->updated_at)) }}
					</div>
					@if (Auth::check())
					@if ((Auth::user()->id == $comment->user_id) OR (Auth::user()->type == 0))
					<div class="mt-2 text-right">
						<span href="" class="btn btn-sm btn-dark" data-toggle="tooltip" data-placement="top" title="Criado em: {{$comment->created_at}} | Atualizado em: {{$comment->updated_at}}"><i class="fa fa-info-circle"></i></span>

						<a href="{{route('comments.edit', $comment->id)}}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Alterar"><i class="fa fa-edit"></i></a>

						<form class="d-inline" method="POST" action="{{route('comments.destroy', $comment->id)}}" data-toggle="tooltip" data-placement="top" title="Excluir" onsubmit="return confirm('Confirma exclusão?')">
							{{method_field('delete')}}{{ csrf_field() }} 
							<button type="submit" class="btn btn-danger btn-sm">
								<i class="fa fa-trash"></i>
							</button>
						</form>
					</div>
					@endif
					@endif
				</div>
			</div>
			<hr>
			@endforeach
		</div>
	</div>
</div>

@if(Auth::check())
<div id="hxp-message" class="bg-dark d-table w-100 fixed-bottom">
	<div class="container">
		<div class="row">
			<div class="col-md-12 mx-auto">
				<form method="post" class="my-3" role="form" action="{{route('comments.store')}}">
					{{ csrf_field() }}
					<div class="row">
						<div class="col-md-9 mb-md-0 mb-3">
							<input class="form-control" type="text" placeholder="Insira seu comentário" id="message" name="message"/>
						</div>
						<div class="col-md-3">
							<button class="btn btn-secondary btn-block"><i class="fa fa-comment"></i> Enviar</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endif

@endsection