<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Monitoring
            </h2>
        </template>
    
        <div class="py-12">
             
            <div class="md:container md:mx-auto">
                <div class="row">
                    <div class="col-md-6">
                        <form @submit.prevent="searchVo">
                        <div class="input-group col-md-10">
                            <input class="form-control" type="search" placeholder="Masukan Kode Virtual Office" id="example-search-input" v-model="search">
                            <span class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    Cari Data
                                </button>
                            </span>
                        </div>
                        </form>

                        <div class="py-5">
                            <div class="card">
                                <div class="card-header">
                                    Data Perusahaan
                                </div>

                                <div class="card-body" v-if="company.hasOwnProperty('id')">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><b>Nama Perusahaan : </b>{{company.company.nama_perusahaan}}</li>
                                        <li class="list-group-item"><b>PIC : </b>{{company.company.pic}} </li>
                                        <li class="list-group-item"><b>Telepon :</b>{{company.company.telepon}} </li>
                                        <li class="list-group-item"><b>Email : </b>{{company.company.email}} </li>
                                    </ul>
                                </div>

                                <div class="card-body" v-else>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><b>Nama Perusahaan : </b>Data Kosong</li>
                                        <li class="list-group-item"><b>PIC : </b>Data Kosong</li>
                                        <li class="list-group-item"><b>Telepon : </b>Data Kosong</li>
                                        <li class="list-group-item"><b>Email : </b>Data Kosong</li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-6">
                       
                        <div class="card">
                            
                                <div class="card-header">
                                    Virtual Office
                                </div>

                                <div class="card-body" v-if="company.hasOwnProperty('company')">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><b>Harga Vo : {{company.harga_vo}} </b></li>
                                        <li class="list-group-item"><b>Tanggal Aggrement : {{company.tanggal_aggrement}} </b></li>
                                        <li class="list-group-item"><b>Tanggal Selesai : </b>{{company.tanggal_selesai}}</li>
                                        <li class="list-group-item"><b>Fasilitas Meeting Room : </b>{{company.fasilitas_konsultasi_pajak}}</li>
                                        <li class="list-group-item"><b>Fasilitas Konsultasi Pajak : </b>{{company.fasilitas_private_office}}</li>
                                        <li class="list-group-item"><b>Fasilitas Private Office : </b>{{company.fasilitas_private_office}}</li>
                                        <li class="list-group-item"><b>Papan Nama Perusahaan : </b>{{company.papan_nama_perusahaan}}</li>

                                    </ul>
                                </div>

                                 <div class="card-body" v-else>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item"><b>Harga Vo : </b>Data Kosong</li>
                                        <li class="list-group-item"><b>Tanggal Aggrement : </b>Data Kosong</li>
                                        <li class="list-group-item"><b>Tanggal Selesai : </b>Data Kosong</li>
                                        <li class="list-group-item"><b>Fasilitas Meeting Room : </b>Data Kosong</li>
                                        <li class="list-group-item"><b>Fasilitas Konsultasi Pajak : </b>Data Kosong</li>
                                        <li class="list-group-item"><b>Fasilitas Private Office : </b>Data Kosong</li>
                                        <li class="list-group-item"><b>Papan Nama Perusahaan : </b>Data Kosong</li>

                                    </ul>
                                </div>
                            </div>
                        <div class="py-4"></div>


                             <div class="">
                            <div class="flex flex-col">
                             <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                <table class="min-w-full divide-y divide-gray-200">
                                        <thead class="bg-gray-50">
                                            <tr>
                                                <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Jan
                                                </th>
                                                <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Feb
                                                </th>
                                                <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Mar
                                                </th>
                                                <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Apr
                                                </th>
                                                <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Mei
                                                </th>
                                                <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Jun
                                                </th>
                                                <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Jul
                                                </th>
                                                <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Agu
                                                </th>
                                                <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Sep
                                                </th>
                                                <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Okt
                                                </th>
                                                <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Nov
                                                </th>
                                                <th scope="col" class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                                    Des
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-gray-50">
                                            <tr>
                                                <td class="text-center px-6 py-4 whitespace-nowrap" colspan="12">
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
