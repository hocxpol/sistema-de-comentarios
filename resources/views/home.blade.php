@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col">
                    <a href="{{ route('comments.index') }}" class="btn btn-secondary my-2 d-block">
                        <i class="fa fa-comments"></i> {{ __('Meus Comentários') }}
                    </a>
                </div>
                <div class="col">
                    <a href="{{ url('/') }}" class="btn btn-secondary my-2 d-block">
                        <i class="fa fa-star"></i> {{ __('Produto') }}
                    </a>
                </div>
                <div class="col">
                    <a href="{{ route('users.edit', Auth::id()) }}" class="btn btn-secondary my-2 d-block">
                        <i class="fa fa-user"></i>
                        {{ __('Editar Perfil') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
