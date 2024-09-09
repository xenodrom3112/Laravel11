<x-layout>
    {{-- * Slot dalam Blade Laravel adalah placeholder yang memungkinkan Anda menyuntikkan konten dinamis ke dalam komponen. Misalnya, dalam komponen layout (`<x-layout>`), Anda dapat menggunakan slot seperti `<x-slot:title>` untuk menyisipkan judul halaman yang dinamis. Slot ini memudahkan penggunaan kembali komponen dengan konten yang berbeda tanpa harus mengubah struktur dasarnya, sehingga membuat template menjadi lebih modular dan mudah dikelola.  --}}
    <x-slot:title>{{ $title }}</x-slot:title>
    <h1 class="text-2xl">ini adalah halaman homepage</h1>
</x-layout>