<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>
    <ul class="pt-8 font-bold text-lg flex flex-col gap-4">
        @foreach ($nomors as $nomor)    
            <li>{{ $nomor['nomor'] }}</li>
        @endforeach
    </ul>
</x-layout>