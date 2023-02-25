@extends('layouts.app')

@section('template_title')
    Registerseting
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Registerseting') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('registersetings.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Eventid</th>
										<th>Title</th>
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
                                    @foreach ($registersetings as $registerseting)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $registerseting->eventid }}</td>
											<td>{{ $registerseting->title }}</td>
											<td>{{ $registerseting->trener }}</td>
											<td>{{ $registerseting->club }}</td>
											<td>{{ $registerseting->obl }}</td>
											<td>{{ $registerseting->roz }}</td>
											<td>{{ $registerseting->si }}</td>
											<td>{{ $registerseting->rik }}</td>
											<td>{{ $registerseting->grup }}</td>
											<td>{{ $registerseting->dni }}</td>
											<td>{{ $registerseting->datestop }}</td>
											<td>{{ $registerseting->userid }}</td>

                                            <td>
                                                <form action="{{ route('registersetings.destroy',$registerseting->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('registersetings.show',$registerseting->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('registersetings.edit',$registerseting->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $registersetings->links() !!}
            </div>
        </div>
    </div>
@endsection
