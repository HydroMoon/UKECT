@extends('dash')
@section('title')
المنشورات
@endsection
@section('content')
  <div class="row">
    <div class="col-md-10 mt-2">
      <h1>جميع المنشورات</h1>
    </div>

    <div class="col-md-2 mt-2">
      <a href="{{ route('posts.create') }}" class="btn btn-lg btn-block btn-primary">انشاء بوست</a>
    </div>
    <div class="col-md-12">
      <hr>
    </div>
  </div> 

  <div class="row">
    <div class="col-md-12" style="overflow-x:auto;">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">العنوان</th>
            <th scope="col">المحتوى</th>
            <th scope="col">تاريخ الانشاء</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($posts as $key=>$post)
          <tr>
            <td>{{ $key }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ mb_substr(strip_tags($post->body), 0, 50) }}{{ strlen(strip_tags($post->body)) > 50 ? "..." : "" }}</td>
            <td>{{ date('M j, Y', strtotime($post->created_at)) }}</td>
            <td>
              <div class="row">
                <div class="col-sm-4 m-1">
                  <a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-sm">فتح</a>
                </div>
                <div class="col-sm-4 m-1">
                  <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-default btn-sm">تعديل</a>
                </div>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

      <div class="text-center">
        {!! $posts->links(); !!}
      </div>
    </div>
  </div>
@endsection
