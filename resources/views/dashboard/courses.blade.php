@extends('app')
@section('title')
الكورسات
@endsection
@section('content')
<div class="card card-default mt-3 mb-3">
    <div class="card-header">الكورسات قصيرة الأمد</div>
    <div class="card-body" style="overflow-x:auto;">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">اسم الكورس</th>
                    <th scope="col">سعر الكورس</th>
                    <th scope="col">مدرس الكورس</th>
                    <th scope="col">الشهادة</th>
                    <th scope="col">مدة الكورس</th>
                    <th scope="col">معلومات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($short as $key=>$course)
                <tr>
                    <td>{{ $key }}</td>
                    <td>{{ $course->cname }}</td>
                    <td>{{ $course->price }}</td>
                    <td>{{ $course->teacher }}</td>
                    <td>{{ $course->certificate }}</td>
                    <td>من {{ $course->start }} الى {{ $course->finish }}</td>
                    <td>{{ $course->info }}</td>
                    <td>
                        <div class="row">
                            <div class="col-sm-4 m-1">
                                <a class="btn btn-default" href="{{ route('admin.scourse.edit', $course->id) }}">تعديل</a>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#ShortModal">
            إضافة كورس قصير الأمد
        </button>
    </div>
</div>

<div class="card card-default mt-3 mb-3">
    <div class="card-header">الكورسات طويلة الأمد</div>
    <div class="card-body" style="overflow-x:auto;">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">اسم الكورس</th>
                    <th scope="col">نوع الكورس</th>
                    <th scope="col">سعر الكورس</th>
                    <th scope="col">مدرس الكورس</th>
                    <th scope="col">الشهادة</th>
                    <th scope="col">مدة الكورس</th>
                    <th scope="col">معلومات</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($long as $key=>$lcourse)
                <tr>
                    <td>{{ $key }}</td>
                    <td>{{ $lcourse->cname }}</td>
                    <td>{{ $lcourse->ctype }}</td>
                    <td>{{ $lcourse->price }}</td>
                    <td>{{ $lcourse->teacher }}</td>
                    <td>{{ $lcourse->certificate }}</td>
                    <td>من {{ $lcourse->start }} الى {{ $lcourse->finish }}</td>
                    <td>{{ $lcourse->info }}</td>
                    <td>
                        <div class="row">
                            <div class="col-sm-4 m-1">
                                <a class="btn btn-default" href="{{ route('admin.lcourse.edit', $lcourse->id) }}">تعديل</a>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#AppModel">
            إضافة كورس طويل الأمد
        </button>
    </div>
</div>


<div class="modal fade" id="AppModel" tabindex="-1" role="dialog" aria-labelledby="AppModelLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="AppModelLabel">إضافة كورس طويل الأمد</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add-course" action="{{ route('admin.long.add') }}" method="post">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="cname">اسم الكورس</label>
                        <input class="form-control" type="text" name="cname" id="cname">
                    </div>
                    <div class="form-group">
                        <label for="ctype">نوع الكورس</label>
                        <input class="form-control" type="text" name="ctype" id="ctype">
                    </div>
                    <div class="form-group">
                        <label for="price">سعر الكورس</label>
                        <input class="form-control" type="text" name="price" id="price">
                    </div>
                    <div class="form-group">
                        <label for="teacher">مدرس الكورس</label>
                        <select class="form-control" name="teacher" id="teacher">
                            <option>أختار الاستاذ/ة</option>
                            @foreach ($teacher as $item)
                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="certificate">الشهادة</label>
                        <input class="form-control" type="text" name="certificate" id="certificate">
                    </div>
                    <div class="form-group date" data-date="2000-02-02" data-date-format="yyyy-mm-dd">
                        <label for="duration">مدة الكورس</label>
            
                        <div class="row">
                                <div class="col-sm">
                                    <label for="dration">من</label>
                                    <input id="duration" class="form-control datepicker" name="start">
                                </div>
                                <div class="col-sm">
                                        <label for="dration">الى</label>
                                    <input id="duration" class="form-control datepicker" name="finish">
                                </div>
                            </div>
                    </div>  
                    <div class="form-group">
                        <label for="" info>معلومات عن الكورس</label>
                        <textarea class="form-control" name="info" id="info" cols="30" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
                <button type="button" class="btn btn-success" onclick="event.preventDefault();
                    document.getElementById('add-course').submit();">إضافة</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="ShortModal" tabindex="-1" role="dialog" aria-labelledby="ShortModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="ShortModalLabel">إضافة كورس قصير الأمد</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="add-short-course" action="{{ route('admin.short.add') }}" method="post">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <label for="cname">اسم الكورس</label>
                        <input class="form-control" type="text" name="cname" id="cname">
                    </div>
                    <div class="form-group">
                        <label for="price">سعر الكورس</label>
                        <input class="form-control" type="text" name="price" id="price">
                    </div>
                    <div class="form-group">
                        <label for="teacher">مدرس الكورس</label>
                        <select class="form-control" name="teacher" id="teacher">
                            <option>أختار الاستاذ/ة</option>
                            @foreach ($teacher as $item)
                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="certificate">الشهادة</label>
                        <input class="form-control" type="text" name="certificate" id="certificate">
                    </div>

                    <div class="form-group date" data-date="2000-02-02" data-date-format="yyyy-mm-dd">
                        <label for="duration">مدة الكورس</label>
            
                        <div class="row">
                                <div class="col-sm">
                                    <label for="dration">من</label>
                                    <input id="duration" class="form-control datepicker" name="start">
                                </div>
                                <div class="col-sm">
                                        <label for="dration">الى</label>
                                    <input id="duration" class="form-control datepicker" name="finish">
                                </div>
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="" info>معلومات عن الكورس</label>
                        <textarea class="form-control" name="info" id="info" cols="30" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">إغلاق</button>
                <button type="button" class="btn btn-success" onclick="event.preventDefault();
                        document.getElementById('add-short-course').submit();">إضافة</button>
            </div>
        </div>
    </div>
</div>
@endsection

