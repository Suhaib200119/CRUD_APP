@extends('home')
@section("bigTitle"," | إضافة طالب")
@section("smalTitle","إضافة طالب")
@section("style")
<link rel="stylesheet" href="{{asset("css/form_style.css")}}">
@endsection
@section("content")
<div>
 @if($errors->any())
 <div class="error">
<ul>
  @foreach ($errors->all() as $err)
  <li>
    {{
      $err
    }}
  </li>
  @endforeach
</ul>
 </div>
     
 @endif
    <form action="{{route("students.store")}}" method="post">
      @csrf
        <label for="fullName">الأسم بالكامل</label>
        <input type="text" id="fullName" name="fullName" placeholder="ادخل الاسم بالكامل">
   
        <label for="age">العمر</label>
        <input type="number" id="age" name="age" placeholder="ادخل العمر">

        <label for="mobileNumber">رقم الجوال</label>
        <input type="text" id="mobileNumber" name="mobileNumber" placeholder="ادخل رقم الجوال ">
    
        <label for="level">المستوى</label>
        <select id="level" name="level">
          <option value="1">الأول</option>
          <option value="2">الثاني</option>
          <option value="3">الثالث</option>
          <option value="4">الرابع</option>
        </select>

        <label for="gpa">المعدل التراكمي</label>
        <input type="text" id="gpa" name="gpa" placeholder="ادخل المعدل التراكمي">

        <div class="check">
                <input  type="checkbox" id="active" name="active">
            <label for="active">فعال ؟</label>

        </div>
      
        <input type="submit" value="إرسال">
      </form>
</div>
@endsection