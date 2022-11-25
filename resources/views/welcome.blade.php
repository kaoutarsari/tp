@extends('layouts.default')
@section('content')


<body>
	<!-- ================ header section start ================= -->	

	<!-- ================ header section end ================= -->	

  <main class="site-main">

    <!-- ================ start banner area ================= --> 
    <section class="home-banner-area" id="home">
      <div class="container h-100">
        <div class="home-banner">
          <div class="text-center">
            <h4>See What a Difference a stay makes</h4>
            <h1>Luxury <em>is</em> personal</h1>
            <a class="button home-banner-btn" href="#">Book Now</a>
          </div>
        </div>
      </div>
    </section>
    <!-- ================ end banner area ================= -->
  <!-- ================ start banner form ================= --> 
      <form class="form-search form-search-position" method="POST" action="{{ route('res') }}">
        @csrf
        <div class="container">
          @if(Session::get('status') == 200)
            @if(Session::has('url'))
              <script>window.location.href = '{{Session::get('url')}}'</script>
            @elseif(Session::has('reservation'))
              <script>window.location.href = '{{route('paypal.index')}}?reservation={{Session::get('reservation')}}'</script>
            @else
            <span class="alert alert-success">
              {{@Session::get('message')??'Proccess Complete!'}}
            </span>
            @endif
          @endif
          @if(Session::get('status') == 500)
          <span class="alert alert-warning">
            {{@Session::get('message')??'Failed to Proccess!'}}
          </span>
          @endif
          @if(Session::get('status') == 404)
          <span class="alert alert-warning">
            {{@Session::get('message')??'404, Not found!'}}
          </span>
          @endif
          <div class="row">
            <div class="col-lg-6 gutters-19">
              <div class="row">
                <div class="col-sm">
                  <div class="form-group">
                    <div class="form-select-custom">
                      <input class="form-control" type="text" value="{{ old('first_name') }}"  name="first_name" placeholder="Enter your first name..">

                    </div>
                  </div>
                </div>
                <div class="col-sm gutters-19">
                  <div class="form-group">
                    <div class="form-select-custom">
                      <input class="form-control" type="text" value="{{ old('last_name') }}" name="last_name" placeholder="Enter your last name..">

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6 gutters-19">
              <div class="row">
                <div class="col-sm">
                  <div class="form-group">
                    <div class="form-select-custom">
                      <input type="date" id="start_date" name="start_date"
                      value="{{ old('start_date') }}">
               
                    </div>
                  </div>
                </div>
                <div class="col-sm gutters-19">
                  <div class="form-group">
                    <div class="form-select-custom">
                      <input type="date" id="end_date" name="end_date"
                      value="{{ old('end_date') }}">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm gutters-19">
              <div class="form-group">
                <div class="form-select-custom">
                  <input type="time" id="start_time" name="start_time" value="{{ old('start_time') }}">
                </div>
              </div>
            </div>
            <div class="col-sm gutters-19">
              <div class="form-group">
                <div class="form-select-custom">
                  <select name="people" id="mySelect" onchange="myFunction()">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                  </select>
                </div>
              </div>
            </div>
                      
            <div class="col-sm gutters-19">
              <div class="form-group">
                <div class="form-select-custom">
                  <select name="offre_id" id="offre_id" onchange="myFunction()">
                    @foreach ($products as $prod)
                    <option id="{{$prod->id}}" value="{{$prod->price}}">{{$prod->name}} </option>
                    @endforeach
                  </select>
                </div>
              </div>
            </div>
            
            <div class="col-lg-4 gutters-19">
              <div class="form-group">
                <button class="button button-form" type="submit">Book now</button>
              </div>
            </div>

          </div>
          <div class="form-row">
            <div class="col-sm-6">
                <div class="form-group">
                    <label for="exampleFormControlInput1"><b><span class="text-danger" id='demo'>0</span></b>$
                        <span id=inputState> /person</label>
                          <label id="demo1" name="demo1">Total people: </label>

                </div>
            </div>

        </div>
        </div>
      </form>
   
    <section class="section-margin" style="margin-top:2px;">
      <div class="container">
        <div class="section-intro text-center pb-80px">
         
          <h2>{{ __('messages.Explore Our Product') }}</h2>
        </div>

        <div class="row">
       

          @foreach ($products as $prod)
              
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="card card-explore">
              <div class="card-explore__img">
                <img class="card-img" src="{{asset('img/'.$prod->image)}}" alt="">

              </div>
              <div class="card-body">
                <h3 class="card-explore__price">${{$prod->price}} <sub>/ Per perso</sub></h3>
                <ul class="card-news__info">
                  <li><a href="#"><span class="news-icon"><i class="ti-notepad"></i></span> {{ $prod->created_at->diffForHumans( ) }}</a></li>
                  <li><a href="#"><span class="news-icon"><i class="ti-comment"></i></span> {{ $prod->commentaires->count( ) }} Comments</a></li>
                </ul>
                <h4 class="card-explore__title"><a href="#">{{$prod->name}}</a></h4>
                <p>{{$prod->description}} </p>
                <a class="card-explore__link" href="{{url('show/offre/' .$prod->slug)}}">{{ __('messages.Read more') }}
                  <i class="ti-arrow-right"></i></a>

              </div>
            </div>
          </div>
          @endforeach

        </div>
      </div>
    </section>
    <!-- ================ Explore section end ================= --> 



    <!-- ================ video section start ================= --> 
    <section class="video-area">
      <div class="container">
        <div class="row justify-content-center align-items-center flex-column text-center">
          <a id="play-home-video" class="video-play-button" href="https://www.youtube.com/watch?v=vParh5wE-tM">
            <span></span>
          </a>
          <h3>Seaplace</h3>
          <p>View four has said does men saw find dear shy talent</p>
        </div>
      </div>  
    </section>
 
    <section class="section-margin">
      <div class="container">
        <div class="section-intro text-center pb-80px">
         
          <h2>News & Blogs</h2>
        </div>

        <div class="row">
       

        @foreach ($blogs as $blog)
          <div class="col-md-6 col-lg-4 mb-4 mb-md-0">
            <div class="card card-news">
              <div class="card-news__img">
                <img class="card-img" src="{{asset('img/'.$blog->image)}}" alt="">
              </div>
              <div class="card-body">
                <h4 class="card-news__title"><a href="#">{{$blog->name}}</a></h4>
                <ul class="card-news__info">
                  <li><a href="#"><span class="news-icon"><i class="ti-notepad"></i></span> {{ $blog->created_at->diffForHumans( ) }}</a></li>
                  <li><a href="#"><span class="news-icon"><i class="ti-comment"></i></span> 03 Comments</a></li>
                </ul>
                <p>{{$blog->description}}</p>
                <a class="card-news__link" href="{{url('show/' .$blog->slug)}}">{{ __('messages.Read more') }}<i class="ti-arrow-right"></i></a>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </section>
    <!-- ================ news section end ================= -->

  </main>
  <script>


function myFunction() {

  var x = document.getElementById("mySelect").value;
  var y = document.getElementById("offre_id").value;
  document.getElementById("demo").innerHTML =  x*y;
  document.getElementById("demo1").innerHTML =  x;

}


</script>
 

</body>
</html>
@endsection
