@extends('layouts.app')

@section('template_title')
    Obl
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Obl') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('obls.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Title</th>
										<th>Activ</th>
										<th>Flag</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($obls as $obl)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $obl->userid }}</td>
											<td>{{ $obl->redactorid }}</td>
											<td>{{ $obl->title }}</td>
											<td>{{ $obl->activ }}</td>
											<td>{{ $obl->flag }}</td>

                                            <td>
                                                <form action="{{ route('obls.destroy',$obl->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('obls.show',$obl->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('obls.edit',$obl->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $obls->links() !!}
            </div>
        </div>
    </div>
@endsection
