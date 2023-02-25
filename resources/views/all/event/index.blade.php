@extends('layouts.app')

@section('template_title')
    Event
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Event') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('events.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
										<th>Secretarid</th>
										<th>Golsudid</th>
										<th>Clubid</th>
										<th>Oblid</th>
										<th>Title</th>
										<th>Text</th>
										<th>Datastart</th>
										<th>Datafinish</th>
										<th>Org</th>
										<th>Activ</th>
										<th>Logo</th>
										<th>Contactid</th>
										<th>Bul</th>
										<th>Rez</th>
										<th>Inf</th>
										<th>Location</th>
										<th>Contact Name</th>
										<th>Contact Email</th>
										<th>Contact Phone</th>
										<th>Contact Fb</th>
										<th>Contact Website</th>
										<th>Stvoreno</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($events as $event)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $event->userid }}</td>
											<td>{{ $event->redactorid }}</td>
											<td>{{ $event->secretarid }}</td>
											<td>{{ $event->golsudid }}</td>
											<td>{{ $event->clubid }}</td>
											<td>{{ $event->oblid }}</td>
											<td>{{ $event->title }}</td>
											<td>{{ $event->text }}</td>
											<td>{{ $event->datastart }}</td>
											<td>{{ $event->datafinish }}</td>
											<td>{{ $event->org }}</td>
											<td>{{ $event->activ }}</td>
											<td>{{ $event->logo }}</td>
											<td>{{ $event->contactid }}</td>
											<td>{{ $event->bul }}</td>
											<td>{{ $event->rez }}</td>
											<td>{{ $event->inf }}</td>
											<td>{{ $event->location }}</td>
											<td>{{ $event->contact_name }}</td>
											<td>{{ $event->contact_email }}</td>
											<td>{{ $event->contact_phone }}</td>
											<td>{{ $event->contact_fb }}</td>
											<td>{{ $event->contact_website }}</td>
											<td>{{ $event->stvoreno }}</td>

                                            <td>
                                                <form action="{{ route('events.destroy',$event->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('events.show',$event->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('events.edit',$event->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $events->links() !!}
            </div>
        </div>
    </div>
@endsection
