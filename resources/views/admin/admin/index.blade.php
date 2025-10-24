@extends('layouts.superadmin')

@section('content')
<style>
.alert {
  padding: 14px 18px;
  border-radius: 8px;
  font-size: 15px;
  margin-bottom: 16px;
  position: relative;
  animation: fadeIn 0.3s ease-in-out;
}

.alert-success {
  background-color: #d1f7d6;
  border: 1px solid #42ba96;
  color: #256f54;
}

.alert-danger {
  background-color: #f8d7da;
  border: 1px solid #dc3545;
  color: #842029;
}

.alert button.close-btn {
  position: absolute;
  top: 8px;
  right: 10px;
  border: none;
  background: transparent;
  font-size: 18px;
  cursor: pointer;
  color: inherit;
}

@keyframes fadeIn {
  from { opacity: 0; transform: translateY(-5px); }
  to { opacity: 1; transform: translateY(0); }
}
</style>

<div class="container py-4">
    <h1 class="h4 fw-bold mb-4">Manajemen Admin</h1>

    {{-- Flash messages --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="mb-3">
        <a href="{{ route('admin.admin.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> Tambah Admin
        </a>
    </div>

    <div class="table-responsive bg-white rounded shadow-sm">
        <table class="table table-bordered table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($admins as $admin)
                <tr>
                    <td>{{ $admin->nama }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>
                        <span class="badge bg-secondary text-capitalize">{{ $admin->role }}</span>
                    </td>
                    <td class="text-center">
                        <a href="{{ route('admin.admin.edit', $admin->id) }}" 
                           class="btn btn-sm btn-info text-white me-1">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('admin.admin.destroy', $admin->id) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Hapus admin ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">
                                <i class="fas fa-trash-alt"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
