@if (in_array(auth()->guard('admin')->user()->role, ['superadmin', 'admin_dinas']))
    <form action="{{ route('admin.pengajuan.updateBidang', $pengajuan->id) }}" method="POST" class="mb-3">
        @csrf
        @method('PATCH')

        <label for="databidang_id" class="form-label">Pilih Bidang</label>
        <select name="databidang_id" id="databidang_id" class="form-select" required>
            @foreach ($listBidang as $bidang)
                <option value="{{ $bidang->id }}" {{ $pengajuan->databidang_id == $bidang->id ? 'selected' : '' }}>
                    {{ $bidang->nama }}
                </option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-primary mt-2">Simpan Bidang</button>
    </form>
@endif