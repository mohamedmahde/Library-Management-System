<!DOCTYPE html>
<html lang="en">

<head>
    @include('home.css')
    <style>
        .table_deg {

            border: 1px solid white;
            margin: auto;
            text-align: center;
            margin-top: 100px;
        }


        th {
            background-color: skyblue;
            color: white;
            font-weight: bold;
            font-size: 18px;
            padding: 10px;
        }

        td {
            color: white;
            background-color: black;
            border: 1px solid white;
        }

        .book_img {

            height: 120px;
            width: 80px;
            margin: auto;
        }
    </style>
</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>

    @include('home.header')

    <div class="currently-market">
        <div class="container">
            <div class="row">

                @if (session()->has('massage'))
                    <div class="alert alert-success">

                        {{ session()->get('massage') }}

                        <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">x</button>



                    </div>
                @endif

                <table class="table_deg">
                    <tr>
                        <th>Book Name</th>
                        <th>Book auher</th>
                        <th>Book Status</th>
                        <th>Image</th>
                        <th>Cancel Request</th>
                    </tr>
                    @foreach ($data as $data)
                        <tr>
                            <td> {{ $data->book->title }}</td>
                            <td> {{ $data->book->auther_name }} </td>
                            <td> {{ $data->stauts }}</td>
                            <td>

                                <img class = "book_img" src="book/{{ $data->book->book_img }}" alt="">
                            </td>
                            <td>

                                @if ($data->stauts == 'Rejected')
                                    <a class="btn btn-warning" href="{{ url('cancel_req', $data->id) }}">Cancel</a>
                                @else
                                    <p style="color:white; font-weight:bold; ">Not allowad</p>
                                @endif

                            </td>
                        </tr>
                    @endforeach

                </table>
            </div>
        </div>
    </div>

    @include('home.footer')

</body>

</html>
