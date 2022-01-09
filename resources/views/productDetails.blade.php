@extends('layouts.main')
@section('content')

        @foreach ($product as $p)

        <section style="background-color: #eee;">
            <div class="container py-5">
              <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                  <div class="card text-black">
                    <i class="fab fa-apple fa-lg pt-3 pb-1 px-3"></i>
                    <img
                      src="{{$p->image}}"
                      class="card-img-top"
                      alt="Apple Computer"
                    />
                    <div class="card-body">
                      <div class="text-center">
                        <h5 class="card-title">Believing is seeing</h5>
                        <p class="text-muted mb-4">{{$p->name}}</p>
                      </div>
                      <div>
 
                        <div class="d-flex justify-content-between">
                          <span>{{$p->description}}</span><span>{{$p->price}}</span>
                        </div>
                      </div>
                      <div class="d-flex justify-content-between total font-weight-bold mt-4">
                     <form id="addToCart" class="addToCart" action="{{route('addToCart')}}" method="POST">
                         @csrf
                         <input type="hidden" name="product_id" value="{{$p->id}}"> 
                         <button class="btn btn-warning">Add to Cart
                        </button>
                     </form>
                        <button class="btn btn-success">Buy now
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
            
        @endforeach
 
@endsection

@push('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    
    var request;
    $('#addToCart').click(function(event){
        event.preventDefault();
        var $form = $(this);
        var $input = $form.find("input");
        var serializedData = $form.serialize();
        $input.prop('disabled', true);
        request=$.ajax({
            url:$form.attr('action'),
            type:'POST',
            data:serializedData,

        });
        request.done(function (response, textStatus, jqXHR){
        // Log a message to the console
        alert('Product added succesfully');
    });
    request.fail(function (jqXHR, textStatus, errorThrown){
        // Log the error to the console
        alert(
            'Product already added to cart'
           
        );
    });




    });
</script>
    
@endpush