<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Monitoring
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-12 gap-4">

                    <div class="col-span-4">
                        <div class="grid grid-cols-6 gap-4 items-center">
                            <div class="col-span-6">
                                <form class="flex shadow-lg sm:rounded-lg" @submit.prevent="searchVo">
                                    <input
                                        class="h-10 w-full sm:rounded-l-lg focus:ring-blue-500 focus:border-blue-500 sm:text-sm border-gray-200"
                                        type="text"
                                        v-model="search"
                                        placeholder="Cari Virtual Office .."
                                    />
                                    <button class="h-10 px-2 sm:rounded-r-lg bg-blue-500 border-gray-200 border-t border-b border-r whitespace-nowrap text-white focus:outline-none" type="submit">
                                        <font-awesome-icon :icon="['fas', 'search']" />&nbsp;Cari
                                    </button>
                                </form>
                            </div>
                            <div class="col-span-6">
                                <!-- <div class="max-w-full" v-if="company.hasOwnProperty('id')">
                                    <div class="bg-white shadow-lg rounded-lg py-3">
                                        <div class="py-2 px-10">
                                            <h3 class="text-center text-xl text-gray-900 font-medium leading-8">Data Perusahan</h3>
                                            <div class="text-center text-gray-400 text-xs font-semibold">
                                                <p>menampilkan data perusahan</p>
                                            </div>
                                            <table class="text-xs my-3">
                                                <tbody>
                                                    <tr>
                                                        <td class="px-2 py-2 text-gray-500 font-semibold">Nama Perusahaan</td>
                                                        <td class="px-2 py-2">{{company.company.nama_perusahaan}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-2 py-2 text-gray-500 font-semibold">Person in Charge</td>
                                                        <td class="px-2 py-2">{{company.company.pic}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-2 py-2 text-gray-500 font-semibold">Telepone</td>
                                                        <td class="px-2 py-2">{{company.company.telepon}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-2 py-2 text-gray-500 font-semibold">Email</td>
                                                        <td class="px-2 py-2">{{company.company.email}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="max-w-full" v-else>
                                    <div class="bg-white shadow-lg rounded-lg py-3">
                                        <div class="py-2 px-10">
                                            <h3 class="text-center text-xl text-gray-900 font-medium leading-8">Data Perusahan</h3>
                                            <div class="text-center text-gray-400 text-xs font-semibold">
                                                <p>menampilkan data perusahan</p>
                                            </div>
                                            <table class="text-xs my-3">
                                                <tbody>
                                                    <tr>
                                                        <td class="px-2 py-2 text-gray-500 font-semibold">Nama Perusahaan</td>
                                                        <td class="px-2 py-2">data tidak tersedia</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-2 py-2 text-gray-500 font-semibold">Person in Charge</td>
                                                        <td class="px-2 py-2">data tidak tersedia</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-2 py-2 text-gray-500 font-semibold">Telepone</td>
                                                        <td class="px-2 py-2">data tidak tersedia</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-2 py-2 text-gray-500 font-semibold">Email</td>
                                                        <td class="px-2 py-2">data tidak tersedia</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="max-w-full">
                                    <div class="bg-white shadow-lg rounded-lg py-3">
                                        <div class="py-2 px-10">
                                            <h3 class="text-center text-xl text-gray-900 font-medium leading-8">Data Perusahan</h3>
                                            <div class="text-center text-gray-400 text-xs font-semibold">
                                                <p>menampilkan data perusahan</p>
                                            </div>
                                            <table class="text-xs my-3" v-if="company.hasOwnProperty('company')">
                                                <tbody>
                                                    <tr>
                                                        <td class="px-2 py-2 text-gray-500 font-semibold">Nama Perusahaan</td>
                                                        <td class="px-2 py-2">{{company.company.nama_perusahaan}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-2 py-2 text-gray-500 font-semibold">Person in Charge</td>
                                                        <td class="px-2 py-2">{{company.company.pic}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-2 py-2 text-gray-500 font-semibold">Telepone</td>
                                                        <td class="px-2 py-2">{{company.company.telepon}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-2 py-2 text-gray-500 font-semibold">Email</td>
                                                        <td class="px-2 py-2">{{company.company.email}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="mt-3 bg-red-400 text-white rounded-xl text-center font-bold" v-else>
                                                data tidak tersedia
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-span-6">
                                <!-- <div class="max-w-full" v-if="company.hasOwnProperty('id')">
                                    <div class="bg-white shadow-lg rounded-lg py-3">
                                        <div class="py-2 px-10">
                                            <h3 class="text-center text-xl text-gray-900 font-medium leading-8">Virtual Office</h3>
                                            <div class="text-center text-gray-400 text-xs font-semibold">
                                                <p>menampilkan data virtual office</p>
                                            </div>
                                            <table class="text-xs my-3">
                                                <tbody>
                                                    <tr>
                                                        <td class="px-2 py-2 text-gray-500 font-semibold">Harga Virtual Office</td>
                                                        <td class="px-2 py-2">{{company.harga_vo}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-2 py-2 text-gray-500 font-semibold">Tanggal Aggrement</td>
                                                        <td class="px-2 py-2">{{company.tanggal_aggrement}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-2 py-2 text-gray-500 font-semibold">Tanggal Selesai</td>
                                                        <td class="px-2 py-2">{{company.tanggal_selesai}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-2 py-2 text-gray-500 font-semibold">Fasilitas Meeting Room</td>
                                                        <td class="px-2 py-2">{{company.fasilitas_meeting_room}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-2 py-2 text-gray-500 font-semibold">Fasilitas Konsultasi Pajak</td>
                                                        <td class="px-2 py-2">{{company.fasilitas_konsultasi_pajak}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-2 py-2 text-gray-500 font-semibold">Fasilitas Private Office</td>
                                                        <td class="px-2 py-2">{{company.fasilitas_private_office}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-2 py-2 text-gray-500 font-semibold">Papan Nama Perusahaan</td>
                                                        <td class="px-2 py-2">{{company.papan_nama_perusahaan}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="max-w-full" v-else>
                                    <div class="bg-white shadow-lg rounded-lg py-3">
                                        <div class="py-2 px-10">
                                            <h3 class="text-center text-xl text-gray-900 font-medium leading-8">Virtual Office</h3>
                                            <div class="text-center text-gray-400 text-xs font-semibold">
                                                <p>menampilkan data virtual office</p>
                                            </div>
                                            <table class="text-xs my-3">
                                                <tbody>
                                                    <tr>
                                                        <td class="px-2 py-2 text-gray-500 font-semibold">Harga Virtual Office</td>
                                                        <td class="px-2 py-2">data tidak tersedia</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-2 py-2 text-gray-500 font-semibold">Tanggal Aggrement</td>
                                                        <td class="px-2 py-2">data tidak tersedia</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-2 py-2 text-gray-500 font-semibold">Tanggal Selesai</td>
                                                        <td class="px-2 py-2">data tidak tersedia</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-2 py-2 text-gray-500 font-semibold">Fasilitas Meeting Room</td>
                                                        <td class="px-2 py-2">data tidak tersedia</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-2 py-2 text-gray-500 font-semibold">Fasilitas Konsultasi Pajak</td>
                                                        <td class="px-2 py-2">data tidak tersedia</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-2 py-2 text-gray-500 font-semibold">Fasilitas Private Office</td>
                                                        <td class="px-2 py-2">data tidak tersedia</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-2 py-2 text-gray-500 font-semibold">Papan Nama Perusahaan</td>
                                                        <td class="px-2 py-2">data tidak tersedia</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div> -->
                                <div class="max-w-full">
                                    <div class="bg-white shadow-lg rounded-lg py-3">
                                        <div class="py-2 px-10">
                                            <h3 class="text-center text-xl text-gray-900 font-medium leading-8">Virtual Office</h3>
                                            <div class="text-center text-gray-400 text-xs font-semibold">
                                                <p>menampilkan data virtual office</p>
                                            </div>
                                            <table class="text-xs my-3" v-if="company.hasOwnProperty('id')">
                                                <tbody>
                                                    <tr>
                                                        <td class="px-2 py-2 text-gray-500 font-semibold">Harga Virtual Office</td>
                                                        <td class="px-2 py-2">{{company.harga_vo}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-2 py-2 text-gray-500 font-semibold">Tanggal Aggrement</td>
                                                        <td class="px-2 py-2">{{company.tanggal_aggrement}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-2 py-2 text-gray-500 font-semibold">Tanggal Selesai</td>
                                                        <td class="px-2 py-2">{{company.tanggal_selesai}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-2 py-2 text-gray-500 font-semibold">Fasilitas Meeting Room</td>
                                                        <td class="px-2 py-2">{{company.fasilitas_meeting_room}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-2 py-2 text-gray-500 font-semibold">Fasilitas Konsultasi Pajak</td>
                                                        <td class="px-2 py-2">{{company.fasilitas_konsultasi_pajak}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-2 py-2 text-gray-500 font-semibold">Fasilitas Private Office</td>
                                                        <td class="px-2 py-2">{{company.fasilitas_private_office}}</td>
                                                    </tr>
                                                    <tr>
                                                        <td class="px-2 py-2 text-gray-500 font-semibold">Papan Nama Perusahaan</td>
                                                        <td class="px-2 py-2">{{company.papan_nama_perusahaan}}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="mt-3 bg-red-400 text-white rounded-xl text-center font-bold" v-else>
                                                data tidak tersedia
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-span-8">
                        <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                            <div class="flex flex-col">
                                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                                            <table class="min-w-full divide-y divide-gray-200">
                                                <thead class="bg-gray-50">
                                                    <tr>
                                                        <th scope="col" class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Jan
                                                        </th>
                                                        <th scope="col" class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Feb
                                                        </th>
                                                        <th scope="col" class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Mar
                                                        </th>
                                                        <th scope="col" class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Apr
                                                        </th>
                                                        <th scope="col" class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Mei
                                                        </th>
                                                        <th scope="col" class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Jun
                                                        </th>
                                                        <th scope="col" class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Jul
                                                        </th>
                                                        <th scope="col" class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Agu
                                                        </th>
                                                        <th scope="col" class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Sep
                                                        </th>
                                                        <th scope="col" class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Okt
                                                        </th>
                                                        <th scope="col" class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Nov
                                                        </th>
                                                        <th scope="col" class="px-3 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                            Des
                                                        </th>
                                                    </tr>
                                                </thead>

                                                <tbody class="bg-white divide-y divide-gray-200">
                                                    <tr>
                                                        <td class="text-sm text-center py-4 whitespace-nowrap" colspan="12">
                                                            <div class="bg-red-400 text-white rounded-xl text-center font-bold">
                                                                data tidak tersedia
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>

                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <!-- </div> -->
    </app-layout>


</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Welcome from '@/Jetstream/Welcome'

    export default {
        components: {
            AppLayout,
            Welcome,
        },

        data(){
            return{
                company: {},
                search: "",
            }
        },
        methods:{
            async searchVo() {
                try{
                    let param = `api/virtual-office/${this.search}`
                    await axios.get(param).then(({ data }) => (this.company = data));
                }catch(err){
                    console.log(err)
                }
            },
        },
        created(){
            // this.searchVo();
        }
}
</script>
