@extends('layouts.app')

@section('template_title')
    Online
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Online') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('onlines.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Userid</th>
										<th>Name</th>
										<th>Cod</th>
										<th>Starovi</th>
										<th>Startovioff</th>
										<th>Rezult</th>
										<th>Rezultoff</th>
										<th>Startclok</th>
										<th>Split</th>
										<th>Splitanaliz</th>
										<th>Stop</th>
										<th>Datestart</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($onlines as $online)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $online->eventid }}</td>
											<td>{{ $online->userid }}</td>
											<td>{{ $online->name }}</td>
											<td>{{ $online->cod }}</td>
											<td>{{ $online->starovi }}</td>
											<td>{{ $online->startovioff }}</td>
											<td>{{ $online->rezult }}</td>
											<td>{{ $online->rezultoff }}</td>
											<td>{{ $online->startclok }}</td>
											<td>{{ $online->split }}</td>
											<td>{{ $online->splitanaliz }}</td>
											<td>{{ $online->stop }}</td>
											<td>{{ $online->datestart }}</td>

                                            <td>
                                                <form action="{{ route('onlines.destroy',$online->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('onlines.show',$online->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('onlines.edit',$online->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $onlines->links() !!}
            </div>
        </div>
    </div>
@endsection
