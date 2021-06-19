@extends('app')
@section('title')
المواد
@endsection
@section('jum')
<div class="jumbotron jumbotron-fluid purple-gradient text-white">
    <div class="container">
        <h2>{{ $course_info->spec->spec_name }}</h2>
    </div>
</div>
@endsection
@section('content')
<div class="card card-default mt-3 mb-3">
    <div class="card-header">{{ $course_info->course_name }}</div>
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
                    <td>{{ strtoupper($file->type) }}</td>
                    <td>{{ $file->size }}</td>
                    @if (!empty($file->getMedia()))
                    <td><a class="btn btn-success"
                            href="{{ $file->getMedia()[0]->getFullUrl() }}">{{ __('words.file_download') }}</a></td>
                    @if ($file->getMedia()[0]->mime_type == 'video/mp4')
                    <td><a class="btn btn-info btn-outline" data-title="{{ $file->name }}"
                            data-link="{{ $file->getMedia()[0]->getFullUrl() }}" data-toggle="modal"
                            data-target="#basicExampleModal">مشاهدة</a></td>
                    @endif
                    @endif

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="basicExampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="titleModal"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe id="playvideo" width="848" height="480" src="" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

@section('scri')
<script>
    $(document).on("click", ".btn-outline", function () {
        var video_link = $(this).attr('data-link');
        var title = $(this).attr('data-title');
        $("#playvideo").attr("src", video_link);
        $("#titleModal").text(title);
    });
    $("#basicExampleModal").on('hidden.bs.modal', function (e) {
        $("#basicExampleModal iframe").attr("src", "");
    });
</script>

@endsection
@endsection