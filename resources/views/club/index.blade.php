@extends('layouts.app')

@section('template_title')
    Club
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Club') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('clubs.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Userid</th>
										<th>Redactorid</th>
										<th>Oblid</th>
										<th>Title</th>
										<th>Bigtitle</th>
										<th>Activ</th>
										<th>Logo</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($clubs as $club)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $club->userid }}</td>
											<td>{{ $club->redactorid }}</td>
											<td>{{ $club->oblid }}</td>
											<td>{{ $club->title }}</td>
											<td>{{ $club->bigtitle }}</td>
											<td>{{ $club->activ }}</td>
											<td>{{ $club->logo }}</td>

                                            <td>
                                                <form action="{{ route('clubs.destroy',$club->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('clubs.show',$club->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('clubs.edit',$club->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $clubs->links() !!}
            </div>
        </div>
    </div>
@endsection
