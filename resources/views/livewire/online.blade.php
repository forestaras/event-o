      <div wire:poll.5000ms class="card">
          <div class="card-header">
              <h3 class="card-title">В режимі онлайн {{$people_arr['0']['grup']}}</h3>
              <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="maximize">
                      <i class="fas fa-expand"></i>
                  </button>
              </div>

          </div>
          <!-- /.card-header -->
          <div class="card-body">
              <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                  <div class="row">
                      <div class="col-sm-7 col-md-12"></div>
                      <div class="col-sm-12 col-md-12"></div>
                  </div>
                  <div class="row">
                      <div class="col-sm-12">
                          <table id="example2" class="table table-bordered table-hover dataTable dtr-inline collapsed"
                              aria-describedby="example2_info">
                              <thead>
                                  <tr>
                                      <th class="sortfing" tabindex="0" aria-controls="example2" rowspan="1"
                                          colspan="1">"№"</th>
                                      <th class="sortifng" tabindex="0" aria-controls="example2" rowspan="1"
                                          colspan="1">Імя</th>
                                      <th class="sortinfg" tabindex="0" aria-controls="example2" rowspan="1"
                                          colspan="1">Клуб</th>
                                      <th class="sortinfg" tabindex="0" aria-controls="example2" rowspan="1"
                                          colspan="1">Старт</th>
                                      <th class="sortingf" tabindex="0" aria-controls="example2" rowspan="1"
                                          colspan="1">Результат</th>
                                      <th class="sortingf" tabindex="0" aria-controls="example2" rowspan="1"
                                          colspan="1">відст</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  @foreach ($people_arr as $p)
                                      <tr class="odd {{ $p['color'] }}">
                                          <td>{{ $p['mistse'] }}</td>
                                          <td><a href="">{{ $p['name'] }}</a></td>
                                          <td><a href="">{{ $p['club'] }}</a></td>
                                          <td>{{ $p['start'] }}</td>
                                          @if ($p['stat'] == '0')
                                              <td class="text-secondary">@include('livewire.timer', [
                                                  'start' => $p['data_timer'],
                                                  'count' => $p['id'],
                                              ])</td>
                                          @else
                                              <td> {{ $p['rez'] }}</td>
                                          @endif
                                          <td>{{ $p['vidst'] }}</td>
                                          <td>{{ $p['grup'] }}</td>
                                      </tr>
                                  @endforeach
                              </tbody>
                              <tfoot>
                                  <tr>
                                      <th rowspan="1" colspan="1">№</th>
                                      <th rowspan="1" colspan="1">Імя</th>
                                      <th rowspan="1" colspan="1">Клуб</th>
                                      <th rowspan="1" colspan="1">Старт</th>
                                      <th rowspan="1" colspan="1">Результат</th>
                                      <th rowspan="1" colspan="1">Відставання</th>
                                  </tr>
                              </tfoot>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
      </div>
