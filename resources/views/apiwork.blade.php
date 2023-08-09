<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>API WORK</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .add-data-button {
            text-align: center;
            margin-top: 20px;
        }

        .add-data-button a.btn {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            text-decoration: none;
            /* Remove the underline */
        }

        .add-data-button a.btn:hover {
            background-color: #0056b3;
        }
    </style>
    <!-- Styles -->

</head>

<body class="antialiased">

    <div class="add-data-button">
        <a href="{{ route('apidataform') }}" class="btn btn-primary">ADD DATA</a>
    </div>
    <h1>API DATA </h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Number</th>
                <th>City</th>
                <th>State</th>
                <th>Zipcode</th>
                <th>Country</th>
                <th>Textword</th>
                <th>Subscribed Date</th>
                <th>First Name</th>
                <th>Last Name</th>

                <th>Email</th>
                <th>Opt-In Method</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @if ($all_contacts)
                @foreach ($all_contacts as $key => $conatct_data)
                    <tr>
                        <td>{{ $conatct_data->id }}</td>
                        <td>{{ $conatct_data->number }}</td>
                        <td>{{ $conatct_data->city }}</td>
                        <td>{{ $conatct_data->state }}</td>
                        <td>{{ $conatct_data->zipCode }}</td>
                        <td>{{ $conatct_data->country }}</td>
                        <td>{{ $conatct_data->textword }}</td>
                        <td>{{ $conatct_data->subscribedDate }}</td>
                        <td>{{ $conatct_data->firstName }}</td>
                        <td>{{ $conatct_data->lastName }}</td>
                        <td>{{ $conatct_data->email }}</td>
                        <td>{{ $conatct_data->optInMethod }}</td>
                        <td>
                            <form action="{{ route('delete.contact', ['id' => $conatct_data->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</body>

</html>
