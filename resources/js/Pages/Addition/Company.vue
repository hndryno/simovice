<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Category
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
                            placeholder="Cari Perusahaan .."
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
                                             <th scope="col" class="whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                No
                                            </th>
                                            <th scope="col" class="whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Nama Perusahaan
                                            </th>
                                            <th scope="col" class="whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Pic
                                            </th>
                                            <th scope="col" class="whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Telepon
                                            </th>
                                            <th scope="col" class="whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Email
                                            </th>
                                            <th scope="col" class="whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Tanggal Dibuat
                                            </th>
                                            <th scope="col" class="whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Tanggal Diedit
                                            </th>
                                            <th scope="col" class="whitespace-nowrap px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200" v-if="companies.length > 0">
                                        <tr v-for="(c, index) in FilteredCompany" :key="c.id">
                                             <td class="px-4 py-3 whitespace-nowrap">
                                                <div class="flex items-center">
                                                <div class="text-sm text-gray-900">{{index + 1}}</div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap">
                                                <div class="flex items-center">
                                                <div class="text-sm text-gray-900">{{c.nama_perusahaan}}</div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap">
                                                <div class="flex items-center">
                                                <div class="text-sm text-gray-900">{{c.pic}}</div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap">
                                                <div class="flex items-center">
                                                <div class="text-sm text-gray-900">{{c.telepon}}</div>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 whitespace-nowrap">
                                                <div class="flex items-center">
                                                <div class="text-sm text-gray-900">{{c.email}}</div>
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
                                            <td class="px-4 py-3 whitespace-nowrap">
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

                                    <tbody class="bg-white divide-y divide-gray-200" v-if="companies.length == 0">
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
                                        <label for="nama_perusahaan" class="block text-sm font-medium text-gray-700">Nama Perusahaan</label>
                                        <input type="text" v-model="company.nama_perusahaan" name="nama_perusahaan" id="nama_perusahaan" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="pic" class="block text-sm font-medium text-gray-700">Pic</label>
                                        <input type="text" v-model="company.pic" name="pic" id="nama_perusahaan" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="telepon" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                                        <input type="text" v-model="company.telepon" name="telepon" id="nama_perusahaan" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                        <input type="text" v-model="company.email" name="email" id="nama_perusahaan" class="mt-1 focus:ring-green-500 focus:border-green-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                </div>

                                <div v-if="modalMode==='EDIT'" class="grid grid-cols-6 grid-rows-3 gap-6">
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="nama_perusahaan" class="block text-sm font-medium text-gray-700">Nama Perusahaan</label>
                                        <input type="text" v-model="company.nama_perusahaan" name="nama_perusahaan" id="nama_perusahaan" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="pic" class="block text-sm font-medium text-gray-700">Pic</label>
                                        <input type="text" v-model="company.pic" name="pic" id="nama_perusahaan" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="telepon" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                                        <input type="text" v-model="company.telepon" name="telepon" id="nama_perusahaan" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                    </div>
                                    <div class="col-span-6 sm:col-span-3">
                                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                                        <input type="text" v-model="company.email" name="email" id="nama_perusahaan" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
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
        data() {
            return {
                modalMode: '',
                isShowModalAdd: false,
                isShowModalEdit: false,
                companies: [],
                company: new Form({
                    id: '',
                    nama_perusahaan: '',
                     pic: '',
                    telepon: '',
                    email: '',
                }),
                search: ""
            }
        },
        methods: {
            toggleColorPicker(){
                this.isOpenColorPicker = !this.isOpenColorPicker
            },
            toggleModalAdd(){
                this.company.reset();
                this.isShowModalAdd = !this.isShowModalAdd
                this.modalMode = 'ADD'
            },
            toggleModalEdit(c){
                this.company.reset();
                this.isShowModalEdit = !this.isShowModalEdit
                this.modalMode = 'EDIT'
                this.company.fill(c);
            },
            async getCompany(){
                await axios.get('api/company', this.company)
                .then((res) => {
                    this.companies = res.data
                }).catch((err) => {
                    console.log(err.response)
                });
            },
            async doAdd(){
                const res = await axios.post('api/company', this.company)
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
                const res = await axios.put('api/company/'+this.company.id, this.company)
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
                        axios.delete("/api/company/" + c)
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
            Fire.$on('addSuccess', () => {
                console.log('add success')
                this.getCompany()
            })
            Fire.$on('editSuccess', () => {
                console.log('edit success')
                this.getCompany()
            })
            Fire.$on('deleteSuccess', () => {
                console.log('delete success')
                this.getCompany()
            })
        },
        computed: {
            FilteredCompany: function() {
                return this.companies.filter(company => {
                    return (
                        company.nama_perusahaan.match(this.search)
                    );
                });
            }
        }
    }
</script>
