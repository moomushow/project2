@extends('admin.layouts.master')
@section('title', 'จัดการหมวดหมู่')
@section('content')
    <h1>จัดการหมวดหมู่</h1>
    <a href="{{ route('admin.category.create') }}" class="btn btn-success">สร้างหมวดหมู่</a>

    <table class="table table-bordered table-striped mt-4">
        <thead>
            <tr>
                <th>ลำดับ</th>
                <th>ชื่อหมวดหมู่</th>
                <th>จัดการ</th>
            </tr>
        </thead>
        <tbody>
            @if ($categories->isEmpty())
                <tr>
                    <td colspan="2" class="text-center">ไม่มีข้อมูล</td>
                </tr>
            @endif
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="/admin/category/edit/{{ $category->id }}" class="btn btn-warning">แก้ไข</a>
                        <form action="/admin/category/destroy/{{ $category->id }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('คุณต้องการลบหมวดหมู่นี้ใช่หรือไม่?')">ลบ</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
