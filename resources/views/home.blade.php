<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الصفحة الرئيسية @yield("bigTitle")</title>
    <link rel="stylesheet" href="{{asset("css/style.css")}}">
    @yield("style")
</head>
<body>
<div class="nav">
    <ul>
        <li><a href="{{route("students.create")}}">إضافة طالب جديد</a></li>
        <li><a href="{{route("students.index")}}">عرض كل الطلاب</a></li>
        <li><a href="{{route("homePage")}}">الصفحة الرئيسية</a></li>
    </ul>
</div>
<br>

<div class="header">

    <span> الرئيسية / </span>
    <span>@yield("smalTitle")</span>

</div>
@yield("content")
    @yield('javascript')
</body>
</html>