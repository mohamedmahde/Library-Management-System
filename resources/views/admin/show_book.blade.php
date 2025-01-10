<!DOCTYPE html>
<html>

<head>
    @include('admin.css')

    <style>
        .table_center {
            text-align: center;

            margin: auto;

            border: 1px solid yellow;
            margin-top: 50px;

        }

        th {

            background-color: skyblue;
            padding: 10px;
            font-size: 16px;
            font-weight: bold;
            color: black;

        }

        .auother_img {

            width: 80px;
            border-radius: 50%
        }

        .book_img {
            width: 150px;
            height: auto;
        }
    </style>

</head>

<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <!-- Sidebar Navigation end-->

        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">

                    @if (session()->has('massage'))
                    <div class = "alert alert-success  ">
                        <button type="button" class = "close" data-dissmis="alert" aria-hidden="true">x</button>

                        {{ session()->get('massage') }}
                    </div>
                @endif

                    <div>

                      
                        <table class= "table_center">

                            <tr>
                                <th>Book Name</th>
                                <th>Auther Name</th>
                                <th>Price</th>
                                <th>description</th>
                                <th>Quantity</th>
                                <th>Category</th>
                                <th>book Image</th>
                                <th>Auther Image</th>
                                <th>Delete</th>
                                <th>Update</th>



                            </tr>
                            @foreach ($book as $book)
                                <tr>
                                    <td>{{ $book->title }}</td>
                                    <td>{{ $book->auther_name }}</td>
                                    <td>{{ $book->price }}</td>
                                    <td>{{ $book->description }}</td>
                                    <td>{{ $book->quantity }}</td>
                                    <td>{{ $book->category->cat_title }}</td>

                                    <td>
                                        <img class="auother_img" src="book/{{ $book->book_img }}"></img>

                                    </td>
                                    <td>
                                        <img class="book_img" src="auther/{{ $book->auther_img }}"></img>

                                    </td>


                                    <td>
                                     <a href="{{ url('book_delete' , $book->id) }}" class = "btn btn-danger">Delete</a>   
                                    </td>

                                    <td>
                                        <a class = "btn btn-info" href="{{ url('edit_book', $book->id) }}">Update</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>



                </div>
            </div>
        </div>
        @include('admin.footer')
</body>

</html>
