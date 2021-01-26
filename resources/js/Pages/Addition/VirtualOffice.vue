<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                List Virtual Office
            </h2>
        </template>


        <div class="pt-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-12 gap-4 py-4 items-center">

                    <div class="col-span-12 text-gray-700 items-center">
                        <div class="grid grid-cols-12 gap-4">
                            <div class="col-span-12 gap-y-4 flex flex-wrap md:flex-nowrap">

                                <div class="flex-grow-0">

                                    <div class="grid grid-flow-col auto-cols-max md:auto-cols-min gap-4">
                                        <div class="flex">
                                            <div @click="prevPage" class="h-10 w-10 mr-1 flex justify-center items-center rounded-full bg-white hover:bg-gray-100 cursor-pointer shadow-md">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left w-4 h-4">
                                                    <polyline points="15 18 9 12 15 6"></polyline>
                                                </svg>
                                            </div>
                                            <div class="min-w-max w-10 h-10 flex justify-center items-center cursor-pointer leading-5 transition duration-150 ease-in rounded-full bg-yellow-600 text-white select-none text-sm">{{currentPage}}/{{totalPages}}</div>
                                            <div @click="nextPage" class="h-10 w-10 ml-1 flex justify-center items-center rounded-full bg-white hover:bg-gray-100 cursor-pointer shadow-md">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right w-4 h-4">
                                                    <polyline points="9 18 15 12 9 6"></polyline>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="group inline-block relative">
                                            <ul class="z-10 absolute inset-x-0 top-4 pt-6 hidden group-hover:block text-gray-700">
                                                <div class="shadow-lg rounded-full">
                                                    <li v-for="(item,index) in itemsPerPageList" :key="index">
                                                        <button @click="changeItemsPerPage(item.value)" :class="{'bg-gray-100': itemsPerPage===item.value, 'rounded-t-full': index===0, 'rounded-b-full': index===itemsPerPageList.length-1}" class="bg-white hover:bg-gray-50 block w-full py-1 text-sm focus:outline-none">{{item.label}}</button>
                                                    </li>
                                                </div>
                                            </ul>
                                            <button class="group-hover:text-gray-500 min-w-max w-10 h-10 px-2 bg-white text-gray-700 text-sm rounded-full shadow-md inline-flex items-center justify-center select-none">
                                                {{itemsPerPage===virtualOffices.length?'All':itemsPerPage}}&nbsp;<font-awesome-icon class="group-hover:transform group-hover:rotate-90" :icon="['fas', 'caret-right']" />
                                            </button>
                                        </div>
                                    </div>

                                </div>

                                <div class="flex-grow ml-4 md:mx-4">
                                    <input
                                        class="h-10 w-full sm:rounded-lg shadow-md focus:ring-blue-500 focus:border-blue-500 sm:text-sm border-none"
                                        type="text"
                                        v-model="search"
                                        placeholder="Cari Perusahaan .."
                                    />
                                </div>

                                <div class="flex-grow md:flex-grow-0 flex justify-end gap-4">
                                    <button type="button" class="inline-flex justify-center items-center h-10 w-10 border border-transparent shadow-md font-bold text-white bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-teal-500 sm:rounded-lg">
                                        <font-awesome-icon :icon="['fas', 'file-export']" />
                                    </button>
                                    <button type="button" class="inline-flex justify-center items-center h-10 w-10 border border-transparent shadow-md  font-bold text-white bg-purple-600 hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 sm:rounded-lg">
                                        <font-awesome-icon :icon="['fas', 'print']" />
                                    </button>
                                    <button @click="toggleModalAdd" type="button" class="inline-flex justify-center items-center h-10 w-10 border border-transparent shadow-md  font-bold text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:rounded-lg">
                                        <font-awesome-icon :icon="['fas', 'plus']" />
                                    </button>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="relative bg-white overflow-hidden shadow-lg sm:rounded-lg">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                                    <table class="min-w-full divide-y divide-gray-200">

                                        <thead class=" bg-gray-50">
                                            <tr>
                                                <th @click="sort('kode_vo')" scope="col" class="select-none group whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Kode
                                                    <font-awesome-icon :icon="['fas', 'sort-amount-up']"
                                                        :class="{
                                                            'text-gray-500 group-hover:text-gray-500': currentSort==='kode_vo'&&currentSortDir==='asc',
                                                            'text-gray-300 group-hover:text-gray-300': currentSort==='kode_vo'&&currentSortDir==='desc'
                                                        }"
                                                        class="text-transparent group-hover:text-gray-300"
                                                    />
                                                    <font-awesome-icon :icon="['fas', 'sort-amount-down-alt']"
                                                        :class="{
                                                            'text-gray-500 group-hover:text-gray-500': currentSort==='kode_vo'&&currentSortDir==='desc',
                                                            'text-gray-300 group-hover:text-gray-300': currentSort==='kode_vo'&&currentSortDir==='asc'
                                                        }"
                                                        class="text-transparent group-hover:text-gray-300"
                                                    />
                                                </th>
                                                <th @click="sort('company')" scope="col" class="select-none group whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Nama Perusahaan
                                                    <font-awesome-icon :icon="['fas', 'sort-amount-up']"
                                                        :class="{
                                                            'text-gray-500 group-hover:text-gray-500': currentSort==='company'&&currentSortDir==='asc',
                                                            'text-gray-300 group-hover:text-gray-300': currentSort==='company'&&currentSortDir==='desc'
                                                        }"
                                                        class="text-transparent group-hover:text-gray-300"
                                                    />
                                                    <font-awesome-icon :icon="['fas', 'sort-amount-down-alt']"
                                                        :class="{
                                                            'text-gray-500 group-hover:text-gray-500': currentSort==='company'&&currentSortDir==='desc',
                                                            'text-gray-300 group-hover:text-gray-300': currentSort==='company'&&currentSortDir==='asc'
                                                        }"
                                                        class="text-transparent group-hover:text-gray-300"
                                                    />
                                                </th>
                                                <th @click="sort('harga_vo')" scope="col" class="select-none group whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Harga
                                                    <font-awesome-icon :icon="['fas', 'sort-amount-up']"
                                                        :class="{
                                                            'text-gray-500 group-hover:text-gray-500': currentSort==='harga_vo'&&currentSortDir==='asc',
                                                            'text-gray-300 group-hover:text-gray-300': currentSort==='harga_vo'&&currentSortDir==='desc'
                                                        }"
                                                        class="text-transparent group-hover:text-gray-300"
                                                    />
                                                    <font-awesome-icon :icon="['fas', 'sort-amount-down-alt']"
                                                        :class="{
                                                            'text-gray-500 group-hover:text-gray-500': currentSort==='harga_vo'&&currentSortDir==='desc',
                                                            'text-gray-300 group-hover:text-gray-300': currentSort==='harga_vo'&&currentSortDir==='asc'
                                                        }"
                                                        class="text-transparent group-hover:text-gray-300"
                                                    />
                                                </th>
                                                <th @click="sort('tanggal_aggrement')" scope="col" class="select-none group whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Tanggal Agreement
                                                    <font-awesome-icon :icon="['fas', 'sort-amount-up']"
                                                        :class="{
                                                            'text-gray-500 group-hover:text-gray-500': currentSort==='tanggal_aggrement'&&currentSortDir==='asc',
                                                            'text-gray-300 group-hover:text-gray-300': currentSort==='tanggal_aggrement'&&currentSortDir==='desc'
                                                        }"
                                                        class="text-transparent group-hover:text-gray-300"
                                                    />
                                                    <font-awesome-icon :icon="['fas', 'sort-amount-down-alt']"
                                                        :class="{
                                                            'text-gray-500 group-hover:text-gray-500': currentSort==='tanggal_aggrement'&&currentSortDir==='desc',
                                                            'text-gray-300 group-hover:text-gray-300': currentSort==='tanggal_aggrement'&&currentSortDir==='asc'
                                                        }"
                                                        class="text-transparent group-hover:text-gray-300"
                                                    />
                                                </th>
                                                <th @click="sort('tanggal_selesai')" scope="col" class="pr-24 select-none group whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Tanggal Selesai
                                                    <font-awesome-icon :icon="['fas', 'sort-amount-up']"
                                                        :class="{
                                                            'text-gray-500 group-hover:text-gray-500': currentSort==='tanggal_selesai'&&currentSortDir==='asc',
                                                            'text-gray-300 group-hover:text-gray-300': currentSort==='tanggal_selesai'&&currentSortDir==='desc'
                                                        }"
                                                        class="text-transparent group-hover:text-gray-300"
                                                    />
                                                    <font-awesome-icon :icon="['fas', 'sort-amount-down-alt']"
                                                        :class="{
                                                            'text-gray-500 group-hover:text-gray-500': currentSort==='tanggal_selesai'&&currentSortDir==='desc',
                                                            'text-gray-300 group-hover:text-gray-300': currentSort==='tanggal_selesai'&&currentSortDir==='asc'
                                                        }"
                                                        class="text-transparent group-hover:text-gray-300"
                                                    />
                                                </th>
                                                <th @click="sort('papan_nama_perusahaan')" scope="col" class="select-none group whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Papan Nama Perusahaan
                                                    <font-awesome-icon :icon="['fas', 'sort-amount-up']"
                                                        :class="{
                                                            'text-gray-500 group-hover:text-gray-500': currentSort==='papan_nama_perusahaan'&&currentSortDir==='asc',
                                                            'text-gray-300 group-hover:text-gray-300': currentSort==='papan_nama_perusahaan'&&currentSortDir==='desc'
                                                        }"
                                                        class="text-transparent group-hover:text-gray-300"
                                                    />
                                                    <font-awesome-icon :icon="['fas', 'sort-amount-down-alt']"
                                                        :class="{
                                                            'text-gray-500 group-hover:text-gray-500': currentSort==='papan_nama_perusahaan'&&currentSortDir==='desc',
                                                            'text-gray-300 group-hover:text-gray-300': currentSort==='papan_nama_perusahaan'&&currentSortDir==='asc'
                                                        }"
                                                        class="text-transparent group-hover:text-gray-300"
                                                    />
                                                </th>
                                                <th @click="sort('fasilitas_meeting_room')" scope="col" class="select-none group whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Fasilitas Meeting Room
                                                    <font-awesome-icon :icon="['fas', 'sort-amount-up']"
                                                        :class="{
                                                            'text-gray-500 group-hover:text-gray-500': currentSort==='fasilitas_meeting_room'&&currentSortDir==='asc',
                                                            'text-gray-300 group-hover:text-gray-300': currentSort==='fasilitas_meeting_room'&&currentSortDir==='desc'
                                                        }"
                                                        class="text-transparent group-hover:text-gray-300"
                                                    />
                                                    <font-awesome-icon :icon="['fas', 'sort-amount-down-alt']"
                                                        :class="{
                                                            'text-gray-500 group-hover:text-gray-500': currentSort==='fasilitas_meeting_room'&&currentSortDir==='desc',
                                                            'text-gray-300 group-hover:text-gray-300': currentSort==='fasilitas_meeting_room'&&currentSortDir==='asc'
                                                        }"
                                                        class="text-transparent group-hover:text-gray-300"
                                                    />
                                                </th>
                                                <th @click="sort('fasilitas_private_office')" scope="col" class="select-none group whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Fasilitas Konsultasi Pajak
                                                    <font-awesome-icon :icon="['fas', 'sort-amount-up']"
                                                        :class="{
                                                            'text-gray-500 group-hover:text-gray-500': currentSort==='fasilitas_private_office'&&currentSortDir==='asc',
                                                            'text-gray-300 group-hover:text-gray-300': currentSort==='fasilitas_private_office'&&currentSortDir==='desc'
                                                        }"
                                                        class="text-transparent group-hover:text-gray-300"
                                                    />
                                                    <font-awesome-icon :icon="['fas', 'sort-amount-down-alt']"
                                                        :class="{
                                                            'text-gray-500 group-hover:text-gray-500': currentSort==='fasilitas_private_office'&&currentSortDir==='desc',
                                                            'text-gray-300 group-hover:text-gray-300': currentSort==='fasilitas_private_office'&&currentSortDir==='asc'
                                                        }"
                                                        class="text-transparent group-hover:text-gray-300"
                                                    />
                                                </th>
                                                <th @click="sort('fasilitas_konsultasi_pajak')" scope="col" class="select-none group whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Fasilitas Konsultasi Pajak
                                                    <font-awesome-icon :icon="['fas', 'sort-amount-up']"
                                                        :class="{
                                                            'text-gray-500 group-hover:text-gray-500': currentSort==='fasilitas_konsultasi_pajak'&&currentSortDir==='asc',
                                                            'text-gray-300 group-hover:text-gray-300': currentSort==='fasilitas_konsultasi_pajak'&&currentSortDir==='desc'
                                                        }"
                                                        class="text-transparent group-hover:text-gray-300"
                                                    />
                                                    <font-awesome-icon :icon="['fas', 'sort-amount-down-alt']"
                                                        :class="{
                                                            'text-gray-500 group-hover:text-gray-500': currentSort==='fasilitas_konsultasi_pajak'&&currentSortDir==='desc',
                                                            'text-gray-300 group-hover:text-gray-300': currentSort==='fasilitas_konsultasi_pajak'&&currentSortDir==='asc'
                                                        }"
                                                        class="text-transparent group-hover:text-gray-300"
                                                    />
                                                </th>
                                                <th @click="sort('created_at')" scope="col" class="select-none group whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Tanggal Dibuat
                                                    <font-awesome-icon :icon="['fas', 'sort-amount-up']"
                                                        :class="{
                                                            'text-gray-500 group-hover:text-gray-500': currentSort==='created_at'&&currentSortDir==='asc',
                                                            'text-gray-300 group-hover:text-gray-300': currentSort==='created_at'&&currentSortDir==='desc'
                                                        }"
                                                        class="text-transparent group-hover:text-gray-300"
                                                    />
                                                    <font-awesome-icon :icon="['fas', 'sort-amount-down-alt']"
                                                        :class="{
                                                            'text-gray-500 group-hover:text-gray-500': currentSort==='created_at'&&currentSortDir==='desc',
                                                            'text-gray-300 group-hover:text-gray-300': currentSort==='created_at'&&currentSortDir==='asc'
                                                        }"
                                                        class="text-transparent group-hover:text-gray-300"
                                                    />
                                                </th>
                                                <!-- BEFORE FREEZE COLUMN -->
                                                <!-- <th @click="sort('updated_at')" scope="col" class="select-none group whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"> -->
                                                <!-- END BEFORE FREEZE COLUMN -->
                                                <th @click="sort('updated_at')" scope="col" class="pr-24 select-none group whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Tanggal Diedit
                                                    <font-awesome-icon :icon="['fas', 'sort-amount-up']"
                                                        :class="{
                                                            'text-gray-500 group-hover:text-gray-500': currentSort==='updated_at'&&currentSortDir==='asc',
                                                            'text-gray-300 group-hover:text-gray-300': currentSort==='updated_at'&&currentSortDir==='desc'
                                                        }"
                                                        class="text-transparent group-hover:text-gray-300"
                                                    />
                                                    <font-awesome-icon :icon="['fas', 'sort-amount-down-alt']"
                                                        :class="{
                                                            'text-gray-500 group-hover:text-gray-500': currentSort==='updated_at'&&currentSortDir==='desc',
                                                            'text-gray-300 group-hover:text-gray-300': currentSort==='updated_at'&&currentSortDir==='asc'
                                                        }"
                                                        class="text-transparent group-hover:text-gray-300"
                                                    />
                                                </th>
                                                <!-- BEFORE FREEZE COLUMN -->
                                                <!-- <th scope="col" class="w-24 select-none whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"> -->
                                                <!-- END BEFORE FREEZE COLUMN -->
                                                <th scope="col" class="absolute right-0 bg-gray-50 w-24 border-l select-none whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Aksi
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody class="bg-white divide-y divide-gray-200" v-if="virtualOffices.length > 0">
                                            <tr v-for="(c) in SortedVirtualOffice" :key="c.id">
                                                <td class="px-4 py-3 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                    <div class="text-sm text-gray-900">{{c.kode_vo}}</div>
                                                    </div>
                                                </td>
                                                <td class="px-4 py-3 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                    <div class="text-sm text-gray-900">{{c.company.nama_perusahaan}}</div>
                                                    </div>
                                                </td>
                                                <td class="px-4 py-3 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                    <div class="text-sm text-gray-900">{{c.harga_vo}}</div>
                                                    </div>
                                                </td>
                                                <td class="px-4 py-3 whitespace-nowrap">
                                                    <div class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                                        {{convertUnixTS(c.tanggal_aggrement)}}
                                                    </div>
                                                </td>
                                                <td class="px-4 py-3 whitespace-nowrap">
                                                    <div class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-pink-100 text-pink-800">
                                                        {{convertUnixTS(c.tanggal_selesai)}}
                                                    </div>
                                                </td>
                                                <td class="px-4 py-3 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                    <div class="text-sm text-gray-900">{{c.papan_nama_perusahaan}}</div>
                                                    </div>
                                                </td>
                                                <td class="px-4 py-3 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                    <div class="text-sm text-gray-900">{{c.fasilitas_meeting_room}}</div>
                                                    </div>
                                                </td>
                                                <td class="px-4 py-3 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                    <div class="text-sm text-gray-900">{{c.fasilitas_private_office}}</div>
                                                    </div>
                                                </td>
                                                <td class="px-4 py-3 whitespace-nowrap">
                                                    <div class="flex items-center">
                                                    <div class="text-sm text-gray-900">{{c.fasilitas_konsultasi_pajak}}</div>
                                                    </div>
                                                </td>
                                                <td class="px-4 py-3 whitespace-nowrap">
                                                    <div class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                        {{convertUnixTS(c.created_at)}}
                                                    </div>
                                                </td>
                                                <td class="px-4 py-3 whitespace-nowrap">
                                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                        {{convertUnixTS(c.updated_at)}}
                                                    </span>
                                                </td>
                                                <!-- BEFORE FREEZE COLUMN -->
                                                <!-- <td class="px-4 py-3 whitespace-nowrap"> -->
                                                <!-- END BEFORE FREEZE COLUMN -->
                                                <td class="absolute right-0 bg-white pt- mt-1 border-l flex justify-center w-24 whitespace-nowrap">
                                                    <div class="inline-flex">
                                                        <button @click="toggleModalEdit(c)" class="bg-blue-600 hover:bg-blue-500 text-white font-bold py-2 px-3 rounded-l">
                                                            <font-awesome-icon :icon="['fas', 'paint-brush']" />
                                                        </button>
                                                        <button @click="doDelete(c.id)" class="bg-pink-600 hover:bg-pink-500 text-white font-bold py-2 px-3 rounded-r">
                                                            <font-awesome-icon :icon="['fas', 'trash']" />
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>

                                        <tbody class="bg-white divide-y divide-gray-200" v-if="virtualOffices.length == 0">
                                            <tr>
                                                <td class="text-sm px-6 py-4 whitespace-nowrap" colspan="12">
                                                    Data kosong
                                                </td>
                                            </tr>
                                        </tbody>

                                        <tbody class="bg-white divide-y divide-gray-200" v-if="virtualOffices.length && SortedVirtualOffice.length == 0">
                                            <tr>
                                                <td class="text-sm px-6 py-4 whitespace-nowrap" colspan="12">
                                                    Data tidak ditemukan
                                                </td>
                                            </tr>
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="grid grid-cols-12 gap-4 py-4 items-start">
                    <div class="col-span-12">
                        <div class="flex text-gray-700 justify-end items-center">

                            <div class="grid grid-flow-col auto-cols-max md:auto-cols-min gap-4">
                                <div class="group inline-block relative">
                                    <ul class="z-10 absolute inset-x-0 -top-28 pb-10 hidden group-hover:block text-gray-700">
                                        <div class="shadow-lg rounded-full">
                                            <li v-for="(item,index) in itemsPerPageList" :key="index">
                                                <button @click="changeItemsPerPage(item.value)" :class="{'bg-gray-100': itemsPerPage===item.value, 'rounded-t-full': index===0, 'rounded-b-full': index===itemsPerPageList.length-1}" class="bg-white hover:bg-gray-50 block w-full py-1 text-sm focus:outline-none">{{item.label}}</button>
                                            </li>
                                        </div>
                                    </ul>
                                    <button class="group-hover:text-gray-500  min-w-max w-10 h-10 px-2 bg-white text-gray-700 text-sm rounded-full shadow-md inline-flex items-center justify-center select-none">
                                        <font-awesome-icon class="group-hover:transform group-hover:rotate-90" :icon="['fas', 'caret-left']" />&nbsp;{{itemsPerPage===virtualOffices.length?'All':itemsPerPage}}
                                    </button>
                                </div>
                                <div class="flex">
                                    <div @click="prevPage" class="h-10 w-10 mr-1 flex justify-center items-center rounded-full bg-white hover:bg-gray-100 cursor-pointer shadow-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left w-4 h-4">
                                            <polyline points="15 18 9 12 15 6"></polyline>
                                        </svg>
                                        <!-- <font-awesome-icon :icon="['fas', 'arrow-left']"/> -->
                                    </div>
                                    <div class="flex font-medium rounded-full bg-white shadow-md">
                                        <div v-for="n in totalPages" :key="n">
                                            <div v-if="Math.abs(n - currentPage) < 4 || n == totalPages || n == 1"
                                                @click="!((currentPage>=5&&n===currentPage-3&&n!==1&&n!==totalPages)||(n===currentPage+3&&n!==1&&n!==totalPages))&&changeCurrentPage(n)"
                                                :class="{ 'bg-yellow-600 text-white': n === currentPage, 'hover:bg-gray-100': n !== currentPage, 'w-16 hover:bg-transparent': ((currentPage>=5&&n===currentPage-3&&n!==1&&n!==totalPages)||(n===currentPage+3&&n!==1&&n!==totalPages))}"
                                                class="min-w-max w-10 h-10 md:flex justify-center items-center hidden  cursor-pointer leading-5 transition duration-150 ease-in  rounded-full select-none text-sm"
                                            >
                                                <span v-if="(currentPage>=5&&n===currentPage-3&&n!==1&&n!==totalPages)">
                                                    <form @submit.prevent="changeCurrentPage(parseInt(inputDestinationPageLeft))">
                                                        <input
                                                            class="inputDestinationPage h-10 w-full focus:ring-blue-500 focus:border-blue-500 hover:border-blue-500 text-center rounded-full border-transparent"
                                                            :min="1"
                                                            :max="currentPage-1"
                                                            type="number"
                                                            v-model="inputDestinationPageLeft"
                                                            placeholder="..."
                                                        />
                                                    </form>
                                                </span>
                                                <span v-else-if="(n===currentPage+3&&n!==1&&n!==totalPages)">
                                                    <form @submit.prevent="changeCurrentPage(parseInt(inputDestinationPageRight))">
                                                        <input
                                                            class="inputDestinationPage h-10 w-full focus:ring-blue-500 focus:border-blue-500 hover:border-blue-500 text-center rounded-full border-transparent"
                                                            :min="currentPage+1"
                                                            :max="totalPages"
                                                            type="number"
                                                            v-model="inputDestinationPageRight"
                                                            placeholder="..."
                                                        />
                                                    </form>
                                                </span>
                                                <span v-else>{{n}}</span>
                                            </div>
                                        </div>
                                        <div class="min-w-max w-10 h-10 md:hidden flex justify-center items-center cursor-pointer leading-5 transition duration-150 ease-in rounded-full bg-yellow-600 text-white select-none text-sm">{{currentPage}}/{{totalPages}}</div>
                                    </div>
                                    <div @click="nextPage" class="h-10 w-10 ml-1 flex justify-center items-center rounded-full bg-white hover:bg-gray-100 cursor-pointer shadow-md">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right w-4 h-4">
                                            <polyline points="9 18 15 12 9 6"></polyline>
                                        </svg>
                                        <!-- <font-awesome-icon :icon="['fas', 'arrow-right']"/> -->
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


        <jet-modal
            :show="modalMode==='EDIT' ? isShowModalEdit : modalMode==='ADD' ? isShowModalAdd : false"
            @close="modalMode==='EDIT' ? isShowModalEdit=false : modalMode==='ADD' ? isShowModalAdd=false : false"
        >
            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <div class="sm:mt-3 md:col-span-3">
                        <div class="text-2xl px-4 sm:px-6">
                            <p v-if="modalMode==='ADD'">Add Data</p>
                            <p v-if="modalMode==='EDIT'">Edit Data</p>
                        </div>
                        <form id="categoryForm" @submit.prevent="modalMode==='EDIT' ? doEdit : modalMode==='ADD' ? doAdd : false">
                            <div class="shadow overflow-hidden sm:rounded-md">

                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div v-if="modalMode==='ADD'" class="grid grid-cols-6 grid-rows-3 gap-6">
                                        <div class="col-span-6">
                                            <label for="company_id" class="block text-sm font-medium text-gray-700">Pilih Perusahaan</label>
                                            <select
                                            name="company_id"
                                            v-model="virtualOffice.company_id"
                                            class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                            id="company_id"
                                            :class="{ 'is-invalid': virtualOffice.errors.has('company_id') }"
                                            >
                                                <option value>Pilih Perusahaan</option>
                                                <option
                                                    v-for="d in companies"
                                                    :key="d.id"
                                                    :value="d.id"
                                                >{{ d.nama_perusahaan }}</option>
                                            </select>
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="kode_vo" class="block text-sm font-medium text-gray-700">Kode Virtual Office</label>
                                            <input type="text" v-model="virtualOffice.kode_vo" name="kode_vo" id="kode_vo" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="harga_vo" class="block text-sm font-medium text-gray-700">Harga Virtual Office</label>
                                            <input type="text" v-model="virtualOffice.harga_vo" name="harga_vo" id="harga_vo" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="tanggal_aggrement" class="block text-sm font-medium text-gray-700">Tanggal Aggrement</label>
                                            <input type="date" v-model="virtualOffice.tanggal_aggrement" name="tanggal_aggrement" id="tanggal_aggrement" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="tanggal_selesai" class="block text-sm font-medium text-gray-700">Tanggal Selesai</label>
                                            <input type="date" v-model="virtualOffice.tanggal_selesai" name="tanggal_selesai" id="tanggal_selesai" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="fasilitas_meeting_room" class="block text-sm font-medium text-gray-700">Fasilitas Meeting Room</label>
                                            <input type="text" v-model="virtualOffice.fasilitas_meeting_room" name="fasilitas_meeting_room" id="fasilitas_meeting_room" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="fasilitas_konsultasi_pajak" class="block text-sm font-medium text-gray-700">Fasilitas Konsultasi Pajak</label>
                                            <input type="text" v-model="virtualOffice.fasilitas_konsultasi_pajak" name="fasilitas_konsultasi_pajak" id="fasilitas_konsultasi_pajak" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="fasilitas_private_office" class="block text-sm font-medium text-gray-700">Fasilitas Private Office</label>
                                            <input type="text" v-model="virtualOffice.fasilitas_private_office" name="fasilitas_private_office" id="fasilitas_private_office" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="papan_nama_perusahaan" class="block text-sm font-medium text-gray-700">Papan Nama Perusahaan</label>
                                            <input type="text" v-model="virtualOffice.papan_nama_perusahaan" name="papan_nama_perusahaan" id="papan_nama_perusahaan" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                    </div>

                                    <div v-if="modalMode==='EDIT'" class="grid grid-cols-6 grid-rows-3 gap-6">
                                        <div class="col-span-6">
                                            <label for="company_id" class="block text-sm font-medium text-gray-700">Pilih Perusahaan</label>
                                            <select
                                            name="company_id"
                                            v-model="virtualOffice.company_id"
                                            class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                            id="company_id"
                                            :class="{ 'is-invalid': virtualOffice.errors.has('company_id') }"
                                            >
                                                <option value>Pilih Perusahaan</option>
                                                <option
                                                    v-for="d in companies"
                                                    :key="d.id"
                                                    :value="d.id"
                                                >{{ d.nama_perusahaan }}</option>
                                            </select>
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="kode_vo" class="block text-sm font-medium text-gray-700">Kode Virtual Office</label>
                                            <input type="text" v-model="virtualOffice.kode_vo" name="kode_vo" id="kode_vo" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="harga_vo" class="block text-sm font-medium text-gray-700">Harga Virtual Office</label>
                                            <input type="text" v-model="virtualOffice.harga_vo" name="harga_vo" id="harga_vo" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="tanggal_aggrement" class="block text-sm font-medium text-gray-700">Tanggal Aggrement</label>
                                            <input type="date" v-model="format_tanggal_aggrement" name="tanggal_aggrement" id="tanggal_aggrement" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="tanggal_selesai" class="block text-sm font-medium text-gray-700">Tanggal Selesai</label>
                                            <input type="date" v-model="format_tanggal_selesai" name="tanggal_selesai" id="tanggal_selesai" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="fasilitas_meeting_room" class="block text-sm font-medium text-gray-700">Fasilitas Meeting Room</label>
                                            <input type="text" v-model="virtualOffice.fasilitas_meeting_room" name="fasilitas_meeting_room" id="fasilitas_meeting_room" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="fasilitas_konsultasi_pajak" class="block text-sm font-medium text-gray-700">Fasilitas Konsultasi Pajak</label>
                                            <input type="text" v-model="virtualOffice.fasilitas_konsultasi_pajak" name="fasilitas_konsultasi_pajak" id="fasilitas_konsultasi_pajak" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="fasilitas_private_office" class="block text-sm font-medium text-gray-700">Fasilitas Private Office</label>
                                            <input type="text" v-model="virtualOffice.fasilitas_private_office" name="fasilitas_private_office" id="fasilitas_private_office" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="papan_nama_perusahaan" class="block text-sm font-medium text-gray-700">Papan Nama Perusahaan</label>
                                            <input type="text" v-model="virtualOffice.papan_nama_perusahaan" name="papan_nama_perusahaan" id="papan_nama_perusahaan" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                    </div>
                                </div>

                                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <button v-if="modalMode==='ADD'" @click="doAdd" type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                    Add
                                    </button>
                                    <button v-if="modalMode==='EDIT'" @click="doEdit" type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                    Save
                                    </button>
                                    <button v-if="modalMode==='ADD'" @click="toggleModalAdd" type="button" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 ml-3">
                                    Cancel
                                    </button>
                                    <button v-if="modalMode==='EDIT'" @click="toggleModalEdit" type="button" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 ml-3">
                                    Cancel
                                    </button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </jet-modal>

    </app-layout>
