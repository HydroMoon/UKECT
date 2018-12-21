@extends('app')
@section('title')
الكورسات المسجل فيها
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
                        <th scope="col">مدة الكورس</th>
                        <th style="text-align: center;" scope="col">حالة التسجيل</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($short as $key=>$scourse)
                    <tr>
                        <td>{{ $key }}</td>
                        <td>{{ $scourse->scourse->cname }}</td>
                        <td>{{ $scourse->scourse->price }}</td>
                        <td>{{ $scourse->scourse->teacher }}</td>
                        <td>من {{ $scourse->scourse->start }} الى {{ $scourse->scourse->finish }}</td>
                        <td style="text-align: center;">
                            @if ($scourse->accepted == 1)
                            <i class="fa fa-check" aria-hidden="true"></i>
                            @else
                            <i class="fa fa-times" aria-hidden="true"></i>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
                        <th scope="col">مدة الكورس</th>
                        <th style="text-align: center;" scope="col">حالة التسجيل</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($long as $key=>$lcourse)
                    <tr>
                        <td>{{ $key }}</td>
                        <td>{{ $lcourse->lcourse->cname }}</td>
                        <td>{{ $lcourse->lcourse->ctype }}</td>
                        <td>{{ $lcourse->lcourse->price }}</td>
                        <td>{{ $lcourse->lcourse->teacher }}</td>
                        <td>من {{ $lcourse->lcourse->start }} الى {{ $lcourse->lcourse->finish }}</td>
                        <td style="text-align: center;">
                            @if ($lcourse->accepted == 1)
                            <i class="fa fa-check" aria-hidden="true"></i>
                            @else
                            <i class="fa fa-times" aria-hidden="true"></i>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection