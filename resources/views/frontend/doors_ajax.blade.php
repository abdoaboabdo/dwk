<div id="showData">
    <div class="row" >
        @foreach ($doors as $door)
            <div class="col-lg-4 col-md-4 col-sm-6">
                <a data-fancybox="gallery" data-caption="<p>{{'D_'.$door->id}} : الكود  </p><a href='{{url('door_item/'.$door->id)}}'>التفاصيل</a>" href="{{$door->images[0]->image_path}}"  class="gtco-card-item">
                    <figure >
                        <div class="overlay"><i class="ti-plus"></i></div>
                        <img src="{{$door->images[0]->image_path}}" alt="Image" class="img-responsive">
                    </figure>
                    <div class="gtco-text">
                        <h2> {{ 'D_'.$door->id }} الكود</h2>
                        <p>{{$door->category->name}}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    <div class="text-center">
        {!! $doors->links() !!}
    </div>

</div>
