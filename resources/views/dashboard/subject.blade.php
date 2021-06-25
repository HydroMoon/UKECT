@extends('app')

@section('title')
{{ __('words.addsub') }}
@endsection

@section('content')
<div class="card card-default mt-3 mb-3">
    <div class="card-header">{{ __('words.course') }} - {{ $spec->spec_name }}</div>
    <form class="col-sm-6 mt-3 mx-auto row" action="{{ route('admin.subjectp.get') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group col-sm">
            <label for="semester">{{ __('words.semester') }}</label>
            <select name="semester" id="semester" class="form-control">
                <option value="1">{{ __('words.semester') }} - 1</option>
                <option value="2">{{ __('words.semester') }} - 2</option>
                <option value="3">{{ __('words.semester') }} - 3</option>
                <option value="4">{{ __('words.semester') }} - 4</option>
                <option value="5">{{ __('words.semester') }} - 5</option>
                <option value="6">{{ __('words.semester') }} - 6</option>
                <option value="7">{{ __('words.semester') }} - 7</option>
                <option value="8">{{ __('words.semester') }} - 8</option>
            </select>
        </div>
        <input type="hidden" name="spec_id" value="{{ $spec->id }}">
        <div class="form-group">
            <br>
            <button class="btn btn-success" type="submit">{{ __('words.open') }}</button>
        </div>
    </form>

    <div class="card-body" style="overflow-x:auto;">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('words.course_name') }}</th>
                    <th scope="col">{{ __('words.course_teach') }}</th>
                    <th scope="col">{{ __('words.semester') }}</th>
                    <th scope="col">{{ __('words.longc') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subject as $key=>$course)
                <tr>
                    <td>{{ ($key+1) }}</td>
                    <td>{{ $course->course_name }}</td>
                    <td>{{ $course->teacher }}</td>
                    <td>{{ $course->semester }}</td>
                    <td>{{ $spec->spec_name }}</td>
                    {{-- <td>
                        <div class="row">
                            <div class="col-sm-4 m-1">
                                <a class="btn btn-default" href="{{ route('admin.scourse.edit', $course->id) }}">{{
                                    __('words.c_edit') }}</a>
    </div>
</div>
</td> --}}
</tr>
@endforeach
</tbody>
</table>
<button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#ShortModal">
    {{ __('words.shortc') }}
</button>
</div>
</div>

<div class="modal fade" id="ShortModal" tabindex="-1" role="dialog" aria-labelledby="ShortModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ShortModalLabel">{{ __('words.shortc') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add-short-course" action="{{ route('admin.subject.add', $spec->id) }}" method="post">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="cname">{{ __('words.course_name') }}</label>
                        <input class="form-control" type="text" name="course_name" id="cname">
                    </div>
                    <div class="form-group">
                        <label for="semester">{{ __('words.semester') }}</label>
                        <input class="form-control" type="text" name="semester" id="semester">
                    </div>
                    <div class="form-group">
                        <label for="teacher">{{ __('words.teach') }}</label>
                        <select class="form-control" name="teacher" id="teacher">
                            <option>{{ __('words.c_choseteach') }}</option>
                            @foreach ($teacher->users as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="specialty">{{ __('words.longc') }}</label>
                        <select class="form-control" name="spec_id" id="specialty">
                            <option value="{{ $spec->id }}">{{ $spec->spec_name }}</option>
                        </select>
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