<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="text-2xl font-semibold leading-tight text-gray-800">Tambah Obat Baru</h2>
            <div class="text-sm text-gray-500">
                <span class="text-red-500">*</span> Menandakan field wajib diisi
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-4xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-xl sm:rounded-lg">
                <div class="p-8 bg-white border-b border-gray-200">
                    <form action="{{ route('medicines.store') }}" method="POST" class="space-y-8">
                        @csrf

                        <div class="grid grid-cols-1 gap-8 sm:grid-cols-2">
                            <!-- Medicine Name Field -->
                            <div class="sm:col-span-2">
                                <label for="name" class="block text-sm font-medium text-gray-700">
                                    Nama Obat <span class="text-red-500">*</span>
                                </label>
                                <div class="relative mt-1 rounded-md shadow-sm">
                                    <input type="text" id="name" name="name" value="{{ old('name') }}"
                                        class="block w-full rounded-md border-gray-300 pl-4 pr-10 py-3 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        placeholder="Paracetamol 500mg"
                                        required>
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2h-1V9z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                                @error('name')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                <p class="mt-1 text-xs text-gray-500">Masukkan nama obat lengkap dengan dosis (jika ada)</p>
                            </div>

                            <!-- Stock Field -->
                            <div>
                                <label for="stock" class="block text-sm font-medium text-gray-700">
                                    Stok Awal <span class="text-red-500">*</span>
                                </label>
                                <div class="relative mt-1 rounded-md shadow-sm">
                                    <input type="number" id="stock" name="stock" value="{{ old('stock') }}"
                                        class="block w-full rounded-md border-gray-300 pl-4 pr-10 py-3 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        min="0" 
                                        placeholder="100"
                                        required>
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                        <span class="text-gray-500 sm:text-sm">box</span>
                                    </div>
                                </div>
                                @error('stock')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                <p class="mt-1 text-xs text-gray-500">Masukkan jumlah stok awal obat</p>
                            </div>

                            <!-- Expired Date Field -->
                            <div>
                                <label for="expired_date" class="block text-sm font-medium text-gray-700">
                                    Tanggal Kadaluarsa <span class="text-red-500">*</span>
                                </label>
                                <div class="relative mt-1 rounded-md shadow-sm">
                                    <input type="date" id="expired_date" name="expired_date" 
                                        value="{{ old('expired_date') }}"
                                        class="block w-full rounded-md border-gray-300 pl-4 pr-10 py-3 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                        min="{{ now()->format('Y-m-d') }}"
                                        required>
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                </div>
                                @error('expired_date')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                                <p class="mt-1 text-xs text-gray-500">Pilih tanggal kadaluarsa obat</p>
                            </div>

                            <!-- Additional Information (optional) -->
                            <div class="sm:col-span-2">
                                <label for="description" class="block text-sm font-medium text-gray-700">
                                    Keterangan Tambahan
                                </label>
                                <textarea id="description" name="description" rows="2"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    placeholder="Catatan khusus tentang obat">{{ old('description') }}</textarea>
                                <p class="mt-1 text-xs text-gray-500">Opsional: Masukkan informasi tambahan jika diperlukan</p>
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="flex items-center justify-between pt-8 mt-8 border-t border-gray-200">
                            <div class="text-sm text-gray-500">
                                Pastikan semua data yang dimasukkan sudah benar
                            </div>
                            <div class="flex space-x-3">
                                <button type="reset"
                                    class="px-6 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-lg shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    Reset Form
                                </button>
                                <button type="submit"
                                    class="inline-flex items-center justify-center px-6 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-lg shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 -ml-1" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                    Simpan Obat
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Set minimum date to today for expired date
                const today = new Date().toISOString().split('T')[0];
                document.getElementById('expired_date').min = today;
                
                // You can initialize a date picker here if needed
                // flatpickr('#expired_date', {
                //     dateFormat: 'Y-m-d',
                //     minDate: 'today'
                // });
            });
        </script>
    @endpush
</x-app-layout>