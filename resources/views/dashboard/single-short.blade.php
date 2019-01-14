@extends('app')
@section('title')
{{ __('words.editshort') }}
@endsection
@section('content')
<div class="card mt-3 mb-3">

    <div class="card-header">{{ __('words.short_data') }} - <strong>{{ $usern->name }}</strong></div>
    <div class="card-body" style="overflow-x:auto;">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('words.course_name') }}</th>
                    <th scope="col">{{ __('words.reg_date') }}</th>
                    <th scope="col">{{ __('words.course_dura') }}</th>
                    <th scope="col" style="text-align: center;">{{ __('words.regst') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reg as $key=>$user)
                <tr>
                    <td>{{ ($key+1) }}</td>
                    <td>{{ $user->scourse->cname }}</td>
                    <td>{{ $user->scourse->created_at }}</td>
                    <td>{{ __('words.from') }} {{ $user->scourse->start }} {{ __('words.to') }} {{
                        $user->scourse->finish }}</td>
                    <td style="text-align: center;">
                        @if ($user->accepted == 1)
                        <i class="fa fa-check" aria-hidden="true"></i>
                        @else
                        <i class="fa fa-times" aria-hidden="true"></i>
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('users.single.supdate', $user->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <select class="form-control" name="acc">
                                @if ($user->accepted == 1)
                                <option selected value="1">{{ __('words.reg_no') }}</option>
                                <option value="0">{{ __('words.reg_yes') }}</option>
                                @else
                                <option value="1">{{ __('words.reg_no') }}</option>
                                <option selected value="0">{{ __('words.reg_yes') }}</option>
                                @endif
                            </select>
                            <button class="btn btn-success" type="submit">{{ __('words.reg_conf') }}</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('users.single.addcerts') }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="file" class="form-control" name="cert" id="cert">
                            <select class="form-control" name="comp">
                                @if ($user->completed == 1)
                                <option selected value="1">{{ __('words.compyes') }}</option>
                                <option value="0">{{ __('words.compno') }}</option>
                                @else
                                <option value="1">{{ __('words.compyes') }}</option>
                                <option selected value="0">{{ __('words.compno') }}</option>
                                @endif
                            </select>
                            <input type="hidden" name="user" value="{{ $user->id }}">
                            <button class="btn btn-success" type="submit">{{ __('words.addcert') }}</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection