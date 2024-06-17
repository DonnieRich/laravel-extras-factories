@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-center">
            <div class="col-6">
                <ul class="unstyled-list">
                    @foreach ($games as $game)
                        <li class="list-item">
                            {{ $game->name }} - {{ $game->price }}€

                            @if($game->pre_owned)
                                <span class="text-danger"> Pre Owned</span>
                            @endif

                        </li>                        
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection