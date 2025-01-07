<!DOCTYPE html>
<html>

<head>
    @include('admin.css')
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}
</head>
<style>
    .div_center {

        text-align: center;
        margin: auto;
    }

    .cat_lable {

        font-size: 30px;
        font-weight: bold;
        padding: 30px;
        color: white;
    }

    .center {
        margin: auto;
        width: 50%;
        text-align: center;
        margin-top: 50px;
        border: 1px solid white;
    }

    th {

        background-color: skyblue;
        padding: 10px;
    }

    tr {
        border: 1px solid white;
        padding: 10px;
    }
</style>

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
                        @if (@session()->has('massage'))
                            <div class = "alert alert-success  ">
                                <button type="button" class = "close" data-dissmis="alert" aria-hidden="true">x</button>

                                {{ session()->get('massage') }}
                            </div>
                        @endif
                        <h1 class="cat_lable">add category</h1>

                        <form action="{{ url('add_category') }}" method="Post">
                            @csrf
                            <span style="padding-right: 50px;">

                                <label for="">categor name</label>
                                <input type="text" name ='category' required>
                            </span>
                            <input class ="btn btn-primary"type="submit" valu ='add category'>


                        </form>
                        <table class= "center">
                            <tr>
                                <th>category name</th>
                                <th>action</th>
                                @foreach ($data as $data)
                            <tr>
                                <td>{{ $data->cat_title }}</td>
                                <td>
                                    {{-- onclick="confirmation(event)"  --}}
                                     <a  class = "btn btn-danger"
                                     href="{{ url('cat_delete', $data->id) }}">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>



        @include('admin.footer')
        {{-- <script type="text/javascript" >
            function confirmation(ev) {
                ev.preventDefault();
                var urlToRedirect = ev.currentTarget.getAttribute('href');
                consoLe.Log(urlToRedirect);
                swal({
                        title: "Are you sure to Delete this",
                        text: "You will not be able to revert this!",
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willCancel) => {
                        if (willCancel) {
                            window.location.href = urlToRedirect;
                        }
                    });
            }
        </script> --}}
        
</body>

</html>
