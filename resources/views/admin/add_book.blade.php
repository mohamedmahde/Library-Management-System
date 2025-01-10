<!DOCTYPE html>
<html>

<head>
    @include('admin.css')

    <style>
        .div_center {

            text-align: center;
            margin: auto;
        }

        .tilte_deg {

            font-size: 40px;
            font-weight: bold;
            padding: 35px;
            color: white;
        }

        label {
            display: inline-block;
            width: 200px;

        }

        .div_pad {

            padding: 20px;
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

                    <div class="div_center">
                        <h1 class="tilte_deg">Add Book</h1>
                        <form action="{{ url('store_book') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="div_pad">
                                <label for="">Book Name</label>
                                <input type="text" name="book_name">
                            </div>
                            <div class="div_pad">
                                <label for="">Auther Name</label>
                                <input type="text" name="auther_name">
                            </div>
                            <div class="div_pad">
                                <label for="">Price</label>
                                <input type="text" name="price">
                            </div>
                            <div class="div_pad">
                                <label for="">description</label>
                                <textarea name="description"></textarea>
                            </div>

                            <div class="div_pad">
                                <label for="">Category</label>
                                <select name="category" required>
                                    <option >Select a Category</option>
                                    @foreach ($data as $data)
                                        <option value="{{ $data->id }}"> {{ $data->cat_title }}</option>
                                    @endforeach

                                </select>
                            </div>

                            <div class="div_pad">
                                <label for="">Quantity</label>
                                <input type="number" name="quantity">
                            </div>
                            <div class="div_pad">
                                <label for="">book Image</label>
                                <input type="file" name="book_img">
                            </div>
                            <div class="div_pad">
                                <label for="">Auther Image</label>
                                <input type="file" name="auther_img">
                            </div>

                            <div class="div_pad">
                                <input type="submit" vlaue="Add Book" class="btn btn-info">
                            </div>

                        </form>

                    </div>
                </div>

            </div>
        </div>

        @include('admin.footer')
</body>

</html>
