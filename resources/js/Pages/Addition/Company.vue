<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                List Perusahaan
            </h2>
        </template>

        <div class="container">

            <div class="py-12">
                <div class="float-right md:mr-8">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCompany" @click="tambahModal">
                        Tambah Data
                    </button>
                </div>

                <div class="float-left ml-8">
                     <div class="form-group">
                        <input
                            class="float-left form-control"
                            type="text"
                            v-model="search"
                            placeholder="Cari Perusahaan .."
                            />
                    </div>
                 </div>

            </div>

        </div>

            <div class="py-3">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <!-- This example requires Tailwind CSS v2.0+ -->
                            <div class="flex flex-col">
                            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-gray-50">
                                        <tr>
                                             <th scope="col" class="text-center px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                No
                                            </th>
                                            <th scope="col" class="text-center px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Nama Perusahaan
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Pic
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Telepon
                                            </th>
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Email
                                            </th>
                                            <th scope="col" class="text-center px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Tanggal Dibuat
                                            </th>
                                            <th scope="col" class="text-center px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Tanggal Diedit
                                            </th>
                                            <th scope="col" class="text-center px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200" v-if="companies.length > 0">
                                        <tr v-for="(c, index) in FilteredCompany" :key="c.id">
                                             <td class="text-center px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                <div class="text-sm text-gray-900">{{index + 1}}</div>
                                                </div>
                                            </td>
                                            <td class="text-center px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                <div class="text-sm text-gray-900">{{c.nama_perusahaan}}</div>
                                                </div>
                                            </td>
                                            <td class="text-center px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                <div class="text-sm text-gray-900">{{c.pic}}</div>
                                                </div>
                                            </td>
                                            <td class="text-center px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                <div class="text-sm text-gray-900">{{c.telepon}}</div>
                                                </div>
                                            </td>
                                            <td class="text-center px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                <div class="text-sm text-gray-900">{{c.email}}</div>
                                                </div>
                                            </td>
                                            <td class="text-center px-6 py-4 whitespace-nowrap">
                                                <div class="text-sm text-gray-900"> {{convertUnixTS(c.created_at)}}</div>
                                            </td>
                                            <td class="text-center px-6 py-4 whitespace-nowrap">
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    {{convertUnixTS(c.updated_at)}}
                                                </span>
                                            </td>
                                            <td class="text-center px-6 py-4 whitespace-nowrap">
                                                    <div class="btn-group" role="group">
                                                    <button
                                                        class="btn btn-info waves-effect waves-light"
                                                        @click="editModal(c)"
                                                    >
                                                        <font-awesome-icon :icon="['fas', 'paint-brush']" />
                                                    </button>
                                                    <button
                                                        class="btn btn-danger waves-effect waves-light"
                                                        @click="deleteCompany(c.id)"
                                                    >
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
                        <!-- end table -->
                    </div>
                </div>
            </div>
        <!-- </div> -->

<!-- modal -->
           <div class="modal fade" id="addCompany" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 v-show="!editMode" class="modal-title" id="exampleModalLabel">Tambah Perusahaan</h5>
                        <h5 v-show="editMode" class="modal-title" id="exampleModalLabel">Ubah Perusahaan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="formCompany" @submit.prevent="editMode ? updateCompany() : addCompany()">
                            <div class="form-group">
                                <label for="nama_perusahaan">Nama Perusahaan</label>
                                <input type="text" v-model="company.nama_perusahaan" class="form-control" name="nama_perusahaan" id="nama_perusahaan" aria-describedby="helpId" placeholder="Masukan Nama Perusahaan .." required>
                                <!-- <small id="helpId" class="form-text text-muted">Masukan nama Perusahaan</small> -->
                            </div>
                             <div class="form-group">
                                <label for="pic">Pic</label>
                                <input type="text" v-model="company.pic" class="form-control" name="pic" id="pic" aria-describedby="helpId" placeholder="Masukan Pic ..">
                            </div>
                            <div class="form-group">
                                <label for="telepon">Nomor Telepon</label>
                                <input type="number" v-model="company.telepon" class="form-control" name="telepon" id="telepon" aria-describedby="helpId" placeholder="Masukan Nomor Telepon ..">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" v-model="company.email" class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="Masukan email ..">
                            </div>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <button
                                v-show="!editMode"
                                type="submit"
                                class="btn btn-primary waves-effect waves-light"
                            >Simpan</button>
                            <button
                                v-show="editMode"
                                type="submit"
                                class="btn btn-primary waves-effect waves-light"
                            >Update</button>
                            <!-- <button type="submit" class="btn btn-primary">Simpan</button> -->
                        </form>
                    </div>
                    <div class="modal-footer">

                    </div>
                    </div>
                </div>
            </div>

<!-- end modal -->
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
                editMode: false,
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
            async addCompany(){
                const res = await axios.post('api/company', this.company)

                console.log(res)

                if(res.status == 201){
                    Toast.fire({
                        icon: 'success',
                        title: res.data
                    })

                    document.getElementById('formCompany').reset()
                    $("#addCompany").modal('hide')

                    Fire.$emit('addedCompany')
                }
            },
            async updateCompany(){
                const res = await axios.put('api/company/'+this.company.id, this.company)

                if(res.status == 200){
                    Toast.fire({
                        icon: 'success',
                        title: res.data
                    })

                    document.getElementById('formCompany').reset()
                    $("#addCompany").modal('hide')

                    Fire.$emit('addedCompany')
                }
            },
            async deleteCompany(c){
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
                            Fire.$emit("addedCompany");
                        })
                        .catch((err) => {
                            console.log(err)
                            Toast.fire("Gagal!", "Ada sesuatu yang salah.", "warning");
                        });
                    }
                });
            },
            async getCompany(){
                console.log(this.companies.length)
                await axios.get('api/company', this.company)
                .then((res) => {
                    this.companies = res.data
                }).catch((err) => {
                    console.log(err)
                });
            },
            editModal(c) {
                this.company.reset();
                this.editMode = true;
                $("#addCompany").modal("show");
                this.company.fill(c);
            },
            tambahModal() {
                this.company.reset();
                this.editMode = false;
                $("#addCompany").modal("show");
            },
        },
        created(){
            this.getCompany();
            Fire.$on('addedCompany', () => {
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
