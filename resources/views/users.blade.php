<!DOCTYPE html>
<html>
<head>
    <title>User List</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css">
</head>
<body>
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <div class="container">
        <h2>User List</h2>
        <div style="text-align: right; margin: 10px;">
        <a href="{{ route('register') }}" style="text-decoration: none;">
            <button style="background-color: #4CAF50; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">
                Register
            </button>
        </a>
    </div>
        <table class="table table-bordered" id="userListTable">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Interests</th>
                    <th>Roles</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        @foreach($user->interests as $interest)
                            {{ $interest->interest }}
                            @if(!$loop->last)
                                ,
                            @endif
                        @endforeach
                    </td>
                    <td>
                        @foreach($user->roles as $role)
                            {{ $role->name }}
                            @if(!$loop->last)
                                ,
                            @endif
                        @endforeach
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#userListTable').DataTable();
        });
    </script>
</body>
</html>
