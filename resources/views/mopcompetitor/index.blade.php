@extends('layouts.app')

@section('template_title')
    Mopcompetitor
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Mopcompetitor') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('mopcompetitors.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Org</th>
										<th>Cls</th>
										<th>Stat</th>
										<th>St</th>
										<th>Rt</th>
										<th>Tstat</th>
										<th>It</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mopcompetitors as $mopcompetitor)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $mopcompetitor->cid }}</td>
											<td>{{ $mopcompetitor->name }}</td>
											<td>{{ $mopcompetitor->org }}</td>
											<td>{{ $mopcompetitor->cls }}</td>
											<td>{{ $mopcompetitor->stat }}</td>
											<td>{{ $mopcompetitor->st }}</td>
											<td>{{ $mopcompetitor->rt }}</td>
											<td>{{ $mopcompetitor->tstat }}</td>
											<td>{{ $mopcompetitor->it }}</td>

                                            <td>
                                                <form action="{{ route('mopcompetitors.destroy',$mopcompetitor->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('mopcompetitors.show',$mopcompetitor->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('mopcompetitors.edit',$mopcompetitor->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $mopcompetitors->links() !!}
            </div>
        </div>
    </div>
@endsection
