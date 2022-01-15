<!DOCTYPE html>
<html lang="en">

<head>
    {{-- css --}}
    @include('admin.css');
</head>

<body>



    @include('admin.navbar');

    @include('admin.sidebar');


    {{-- @include('admin.body'); --}}
    <div class="container-fluid page-body-wrapper">
        <div class="container" align="center">

            @if(session()->has('message'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert">Product</button>
                {{session()->get('message')}}

            </div>
            @endif

            <table class="table table-borderd w-20">
                <tr>
                    <td style="padding-top:120px; color:white ">Customer Name</td>
                    <td style="padding-top:120px; color:white">Phone</td>
                    <td style="padding-top:120px; color:white">Address</td>
                    <td style="padding-top:120px; color:white">Product_Title</td>
                    <td style="padding-top:120px; color:white">Price</td>
                    <td style="padding-top:120px; color:white">Quantity</td>
                    <td style="padding-top:120px; color:white">Status</td>
                    <td style="padding-top:120px; color:white">Deliverd</td>
                </tr>

                @foreach ($order as $orders)


                <tr align="center" style="background-color:black;">
                    <td>{{ $orders->name}}</td>
                    <td>{{ $orders->phone}}</td>
                    <td>{{ $orders->address}}</td>
                    <td>{{ $orders->product_name}}</td>
                    <td>{{ $orders->quantity}}</td>
                    <td>{{ $orders->price}}</td>
                    <td>{{ $orders->status}}</td>

                    <td>
                        <a class="btn btn-success" href="{{route('update.status',$orders->id)}}">Deliverd</a>
                    </td>

                </tr>
                @endforeach
            </table>

        </div>
    </div>


    @include('admin.script');


</body>

</html>
