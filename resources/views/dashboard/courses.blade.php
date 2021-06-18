@extends('app')
@section('title')
{{ __('words.course') }}
@endsection
@section('content')
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
                    <th scope="col">{{ __('words.course_info') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($long as $key=>$lcourse)
                <tr>
                    <td>{{ ($key+1) }}</td>
                    <td>{{ $lcourse->spec_name }}</td>
                    <td>{{ $lcourse->spec_type }}</td>
                    <td>{{ $lcourse->duration }}</td>
                    <td>{{ $lcourse->info }}</td>
                    <td>
                        <div class="row">
                            <div class="col-sm-4 m-1">
                                <a class="btn btn-secondary" href="{{ route('admin.subject.get', $lcourse->id) }}">{{ __('words.shortc') }}</a>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="row">
                            <div class="col-sm-4 m-1">
                                <a class="btn btn-default" href="{{ route('admin.lcourse.edit', $lcourse->id) }}">{{
                                    __('words.c_edit') }}</a>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#AppModel">
            {{ __('words.course_addl') }}
        </button>
    </div>
</div>


<div class="modal fade" id="AppModel" tabindex="-1" role="dialog" aria-labelledby="AppModelLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AppModelLabel">{{ __('words.course_addl') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add-course" action="{{ route('admin.long.add') }}" method="post">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="cname">{{ __('words.course_lname') }}</label>
                        <input class="form-control" type="text" name="spec_name" id="cname">
                    </div>
                    <div class="form-group">
                        <label for="ctype">{{ __('words.course_type') }}</label>
                        <input class="form-control" type="text" name="spec_type" id="ctype">
                    </div>
                    <div class="form-group">
                        <label for="certificate">{{ __('words.course_dura') }}</label>
                        <input class="form-control" type="text" name="duration" id="certificate">
                    </div>
                    <div class="form-group">
                        <label for="" info>{{ __('words.cl_info') }}</label>
                        <textarea class="form-control" name="info" id="info" cols="30" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('words.c_close') }}</button>
                <button type="button" class="btn btn-success" onclick="event.preventDefault();
                    document.getElementById('add-course').submit();">{{
                    __('words.c_add') }}</button>
            </div>
        </div>
    </div>
</div>


@endsection