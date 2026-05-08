<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Presensi Kelas - Naila Febriana</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-slate-50 min-h-screen">

    <nav class="bg-indigo-600 p-4 shadow-lg">
        <div class="container mx-auto flex justify-between items-center text-white">
            <h1 class="text-xl font-bold"><i class="fas fa-university mr-2"></i> Presensi SI Telkom</h1>
            <span class="text-sm opacity-80">Naila Febriana | PaaS Deployment</span>
        </div>
    </nav>

    <div class="container mx-auto py-8 px-4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            
            <div class="lg:col-span-1">
                <div class="bg-white p-6 rounded-xl shadow-md border-t-4 border-indigo-500">
                    <h2 class="text-xl font-semibold mb-6 text-slate-700 font-bold uppercase tracking-wider text-sm italic">
                        <i class="fas fa-user-edit mr-2 text-indigo-500"></i> Input Kehadiran
                    </h2>

                    @if(session('sukses'))
                        <div class="bg-emerald-100 text-emerald-700 p-3 rounded-lg mb-4 text-sm font-medium">
                            {{ session('sukses') }}
                        </div>
                    @endif

                    <form action="/simpan-presensi" method="POST" class="space-y-4">
                        @csrf
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase mb-1">Nama Mahasiswa</label>
                            <input type="text" name="nama_mahasiswa" required class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-indigo-400 outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase mb-1">NIM</label>
                            <input type="text" name="nim" required class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-indigo-400 outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-500 uppercase mb-1">Mata Kuliah</label>
                            <input type="text" name="mata_kuliah" required class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-indigo-400 outline-none">
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-xs font-bold text-slate-500 uppercase mb-1">Pertemuan</label>
                                <input type="number" name="pertemuan_ke" required class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-indigo-400 outline-none">
                            </div>
                            <div>
                                <label class="block text-xs font-bold text-slate-500 uppercase mb-1">Status</label>
                                <select name="status" class="w-full p-2 border rounded-lg focus:ring-2 focus:ring-indigo-400 outline-none bg-white">
                                    <option value="Hadir">Hadir</option>
                                    <option value="Izin">Izin</option>
                                    <option value="Sakit">Sakit</option>
                                    <option value="Alpa">Alpa</option>
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 rounded-lg transition-all shadow-md">
                            <i class="fas fa-save mr-2"></i> SIMPAN DATA
                        </button>
                    </form>
                </div>
            </div>

            <div class="lg:col-span-2">
                <div class="bg-white rounded-xl shadow-md overflow-hidden">
                    <div class="p-5 border-b flex justify-between items-center bg-slate-50">
                        <h2 class="font-bold text-slate-700 italic"><i class="fas fa-list-ul mr-2 text-indigo-500"></i> Rekap Presensi Terbaru</h2>
                        <a href="/api/kesehatan" target="_blank" class="text-xs bg-slate-200 hover:bg-slate-300 px-3 py-1 rounded-full text-slate-600 font-bold transition-all">
                           <i class="fas fa-heartbeat mr-1"></i> API STATUS
                        </a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-left text-sm">
                            <thead class="bg-slate-100 text-slate-600 uppercase text-xs font-bold">
                                <tr>
                                    <th class="p-4">Mahasiswa</th>
                                    <th class="p-4">MK / Pertemuan</th>
                                    <th class="p-4">Status</th>
                                    <th class="p-4 text-center">Waktu</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y">
                                @forelse($semuaPresensi as $p)
                                <tr class="hover:bg-indigo-50 transition-colors">
                                    <td class="p-4">
                                        <div class="font-bold text-slate-800">{{ $p->nama_mahasiswa }}</div>
                                        <div class="text-xs text-slate-500">{{ $p->nim }}</div>
                                    </td>
                                    <td class="p-4">
                                        <div class="text-slate-700">{{ $p->mata_kuliah }}</div>
                                        <div class="text-[10px] bg-indigo-100 text-indigo-600 px-2 py-0.5 rounded inline-block font-bold mt-1">P-{{ $p->pertemuan_ke }}</div>
                                    </td>
                                    <td class="p-4">
                                        @php
                                            $color = [
                                                'Hadir' => 'text-emerald-600 bg-emerald-50 border-emerald-200',
                                                'Izin' => 'text-amber-600 bg-amber-50 border-amber-200',
                                                'Sakit' => 'text-blue-600 bg-blue-50 border-blue-200',
                                                'Alpa' => 'text-rose-600 bg-rose-50 border-rose-200',
                                            ][$p->status];
                                        @endphp
                                        <span class="px-3 py-1 rounded-full text-[11px] font-bold border {{ $color }}">
                                            {{ strtoupper($p->status) }}
                                        </span>
                                    </td>
                                    <td class="p-4 text-center text-slate-400 text-xs">
                                        {{ $p->created_at->diffForHumans() }}
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="p-10 text-center text-slate-400 italic">Belum ada data presensi.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <footer class="text-center text-slate-400 text-xs py-8">
        &copy; 2026 - Tugas Mandiri Infrastruktur Awan | Naila Febriana | SI Telkom University
    </footer>

</body>
</html>