<div>
        <section class="overflow-hidden text-gray-700 ">
  <div class="container px-5 py-2 mx-auto lg:pt-12 lg:px-32">
    <div class="flex flex-wrap -m-1 md:-m-2">
        @foreach ($products as $product)
      <div class="flex flex-wrap w-1/3">
        <div class="w-full p-1 md:p-2">
          <img class="block object-cover object-center w-full rounded-lg"
            src="{{asset('uploads/'.$product->image)}}" style="height: 70%;" />
            <p>{{$product->name}}</p>
            <p>{{$product->price}}</p>
            <a href="/addItem?id={{$product->id}}&name={{$product->name}}&price={{$product->price}}&image={{$product->image}}"><button>Add To Cart</button></a>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>
{{$products->links()}}
    </div>