<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">Edit Data Obat</h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('medicines.update', $medicine->id) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                            <!-- Medicine Name Field -->
                            <div class="sm:col-span-2">
                                <label for="name" class="block text-sm font-medium text-gray-700">Nama Obat</label>
                                <input type="text" id="name" name="name" value="{{ old('name', $medicine->name) }}"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    required>
                                @error('name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Stock Field -->
                            <div>
                                <label for="stock" class="block text-sm font-medium text-gray-700">Stok Tersedia</label>
                                <input type="number" id="stock" name="stock" value="{{ old('stock', $medicine->stock) }}"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    min="0" required>
                                @error('stock')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Expired Date Field -->
                            <div>
                                <label for="expired_date" class="block text-sm font-medium text-gray-700">Tanggal Kadaluarsa</label>
                                <input type="date" id="expired_date" name="expired_date" 
                                    value="{{ old('expired_date', $medicine->expired_date ? \Carbon\Carbon::parse($medicine->expired_date)->format('Y-m-d') : '') }}"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    required>
                                @error('expired_date')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Additional Fields (if any) -->
                        <!-- You can add more medicine-related fields here if needed -->

                        <!-- Form Actions -->
                        <div class="flex items-center justify-end pt-6 space-x-3 border-t border-gray-200">
                            <a href="{{ route('medicines.index') }}"
                                class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Batal
                            </a>
                            <button type="submit"
                                class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2 -ml-1" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                </svg>
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Date validation to prevent selecting past dates
                const expiredDateInput = document.getElementById('expired_date');
                if (expiredDateInput) {
                    const today = new Date().toISOString().split('T')[0];
                    expiredDateInput.min = today;
                    
                    // You can also add a visual date picker here if needed
                    // flatpickr(expiredDateInput, {
                    //     dateFormat: 'Y-m-d',
                    //     minDate: 'today'
                    // });
                }
            });
        </script>
    @endpush
</x-app-layout>