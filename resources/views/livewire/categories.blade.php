<div>
    <div class="flex flex-row justify-between">
        <div class="">
            <button wire:click.prevent="createKategori()"
                    type="button"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                Tambah Kateogori
            </button>

        </div>
        @if ($is_create)
            @include('livewire.pages.kategori._modalCreateKategori')
        @endif

        {{-- @if ($is_edit)
            @include('livewire.pages.kategori._modalEditKategori')
        @endif --}}

        {{-- @if ($isCreateReplyPost)

            @include('livewire.pages.posts._modalCreatePostComment')
        @endif --}}
    </div>
    <div class="pt-2">


<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    #
                </th>
                <th scope="col" class="px-6 py-3">
                    Nama Kategori
                </th>
                <th scope="col" class="px-6 py-3">
                    Created by
                </th>
                <th scope="col" class="px-6 py-3">
                    Created at
                </th>
                <th scope="col" class="px-6 py-3">
                    {{-- <span class="sr-only">Edit</span> --}}
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($listCategory as $category)
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="px-6 py-4">
                        {{ $loop->iteration }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $category->name }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $category->created_by }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $category->created_at }}
                    </td>
                    <td class="px-6 py-4 text-right">
                        <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                    </td>
                </tr>
            @empty
                <div class="mt-2 border">
                    <p> Tidak ada Kategori</p>
                </div>
            @endforelse
        </tbody>
    </table>
</div>

        {{-- @forelse ($listKategori as $categori)

        @empty
            <p> Tidak ada posting atau Koment yang anda sukai..</p>
        @endforelse --}}
    </div>
</div>
