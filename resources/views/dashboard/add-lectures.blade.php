@extends('app')

@section('title')
{{ __('words.addsub') }}
@endsection
@section('stylee')
    <!-- Filepond stylesheet -->
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet">
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>
@endsection
@section('content')
<div class="card card-default mt-3 mb-3">
    <div class="card-header">{{ __('words.course') }} - {{ $cname }}</div>
    <div class="card-body" style="overflow-x:auto;">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('words.file_name') }}</th>
                    <th scope="col">{{ __('words.file_type') }}</th>
                    <th scope="col">{{ __('words.file_size') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($material as $key=>$file)
                <tr>
                    <td>{{ ($key+1) }}</td>
                    <td>{{ $file->name }}</td>
                    <td>{{ $file->type }}</td>
                    <td>{{ $file->size }}</td>
                    <td>
                        <div class="row">
                            <div class="col-sm-4 m-1">
                                <form action="{{ route('admin.material.delete', $file->id) }}" method="post">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <button class="btn btn-danger" type="submit">{{
                                        __('words.file_del') }}</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#ShortModal">
            {{ __('words.file_add') }}
        </button>
    </div>
</div>

<div class="modal fade" id="ShortModal" tabindex="-1" role="dialog" aria-labelledby="ShortModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ShortModalLabel">{{ __('words.shortc') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add-short-course" action="{{ route('admin.upload.lectures') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="name">{{ __('words.file_name') }}</label>
                        <input class="form-control" type="text" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="file">{{ __('words.file') }}</label>
                        <input type="file" class="filepond" name="file">
                    </div>
                    <input type="hidden" name="course_id" value="{{ $course_id }}">
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

@section('scri')
<script>
    FilePond.parse(document.body);
    FilePond.setOptions({
        chunkUploads: true,
        server: {
            url: '{{ route('admin.upload.file') }}',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        }
    });
</script>
@endsection