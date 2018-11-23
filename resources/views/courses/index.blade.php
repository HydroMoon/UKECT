@extends('app')

@section('content')
  <div class="row">
    <div class="col-md-12" style="overflow-x:auto;">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">اسم الكورس</th>
            <th scope="col">سعر الكورس</th>
            <th scope="col">مقدم الكورس</th>
            <th scope="col">الشهادة</th>
            <th scope="col">مدة الكورس</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($scourses as $post)
          <tr>
            <th>{{ $post->id }}</th>
            <td>{{ $post->cname }}</td>
            <td>{{ $post->price }}</td>
            <td>{{ $post->teacher }}</td>
            <td>{{ $post->certificate }}</td>
            <td>{{ $post->duration }}</td>
            <td>
              <div class="row">
                <div class="col-sm m-1">
                  <a href="{{ route('posts.show', $post->id) }}" class="btn btn-default btn-sm">فتح</a>
                </div>
                <div class="col-sm m-1">
                  <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-default btn-sm">تعديل</a>
                </div>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

      {{-- <div class="text-center">
        {!! $posts->links(); !!}
      </div> --}}
    </div>
  </div>
@endsection
