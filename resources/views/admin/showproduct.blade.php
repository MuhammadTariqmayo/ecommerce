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
                    <td style="padding-top:120px; color:white " >Title</td>
                    <td style="padding-top:120px; color:white" >Description</td>
                    <td style="padding-top:120px; color:white" >Price</td>
                    <td style="padding-top:120px; color:white" >Quantity</td>
                    <td style="padding-top:120px; color:white" >Image</td>
                </tr>

                @foreach ($products as $product)


              <tr  align="center"   style="background-color:black;">
                  <td>{{$product->title}}</td>
                  <td>{{$product->description}}</td>
                  <td>{{$product->price}}</td>
                  <td>{{$product->quantity}}</td>
                  <td>
                      <img height="200" width="200" src="/productimage/{{$product->image}}">
                  </td>
                  <td >
                      <a class="btn btn-success" href="{{route('update.product',$product->id)}}">Update</a>
                  </td>

                  <td>
                    <a  class="btn btn-danger" onclick="return confirm('Are you sure')" href="{{route('delete.product',$product->id)}}">Delete</a>
                </td>
              </tr>
              @endforeach
            </table>

        </div>
    </div>


    @include('admin.script');


</body>

</html>
