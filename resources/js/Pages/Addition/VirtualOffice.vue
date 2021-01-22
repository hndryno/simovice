<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                List Virtual Office
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid grid-cols-12 gap-2 py-4 items-center">
                    <div class="col-span-6 sm:col-span-4">
                        <input
                            class="h-10 w-full sm:rounded-lg focus:ring-blue-500 focus:border-blue-500 sm:text-sm border-gray-200"
                            type="text"
                            v-model="search"
                            placeholder="Cari Virtual Office .."
                        />
                    </div>
                    <div class="col-span-6 sm:col-span-8 flex justify-end">
                        <button @click="toggleModalAdd" type="button" class="inline-flex justify-center items-center h-10 w-10 border border-transparent shadow-sm  font-bold text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:rounded-lg">
                            <font-awesome-icon :icon="['fas', 'plus']" />
                        </button>
                    </div>
                </div>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="flex flex-col">
                    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                No
                                            </th>
                                             <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Kode
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Nama Perusahaan
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Harga VO
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Tanggal Aggrement
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Tanggal Selesai
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Fasilitas Meeting Room
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Fasilitas Konsultasi Pajak
                                            </th>
                                             <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Fasilitas Private Office
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Papan Nama Perusahaan
                                            </th>
                                             <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Tanggal Ubah
                                            </th>
                                             <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                               Tanggal Update
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200" v-if="virtualOffices.length > 0">
                                        <tr v-for="(c, index) in virtualOffices" :key="c.id">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                <div class="text-sm text-gray-900">{{index + 1}}</div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                <div class="text-sm text-gray-900">{{c.kode_vo}}</div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                <div class="text-sm text-gray-900">{{c.company.nama_perusahaan}}</div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                <div class="text-sm text-gray-900">{{c.harga_vo}}</div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                <div class="text-sm text-gray-900">{{convertUnixTS(c.tanggal_aggrement)}}</div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                <div class="text-sm text-gray-900">{{convertUnixTS(c.tanggal_selesai)}}</div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                <div class="text-sm text-gray-900">{{c.fasilitas_meeting_room}}</div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                <div class="text-sm text-gray-900">{{c.fasilitas_konsultasi_pajak}}</div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                <div class="text-sm text-gray-900">{{c.fasilitas_private_office}}</div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                <div class="text-sm text-gray-900">{{convertBoolean(c.papan_nama_perusahaan)}}</div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                    {{convertUnixTS(c.created_at)}}
                                                </span>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    {{convertUnixTS(c.updated_at)}}
                                                </span>
                                            </td>
                                            <td class="text-center px-6 py-4 whitespace-nowrap">
                                                <div class="inline-flex">
                                                    <button @click="toggleModalEdit(c)" class="bg-indigo-600 hover:bg-indigo-500 text-white font-bold py-2 px-3 rounded-l">
                                                        <font-awesome-icon :icon="['fas', 'paint-brush']" />
                                                    </button>
                                                    <button @click="doDelete(c.id)" class="bg-red-600 hover:bg-red-500 text-white font-bold py-2 px-3 rounded-r">
                                                        <font-awesome-icon :icon="['fas', 'trash']" />
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>

                                    <tbody class="bg-white divide-y divide-gray-200" v-if="virtualOffices.length == 0">
                                        <tr>
                                            <td class="text-center px-6 py-4 whitespace-nowrap" colspan="8">
                                                Data kosong
                                            </td>
                                        </tr>
                                    </tbody>

                                    <tbody class="bg-white divide-y divide-gray-200" v-if="!FilteredCompany">
                                        <tr>
                                            <td class="text-center px-6 py-4 whitespace-nowrap" colspan="6">
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
                                        <div class="col-span-6 sm:col-span-3">
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
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="company_id" class="block text-sm font-medium text-gray-700">Pilih Perusahaan</label>
                                            <select
                                            name="company_id"
                                            v-model="virtualOffice.company_id"
                                            class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
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
                                            <input type="text" v-model="virtualOffice.kode_vo" name="kode_vo" id="kode_vo" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="harga_vo" class="block text-sm font-medium text-gray-700">Harga Virtual Office</label>
                                            <input type="text" v-model="virtualOffice.harga_vo" name="harga_vo" id="harga_vo" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="tanggal_aggrement" class="block text-sm font-medium text-gray-700">Tanggal Aggrement</label>
                                            <input type="date" v-model="format_tanggal_aggrement" name="tanggal_aggrement" id="tanggal_aggrement" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="tanggal_selesai" class="block text-sm font-medium text-gray-700">Tanggal Selesai</label>
                                            <input type="date" v-model="format_tanggal_selesai" name="tanggal_selesai" id="tanggal_selesai" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="fasilitas_meeting_room" class="block text-sm font-medium text-gray-700">Fasilitas Meeting Room</label>
                                            <input type="text" v-model="virtualOffice.fasilitas_meeting_room" name="fasilitas_meeting_room" id="fasilitas_meeting_room" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="fasilitas_konsultasi_pajak" class="block text-sm font-medium text-gray-700">Fasilitas Konsultasi Pajak</label>
                                            <input type="text" v-model="virtualOffice.fasilitas_konsultasi_pajak" name="fasilitas_konsultasi_pajak" id="fasilitas_konsultasi_pajak" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="fasilitas_private_office" class="block text-sm font-medium text-gray-700">Fasilitas Private Office</label>
                                            <input type="text" v-model="virtualOffice.fasilitas_private_office" name="fasilitas_private_office" id="fasilitas_private_office" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                        <div class="col-span-6 sm:col-span-3">
                                            <label for="papan_nama_perusahaan" class="block text-sm font-medium text-gray-700">Papan Nama Perusahaan</label>
                                            <input type="text" v-model="virtualOffice.papan_nama_perusahaan" name="papan_nama_perusahaan" id="papan_nama_perusahaan" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                        </div>
                                    </div>
                                </div>

                                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    <button v-if="modalMode==='ADD'" @click="doAdd" type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-green-600 hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                    Add
                                    </button>
                                    <button v-if="modalMode==='EDIT'" @click="doEdit" type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
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
                search: ""
            }
        },
        methods: {
            toggleColorPicker(){
                this.isOpenColorPicker = !this.isOpenColorPicker
            },
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
                        title: res.data
                    })
                    Fire.$emit('addSuccess')
                    this.isShowModalAdd = !this.isShowModalAdd
                }
            },
            async doEdit(){
                const res = await axios.put('api/virtual-office/'+this.virtualOffice.id, this.virtualOffice)
                if(res.status == 200){
                    Toast.fire({
                        icon: 'success',
                        title: res.data
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
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, hapus saja!"
                    })
                    .then(result => {
                    if (result.value) {
                        axios.delete("/api/virtual-office/" + c)
                        .then(() => {
                            Toast.fire("Menghapus!", "File anda telah terhapus", "success");
                            Fire.$emit("deleteSuccess");
                        })
                        .catch((err) => {
                            console.log(err)
                            Toast.fire("Gagal!", "Ada sesuatu yang salah.", "warning");
                        });
                    }
                });
            },
        },
        created(){
            this.getCompany();
            this.getVirtualOffice();
            Fire.$on('addSuccess', () => {
                console.log('add success')
                this.getVirtualOffice();
            })
            Fire.$on('editSuccess', () => {
                console.log('edit success')
                this.getVirtualOffice();
            })
            Fire.$on('deleteSuccess', () => {
                console.log('delete success')
                this.getVirtualOffice();
            })
        },
        computed: {
            FilteredCompany: function() {
                return this.virtualOffices.filter(virtualOffice => {
                    return (
                        virtualOffice.kode_vo.match(this.search)
                    );
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
