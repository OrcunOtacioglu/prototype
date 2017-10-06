<!-- Slider -->
<div class="tp-banner-container" style="margin-top: 40px;">
    <div class="tp-banner">
        <ul>

            @foreach($slides as $slide)
                <li data-transition="fade" data-slotamount="7" data-masterspeed="500" data-saveperformance="on" data-title="{{ $slide->event->title }}">
                    <!-- MAIN IMAGE -->
                    <img src="{{ asset('img/slides_bg/dummy.png') }}" alt="slidebg1" data-lazyload="images/slider-images/{{ $slide->img_path }}" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                    <div class="tp-caption skewfromrightshort fadeout"
                         data-x="{{ $slide->x_placement }}"
                         data-y="{{ $slide->y_placement }}"
                         data-hoffset="{{ $slide->x_offset }}"
                         data-voffset="{{ $slide->y_offset }}"
                         data-speed="500"
                         data-start="0"
                         data-easing="Power4.easeOut">
                        <a href="{{ action('EventController@show', ['slug' => $slide->event->slug]) }}" class="btn btn-lg watch-now-button">İNCELE</a>
                    </div>
                </li>
            @endforeach

        </ul>
        <div class="tp-bannertimer tp-bottom"></div>
    </div>
</div>
<!-- End Slider -->