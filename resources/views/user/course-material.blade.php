@extends('app')
@section('title')
    Material Name
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
                    <td>{{ $file->type }}</td>
                    <td>{{ $file->size }}</td>
                    <td><a class="btn btn-success" href="{{ $file->getMedia()[0]->getFullUrl() }}">{{ __('words.file_download') }}</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection