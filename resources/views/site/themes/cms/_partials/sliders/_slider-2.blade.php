    <!-- Main Slider Start -->

    <section class="main-slider-section" style="z-index: 10">
        <div class="rellax" >
            <div class="slider-title">
                <h1 class="rellax animate-title blur" data-rellax-speed="-9">{!! $sitepage->title !!}</h1>
            </div>

            <div class="rellax" data-rellax-speed="-8">
                <ul class="main-slider slide blur" >
                    @foreach($sitesliderimages as $compteur=>$sitesliderimage)
                        <li class="slide-item 
                            @if($compteur==0) active @endif slide-{{$compteur++}}"  style="background: url('{{url('')}}/{{$sitesliderimage->picture}}');background-repeat: no-repeat; background-size: cover;">
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
    
    <!-- Main Slider End -->





