<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presensi Smart-System | PaaS Project</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap');
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-[#f8fafc] min-h-screen antialiased text-slate-900">

    <nav class="bg-white border-b border-slate-200 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center gap-2">
                    <div class="bg-indigo-600 p-2 rounded-lg">
                        <i class="fas fa-fingerprint text-white text-xl"></i>
                    </div>
                    <span class="text-xl font-bold tracking-tight text-slate-800">PRESENSI<span class="text-indigo-600">SMART</span></span>
                </div>
                <div class="hidden md:flex items-center gap-6">
                    <div class="text-right">
                        <p class="text-xs font-bold text-slate-400 uppercase tracking-widest">Mahasiswa</p>
                        <p class="text-sm font-semibold text-slate-700">Naila Febriana</p>
                    </div>
                    <div class="h-8 w-[1px] bg-slate-200"></div>
                    <a href="/api/kesehatan" target="_blank" class="flex items-center gap-2 bg-emerald-50 text-emerald-600 px-4 py-2 rounded-full text-xs font-bold hover:bg-emerald-100 transition-all border border-emerald-200">
                        <span class="relative flex h-2 w-2">
                            <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                            <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
                        </span>
                        SERVER ACTIVE
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
            
            <div class="lg:col-span-4 space-y-6">
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
                    <div class="p-6 border-b border-slate-100 bg-slate-50/50">
                        <h2 class="text-sm font-bold text-slate-500 uppercase tracking-wider flex items-center gap-2">
                            <i class="fas fa-plus-circle text-indigo-500"></i> Form Input Presensi
                        </h2>
                    </div>

                    @if(session('sukses'))
                    <div class="mx-6 mt-4 p-4 bg-emerald-50 border border-emerald-100 rounded-xl flex items-center gap-3">
                        <i class="fas fa-check-circle text-emerald-500"></i>
                        <p class="text-sm text-emerald-700 font-medium">{{ session('sukses') }}</p>
                    </div>
                    @endif

                    <form action="/simpan-presensi" method="POST" class="p-6 space-y-5">
                        @csrf
                        <div class="space-y-1">
                            <label class="text-[11px] font-bold text-slate-400 uppercase ml-1">Informasi Mahasiswa</label>
                            <input type="text" name="nama_mahasiswa" placeholder="Nama Lengkap" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none transition-all placeholder:text-slate-400">
                            <input type="text" name="nim" placeholder="NIM" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none transition-all mt-2 placeholder:text-slate-400">
                        </div>

                        <div class="space-y-1">
                            <label class="text-[11px] font-bold text-slate-400 uppercase ml-1">Detail Perkuliahan</label>
                            <input type="text" name="mata_kuliah" placeholder="Mata Kuliah" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none transition-all placeholder:text-slate-400">
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="space-y-1">
                                <label class="text-[11px] font-bold text-slate-400 uppercase ml-1">Pertemuan</label>
                                <input type="number" name="pertemuan_ke" placeholder="Ke-" required class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none transition-all">
                            </div>
                            <div class="space-y-1">
                                <label class="text-[11px] font-bold text-slate-400 uppercase ml-1">Status</label>
                                <select name="status" class="w-full px-4 py-3 bg-slate-50 border border-slate-200 rounded-xl focus:ring-2 focus:ring-indigo-500/20 focus:border-indigo-500 outline-none appearance-none cursor-pointer">
                                    <option value="Hadir">Hadir</option>
                                    <option value="Izin">Izin</option>
                                    <option value="Sakit">Sakit</option>
                                    <option value="Alpa">Alpa</option>
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="w-full py-4 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-bold shadow-lg shadow-indigo-200 transition-all flex justify-center items-center gap-2 transform active:scale-95">
                            <i class="fas fa-paper-plane text-xs"></i> Submit Kehadiran
                        </button>
                    </form>
                </div>
                
                <div class="bg-indigo-900 rounded-2xl p-6 text-white shadow-xl shadow-indigo-100 relative overflow-hidden">
                    <div class="relative z-10">
                        <h3 class="font-bold text-lg mb-1 italic">Proyek PaaS 2026</h3>
                        <p class="text-indigo-200 text-xs leading-relaxed">Implementasi infrastruktur awan menggunakan Railway & Laravel untuk manajemen data presensi mahasiswa SI Telkom.</p>
                    </div>
                    <i class="fas fa-cloud-upload-alt absolute -right-4 -bottom-4 text-7xl text-white/10"></i>
                </div>
            </div>

            <div class="lg:col-span-8">
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
                    <div class="p-6 border-b border-slate-100 flex justify-between items-center">
                        <div>
                            <h2 class="text-lg font-bold text-slate-800">Riwayat Presensi</h2>
                            <p class="text-xs text-slate-400 font-medium">Data realtime dari database MySQL Railway</p>
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left">
                            <thead class="bg-slate-50/50 text-slate-400 uppercase text-[10px] font-bold tracking-widest border-b border-slate-100">
                                <tr>
                                    <th class="px-6 py-4">Informasi Mahasiswa</th>
                                    <th class="px-6 py-4">Mata Kuliah</th>
                                    <th class="px-6 py-4">Status</th>
                                    <th class="px-6 py-4">Waktu</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-slate-100">
                                @forelse($semuaPresensi as $p)
                                <tr class="hover:bg-slate-50/80 transition-all group">
                                    <td class="px-6 py-4">
                                        <div class="font-semibold text-slate-700 group-hover:text-indigo-600 transition-colors">{{ $p->nama_mahasiswa }}</div>
                                        <div class="text-[11px] text-slate-400">{{ $p->nim }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium text-slate-600">{{ $p->mata_kuliah }}</div>
                                        <div class="text-[10px] font-bold text-indigo-400">Pertemuan Ke-{{ $p->pertemuan_ke }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        @php
                                            $badge = [
                                                'Hadir' => 'bg-emerald-50 text-emerald-600 border-emerald-100',
                                                'Izin' => 'bg-amber-50 text-amber-600 border-amber-100',
                                                'Sakit' => 'bg-blue-50 text-blue-600 border-blue-100',
                                                'Alpa' => 'bg-rose-50 text-rose-600 border-rose-100',
                                            ][$p->status];
                                        @endphp
                                        <span class="px-3 py-1 rounded-full text-[10px] font-bold border {{ $badge }}">
                                            {{ strtoupper($p->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-slate-400 text-[11px]">
                                        <i class="far fa-clock mr-1"></i> {{ $p->created_at->diffForHumans() }}
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="py-20 text-center">
                                        <div class="flex flex-col items-center">
                                            <div class="bg-slate-50 h-16 w-16 rounded-full flex items-center justify-center mb-4">
                                                <i class="fas fa-database text-slate-200 text-2xl"></i>
                                            </div>
                                            <p class="text-slate-400 text-sm italic">Belum ada data terekam di database.</p>
                                        </div>
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </main>

    <footer class="max-w-7xl mx-auto px-4 py-10 border-t border-slate-200 mt-10">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4 text-slate-400 text-[11px] font-medium uppercase tracking-widest">
            <p>&copy; 2026 EIM Telkom University - Naila Febriana</p>
            <div class="flex gap-4">
                <span>Laravel 11</span>
                <span class="text-slate-200">|</span>
                <span>MySQL</span>
                <span class="text-slate-200">|</span>
                <span>Railway PaaS</span>
            </div>
        </div>
    </footer>

</body>
</html>