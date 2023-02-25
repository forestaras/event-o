@extends('site.index')
@section('title')
---{{$pipl['name']}}
@endsection
@section('content')
<!-- ======= Team Section ======= -->
<section id="team" class="team section-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-title">
            <h2>Team</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">

            <div class="col-lg-6">
                <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
                    <!-- <div class="pic"><img src="/assets/img/team/team-1.jpg" class="img-fluid" alt=""></div> -->
                    <div class="member-info">
                        <h4>{{$pipl['name']}}</h4>
                        <span>{{$pipl['club']->name}}</span>
                        <!-- <p>Explicabo voluptatem mollitia et repellat qui dolorum quasi</p>
                <div class="social">
                  <a href=""><i class="ri-twitter-fill"></i></a>
                  <a href=""><i class="ri-facebook-fill"></i></a>
                  <a href=""><i class="ri-instagram-fill"></i></a>
                  <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
                </div> -->
                    </div>
                </div>
            </div>

        </div>
    </div>
</section><!-- End Team Section -->
<section id="portfolio" class="portfolio">
    <div class="container" data-aos="fade-up">
        <div class="table-responsive">
            <table id="my" style="width:99%" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Дата</th>
                        <th>Імя</th>
                        <th>Команда,клуб</th>
                        <th>Група</th>
                        <th>Місце</th>
                        <th>Результат</th>
                        <th>Відставання</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($events as $event)
                    <tr>
                        <td>{{$event['event']->date}}</td>
                        <td>{{$event['event']->name}}</td>
                        <td>{{$event['club']}}</td>
                        <td>{{$event['clas']}}</td>
                        <td>{{$event['mistse']}}</td>
                        <td>{{$event['rezult']}}</td>
                        <!-- <td>{{$event['lider']->name}}</td> -->
                        <td>{{$event['vidst']}}</td>
                        <td><a href="/online/rezult/{{$event['event']->cid}}?sort=grup#{{$event['clas']}}">(Р)</a>
                            <a href="/online/split/{{$event['event']->cid}}?grup={{$event['clas']}}">(С)</a>
                        </td>

                    </tr>
                    @endforeach



                </tbody>
            </table>
        </div>
    </div>
</section>


@endsection