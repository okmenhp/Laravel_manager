@extends('index')
@section('content')
    <div class="row">
        <div class="col-md-7">
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Tài khoản</th>
                    <th>Họ tên</th>
                    <th>Mật khẩu</th>
                    <th>Địa chỉ</th>
                    <th>Tác vụ</th>
                </tr>
            
                @foreach ($manager as $count => $item)
                    <tr>
                    <td>{{ $count + 1 }}</td>
                    <td>{{ $item->username }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->password }}</td>
                    <td>{{ $item->address }}</td>
                    <td>
                        <a href="{{ route('admin.user.edit',$item->id) }}" class="btn btn-warning">Sửa</a>
                        <form action="{{ route('admin.user.destroy', $item->id) }}" method="POST" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger">Xóa</button>
                        </form>
                    </td>
                    </tr>
                @endforeach
            </table>
            @if(session('delete'))
                <div class="alert alert-success mt-3">
                    {{ session('delete') }}
                    <button type="button" class="close" data-dismiss="alert">
                        <span>×</span><span class="sr-only">Close</span>
                    </button>
                </div>
            @endif
          {{ $manager->links() }}
        </div>

        <div class="col-md-5">
            <h3 class="text-center mb-4">Nhập thông tin</h3>
            <form action="{{ route('admin.user.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <input type="text" name="username" id="username" class="form-control" required placeholder="Nhập tài khoản">
                </div>

                <div class="form-group">
                    <input type="text" name="name" id="name" class="form-control" required placeholder="Nhập họ tên">
                </div>

                <div class="form-group">
                    <input type="text" name="password" id="password" class="form-control" required placeholder="Nhập mật khẩu">
                </div>

                <div class="form-group">
                    <input type="text" name="address" id="address" class="form-control" required placeholder="Nhập địa chỉ">
                </div>
                <button type="submit" class="btn btn-success btn-block">Thêm</button>

            </form>
            @if(session('success'))
                <div class="alert alert-success mt-3">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert">
                        <span>×</span><span class="sr-only">Close</span>
                    </button>
                </div>
            @endif
        </div>
    </div>
@endsection