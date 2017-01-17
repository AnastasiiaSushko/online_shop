@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <table class="table table-stripped">
                @if (isset($category))
                    <tr><th>{{ $category->title }}</th></tr>
                @endif
                @foreach ($products as $product)
                    <tr><td><a class="text-muted" href="/product/{{ $product->id }}">{{ $product->title }}</a></td></tr>
                @endforeach
            </table>

            {{ $products->links() }}
        </div>
    </div>
@endsection