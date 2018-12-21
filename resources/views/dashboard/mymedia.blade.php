@extends('dash')
@section('title')
صور الوسائط
@endsection
@section('content')
    <div class="row">
        <div class="col-sm" style="overflow-x:auto;">
                <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">اسم الصورة</th>
                                <th scope="col">الصورة</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($imgs as $key=>$item)
                            <tr>
                                <td>{{ $key }}</td>
                                <td>{{ $item->image }}</td>
                                <td>
                                    <img class="img-fluid" src="{{ asset('gallery/' . $item->image) }}" alt="" style="height: 50px; width: 50px;">
                                </td>
                                <td>
                                    <form action="{{ route('admin.image.delete', $item->id) }}" method="POST">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button class="btn btn-danger" type="submit">حذف</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
        </div>
        <div class="col-sm">
            <h1 class="text-center m-2">اضافة الصور</h1>
            <div class="card card-default">
                <div class="card-header">صور الوسائط</div>
                <div class="card-body">
                    <form action="{{ route('admin.image.add.media') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>اختر الصورة</label>
                            <input name="img" class="form-control" type="file">
                        </div>
                        <input type="hidden" name="cover" value="0">
                        <div class="form-group">
                            <button class="btn btn-default" type="submit">رفع</button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
@endsection