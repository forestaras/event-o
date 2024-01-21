@extends('layouts.app')

@section('template_title')
    C Pcompetition
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('C Pcompetition') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('c-pcompetitions.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Name</th>
										<th>Data</th>
										<th>Pass</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cPcompetitions as $cPcompetition)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $cPcompetition->name }}</td>
											<td>{{ $cPcompetition->data }}</td>
											<td>{{ $cPcompetition->pass }}</td>

                                            <td>
                                                <form action="{{ route('c-pcompetitions.destroy',$cPcompetition->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('c-pcompetitions.show',$cPcompetition->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('c-pcompetitions.edit',$cPcompetition->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $cPcompetitions->links() !!}
            </div>
        </div>
    </div>
@endsection
