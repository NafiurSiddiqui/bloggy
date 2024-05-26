<th scope="col"
    class="px-2 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider hover:bg-gray-100 hover:text-gray-500 cursor-pointer border-x border-x-gray-200">
    <div class="flex justify-between" x-data="{ sort: false }" @click="sort = !sort">
        {{ $slot }}
        <div class ="flex flex-col items-center justify-center text-gray-400">
            <i class="fa-solid fa-arrow-down-short-wide" x-show="sort === false"></i>
            <i class="fa-solid fa-arrow-up-short-wide" x-show="sort === true"></i>
        </div>
    </div>
</th>
