@if($slider)

  <div id="myCarousel" class="carousel slide" data-ride="carousel">

    <ol class="carousel-indicators">

      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>

      <li data-target="#myCarousel" data-slide-to="1"></li>

      <li data-target="#myCarousel" data-slide-to="2"></li>

    </ol>

    <div class="carousel-inner">

      @foreach($sitesliderimages as $key=>$sitesliderimage)

      <div class="carousel-item @if($key++==1) active @endif " style="background">

        <img src="{{$sitesliderimage->picture}}" class="bd-placeholder-img" width="100%" height="100%" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" >

        <div class="container mx-auto sm:px-4">

          <div class="carousel-caption text-left">

            <h1>{{$sitesliderimage->title}}</h1>

          </div>

        </div>

      </div>

      @endforeach

    </div>

    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">

      <span class="carousel-control-prev-icon" aria-hidden="true"></span>

      <span class="sr-only">Previous</span>

    </a>

    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">

      <span class="carousel-control-next-icon" aria-hidden="true"></span>

      <span class="sr-only">Next</span>

    </a>

  </div>

@endif



  

  <!-- Marketing messaging and featurettes

  ================================================== -->

  <!-- Wrap the rest of the page in another container to center all the content. -->



  <div class="container mx-auto sm:px-4 marketing">



    <!-- Three columns of text below the carousel -->

    <div class="flex flex-wrap ">

      <div class="lg:w-1/3 pr-4 pl-4">

        <svg class="bd-placeholder-img rounded-full" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140"><title>Placeholder</title><rect fill="#777" width="100%" height="100%"/><text fill="#777" dy=".3em" x="50%" y="50%">140x140</text></svg>

        <h2>Heading</h2>

        <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>

        <p><a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-gray-600 text-white hover:bg-gray-700" href="#" role="button">View details &raquo;</a></p>

      </div><!-- /.col-lg-4 -->

      <div class="lg:w-1/3 pr-4 pl-4">

        <svg class="bd-placeholder-img rounded-full" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140"><title>Placeholder</title><rect fill="#777" width="100%" height="100%"/><text fill="#777" dy=".3em" x="50%" y="50%">140x140</text></svg>

        <h2>Heading</h2>

        <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh.</p>

        <p><a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-gray-600 text-white hover:bg-gray-700" href="#" role="button">View details &raquo;</a></p>

      </div><!-- /.col-lg-4 -->

      <div class="lg:w-1/3 pr-4 pl-4">

        <svg class="bd-placeholder-img rounded-full" width="140" height="140" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 140x140"><title>Placeholder</title><rect fill="#777" width="100%" height="100%"/><text fill="#777" dy=".3em" x="50%" y="50%">140x140</text></svg>

        <h2>Heading</h2>

        <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>

        <p><a class="inline-block align-middle text-center select-none border font-normal whitespace-no-wrap rounded py-1 px-3 leading-normal no-underline bg-gray-600 text-white hover:bg-gray-700" href="#" role="button">View details &raquo;</a></p>

      </div><!-- /.col-lg-4 -->

    </div><!-- /.row -->





    <!-- START THE FEATURETTES -->



    <hr class="featurette-divider">



    <div class="flex flex-wrap  featurette">

      <div class="md:w-3/5 pr-4 pl-4">

        <h2 class="featurette-heading">First featurette heading. <span class="text-gray-700">It’ll blow your mind.</span></h2>

        <p class="text-xl font-light">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>

      </div>

      <div class="md:w-2/5 pr-4 pl-4">

        <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image max-w-full h-auto mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500"><title>Placeholder</title><rect fill="#eee" width="100%" height="100%"/><text fill="#aaa" dy=".3em" x="50%" y="50%">500x500</text></svg>

      </div>

    </div>



    <hr class="featurette-divider">



    <div class="flex flex-wrap  featurette">

      <div class="md:w-3/5 pr-4 pl-4 md:order-2">

        <h2 class="featurette-heading">Oh yeah, it’s that good. <span class="text-gray-700">See for yourself.</span></h2>

        <p class="text-xl font-light">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>

      </div>

      <div class="md:w-2/5 pr-4 pl-4 md:order-1">

        <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image max-w-full h-auto mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500"><title>Placeholder</title><rect fill="#eee" width="100%" height="100%"/><text fill="#aaa" dy=".3em" x="50%" y="50%">500x500</text></svg>

      </div>

    </div>



    <hr class="featurette-divider">



    <div class="flex flex-wrap  featurette">

      <div class="md:w-3/5 pr-4 pl-4">

        <h2 class="featurette-heading">And lastly, this one. <span class="text-gray-700">Checkmate.</span></h2>

        <p class="text-xl font-light">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus commodo.</p>

      </div>

      <div class="md:w-2/5 pr-4 pl-4">

        <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image max-w-full h-auto mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: 500x500"><title>Placeholder</title><rect fill="#eee" width="100%" height="100%"/><text fill="#aaa" dy=".3em" x="50%" y="50%">500x500</text></svg>

      </div>

    </div>



    <hr class="featurette-divider">



    <!-- /END THE FEATURETTES -->



  </div><!-- /.container -->