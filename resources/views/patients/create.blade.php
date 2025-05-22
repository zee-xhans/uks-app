<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">Tambah Pasien Baru</h2>
    </x-slot>

    <div class="py-6">
        <div class="mx-auto max-w-3xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('patients.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                            <!-- Name Field -->
                            <div class="sm:col-span-2">
                                <label for="name" class="block text-sm font-medium text-gray-700">Nama Pasien</label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    required>
                                @error('name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Class Field -->
                            <div>
                                <label for="class" class="block text-sm font-medium text-gray-700">Kelas</label>
                                <input type="text" id="class" name="class" value="{{ old('class') }}"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    required>
                                @error('class')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Visit Date Field -->
                            <div>
                                <label for="visit_date" class="block text-sm font-medium text-gray-700">Tanggal Kunjungan</label>
                                <input type="date" id="visit_date" name="visit_date" value="{{ old('visit_date', now()->format('Y-m-d')) }}"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    required>
                                @error('visit_date')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Complaint Field -->
                            <div class="sm:col-span-2">
                                <label for="complaint" class="block text-sm font-medium text-gray-700">Keluhan</label>
                                <textarea id="complaint" name="complaint" rows="3"
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                    required>{{ old('complaint') }}</textarea>
                                @error('complaint')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Medicines Field -->
                            <div class="sm:col-span-2">
                                <label for="medicines" class="block text-sm font-medium text-gray-700">Obat yang diberikan</label>
                                <select id="medicines" name="medicines[]" multiple
                                    class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @foreach ($medicines as $medicine)
                                        <option value="{{ $medicine->id }}" {{ in_array($medicine->id, old('medicines', [])) ? 'selected' : '' }}>
                                            {{ $medicine->name }} ({{ $medicine->stock }} tersedia)
                                        </option>
                                    @endforeach
                                </select>
                                <p class="mt-1 text-sm text-gray-500">Tekan Ctrl/Cmd untuk memilih multiple obat</p>
                                @error('medicines')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Form Actions -->
                        <div class="flex justify-end space-x-3">
                            <a href="{{ route('patients.index') }}"
                                class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Batal
                            </a>
                            <button type="submit"
                                class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Simpan Data Pasien
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            // Add date picker functionality or other JavaScript here if needed
            document.addEventListener('DOMContentLoaded', function() {
                // You can initialize date pickers or other UI enhancements here
                // For example using flatpickr:
                // flatpickr('#visit_date', { dateFormat: 'Y-m-d' });
            });
        </script>
    @endpush
</x-app-layout>