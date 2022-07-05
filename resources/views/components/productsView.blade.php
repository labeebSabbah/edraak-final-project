<div>
        <section class="overflow-hidden">
  <div class="container px-5 py-2 mx-auto lg:pt-12 lg:px-32">
    <div class="flex flex-wrap -m-1 md:-m-2">
        @foreach ($products as $product)
      <div class="flex flex-wrap w-1/3">
        <div class="w-full p-1 md:p-2">
          <img class="block object-cover object-center w-full rounded-lg"
            src="{{asset('uploads/'.$product->image)}}" style="height: 70%;" />
            <span>{{htmlspecialchars_decode($product->name)}}</span>
            <span>{{$product->price}}$</span>
            <br>
            <a href="/addItem?id={{$product->id}}&name={{$product->name}}&price={{$product->price}}&image={{$product->image}}&size={{$product->size}}"><button type="button" style="margin-right:8px; background-color: #06283D; border: 2px solid #06283D;">Add To Cart</button></a>
            <a href="/details?id={{$product->id}}"><button type="button" style="background-color: #06283D; border: 2px solid #06283D;">More Details</button></a>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
<div style="position: sticky;">{{$products->links()}}</div>
    </div>