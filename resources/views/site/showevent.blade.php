@extends('site.index')
@section('title')
---{{ $event->title }}
@endsection
@section('content')

    <section id="contact" class="contact " >
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>{{ $event->title }}</h2>
                <p>{{ $event->text }}</p>
            </div>

            <div class="row" >


                <div class="col-lg-5  align-items-stretch" style="font-size:0.7em">  

                    <div class="info" >

                        <div class="address" >
                            @if ($event->logo !== null)
                                <div>
                                    <img src="/{{ $event->logo }}" class="float-left logo" alt="Paris" width="100%"
                                        height="290px">
                                </div>
                            @endif


                            <i class="icofont-google-map"></i>
                            <h5>Інформація:</h5>
                            <p>Дата початку: <b>{{ $event->datastart }}</b></p>
                            <p>Місце проведення: <b>{{ $event->location }}</b></p>
                            <p>Організатор: <b>{{ $event->org }}</b></p>
                            @if ($event->obl->title !== null)
                                <div>
                                    <p>Область: <img src="/{{ $event->obl->flag }}" alt="Paris" width="auto"
                                            height="30px"><b>{{ $event->obl->title }}</b>

                                    </p>
                                </div>
                            @endif
                            @if ($event->club->title !== null)<p>Клуб:  <img src="/{{ $event->club->logo }}"  alt="Paris" width="auto" height="30px"><b>{{ $event->club->title }}</b></p>@endif

                        </div>


                        @foreach ($event->registersetings as $registerseting)
                            <div class="email">
                                <i class="icofont-envelope"></i>
                                <h5>Реєстрація:</h5>
                                <p><a
                                        href="/event/register/{{ $registerseting->id }}">{{ $registerseting->title }}</a>
                                </p>
                                <p>Закриття реєстрації:
                                    <b>{{ date_format(date_create($registerseting->datestop), 'd-m-Y H:i:s') }}</b>
                                </p>
                                @if ($registerseting->grup)<p>Групи: {{ $registerseting->grup }}</p>@endif
                                @if (date_format(date_create($registerseting->datestop), 'U') > date('U'))
                                    <p><a href="/admin/register/add/?registerid={{ $registerseting->id }}" type="submit"
                                            class="btn btn-primary">Зареєструватися</a></p>
                                @else
                                    <p>РЕЄСТРАЦІЮ ЗАКРИТО!!!</p>
                                @endif
                                <p>Зареєстровано:{{$registerseting->count}}</p>


                            </div>
                        @endforeach




                        @if ($event->contact_name || $event->contact_email || $event->contact_phone || $event->contact_website)
                            <div class="phone">
                                <i class="icofont-phone"></i>
                                <h5>Контактні дані організаторів:</h5>
                                @if ($event->contact_name)<p> <b>{{ $event->contact_name }}</b></p>@endif
                                @if ($event->contact_email)<p>Email: <b>{{ $event->contact_email }}</b></p>@endif
                                @if ($event->contact_phone)<p>Телефон: <b>{{ $event->contact_phone }}</b></p>@endif
                                @if ($event->contact_website)<p><b><a href="{{ $event->contact_website }}">Вебсайт</a></b> </p>@endif
                            </div>
                        @endif

                        <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe> -->
                    </div>

                </div>
                <div class="col-lg-7  align-items-stretch">

                    <div class="info">

                        <div class="address">



                            {{-- <i class="icofont-google-map"></i>
                          <h4>Інформація:</h4>
                          <p>Дата початку: <b>{{ $event->datastart }}</b></p>
                          <p>Місце проведення: <b>{{ $event->location }}</b></p>
                          <p>Організатор: <b>{{ $event->org }}</b></p>
                          @if ($event->obl->title !== null)
                              <div>
                                  <p>Область: <img src="/{{ $event->obl->flag }}" alt="Paris" width="auto"
                                          height="30px"><b>{{ $event->obl->title }}</b>

                                  </p>
                              </div>
                          @endif
                          @if ($event->club->title !== null)<p>Клуб:  <img src="/{{ $event->club->logo }}"  alt="Paris" width="auto" height="30px"><b>{{ $event->club->title }}</b></p>@endif

                      </div> --}}





                            <div>
                                
                                @if ($event->rez)
                                <i class="fas fa-clipboard-list"></i>
                                <h5>Результати:</h5>
                                @endif
                                
                                {{-- {{$online->ooo->name}} --}}
                                {{-- <p><a href="/event/online/{{ $registerseting->id }}">{{ $registerseting->title }}</a></p> --}}
                                @foreach ($event->onlines as $online)
                                    @if ($online->ooo > 0)
                                        <p><b>{{ date_format(date_create($online->ooo->date), 'd-m-Y') }}
                                            </b>{{ $online->ooo->name }}</p>

                                        <p>
                                            @if (date('d-m-Y') == date_format(date_create($online->ooo->date), 'd-m-Y'))
                                                <a href="/online/rezult/{{ $online->ooo->cid }}?sort=grup" type="submit"
                                                    class="btn btn-success">Онлайн</a>
                                            @endif
                                            {{-- {{$online->startovi->cid}} --}}
                                            @if ($online->startovi->st)
                                                <a href="/online/startlist/{{ $online->ooo->cid }}?sort=grup" type="submit"
                                                    class="btn btn-primary">Стартові</a>
                                            @endif
                                            @if (date('d-m-Y') != date_format(date_create($online->ooo->date), 'd-m-Y'))
                                                <a href="/online/rezult/{{ $online->ooo->cid }}?sort=grup" type="submit"
                                                    class="btn btn-primary">Результати</a>
                                            @endif
                                            @if ($online->split->rt)
                                                <a href="/online/split/{{ $online->ooo->cid }}" type="submit"
                                                    class="btn btn-primary">Спліти</a>
                                            @endif


                                        </p>
                                        {{-- {{$online->startovi}} --}}

                                    @endif

                                @endforeach
                            </div>





                         
                                <div class="sss">
                                    {{-- <i class="fas fa-info"></i>
                                    <h4>Інформація:</h4> --}}
                                    @foreach ($event->link as $link)
                                    <p> <h5>
                                    <a target="_blank" href="{{ $link->text }}">
                                      {{ $link->titlesilka }}</a>
                                    </h5></p>
                                    @endforeach
                                </div>
                            

                            <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe> -->
                        </div>

                    </div>



                </div>

            </div>
    </section><!-- End Contact Section -->




    <!-- ======= Team Section ======= -->
    {{-- <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Team</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">

          <div class="col-lg-6">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><img src="/assets/img/team/team-1.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Мельник Тарас</h4>
                <span>Головни суддя</span>
                <p>Суддя 1 категорії</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4 mt-lg-0">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="200">
              <div class="pic"><img src="/assets/img/team/team-2.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Sarah Jhonson</h4>
                <span>Product Manager</span>
                <p>Aut maiores voluptates amet et quis praesentium qui senda para</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="300">
              <div class="pic"><img src="/assets/img/team/team-3.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>William Anderson</h4>
                <span>CTO</span>
                <p>Quisquam facilis cum velit laborum corrupti fuga rerum quia</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="400">
              <div class="pic"><img src="/assets/img/team/team-4.jpg" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Amanda Jepson</h4>
                <span>Accountant</span>
                <p>Dolorum tempora officiis odit laborum officiis et et accusamus</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section --> --}}
@endsection
