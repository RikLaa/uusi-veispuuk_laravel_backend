<!DOCTYPE html>
<html>
<head>
<title></title>
</head>
<body>

<ul>
  @foreach ($posts as $post)
  <li>
    <a href="/posts/{{ $post->postID }}">

      {{ $post->content }}

  </li>
  @endforeach
</ul>

</body>
</html>
