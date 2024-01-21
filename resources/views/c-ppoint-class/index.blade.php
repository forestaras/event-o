{{-- @extends('layouts.app')

@section('template_title')
    C Ppoint Class
@endsection

@section('content')
    <div class="container-fluid"> --}}
@php
    $cPpointClasses = App\Http\Controllers\CpController\CPpointClassController::index2($cPcompetition->id);
@endphp
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <div style="display: flex; justify-content: space-between; align-items: center;">

                    <span id="card_title">
                        {{ __('C Ppoint Class') }}
                    </span>

                    <div class="float-right">
                        <a href="{{ route('c-ppoint-classes.create','cid='.$cPcompetition->id) }}" class="btn btn-primary btn-sm float-right"
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
                                <th>Cod</th>
                                <th>Ball</th>
                                <th>All</th>

                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cPpointClasses as $cPpointClass)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $cPpointClass->cid }}</td>
                                    <td>{{ $cPpointClass->name }}</td>
                                    <td>{{ $cPpointClass->cod }}</td>
                                    <td>{{ $cPpointClass->ball }}</td>
                                    <td>{{ $cPpointClass->all }}</td>

                                    <td>
                                        <form action="{{ route('c-ppoint-classes.destroy', $cPpointClass->id) }}"
                                            method="POST">
                                            <a class="btn btn-sm btn-primary "
                                                href="{{ route('c-ppoint-classes.show', $cPpointClass->id) }}"><i
                                                    class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                            <a class="btn btn-sm btn-success"
                                                href="{{ route('c-ppoint-classes.edit', $cPpointClass->id) }}"><i
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
        {{-- {!! $cPpointClasses->links() !!} --}}
    </div>
</div>
{{-- </div>
@endsection --}}
