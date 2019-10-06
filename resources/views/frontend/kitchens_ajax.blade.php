<div id="showData">
    <div class="row" >
        @foreach ($kitchens as $kitchen)
            <div class="col-lg-4 col-md-4 col-sm-6">
                <a data-fancybox="gallery" data-caption="<p>{{'K_'.$kitchen->id}} : الكود  </p><a href='{{url('kitchen_item/'.$kitchen->id)}}'>التفاصيل</a>" href="{{$kitchen->images[0]->image_path}}"  class="gtco-card-item">
                    <figure >
                        <div class="overlay"><i class="ti-plus"></i></div>
                        <img src="{{$kitchen->images[0]->image_path}}" alt="Image" class="img-responsive">
                    </figure>
                    <div class="gtco-text">
                        <h2> {{ 'K_'.$kitchen->id }} الكود</h2>
                        <p>{{$kitchen->category->name}}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    <div class="text-center">
        {!! $kitchens->links() !!}
    </div>

</div>
