<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                List Virtual Office
            </h2>
        </template>

        <!-- <div class="container mx-auto px-4"> -->
            <div class="container">
            <div class="py-12">
                <div class="float-right md:mr-8">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addvirtualOffice" @click="tambahModal">
                        Tambah Data
                    </button>
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
                                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
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
                                        <tr v-for="c in virtualOffices" :key="c.id">
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                <div class="text-sm text-gray-900">{{c.company.nama_perusahaan}}</div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                <div class="text-sm text-gray-900">{{c.pic}}</div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                <div class="text-sm text-gray-900">{{c.telepon}}</div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                <div class="text-sm text-gray-900">{{c.email}}</div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                <div class="text-sm text-gray-900">{{c.harga_vo}}</div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                <div class="text-sm text-gray-900">{{c.tanggal_aggrement}}</div>
                                                </div>
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                <div class="text-sm text-gray-900">{{c.tanggal_selesai}}</div>
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
                                                <div class="text-sm text-gray-900">{{c.papan_nama_perusahaan}}</div>
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
                                            <td class="px-6 py-4 whitespace-nowrap">
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
                                        <!-- More items... -->
                                    </tbody>

                                    <tbody class="bg-white divide-y divide-gray-200" v-if="virtualOffices.length == 0">
                                        <tr>
                                            <td class="text-center px-6 py-4 whitespace-nowrap" colspan="11">
                                                Data kosong
                                            </td>
                                        </tr>
                                        <!-- More items... -->
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

        <!-- <template #footer> -->

            <!-- <div class="align-center">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addvirtualOffice">
                        Tambah Data Perusahaan
                    </button>
            </div> -->

           <div class="modal fade" id="addvirtualOffice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 v-show="!editMode" class="modal-title" id="exampleModalLabel">Tambah Virtual Office</h5>
                        <h5 v-show="editMode" class="modal-title" id="exampleModalLabel">Ubah Perusahaan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="formvirtualOffice" @submit.prevent="editMode ? updatevirtualOffice() : addvirtualOffice()">
                            <!-- <div class="form-group">
                                <label for="company_id">Nama Perusahaan</label>
                                <input type="text" v-model="virtualOffice.company_id" class="form-control" name="company_id" id="company_id" aria-describedby="helpId" placeholder="Masukan Nama Perusahaan ..">
                            </div> -->
                            <div class="form-group">
                                <label for>Pilih Perusahaan</label>
                                <select
                                name="company_id"
                                v-model="virtualOffice.company_id"
                                class="form-control"
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
                             <div class="form-group">
                                <label for="pic">Pic</label>
                                <input type="text" v-model="virtualOffice.pic" class="form-control" name="pic" id="pic" aria-describedby="helpId" placeholder="Masukan Pic ..">
                            </div>
                            <div class="form-group">
                                <label for="telepon">Nomor Telepon</label>
                                <input type="number" v-model="virtualOffice.telepon" class="form-control" name="telepon" id="telepon" aria-describedby="helpId" placeholder="Masukan Nomor Telepon ..">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" v-model="virtualOffice.email" class="form-control" name="email" id="email" aria-describedby="helpId" placeholder="Masukan email ..">
                            </div>
                             <div class="form-group">
                                <label for="harga_vo">Harga Virtual Office</label>
                                <input type="text" v-model="virtualOffice.harga_vo" class="form-control" name="harga_vo" id="harga_vo" aria-describedby="helpId" placeholder="Masukan Harga Virtual Office ..">
                            </div>
                            <div class="form-group">
                                <label for="tanggal_aggrement">Tanggal Aggrement</label>
                                <input type="date" v-model="virtualOffice.tanggal_aggrement" class="form-control" name="tanggal_aggrement" id="tanggal_aggrement" aria-describedby="helpId" placeholder="Masukan Tanggal Aggrement ..">
                            </div>
                             <div class="form-group">
                                <label for="tanggal_selesai">Tanggal Selesai</label>
                                <input type="date" v-model="virtualOffice.tanggal_selesai" class="form-control" name="tanggal_selesai" id="tanggal_selesai" aria-describedby="helpId" placeholder="Masukan Tanggal Selesai ..">
                            </div>
                            <div class="form-group">
                                <label for="fasilitas_meeting_room">Fasilitas Meeting Room</label>
                                <input type="text" v-model="virtualOffice.fasilitas_meeting_room" class="form-control" name="fasilitas_meeting_room" id="fasilitas_meeting_room" aria-describedby="helpId" placeholder="Masukan Fasilitas Meeting Room ..">
                            </div>
                            <div class="form-group">
                                <label for="fasilitas_konsultasi_pajak">fasilitas_konsultasi_pajak</label>
                                <input type="text" v-model="virtualOffice.fasilitas_konsultasi_pajak" class="form-control" name="fasilitas_konsultasi_pajak" id="fasilitas_konsultasi_pajak" aria-describedby="helpId" placeholder="Masukan fasilitas_konsultasi_pajak ..">
                            </div>
                            <div class="form-group">
                                <label for="fasilitas_private_office">Fasilitas Private Office</label>
                                <input type="text" v-model="virtualOffice.fasilitas_private_office" class="form-control" name="fasilitas_private_office" id="fasilitas_private_office" aria-describedby="helpId" placeholder="Masukan Fasilitas Private Office ..">
                            </div>
                            <div class="form-group">
                                <label for="papan_nama_perusahaan">Papan Nama Perusahaan</label>
                                <input type="text" v-model="virtualOffice.papan_nama_perusahaan" class="form-control" name="papan_nama_perusahaan" id="papan_nama_perusahaan" aria-describedby="helpId" placeholder="Masukan Papan Nama Perusahaan ..">
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

        <!-- </template> -->
   
    </app-layout>

    
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'
    import Welcome from '@/Jetstream/Welcome'
    import moment from 'moment'

    export default {
        components: {
            AppLayout,
            Welcome,
        },

        data(){
            return{
                editMode: false,
                virtualOffices: [],
                companies: [],
                virtualOffice: new Form({
                    id: '',
                    company_id: '',
                    pic: '',
                    telepon: '',
                    email: '',
                    harga_vo: '',
                    tanggal_aggrement: '',
                    tanggal_selesai: '',
                    fasilitas_meeting_room: '',
                    fasilitas_konsultasi_pajak: '',
                    fasilitas_private_office: '',
                    papan_nama_perusahaan: ''
                }),
            }
        },
        methods: {
            convertUnixTS(date){
                let data = moment.locale("id");
                return moment(date, "YYYY-MM-DD").format("D MMMM YYYY");
            },
            async addvirtualOffice(){
                const res = await axios.post('api/virtual-office', this.virtualOffice)

                if(res.status == 201){
                    Toast.fire({
                        icon: 'Success',
                        title: res.data
                    })

                    document.getElementById('formvirtualOffice').reset()
                    $("#addvirtualOffice").modal('hide')

                    Fire.$emit('addedvirtualOffice')
                }
            },
            async updatevirtualOffice(){
                const res = await axios.put('api/virtual-office/'+this.virtualOffice.id, this.virtualOffice)

                if(res.status == 200){
                    Toast.fire({
                        icon: 'Success',
                        title: res.data
                    })

                    document.getElementById('formvirtualOffice').reset()
                    $("#addvirtualOffice").modal('hide')

                    Fire.$emit('addedvirtualOffice')
                }
            },
            async deletevirtualOffice(c){
                Toast
                    .fire({
                    title: "Apakah anda yakin?",
                    text: "Data yang dihapus tidak bisa dikembalikan!",
                    type: "warning",
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
                            Fire.$emit("addedvirtualOffice");
                        })
                        .catch(() => {
                            Toast.fire("Gagal!", "Ada sesuatu yang salah.", "warning");
                        });
                    }
                });
            },
            async getvirtualOffice(){
                // await axios.get('api/virtual-office', this.virtualOffice)
                await axios.get('api/virtual-office')
                .then((res) => {
                    console.log(res)
                    this.virtualOffices = res.data
                }).catch((err) => {
                    console.log(err)
                });
            },
            async getCompany(){
                await axios.get('api/company')
                .then((res) => {
                    // console.log(res)
                    this.companies = res.data
                }).catch((err) => {
                    console.log(err)
                });
            },
            editModal(c) {
                this.virtualOffice.reset();
                this.editMode = true;
                $("#addvirtualOffice").modal("show");
                this.virtualOffice.fill(c);
            },
            tambahModal() {
                this.virtualOffice.reset();
                this.editMode = false;
                $("#addvirtualOffice").modal("show");
            },
        },
        created(){
            this.getvirtualOffice();
            this.getCompany();
            Fire.$on('addedvirtualOffice', () => {
                this.getvirtualOffice()
            })
        }
}
</script>
