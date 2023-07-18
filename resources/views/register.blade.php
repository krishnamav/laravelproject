<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #f2f2f2;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        .interests-group label {
            display: inline-block;
            margin-right: 10px;
        }

        .interests-group input[type="checkbox"] {
            margin-right: 5px;
            vertical-align: middle;
        }


        input[type="text"],
        input[type="email"],
        input[type="password"]
        {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <h2>Registration Form</h2>

        <div>
            <label for="name">Name</label>
            <input id="name" type="text" name="name" value="{{ old('name') }}" required autocomplete="name"
                autofocus>
        </div>

        <div>
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">
        </div>

        <div>
            <label for="password">Password</label>
            <input id="password" type="password" name="password" required autocomplete="new-password">
        </div>

        <div class="interests-group">
            <label>Interests</label>
            <div>
                <input type="checkbox" id="sports" name="interests[]" value="Sports">
                <label for="sports">Sports</label>
            </div>
            <div>
                <input type="checkbox" id="reading" name="interests[]" value="Reading">
                <label for="reading">Reading</label>
            </div>
            <div>
                <input type="checkbox" id="news" name="interests[]" value="News">
                <label for="news">News</label>
            </div>
            <div>
                <input type="checkbox" id="traveling" name="interests[]" value="Traveling">
                <label for="traveling">Traveling</label>
            </div>
            <div>
                <input type="checkbox" id="fooding" name="interests[]" value="Fooding">
                <label for="fooding">Fooding</label>
            </div>
        </div>

        <div>
            <button type="submit">Register</button>
        </div>
    </form>
</body>

</html>
