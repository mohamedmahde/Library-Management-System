<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    <style>

        .div_deg{

            text-align: center;
            margin: auto;
        }
        .title_deg{
            color: white;
            padding: 40px;
            font-size:30px;
            font-weight: bold;
        }
    </style>
</head>

<body>
    @include('admin.header')
    <div class="d-flex align-items-stretch">
        <!-- Sidebar Navigation-->
        @include('admin.sidebar')
        <div class="page-content">
            <div class="page-header">
                <div class="container-fluid">

                    <div class="div_deg">
                        <h1 class="title_deg">Update Category</h1>
                        <form action="{{ url('update_categpry',$data->id) }}" method="post">
                            @csrf

                            <label for="">Category Name</label>
                            <input type="text" name="cat_name" value="{{ $data->cat_title }}">
                            <input type="submit" class="btn btn-info" value="update">
                        </form>
                    </div>

                </div>
            </div>
        </div>

        @include('admin.footer')
</body>

</html>
