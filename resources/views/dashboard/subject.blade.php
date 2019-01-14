@extends('app')

@section('title')
{{ __('words.addsub') }}
@endsection

@section('stylee')
<script src="{!! asset('js/tinymce/tinymce.min.js') !!}"></script>
<script>
    tinymce.init({
        selector: 'textarea',
        directionality: "rtl",
        plugins: 'link image lists',
        toolbar: "insertfile undo redo | styleselect | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
        menubar: false
    });
</script>
@endsection

@section('content')
<div class="row">
    <div class="col-sm m-3">
        <div class="card card-default">
            <div class="card-header">{{ __('words.addsub') }}</div>
            <div class="card-body">
                <form action="{{ route('admin.subject.add', $subject->id) }}" method="POST">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>{{ __('courses.text') }}</label>
                        <textarea name="subject" rows="8" cols="80">{!! $subject->subject !!}</textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit">{{ __('words.addsub') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection