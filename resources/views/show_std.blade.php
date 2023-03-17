@extends('home')
@section("bigTitle", " | عرض الطلاب")
@section("smalTitle" , "عرض الطلاب")
@section("style")
<link rel="stylesheet" href="{{ asset("css/show_std.css") }}">
@endsection
@section("content")
<div>
    <table>
        <tr>
          <th>الرقم التسلسلي</th>
          <th>الاسم</th>
          <th>العمر</th>
          <th>رقم الجوال</th>
          <th>المستوى</th>
          <th>المعدل التراكمي</th>
          <th>الحالة</th>
          <th>حذف | تعديل</th>
        </tr>
        @foreach ($all_std as $std_item )
        <tr>
          <td>{{$std_item->id}}</td>
            <td>{{$std_item->fullName}}</td>
            <td>{{$std_item->age}}</td>
            <td>{{$std_item->mobileNumber}}</td>
            <td>{{$std_item->level}}</td>
            <td>{{$std_item->gpa}}</td>
            @if ($std_item->active == 1)
              <td>فعال</td>
            @else
            <td>غير فعال</td>
            @endif
          <td style="display: flex ; ">
            {{-- <form action="{{route("students.destroy",$std_item)}}" method="post">
              @csrf
              @method("delete")
              <button class="btn_delete" type="submit">حذف</button>
            </form> --}}
            <a class="btn_delete" onclick="confiermDeleteStd({{$std_item->id }} , this)">حذف</a>
            <a class="btn_update" href="{{ route('students.edit', $std_item) }}">تعديل</a>
          </td>
        </tr>
        @endforeach
      </table>
</div>
@endsection
@section("javascript")
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{asset("js/show_std.js")}}"></script>

  
@endsection