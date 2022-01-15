


<div class="latest-products">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="section-heading">
                    <h2>Latest Products</h2>
                    <a href="products.html">view all products <i class="fa fa-angle-right"></i></a>

                    {{-- serach button --}}

                    <form action="{{route("search.product")}}" method="get" class="form-inline"
                        style="float:right;padding:10px;">
                        @csrf

                        <input class="form-control" type="search" name="search" placeholder="search">
                        <input type="submit" value="search" class="btn btn-success">
                    </form>
                </div>
            </div>




            @foreach ($product as $data)

            <div class="col-md-4">
                <div class="product-item">
                    <a href="#"><img height="250" width="200" src="/productimage/{{$data->image}}" alt=""></a>
                    <div class="down-content">
                        <a href="#">
                            <h4>{{$data->title}}</h4>
                        </a>
                        <h6>${{$data->price}}</h6>
                        <p>{{$data->description}}</p>
                        {{-- add to cart --}}
                        <form action="{{route('addcart.product',$data->id)}}" method="post">
                            @csrf
                            <input class="form-control" style="width: 100px;" type="number" value="1" min="1" name="quantity">
                            <br>
                            <input class="btn btn-success" type="submit" value="Add cart">
                        </form>

                    </div>
                </div>
            </div>

            @endforeach
            @if(Method_exists($data,'links'))

            {{-- pagination --}}

            <div class="d-flex justify-content-center">

                {{!! $data->links() !!}}

            </div>

            @endif





        </div>
