<x-layout.main :title="'Welcome'" route="welcome">
    <a href={{route('post.index')}}><button class="btn btn-primary me-2">Posts</button></a>
    <a href={{route('car.index')}}><button class="btn btn-primary me-2">Cars</button></a>
    <a href={{route('brands.index')}}><button class="btn btn-primary me-2">Brands</button></a>
</x-layout.main>