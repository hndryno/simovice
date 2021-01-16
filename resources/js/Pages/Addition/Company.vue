<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                List Perusahaan
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCompany">
                    Tambah Data Perusahaan
                </button>
            </div>
            <br>
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
                                            Dibuat Oleh
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Tanggal Dibuat
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Tanggal Diedit
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    <tr v-for="c in companies" :key="c.id">
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="flex items-center">
                                               <div class="text-sm text-gray-900">{{c.nama_perusahaan}}</div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-gray-900">Regional Paradigm Technician</div>
                                            <div class="text-sm text-gray-500">Optimization</div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <!-- <div class="text-sm text-gray-900">{{c.created_at}}</div> -->
                                             <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                                {{convertUnixTS(c.updated_at)}}
                                            </span>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                {{convertUnixTS(c.updated_at)}}
                                            </span>
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

        <!-- <template #footer> -->

            <!-- <div class="align-center">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCompany">
                        Tambah Data Perusahaan
                    </button>
            </div> -->

           <div class="modal fade" id="addCompany" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah Perusahaan Baru</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="formCompany" @submit.prevent="addCompany">
                            <div class="form-group">
                                <label for="nama_perusahaan">Nama Perusahaan</label>
                                <input type="text" v-model="company.nama_perusahaan" class="form-control" name="nama_perusahaan" id="nama_perusahaan" aria-describedby="helpId" placeholder="Masukan Nama Perusahaan ..">
                                <small id="helpId" class="form-text text-muted">Masukan nama Perusahaan</small>
                            </div>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
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
                companies: [],
                company: {
                    nama_perusahaan: '',
                    created_at: ''
                }
            }
        },
        methods: {
            convertUnixTS(date){
                let data = moment.locale("id");
                return moment(date, "YYYY-MM-DD").format("D MMMM YYYY");
            },
            async addCompany(){
                const res = await axios.post('api/company', this.company)

                if(res.status == 201){
                    Toast.fire({
                        icon: 'Success',
                        title: res.data
                    })

                    document.getElementById('formCompany').reset()
                    $("#addCompany").modal('hide')

                    Fire.$emit('addedCompany')
                }
            },
            async getCompany(){
                await axios.get('api/company', this.company)
                .then((res) => {
                    this.companies = res.data
                }).catch((err) => {
                    console.log(err)
                });
  
                console.log(moment().format());
            }
        },
        created(){
            this.getCompany();
            Fire.$on('addedCompany', () => {
                this.getCompany()
            })
        }
}
</script>
