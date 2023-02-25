@extends('layouts.app')

@section('template_title')
    Mopcontrol
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Mopcontrol') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('mopcontrols.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($mopcontrols as $mopcontrol)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $mopcontrol->cid }}</td>
											<td>{{ $mopcontrol->name }}</td>

                                            <td>
                                                <form action="{{ route('mopcontrols.destroy',$mopcontrol->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('mopcontrols.show',$mopcontrol->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('mopcontrols.edit',$mopcontrol->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $mopcontrols->links() !!}
            </div>
        </div>
    </div>
@endsection
