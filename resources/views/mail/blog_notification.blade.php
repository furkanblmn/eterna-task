<!DOCTYPE html>
<html>

<head>
    <title>New Blog Post Published</title>
</head>

<body>
    <h1>{{ $blog->title }}</h1>
    <p>{{ $blog->sub_title }}</p>
    <a href="{{ $blog->url }}">Read More!</a>
</body>

</html>
