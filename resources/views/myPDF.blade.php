<!DOCTYPE html>
<html>
<head>
    <title>Hi</title>
</head>
<body>
        @foreach ($images as $image)
            <img src="{{ $image }}" style="width: 100%; height: auto">
        @endforeach
  
</body>
</html