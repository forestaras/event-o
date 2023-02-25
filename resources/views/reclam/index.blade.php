@extends('layouts.app')

@section('template_title')
    Reclam
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Reclam') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('reclams.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Oblid</th>
										<th>Activ</th>
										<th>Data Finish</th>
										<th>Img</th>
										<th>Text</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($reclams as $reclam)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $reclam->userid }}</td>
											<td>{{ $reclam->oblid }}</td>
											<td>{{ $reclam->activ }}</td>
											<td>{{ $reclam->data_finish }}</td>
											<td>{{ $reclam->img }}</td>
											<td>{{ $reclam->text }}</td>

                                            <td>
                                                <form action="{{ route('reclams.destroy',$reclam->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('reclams.show',$reclam->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('reclams.edit',$reclam->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $reclams->links() !!}
            </div>
        </div>
    </div>
@endsection
