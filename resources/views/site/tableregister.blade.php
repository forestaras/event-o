  {{-- <div style="overflow-x:auto;"> --}}
      <table class='table table-striped table-bordered' >
          <thead>
              <tr>
                  <th>№</th>
                  <th>Прізвище Імя</th>
                  <th>Дата народження</th>
                  @if ($registerseting->grup)
                      <th>Група</th>
                  @endif
                  @if ($registerseting->roz)
                      <th>Розряд</th>
                  @endif
                  @if ($registerseting->club)
                      <th>Команда-Клуб</th>
                  @endif
                  @if ($registerseting->obl)
                      <th>Область</th>
                  @endif
                  @if ($registerseting->trener)
                      <th>Тренер</th>
                  @endif
                  @if ($registerseting->si)
                      <th>Чіп</th>
                  @endif
                  @if ($registerseting->dni)
                      <th>Дні участі</th>
                  @endif
              </tr>
          </thead>
          <tbody>
              @foreach ($registers as $register)
                  @php($x = $x + 1)
                  <tr>
                      <td>{{ $x }}</td>
                      <td>{{ $register->name }}</td>
                      <td>{{ $register->rik }}</td>
                      @if ($registerseting->grup)
                          <td>{{ $register->grup }}</td>
                      @endif
                      @if ($registerseting->roz)
                          <td>{{ $register->roz }}</td>
                      @endif
                      @if ($registerseting->club)
                          <td>{{ $register->club }}</td>
                      @endif
                      @if ($registerseting->obl)
                          <td>{{ $register->obl }}</td>
                      @endif
                      @if ($registerseting->trener)
                          <td>{{ $register->trener }}</td>
                      @endif
                      @if ($registerseting->si) 
                          <td>{{ $register->si }}</td>
                      @endif
                      @if ($registerseting->dni)
                          <td>{{ $register->dni }}</td>
                      @endif

                      <td>
                          <!-- To make sure we have read access, wee need to validate the privilege -->
                          {{-- @if (CRUDBooster::isUpdate() && $button_edit)
          
          <a class='btn btn-success btn-sm' href='?editid={{$register->id}}&registerid={{$registerseting->id}}'>Редагувати</a>
          @endif --}}
                          {{-- @if (or $show == 'admin' or CRUDBooster::isUpdate() && $button_edit) --}}
                              {{-- <a class='btn btn-success btn-sm' href='{{CRUDBooster::mainpath("edit/$register->id")}}'>Edit</a> --}}
                              <a class='btn btn-success btn-sm'
                                  href='?editid={{ $register->id }}&registerid={{ $registerseting->id }}&show={{ $_GET['show'] }}'>Редагувати</a>
                          {{-- @endif --}}

                          {{-- @if ($show == 'admin' or CRUDBooster::isDelete() && $button_edit) --}}
                              <a class='btn btn-danger btn-sm'
                                  href='{{ CRUDBooster::mainpath("delete/$register->id") }}'>Видалити</a>
                          {{-- @endif --}}
                      </td>
                  </tr>
              @endforeach
          </tbody>
      </table>
  {{-- </div> --}}
