@extends('layouts.staff')

@section('title', 'Daftar Pengaduan')

@section('content')

    <div class="card">
        <div class="card-header" style="background: #007bff; color: white; padding: 15px; border-radius: 8px 8px 0 0;">
            <h3 style="margin: 0;">📋 Daftar Pengaduan Masyarakat</h3>
        </div>
        
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <!-- Filter & Search -->
            <form method="GET" style="margin-bottom: 20px; display: flex; gap: 10px;">
                <select name="status" class="form-control" style="width: 200px;">
                    <option value="">Semua Status</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Menunggu</option>
                    <option value="proses" {{ request('status') == 'proses' ? 'selected' : '' }}>Diproses</option>
                    <option value="selesai" {{ request('status') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                    <option value="ditolak" {{ request('status') == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                </select>

                <input type="text" name="search" class="form-control" placeholder="Cari kode/judul/pelapor..."
                    value="{{ request('search') }}" style="flex: 1;">

                <button type="submit" class="btn btn-primary">🔍 Cari</button>
                <a href="{{ route('staff.pengaduan.index') }}" class="btn"
                    style="background: #6c757d; color: white;">Reset</a>
            </form>

            @if($pengaduan->count() > 0)
                <div style="overflow-x: auto;">
                    <table style="width: 100%; border-collapse: collapse;">
                        <thead>
                            <tr style="background: #f8f9fa; border-bottom: 2px solid #dee2e6;">
                                <th style="padding: 12px;">No</th>
                                <th style="padding: 12px;">Kode</th>
                                <th style="padding: 12px;">Tanggal</th>
                                <th style="padding: 12px;">Pelapor</th>
                                <th style="padding: 12px;">Kategori</th>
                                <th style="padding: 12px;">Judul</th>
                                <th style="padding: 12px; text-align: center;">Status</th>
                                <th style="padding: 12px; text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pengaduan as $index => $item)
                                <tr style="border-bottom: 1px solid #dee2e6;">
                                    <td style="padding: 12px;">{{ $pengaduan->firstItem() + $index }}</td>
                                    <td style="padding: 12px;"><strong>{{ $item->kode_pengaduan }}</strong></td>
                                    <td style="padding: 12px;">{{ $item->created_at->format('d/m/Y H:i') }}</td>

                                    <!-- ✅ FIX: Pelapor -->
                                    <td style="padding: 12px;">
                                        {{ optional($item->user)->name ?? 'Guest' }}
                                    </td>

                                    <!-- ✅ FIX: Kategori -->
                                    <td style="padding: 12px;">
                                        {{ optional($item->category)->nama_kategori ?? '-' }}
                                    </td>

                                    <td style="padding: 12px;">{{ Str::limit($item->judul, 40) }}</td>
                                    <td style="padding: 12px; text-align: center;">
                                        @if($item->status == 'pending')
                                            <span
                                                style="background: #ffc107; color: white; padding: 5px 10px; border-radius: 4px; font-size: 12px;">⏳
                                                Menunggu</span>
                                        @elseif($item->status == 'proses')
                                            <span
                                                style="background: #17a2b8; color: white; padding: 5px 10px; border-radius: 4px; font-size: 12px;">⚙️
                                                Diproses</span>
                                        @elseif($item->status == 'selesai')
                                            <span
                                                style="background: #28a745; color: white; padding: 5px 10px; border-radius: 4px; font-size: 12px;">✅
                                                Selesai</span>
                                        @else
                                            <span
                                                style="background: #dc3545; color: white; padding: 5px 10px; border-radius: 4px; font-size: 12px;">❌
                                                Ditolak</span>
                                        @endif
                                    </td>
                                    <td style="padding: 12px; text-align: center;">
                                        <a href="{{ route('staff.pengaduan.show', $item->id) }}" class="btn btn-primary"
                                            style="padding: 5px 15px; font-size: 14px;">
                                            👁️ Lihat
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div style="margin-top: 20px;">
                    {{ $pengaduan->links() }}
                </div>
            @else
                <p style="text-align: center; color: #666; padding: 40px;">
                    📭 Tidak ada pengaduan yang ditemukan
                </p>
            @endif
        </div>

    </div>
@endsection