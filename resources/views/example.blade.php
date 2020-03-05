<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .redColor {
            background-color: red;
        }

        .blueColor {
            background-color: blue;
        }

        .bigText {
            font-size: 20px;
        }
    </style>
</head>
<body>

<x-sidebar title="Hello World" :info="$info" id="test" class="redColor">
    <x-slot name="author">Ümit UZ</x-slot>
    Additional text
</x-sidebar>

<x-navigation/>

<x-partials.subview/>
</body>
</html>
