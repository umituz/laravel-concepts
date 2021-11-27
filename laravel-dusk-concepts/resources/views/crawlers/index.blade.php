<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<table class="table table-dark">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">URL</th>
        <th scope="col">Status</th>
        <th scope="col">Path</th>
    </tr>
    </thead>
    <tbody>
    @foreach ($items as $idx => $item)
        <tr>
            <th scope="row">{{ $idx + 1 }}</th>
            <td>{{ $item->url }}</td>
            <td>{{ $item->status }}</td>
            <td><a href="{{url($item->path ? $item->path : '')}}">{{ $item->path ? $item->path : '' }}</a></td>
        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>
