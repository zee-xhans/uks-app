<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard OSBQ UKS') }}
            </h2>
            <div class="text-sm text-gray-500">
                {{ now()->format('l, d F Y') }}
            </div>
        </div>
    </x-slot>

    <div class="py-6 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <!-- Welcome Banner -->
            <div class="bg-gradient-to-r from-blue-500 to-blue-700 rounded-lg p-6 mb-6 text-white shadow-lg">
                <h1 class="text-2xl font-bold mb-2">Selamat Datang di Sistem OSBQ UKS!</h1>
                <p class="mb-4">Sistem manajemen pasien dan obat Unit Kesehatan Sekolah OSBQ</p>
                <div class="flex space-x-4">
                    <div class="bg-white bg-opacity-20 p-3 rounded-lg">
                        <p class="text-sm">Total Pasien</p>
                        <p class="text-xl font-bold">{{ $totalPatients }}</p>
                    </div>
                    <div class="bg-white bg-opacity-20 p-3 rounded-lg">
                        <p class="text-sm">Total Obat Tersedia</p>
                        <p class="text-xl font-bold">{{ $totalMedicines }}</p>
                    </div>
                    <div class="bg-white bg-opacity-20 p-3 rounded-lg">
                        <p class="text-sm">Kunjungan Hari Ini</p>
                        <p class="text-xl font-bold">{{ $todayCount }}</p>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="mb-8">
                <h3 class="text-lg font-medium text-gray-900 mb-4">Aksi Cepat</h3>
                <div class="flex space-x-4">
                    <a href="{{ route('patients.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg shadow flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                        </svg>
                        Kelola Pasien
                    </a>
                    <a href="{{ route('medicines.index') }}" class="bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg shadow flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2h-1V9z" clip-rule="evenodd" />
                        </svg>
                        Kelola Obat
                    </a>
                    <a href="#" class="bg-purple-600 hover:bg-purple-700 text-white px-6 py-3 rounded-lg shadow flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                            <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" clip-rule="evenodd" />
                        </svg>
                        Laporan Bulanan
                    </a>
                </div>
            </div>

            <!-- Information Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Health Tips -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="font-medium text-lg text-blue-600 mb-3">Tips Kesehatan Hari Ini</h3>
                    <div class="space-y-3">
                        <div class="flex items-start">
                            <div class="flex-shrink-0 h-5 w-5 text-green-500 mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <p class="ml-2 text-sm text-gray-600">Minum air putih 8 gelas sehari untuk menjaga hidrasi tubuh</p>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0 h-5 w-5 text-green-500 mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <p class="ml-2 text-sm text-gray-600">Cuci tangan secara rutin untuk mencegah penyebaran penyakit</p>
                        </div>
                        <div class="flex items-start">
                            <div class="flex-shrink-0 h-5 w-5 text-green-500 mt-1">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <p class="ml-2 text-sm text-gray-600">Istirahat yang cukup untuk menjaga daya tahan tubuh</p>
                        </div>
                    </div>
                </div>

                <!-- Recent Activities -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="font-medium text-lg text-blue-600 mb-3">Aktivitas Terkini</h3>
                    <div class="space-y-4">
                        <div>
                            <p class="text-sm font-medium">Pemeriksaan rutin kelas 7</p>
                            <p class="text-xs text-gray-500">Hari ini, 08:30 - 10:00</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium">Distribusi vitamin A</p>
                            <p class="text-xs text-gray-500">Besok, 09:00 - 11:00</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium">Penyuluhan kesehatan mental</p>
                            <p class="text-xs text-gray-500">Jumat depan, 13:00 - 15:00</p>
                        </div>
                    </div>
                </div>

                <!-- Medicine Stock Alert -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="font-medium text-lg text-blue-600 mb-3">Stok Obat</h3>
                    <div class="space-y-3">
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-sm font-medium">Paracetamol</span>
                                <span class="text-xs text-gray-500">15/50</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-yellow-500 h-2 rounded-full" style="width: 30%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-sm font-medium">Oralit</span>
                                <span class="text-xs text-gray-500">5/30</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-red-500 h-2 rounded-full" style="width: 16%"></div>
                            </div>
                        </div>
                        <div>
                            <div class="flex justify-between mb-1">
                                <span class="text-sm font-medium">Vitamin C</span>
                                <span class="text-xs text-gray-500">42/50</span>
                            </div>
                            <div class="w-full bg-gray-200 rounded-full h-2">
                                <div class="bg-green-500 h-2 rounded-full" style="width: 84%"></div>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('medicines.index') }}" class="mt-4 inline-block text-sm text-blue-600 hover:underline">Lihat semua stok obat →</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>