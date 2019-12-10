<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">  
        <link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <style>
           .dms-table {
                border: none;
                border-right: solid 1px #DDEFEF;
                border-collapse: separate;
                border-spacing: 0;
                font: normal 13px Arial, sans-serif;
            }
            .dms-table thead th {
                background-color: #DDEFEF;
                border: none;
                color: #336B6B;
                padding: 10px;
                text-align: left;
                text-shadow: 1px 1px 1px #fff;
                white-space: nowrap;
            }
            .dms-table tbody td {
                border-bottom: solid 1px #DDEFEF;
                color: #333;
                padding: 10px;
                text-shadow: 1px 1px 1px #fff;
                white-space: nowrap;
            }
            .dms-wrapper {
                position: relative;
            }
            .dms-scroller {
                margin-left: 240px;
                overflow-x: scroll;
                overflow-y: visible;
                padding-bottom: 5px;
                width: 300px;
            }
            .dms-table .dms-sticky-col {
                border-left: solid 1px #DDEFEF;
                border-right: solid 1px #DDEFEF;
                left: 0;
                position: absolute;
                top: auto;
                width: 120px;
            }
            .dms-table .dms-sticky-col-1 {
                border-left: solid 1px #DDEFEF;
                border-right: solid 1px #DDEFEF;
                left: 120px;
                position: absolute;
                top: auto;
                width: 120px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        {{-- <a href="{{ route('login') }}">Login</a> --}}

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="dms-wrapper">
                    <div class="dms-scroller">
                        <table class="dms-table">
                            <thead>
                                <tr>
                                    <th class="dms-sticky-col">Name</th>
                                    <th class="dms-sticky-col-1">Number</th>
                                    <th>Position</th>
                                    <th>Height</th>
                                    <th>Born</th>
                                    <th>Salary</th>
                                    <th>Prior to NBA/Country</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < 100; $i++)
                                    <tr>
                                        <td class="dms-sticky-col"> Name {{ $i }}</td>
                                        <td class="dms-sticky-col-1">{{ $i }}</td>
                                        <td>PF</td>
                                        <td>6'11"</td>
                                        <td>06-21-1986</td>
                                        <td>$3,001,000</td>
                                        <td>Rider/USA</td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                    </div>
                </div>


            {{-- <div class="content">
                <div class="title m-b-md">
                    DMS<sup>++</sup>
                </div>
            </div> --}}
        </div>

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    </body>
</html>
