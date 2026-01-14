@extends('layouts.staff')

@section('title', 'Detail Pengaduan')

@section('content')

    <div style="margin-bottom: 20px;">
        <a href="{{ route('staff.pengaduan.index') }}" class="btn" style="background: #6c757d; color: white;">
            ← Kembali ke Daftar
        </a>
    </div>

    <div class="card">
        <div class="card-header" style="background: #007bff; color: white; padding: 15px; border-radius: 8px 8px 0 0;">
            <h3 style="margin: 0;">📄 Detail Pengaduan</h3>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <!-- Info Pengaduan -->
            <div style="margin-bottom: 30px;">
                <table style="width: 100%;">
                    <tr>
                        <td style="padding: 8px; width: 200px; font-weight: bold;">Kode Pengaduan</td>
                        <td style="padding: 8px;">: {{ $pengaduan->kode_pengaduan }}</td>
                    </tr>
                    <tr>
                        <td style="padding: 8px; font-weight: bold;">Tanggal Lapor</td>
                        <td style="padding: 8px;">: {{ $pengaduan->created_at->format('d F Y, H:i') }} WIB</td>
                    </tr>
                    <tr>
                        <td style="padding: 8px; font-weight: bold;">Pelapor</td>
                        <td style="padding: 8px;">
                            :
                            @if($pengaduan->user)
                                {{ $pengaduan->user->name }}
                                ({{ $pengaduan->user->email }})
                            @else
                                {{ $pengaduan->nama_pelapor ?? 'Guest' }}
                            @endif
                        </td>
                    </tr>

                  <tr>
                    <td style="padding: 8px; font-weight: bold;">Keterangan</td>
                    <td style="padding: 8px;">
                        : {{ Str::between($pengaduan->isi_laporan, 'LOKASI:', '|LAPORAN:') ?: '-' }}
                    </td>
                </tr>

                    <tr>
                        <td style="padding: 8px; font-weight: bold;">Status</td>
                        <td style="padding: 8px;">
                            @if($pengaduan->status == 'pending')
                                <span style="background: #ffc107; color: white; padding: 5px 15px; border-radius: 4px;">⏳
                                    Menunggu</span>
                            @elseif($pengaduan->status == 'proses')
                                <span style="background: #17a2b8; color: white; padding: 5px 15px; border-radius: 4px;">⚙️
                                    Diproses</span>
                            @elseif($pengaduan->status == 'selesai')
                                <span style="background: #28a745; color: white; padding: 5px 15px; border-radius: 4px;">✅
                                    Selesai</span>
                            @else
                                <span style="background: #dc3545; color: white; padding: 5px 15px; border-radius: 4px;">❌
                                    Ditolak</span>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>

            <!-- Isi Laporan -->
            <div style="margin-bottom: 30px;">
                <h4>📝 Isi Laporan</h4>
                <div style="background: #f8f9fa; padding: 15px; border-radius: 4px; margin-top: 10px;">
                    <p style="margin-top: 10px; white-space: pre-wrap;">
                        {{ $pengaduan->isi ?? '-' }}
                    </p>
                </div>
            </div>

            <!-- Foto -->
            @if(!empty($pengaduan->foto))
                <div style="margin-bottom: 30px;">
                    <h4>📷 Foto Pendukung</h4>
                    <img src="{{ asset('storage/' . $pengaduan->foto) }}" alt="Foto Pengaduan"
                        style="max-width: 500px; border-radius: 8px; margin-top: 10px;">
                </div>
            @endif

            <!-- Tanggapan -->
            @if(!empty($pengaduan->tanggapan))
                <div style="margin-bottom: 30px; background: #e7f3ff; padding: 20px; border-radius: 8px;">
                    <h4>💬 Tanggapan Staff</h4>
                    <p><strong>Ditanggapi oleh:</strong> {{ optional(optional($pengaduan->staff)->user)->name ?? 'Staff' }}</p>
                    <p><strong>Tanggal:</strong> {{ optional($pengaduan->tanggal_tanggapan)->format('d F Y, H:i') ?? '-' }} WIB
                    </p>
                    <p style="margin-top: 10px; white-space: pre-wrap;">{{ $pengaduan->tanggapan }}</p>
                </div>
            @else
                <!-- Form Tanggapan -->
                <div style="background: #fff3cd; padding: 20px; border-radius: 8px;">
                    <h4>💬 Berikan Tanggapan</h4>

                    @if($errors->any())
                        <div class="alert alert-danger" style="margin-top: 15px;">
                            <ul style="margin: 0; padding-left: 20px;">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('staff.pengaduan.balas', $pengaduan->id) }}" method="POST" style="margin-top: 15px;">
                        @csrf

                        <div class="form-group">
                            <label>Status <span style="color: red;">*</span></label>
                            <select name="status" class="form-control" required>
                                <option value="">Pilih Status</option>
                                <option value="proses">⚙️ Sedang Diproses</option>
                                <option value="selesai">✅ Selesai</option>
                                <option value="ditolak">❌ Ditolak</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Tanggapan <span style="color: red;">*</span></label>
                            <textarea name="tanggapan" class="form-control" rows="5" required
                                placeholder="Tuliskan tanggapan Anda terhadap pengaduan ini...">{{ old('tanggapan') }}</textarea>
                            <small style="color: #666;">Minimal 10 karakter</small>
                        </div>

                        <button type="submit" class="btn btn-primary" style="margin-top: 10px;">
                            📤 Kirim Tanggapan
                        </button>
                    </form>
                </div>
            @endif
        </div>

    </div>
@endsection