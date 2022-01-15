<!DOCTYPE html>
<html lang="en">

<head>

    @include('admin.css');

    <style type="text/css">
        .style {

            color: white;
            padding-top: 70px;
            font-size: 25px;

        }

        label {
            display: inline-block;
            width: 200px;
        }

    </style>


</head>

<body>



    @include('admin.navbar');

    @include('admin.sidebar');

    <div class="container-fluid page-body-wrapper">
        <div class="container" align="center">
            <h1 class="style">Add Product</h1><br>

            @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">Product</button>
                {{session()->get('message')}}


            </div>
            @endif


            <form action="{{route('products.create')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div style="padding: 15px">
                    <label>product title</label>
                    <input style="color: black;" type="text" id="" name="title" placeholder="give a product title"
                        required="">
                </div>

                <div style="padding: 15px">
                    <label>Price</label>
                    <input style="color: black;" type="number" id="" name="price" placeholder="give a price"
                        required="">
                </div>

                <div style="padding: 15px">
                    <label>Description</label>
                    <input style="color: black;" type="text" id="" name="description" placeholder="give a description"
                        required="">
                </div>

                <div style="padding: 15px">
                    <label>Quantity</label>
                    <input style="color: black;" type="text" id="tit" name="quantity" placeholder="product quantity"
                        required="">
                </div>

                <div style="padding: 15px">
                    <input type="file" name="file">
                </div>

                <div style="padding: 15px">
                    <input class="btn btn-success" type="submit" name="button">
                </div>

            </form>





        </div>
    </div>

    @include('admin.script');


</body>

</html>
