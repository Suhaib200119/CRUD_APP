@extends('home')
@section("bigTitle"," | تعديل بيانات")
@section("smalTitle" , "تعديل بيانات")
@section("style")
<link rel="stylesheet" href="{{asset("css/form_style.css")}}">
@endsection
@section("content")
    <div>
        @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error )
                <li>
                    {{$error}}
                </li>
            @endforeach
        </ul>
        
            
        @endif
        <form action="{{route("students.update",$std_data)}}" method="post">
            @csrf
            @method("put")
              <label for="fullName">الأسم بالكامل</label>
              <input type="text" id="fullName" name="fullName" placeholder="ادخل الاسم بالكامل" value="{{$std_data->fullName}}">
         
              <label for="age">العمر</label>
              <input type="number" id="age" name="age" placeholder="ادخل العمر" value="{{$std_data->age}}">
      
              <label for="mobileNumber">رقم الجوال</label>
              <input type="text" id="mobileNumber" name="mobileNumber" placeholder="ادخل رقم الجوال " value="{{$std_data->mobileNumber}}">
          
              <label for="level">المستوى</label>
              <select id="level" name="level">
                <option value="1">الأول</option>
                <option value="2">الثاني</option>
                <option value="3">الثالث</option>
                <option value="4">الرابع</option>
              </select>
      
              <label for="gpa">المعدل التراكمي</label>
              <input type="text" id="gpa" name="gpa" placeholder="ادخل المعدل التراكمي" value="{{$std_data->gpa}}">
      
              <div class="check">
                      <input  type="checkbox" id="active" name="active" 
                      @if ($std_data->active==1)
                       checked
                      @endif>
                  <label for="active">فعال ؟</label>
      
              </div>
            
              <input type="submit" value="إرسال">
            </form>

            {{-- @if (session()->has("message"))
            <div style="background-color: red">
                {{session()->get("message")}}
            </div>
                
            @endif --}}
    </div>
@endsection