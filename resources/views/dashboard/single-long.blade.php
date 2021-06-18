@extends('app')
@section('title')
{{ __('words.editlong') }}
@endsection
@section('content')
<div class="card mt-3 mb-3">

    <div class="card-header">{{ __('words.long_data') }} - <strong>{{ $user->name }}</strong></div>
    <div class="card-body" style="overflow-x:auto;">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('words.course_lname') }}</th>
                    <th scope="col">{{ __('words.course_type') }}</th>
                    <th scope="col">{{ __('words.reg_date') }}</th>
                    <th scope="col">{{ __('words.course_dura') }}</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($regs as $key=>$cs)
                <tr>
                    <td>{{ ($key+1) }}</td>
                    <td>{{ $cs->spec_name }}</td>
                    <td>{{ $cs->spec_type }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $cs->duration }}</td>
                    {{-- <td style="text-align: center;">
                        @if ($cs->accepted == 1)
                        <i class="fa fa-check" aria-hidden="true"></i>
                        @else
                        <i class="fa fa-times" aria-hidden="true"></i>
                        @endif
                    </td> --}}
                    {{-- <td>
                        <form action="{{ route('users.single.lupdate', $cs->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}
                            <select class="form-control" name="acc">
                                @if ($cs->accepted == 1)
                                <option selected value="1">{{ __('words.reg_no') }}</option>
                                <option value="0">{{ __('words.reg_yes') }}</option>
                                @else
                                <option value="1">{{ __('words.reg_no') }}</option>
                                <option selected value="0">{{ __('words.reg_yes') }}</option>
                                @endif
                            </select>
                            <button class="btn btn-success" type="submit">{{ __('words.reg_conf') }}</button>
                        </form>
                    </td> --}}
                    {{-- <td>
                        <div class="row">
                            <div class="col-sm-4 m-1">
                                <a class="btn btn-default" href="{{ route('admin.note', ['id' => $user->id, 'cid' => $cs->lcourse->id]) }}">{{ __('words.add_note') }}</a>
                            </div>
                        </div>
                    </td> --}}
                    {{-- <td>
                            <form action="{{ route('users.single.addcertl') }}" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <input type="file" class="form-control" name="cert" id="cert">
                                <select class="form-control" name="comp">
                                        @if ($cs->completed == 1)
                                        <option selected value="1">{{ __('words.compyes') }}</option>
                                        <option value="0">{{ __('words.compno') }}</option>
                                        @else
                                        <option value="1">{{ __('words.compyes') }}</option>
                                        <option selected value="0">{{ __('words.compno') }}</option>
                                        @endif
                                    </select>
                                <input type="hidden" name="user" value="{{ $cs->id }}">
                                <button class="btn btn-success" type="submit">{{ __('words.addcert') }}</button>
                            </form>
                        </td> --}}
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection