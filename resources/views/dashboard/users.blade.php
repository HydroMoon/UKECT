@extends('app')
@section('title')
{{ __('words.uinfo') }}
@endsection
@section('content')
<div class="card mt-3 mb-3">
    <div class="card-header">{{ __('words.uinfo') }}</div>
    <form class="form-inline md-form mr-auto mx-auto" action="{{ route('search.users') }}" method="POST" role="search">
        {{ csrf_field() }}
        <div class="form-group">
            <input type="text" class="form-control mr-sm-2" name="q" placeholder="{{ __('words.placeholder') }}"> <span
                class="input-group-btn">
                <button type="submit" class="btn btn-default">
                    <span class="fa fa-search"></span>
                </button>
            </span>
        </div>
    </form>
    <div class="card-body" style="overflow-x:auto;">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('words.uname') }}</th>
                    <th scope="col">{{ __('words.uphone') }}</th>
                    <th scope="col">{{ __('words.uemail') }}</th>
                    {{-- <th scope="col">{{ __('words.regst') }}</th> --}}
                </tr>
            </thead>
            <tbody>
                @if (isset($data))
                @foreach ($data as $key=>$user)
                <tr>
                    <td>{{ ($key+1) }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <div class="row">
                            {{-- <div class="col-sm-4 m-1">
                                <a class="btn btn-default" href="{{ route('users.single.short', $user->id) }}">{{
                                    __('words.short') }}</a>
                            </div> --}}
                            <div class="col-sm-4 m-1">
                                <a class="btn btn-default" href="{{ route('users.single.long', $user->id) }}">{{
                                    __('words.long') }}</a>
                            </div>
                        </div>
                    </td>
                    {{-- <td>
                        <div class="row">
                            <div class="col-sm-4 m-1 dropdown">
                                <a class="btn btn-default dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    {{ __('words.reg') }}
                                </a>
                                 <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="{{ route('users.inside.short', $user->id) }}">{{
                                        __('words.short') }}</a>
                                    <a class="dropdown-item" href="{{ route('users.inside.long', $user->id) }}">{{
                                        __('words.long') }}</a>
                                </div>
                                <form action="{{ route('users.del', $user->id) }}" method="POST">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button class="btn btn-danger" type="submit">{{ __('words.del') }}</button>
                                </form>
                            </div>
                        </div>
                    </td> --}}
                </tr>
                @endforeach
                @endif

            </tbody>
        </table>
    </div>
</div>
@endsection