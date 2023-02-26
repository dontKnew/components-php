<div>
    @foreach($products as $product)

        <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl">
            <div class="md:flex">
                @if($product['image_url'])
                    <div class="md:flex-shrink-0">
                        <img class="h-48 w-full object-cover md:w-48" src="{{ $product['image_url'] }}">
                    </div>
                @endif
                <div class="p-8">
                    <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">{{ $product['price'] }}</div>
                    <a href="{{ $product['product_url']  }}}" target="_blank" class="block mt-1 text-lg leading-tight font-medium text-black hover:underline">{{ $product['title'] }}</a>
                </div>
            </div>
        </div>

    @endforeach
</div>
