<div id="showData">
    <div class="row" >
        @foreach ($windows as $window)
            <div class="col-lg-4 col-md-4 col-sm-6">
                <a data-fancybox="gallery" data-caption="<p>{{'W_'.$window->id}} : الكود  </p><a href='{{url('window_item/'.$window->id)}}'>التفاصيل</a>" href="{{$window->images[0]->image_path}}" class="gtco-card-item">
                    <figure     >
                        <div class="overlay"><i class="ti-plus"></i></div>

                        <img src="{{$window->images[0]->image_path}}" alt="Image" class="img-responsive">
                    </figure>
                    <div class="gtco-text">
                        <h2> {{ 'W_'.$window->id }} الكود </h2>
                        <p>{{$window->category->name}} </p>

                    </div>
                </a>
            </div>
        @endforeach
    </div>
    <div class="text-center">
        {!! $windows->links() !!}
    </div>

</div>
