@extends('app')
@section('title')
{{ __('words.not') }}
@endsection

@section('content')
<div class="row">
    <div class="col-sm m-3">
        <div class="card card-default">
            <div class="card-header">{{ __('words.not') }}</div>
            <div class="card-body" style="overflow-x:auto;">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">{{ __('words.notedate') }}</th>
                            <th scope="col">{{ __('words.onenote') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($notes as $key=>$item)
                        <tr>
                            <td>{{ ($key+1) }}</td>
                            <td>{{ date('Y-m-j', strtotime($item->created_at)) }}</td>
                            <td>{{ $item->note }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection