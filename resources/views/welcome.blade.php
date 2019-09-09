<!-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>


        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
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
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>
 -->
<h1>Company List</h1>

 @foreach ($companies as $company)
    <h2>{{ $company->name }}</h2>
    <table>
        <tr>
            <th>
                address
            </th>
            <th>
                city
            </th>
            <th>
                state
            </th>
            <th>
                zip
            </th>
            <th>
                phone
            </th>
        </tr>
        <tr>
            <td>
                {{ $company->address }}     
            </td>
            <td>
                {{ $company->city }}
            </td>
            <td>
                {{ $company->state }}
            </td>
            <td>
                {{ $company->zip }}
            </td>
            <td>
                {{ $company->phone }}
            </td>
        </tr>
    </table>
@endforeach

<h1>Contacts List</h1>
@foreach ($contacts as $contact)
    <h2>{{ $contact->firstName }} {{ $contact->lastName }}</h2>
    <table>
        <tr>
            <th>
                email
            </th>
            <th>
                phone
            </th>
            <th>s
                company
            </th>
        </tr>
        <tr>
            <td>
                {{ $contact->email }}     
            </td>
            <td>
                {{ $contact->phone }}
            </td>
            <td>
                {{ $contact->company->name }}
            </td>
        </tr>
    </table>
@endforeach