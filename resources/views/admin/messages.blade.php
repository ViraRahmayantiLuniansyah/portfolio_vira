<!DOCTYPE html>
<html>
<head>
    <title>Admin - Messages</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

    <style>
        body {
            background: #0f0f0f;
            color: white;
            font-family: 'Poppins', sans-serif;
            padding: 30px;
        }

        h1 {
            color: #ff4da6;
        }

        a {
            color: #ff4da6;
            text-decoration: none;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            background: #1a1a1a;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #333;
        }

        th {
            color: #ff4da6;
        }

        button {
            background: #ff4da6;
            border: none;
            padding: 6px 10px;
            color: white;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background: #ff1a8c;
        }
    </style>
</head>
<body>

<h1>Messages</h1>
<a href="{{ route('admin.dashboard') }}">← Back</a>

<table>
    <tr>
        <th>Nama</th>
        <th>Email</th>
        <th>Subject</th>
        <th>Pesan</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>

    @foreach($messages as $msg)
    <tr>
        <td>{{ $msg->nama }}</td>
        <td>{{ $msg->email }}</td>
        <td>{{ $msg->subject }}</td>
        <td>{{ $msg->pesan }}</td>
        <td>{{ $msg->is_read ? '✔' : '❌' }}</td>
        <td>
            <form method="POST" action="{{ route('admin.messages.read', $msg->id) }}">
                @csrf
                <button>Read</button>
            </form>

            <form method="POST" action="{{ route('admin.messages.delete', $msg->id) }}">
                @csrf
                @method('DELETE')
                <button>Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

</body>
</html>