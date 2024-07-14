@extends('admin.layout.masterad')

@section('content')
<style>
    .content{
        margin-top: -70px;
    }
</style>
<div class="content">
    <h1>Data Pengguna</h1>
    
    <div class="table-wrapper">
        <table id="usersTable" class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                <th>No</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>No Telepon</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                <td>{{ $loop->iteration }}</td>
                    <td>{{ $user->nama }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->telepon }}</td>
                    <td>
                    <a class="btn btn-danger ml-3" href="/destroy/{{$user->id}}" role="button" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>



<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/admin/fresh.js') }}"></script>

@endsection
