@extends('app')
@section('title')
{{ __('words.course') }}
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
                    <th scope="col">{{ __('words.course_cert') }}</th>
                    <th scope="col">{{ __('words.course_dura') }}</th>
                    <th scope="col">{{ __('words.course_info') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($short as $key=>$course)
                <tr>
                    <td>{{ ($key+1) }}</td>
                    <td>{{ $course->cname }}</td>
                    <td>{{ $course->price }}</td>
                    <td>{{ $course->teacher }}</td>
                    <td>{{ $course->certificate }}</td>
                    <td>{{ __('words.from') }} {{ $course->start }} {{ __('words.to') }} {{ $course->finish }}</td>
                    <td>{{ $course->info }}</td>
                    <td>
                        <div class="row">
                            <div class="col-sm-4 m-1">
                                <a class="btn btn-default" href="{{ route('admin.scourse.edit', $course->id) }}">{{
                                    __('words.c_edit') }}</a>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#ShortModal">
            {{ __('words.course_adds') }}
        </button>
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
                    <th scope="col">{{ __('words.course_cert') }}</th>
                    <th scope="col">{{ __('words.course_dura') }}</th>
                    <th scope="col">{{ __('words.course_info') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($long as $key=>$lcourse)
                <tr>
                    <td>{{ ($key+1) }}</td>
                    <td>{{ $lcourse->cname }}</td>
                    <td>{{ $lcourse->ctype }}</td>
                    <td>{{ $lcourse->certificate }}</td>
                    <td>{{ $lcourse->duration }}</td>
                    <td>{{ $lcourse->info }}</td>
                    <td>
                        <div class="row">
                            <div class="col-sm-4 m-1">
                                <a class="btn btn-secondary" href="{{ route('admin.subject.get', $lcourse->id) }}">{{ __('words.addsub') }}</a>
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
                        <input class="form-control" type="text" name="cname" id="cname">
                    </div>
                    <div class="form-group">
                        <label for="ctype">{{ __('words.course_type') }}</label>
                        <input class="form-control" type="text" name="ctype" id="ctype">
                    </div>
                    <input class="form-control" type="hidden" name="price" id="price" value="0">
                    <div class="form-group">
                        <label for="certificate">{{ __('words.course_cert') }}</label>
                        <input class="form-control" type="text" name="certificate" id="certificate">
                    </div>
                    <div class="form-group">
                        <label for="duration">{{ __('words.course_dura') }}</label>
                        <input type="text" id="duration" class="form-control" name="duration">
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

<div class="modal fade" id="ShortModal" tabindex="-1" role="dialog" aria-labelledby="ShortModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ShortModalLabel">{{ __('words.course_adds') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add-short-course" action="{{ route('admin.short.add') }}" method="post">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="cname">{{ __('words.course_name') }}</label>
                        <input class="form-control" type="text" name="cname" id="cname">
                    </div>
                    <div class="form-group">
                        <label for="price">{{ __('words.course_price') }}</label>
                        <input class="form-control" type="text" name="price" id="price">
                    </div>
                    <div class="form-group">
                        <label for="teacher">{{ __('words.course_teach') }}</label>
                        <select class="form-control" name="teacher" id="teacher">
                            <option>{{ __('words.c_choseteach') }}</option>
                            @foreach ($teacher as $item)
                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="certificate">{{ __('words.course_cert') }}</label>
                        <input class="form-control" type="text" name="certificate" id="certificate">
                    </div>

                    <div class="form-group date" data-date="2000-02-02" data-date-format="yyyy-mm-dd">
                        <label for="duration">{{ __('words.course_dura') }}</label>

                        <div class="row">
                            <div class="col-sm">
                                <label for="dration">{{ __('words.from') }}</label>
                                <input id="duration" class="form-control datepicker" name="start">
                            </div>
                            <div class="col-sm">
                                <label for="dration">{{ __('words.to') }}</label>
                                <input id="duration" class="form-control datepicker" name="finish">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" info>{{ __('words.c_info') }}</label>
                        <textarea class="form-control" name="info" id="info" cols="30" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">{{ __('words.c_close') }}</button>
                <button type="button" class="btn btn-success" onclick="event.preventDefault();
                        document.getElementById('add-short-course').submit();">{{
                    __('words.c_save') }}</button>
            </div>
        </div>
    </div>
</div>
@endsection