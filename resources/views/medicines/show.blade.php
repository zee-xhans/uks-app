<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold">Detail Pasien</h2>
    </x-slot>

    <div class="p-4">
        <div class="mb-4">
            <strong>Nama:</strong> {{ $patient->name }}
        </div>
        <div class="mb-4">
            <strong>Kelas:</strong> {{ $patient->class }}
        </div>
        <div class="mb-4">
            <strong>Keluhan:</strong> {{ $patient->complaint }}
        </div>
        <div class="mb-4">
            <strong>Tanggal Kunjungan:</strong> {{ $patient->visit_date }}
        </div>
        <div class="mb-4">
            <strong>Obat yang diberikan:</strong>
            @foreach ($patient->medicines as $medicine)
                <span class="inline-block bg-green-100 text-green-800 text-sm px-2 py-1 rounded mr-1 mb-1">{{ $medicine->name }}</span>
            @endforeach
        </div>
        <a href="{{ route('patients.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Kembali</a>
    </div>
</x-app-layout>