@extends('layouts.app')

@section('template_title')
    Protocol
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Protocol') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('protocols.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        

										<th>Назва1</th>
										<th>Назва2</th>
										<th>Назва3</th>
										
										<th>Дата</th>
										<th>Місце проведення</th>
										<th>Начальник дистанції</th>
										<th>Секретар</th>
										<th>Головний суддя</th>
										{{-- <th>Con</th> --}}
										{{-- <th>Cld</th> --}}
										{{-- <th>Cldr</th> --}}
										{{-- <th>Prot</th> --}}

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($protocols as $protocol)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											{{-- <td>{{ $protocol->col1 }}</td> --}}
											{{-- <td>{{ $protocol->col2 }}</td> --}}
											{{-- <td>{{ $protocol->col3 }}</td> --}}
											<td>{{ $protocol->name1 }}</td>
											<td>{{ $protocol->name2 }}</td>
											<td>{{ $protocol->name3 }}</td>
											{{-- <td>{{ $protocol->namedist }}</td> --}}
											<td>{{ $protocol->inf_data }}</td>
											<td>{{ $protocol->inf_local }}</td>
											<td>{{ $protocol->nd }}</td>
											<td>{{ $protocol->gse }}</td>
											<td>{{ $protocol->gsu }}</td>
											{{-- <td>{{ $protocol->con }}</td> --}}
											{{-- <td>{{ $protocol->cld }}</td> --}}
											{{-- <td>{{ $protocol->cldr }}</td> --}}
											{{-- <td>{{ $protocol->prot }}</td> --}}

                                            <td>
                                                <form action="{{ route('protocols.destroy',$protocol->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('protocols.show',$protocol->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('protocols.edit',$protocol->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $protocols->links() !!}
            </div>
        </div>
    </div>
@endsection
