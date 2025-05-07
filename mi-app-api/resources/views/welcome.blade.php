<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API SQLite</title>
</head>

<body style="background-color: #0a0a0a; color:rgb(236, 236, 217);font-justify: center; text-align: center;">
    <h1>Welcome to the API SQLite Felipe</h1>
    <p>This is a simple API built with Laravel and SQLite.</p>
    <p>To get started, you can check the following endpoints:</p>
    <ul style="list-style-type: none; padding: 0;">
        <li><a href="/api/users">Get all users</a></li>
        <li><a href="/api/users/1">Get user by ID</a></li>
        <li><a href="/api/users/create">Create a new user</a></li>
        <li><a href="/api/users/update/1">Update user by ID</a></li>
        <li><a href="/api/users/delete/1">Delete user by ID</a></li>
    </ul>
    <p>For more information, please refer to the <a href="https://laravel.com/docs">Laravel documentation</a>.</p>
    <p>Feel free to explore the code and make changes as needed.</p>
    <p>Happy coding!</p>
    <p>Laravel Version: {{ Illuminate\Foundation\Application::VERSION }}</p>
    <p>PHP Version: {{ PHP_VERSION }}</p>
    <p>SQLite Version: {{ DB::select('SELECT sqlite_version() AS version')[0]->version }}</p>

</body>

</html>