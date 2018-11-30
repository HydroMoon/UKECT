@extends('dash')

@section('content')
    <div class="row">
        <div class="col">
            <h1 class="text-center">اضافة الصور</h1>
            <div class="card card-default">
                <div class="card-header">jhkjahbfjdhs</div>
                <div class="card-body">
                    <form action="{{ route('image-upload.store') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>اختر الصورة</label>
                            <input name="img" class="form-control" type="file">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-default" type="submit">رفع</button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
@endsection