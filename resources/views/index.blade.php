<x-layout title="top">
    <h1>トップページ</h1>

    <div>
        @foreach ($products as $product)
            <div>
                <div>{{ $product->name }}</div>
                <div>{{ $product->price }}円</div>
                <div>{{ $product->description }}</div>
            </div>
        @endforeach
    </div>
</x-layout>
