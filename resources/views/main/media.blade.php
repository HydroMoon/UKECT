@extends('app')
@section('title')
الوسائط
@endsection

@section('content')
<div class="row justify-content-center" dir="ltr">
    <div class="col-md-8">
        <h2 class="text-center m-2">الوسائط</h2>
        <div class="row">
            @foreach ($imgs as $item)
            <a href="{{ asset('gallery/' . $item->image) }}" data-toggle="lightbox" data-gallery="example-gallery"
                class="col-sm-4">
                <div class="thumbnail m-2">
                    <img src="{{ asset('gallery/' . $item->image) }}" class="img-fluid img-thumbnail">
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>
@endsection