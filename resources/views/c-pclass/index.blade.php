{{-- @extends('layouts.app')

@section('template_title')
    C Pclass
@endsection

@section('content')
    <div class="container-fluid"> --}}
@php
    $cPclasses = App\Http\Controllers\CpController\CPclassController::index2($cPcompetition->id);
@endphp
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <div style="display: flex; justify-content: space-between; align-items: center;">

                    <span id="card_title">
                        {{ __('C Pclass') }}
                    </span>

                    <div class="float-right">
                        <a href="{{ route('c-pclasses.create','cid='.$cPcompetition->id) }}" class="btn btn-primary btn-sm float-right"
                            data-placement="left">
                            {{ __('Create New') }}
                        </a>
                    </div>
                </div>
            </div>
            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
            @endif

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead class="thead">
                            <tr>
                                <th>No</th>

                                <th>Cid</th>
                                <th>Name</th>
                                <th>All</th>

                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cPclasses as $cPclass)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $cPclass->cid }}</td>
                                    <td>{{ $cPclass->name }}</td>
                                    <td>{{ $cPclass->all }}</td>

                                    <td>
                                        <form action="{{ route('c-pclasses.destroy', $cPclass->id) }}" method="POST">
                                            <a class="btn btn-sm btn-primary "
                                                href="{{ route('c-pclasses.show', $cPclass->id) }}"><i
                                                    class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                            <a class="btn btn-sm btn-success"
                                                href="{{ route('c-pclasses.edit', $cPclass->id) }}"><i
                                                    class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i
                                                    class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- {!! $cPclasses->links() !!} --}}
    </div>
</div>
{{-- </div>
@endsection --}}