</template>

<style scoped>
    /* Chrome, Safari, Edge, Opera */
    .inputDestinationPage::-webkit-outer-spin-button,
    .inputDestinationPage::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
    }
    /* Firefox */
    .inputDestinationPage[type=number] {
    -moz-appearance: textfield;
    }
</style>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Welcome from '@/Jetstream/Welcome'
    import JetModal from '@/Jetstream/Modal'

    export default {
        components: {
            AppLayout,
            Welcome,
            JetModal,
        },
        data(){
            return{
                modalMode: false,
                isShowModalAdd: false,
                isShowModalEdit: false,
                virtualOffices: [],
                companies: [],
                virtualOffice: new Form({
                    id: '',
                    kode_vo: '',
                    company_id: '',
                    harga_vo: '',
                    tanggal_aggrement: '',
                    tanggal_selesai: '',
                    fasilitas_meeting_room: '',
                    fasilitas_konsultasi_pajak: '',
                    fasilitas_private_office: '',
                    papan_nama_perusahaan: null
                }),
                search: "",
                inputDestinationPageLeft: null,
                inputDestinationPageRight: null,
                currentSort:'kode_vo',
                currentSortDir:'asc',
                itemsPerPage:10,
                currentPage:1,
            }
        },
        methods: {
            toggleModalAdd(){
                this.virtualOffice.reset();
                this.isShowModalAdd = !this.isShowModalAdd
                this.modalMode = 'ADD'
            },
            toggleModalEdit(c){
                this.virtualOffice.reset();
                this.isShowModalEdit = !this.isShowModalEdit
                this.modalMode = 'EDIT'
                this.virtualOffice.fill(c);
            },
            async getCompany(){
                await axios.get('api/company', this.virtualOffice)
                .then((res) => {
                    this.companies = res.data
                }).catch((err) => {
                    console.log(err.response)
                });
            },
            async getVirtualOffice(){
                await axios.get('api/virtual-office', this.virtualOffice)
                .then((res) => {
                    this.virtualOffices = res.data
                }).catch((err) => {
                    console.log(err.response)
                });
            },
            async doAdd(){
                const res = await axios.post('api/virtual-office', this.virtualOffice)
                if(res.status == 201){
                    Toast.fire({
                        icon: 'success',
                        iconColor: '#65A30D',
                        title: res.data,
                        showConfirmButton: false,
                    })
                    Fire.$emit('addSuccess')
                    this.isShowModalAdd = !this.isShowModalAdd
                }
            },
            async doEdit(){
                const res = await axios.put('api/virtual-office/'+this.virtualOffice.id, this.virtualOffice)
                console.log(this.virtualOffice)
                if(res.status == 200){
                    Toast.fire({
                        icon: 'success',
                        iconColor: '#0284C7',
                        title: res.data,
                        showConfirmButton: false,
                    })
                    Fire.$emit('editSuccess')
                    this.isShowModalEdit = !this.isShowModalEdit
                }
            },
            async doDelete(c){
                Toast
                    .fire({
                    title: "Apakah anda yakin?",
                    text: "Data yang dihapus tidak bisa dikembalikan!",
                    // type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DB2777",
                    cancelButtonColor: "#0D9488",
                    confirmButtonText: "Ya, hapus saja!",
                    })
                    .then(result => {
                    if (result.value) {
                        axios.delete("/api/virtual-office/" + c)
                        .then(() => {
                            Toast.fire({
                                icon: 'success',
                                iconColor: '#DB2777',
                                title: "Menghapus! File anda telah terhapus",
                                showConfirmButton: false,
                            })
                            Fire.$emit("deleteSuccess");
                        })
                        .catch((err) => {
                            Toast.fire({
                                icon: 'warning',
                                iconColor: '#D97706',
                                title: "Gagal! Ada sesuatu yang salah.",
                                showConfirmButton: false,
                            })
                        });
                    }
                });
            },
            sort:function(s) {
                // if s == current sort, reverse
                if(s === this.currentSort) {
                    this.currentSortDir = this.currentSortDir==='asc'?'desc':'asc';
                }
                this.currentSort = s;
            },
            changeCurrentPage:function(n) {
                this.currentPage = n
                this.inputDestinationPageRight = null
                this.inputDestinationPageLeft = null
            },
            changeItemsPerPage:function(n) {
                this.itemsPerPage = n
            },
            nextPage:function() {
                if((this.currentPage*this.itemsPerPage) < this.FilteredVirtualOffice.length) this.currentPage++;
            },
            prevPage:function() {
                if(this.currentPage > 1) this.currentPage--;
            }
        },
        created(){
            // console.log(this.SortedVirtualOffice,'sortered-vo')
            this.getCompany();
            this.getVirtualOffice();
            Fire.$on('addSuccess', () => {
                /*
                * add success
                */
                this.getVirtualOffice();
            })
            Fire.$on('editSuccess', () => {
                /*
                * edit success
                */
                this.getVirtualOffice();
            })
            Fire.$on('deleteSuccess', () => {
                /*
                * delete success
                */
                this.getVirtualOffice();
            })
        },
        computed: {
            totalPages: function(){
                return Math.ceil(this.FilteredVirtualOffice.length / this.itemsPerPage)
            },
            itemsPerPageList: function(){
                return [
                    { value: 5, label: '5' },
                    { value: 10, label: '10' },
                    { value: 25, label: '25' },
                    { value: this.virtualOffices.length, label: 'All' },
                ]
            },
            FilteredVirtualOffice: function() {
                // console.log(this.virtualOffices, 'data-vo')
                return this.virtualOffices.filter(virtualOffice => {
                    return (
                        virtualOffice.kode_vo.match(this.search)
                    );
                });
            },
            SortedVirtualOffice:function() {
                // console.log(this.FilteredVirtualOffice, 'fitlered-vo')
                /****
                * Handle when currentPage > Total Page after Filtered
                ****/
                if(this.FilteredVirtualOffice.length){
                    if(this.currentPage > this.totalPages){
                        this.currentPage = this.totalPages
                    }
                }else{
                    this.currentPage = 1
                }

                return this.FilteredVirtualOffice.sort((a,b) => {
                    // sorting Filtered data
                    let modifier = 1;
                    if(this.currentSortDir === 'desc') modifier = -1;

                    /****
                     * Manual Handling sort nested data. ex: `company.nama_perusahaan`
                     ****/
                    if(this.currentSort==='company'){
                        // when company, sort by ...
                         if(a[this.currentSort]['nama_perusahaan'] < b[this.currentSort]['nama_perusahaan']) return -1 * modifier;
                         if(a[this.currentSort]['nama_perusahaan'] > b[this.currentSort]['nama_perusahaan']) return 1 * modifier;
                    }else{
                         if(a[this.currentSort] < b[this.currentSort]) return -1 * modifier;
                         if(a[this.currentSort] > b[this.currentSort]) return 1 * modifier;
                    }

                    return 0;
                }).filter((row, index) => {
                    // filtering data base on itemsPerPage
                    let start = (this.currentPage-1)*this.itemsPerPage;
                    let end = this.currentPage*this.itemsPerPage;
                    if(index >= start && index < end) return true;
                });
            },
            format_tanggal_aggrement: {
                get() {
                    return this.dateInputFormat(this.virtualOffice.tanggal_aggrement)
                },
                set(val) {
                    this.virtualOffice['tanggal_aggrement'] = val
                }
            },
            format_tanggal_selesai: {
                get() {
                    return this.dateInputFormat(this.virtualOffice.tanggal_selesai)
                },
                set(val) {
                    this.virtualOffice['tanggal_selesai'] = val
                }
            },
        }
    }
</script>
