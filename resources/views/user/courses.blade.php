@extends('app')
@section('title')
{{ __('words.reged') }}
@endsection
@section('content')
<div class="card card-default mt-3 mb-3">
    <div class="card-header">{{ __('words.course') }}</div>
    <div class="card-body" style="overflow-x:auto;">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('words.course_name') }}</th>
                    <th scope="col">{{ __('words.course_price') }}</th>
                    <th scope="col">{{ __('words.course_teach') }}</th>
                    <th scope="col">{{ __('words.course_dura') }}</th>
                    <th style="text-align: center;" scope="col">{{ __('words.regst') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($short as $key=>$scourse)
                <tr>
                    <td>{{ ($key+1) }}</td>
                    <td>{{ $scourse->scourse->cname }}</td>
                    <td>{{ $scourse->scourse->price }}</td>
                    <td>{{ $scourse->scourse->teacher }}</td>
                    <td>{{ __('words.from') }} {{ $scourse->scourse->start }} {{ __('words.to') }} {{
                        $scourse->scourse->finish }}</td>
                    <td style="text-align: center;">
                        @if ($scourse->accepted == 1)
                        <i class="fa fa-check" aria-hidden="true"></i>
                        @else
                        <i class="fa fa-times" aria-hidden="true"></i>
                        @endif
                    </td>
                    @if ($scourse->completed == 1)
                    <td>
                        <div class="row">
                            <div class="col-sm-4 m-1">
                                <a class="btn btn-success" href="{{ route('show_cert', $scourse->id) }}">{{ __('words.showcert') }}</a>
                            </div>
                        </div>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="card card-default mt-3 mb-3">
    <div class="card-header">{{ __('words.program') }}</div>
    <div class="card-body" style="overflow-x:auto;">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('words.course_lname') }}</th>
                    <th scope="col">{{ __('words.course_type') }}</th>
                    <th scope="col">{{ __('words.course_dura') }}</th>
                    <th style="text-align: center;" scope="col">{{ __('words.regst') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($long as $key=>$lcourse)
                <tr>
                    <td>{{ ($key+1) }}</td>
                    <td>{{ $lcourse->lcourse->cname }}</td>
                    <td>{{ $lcourse->lcourse->ctype }}</td>
                    <td>{{ $lcourse->lcourse->duration }}</td>
                    <td style="text-align: center;">
                        @if ($lcourse->accepted == 1)
                        <i class="fa fa-check" aria-hidden="true"></i>
                        @else
                        <i class="fa fa-times" aria-hidden="true"></i>
                        @endif
                    </td>
                    <td>
                        <div class="row">
                            <div class="col-sm-4 m-1">
                                <a class="btn btn-default" href="{{ route('user.subject', $lcourse->lcourse->id) }}">{{ __('words.subshow') }}</a>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="row">
                            <div class="col-sm-4 m-1">
                                <a class="btn btn-default" href="{{ route('user.notes', $lcourse->lcourse->id) }}">{{
                                    __('words.not') }}</a>
                            </div>
                        </div>
                    </td>
                    @if ($lcourse->completed == 1)
                    <td>
                        <div class="row">
                            <div class="col-sm-4 m-1">
                                <a class="btn btn-success" href="{{ route('show_certl', $lcourse->id) }}">{{ __('words.showcert') }}</a>
                            </div>
                        </div>
                    </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection