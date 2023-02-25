@extends('layouts.app')

@section('template_title')
    Register
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Register') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('registers.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Peopleid</th>
										<th>Eventid</th>
										<th>Name</th>
										<th>Trener</th>
										<th>Club</th>
										<th>Obl</th>
										<th>Roz</th>
										<th>Si</th>
										<th>Rik</th>
										<th>Grup</th>
										<th>Dni</th>
										<th>Datestop</th>
										<th>Userid</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($registers as $register)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $register->peopleid }}</td>
											<td>{{ $register->eventid }}</td>
											<td>{{ $register->name }}</td>
											<td>{{ $register->trener }}</td>
											<td>{{ $register->club }}</td>
											<td>{{ $register->obl }}</td>
											<td>{{ $register->roz }}</td>
											<td>{{ $register->si }}</td>
											<td>{{ $register->rik }}</td>
											<td>{{ $register->grup }}</td>
											<td>{{ $register->dni }}</td>
											<td>{{ $register->datestop }}</td>
											<td>{{ $register->userid }}</td>

                                            <td>
                                                <form action="{{ route('registers.destroy',$register->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('registers.show',$register->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('registers.edit',$register->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $registers->links() !!}
            </div>
        </div>
    </div>
@endsection
