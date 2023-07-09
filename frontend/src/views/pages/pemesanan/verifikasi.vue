<template>
    <div>
        <div class="flex items-center justify-between flex-wrap gap-4">
            <h2 class="text-xl">Verifikasi Pemesanan</h2>
            <div class="flex sm:flex-row flex-col sm:items-center sm:gap-3 gap-4 w-full sm:w-auto">
                <div class="flex gap-3">
                    <div>
                        <router-link :to="role == 'pengemudi'? '/konfirmasi-pemesanan' :'/manajemen-pemesanan'">
                            <button type="button" class="btn btn-light" >
                                Kembali
                            </button>
                        </router-link>
                    </div>
                    <div>
                        <button type="button" class="btn btn-primary" @click="saveUser()">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2">
                                <circle cx="10" cy="6" r="4" stroke="currentColor" stroke-width="1.5" />
                                <path
                                    opacity="0.5"
                                    d="M18 17.5C18 19.9853 18 22 10 22C2 22 2 19.9853 2 17.5C2 15.0147 5.58172 13 10 13C14.4183 13 18 15.0147 18 17.5Z"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                />
                                <path d="M21 10H19M19 10H17M19 10L19 8M19 10L19 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            </svg>

                            {{ role == 'pengemudi' ? 'Konfirmasi Pemesanan' : 'Verifikasi Pemesanan' }}
                        </button>
                    </div>
                    <!-- <div>
                        <button
                            type="button"
                            class="btn btn-outline-primary p-2"
                            :class="{ 'bg-primary text-white': displayType === 'list' }"
                            @click="displayType = 'list'"
                        >
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
                                <path d="M2 5.5L3.21429 7L7.5 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path
                                    opacity="0.5"
                                    d="M2 12.5L3.21429 14L7.5 10"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                />
                                <path d="M2 19.5L3.21429 21L7.5 17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M22 19L12 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                <path opacity="0.5" d="M22 12L12 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                <path d="M22 5L12 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                            </svg>
                        </button>
                    </div> -->
                    <!-- <div>
                        <button
                            type="button"
                            class="btn btn-outline-primary p-2"
                            :class="{ 'bg-primary text-white': displayType === 'grid' }"
                            @click="displayType = 'grid'"
                        >
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5">
                                <path
                                    opacity="0.5"
                                    d="M2.5 6.5C2.5 4.61438 2.5 3.67157 3.08579 3.08579C3.67157 2.5 4.61438 2.5 6.5 2.5C8.38562 2.5 9.32843 2.5 9.91421 3.08579C10.5 3.67157 10.5 4.61438 10.5 6.5C10.5 8.38562 10.5 9.32843 9.91421 9.91421C9.32843 10.5 8.38562 10.5 6.5 10.5C4.61438 10.5 3.67157 10.5 3.08579 9.91421C2.5 9.32843 2.5 8.38562 2.5 6.5Z"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                />
                                <path
                                    opacity="0.5"
                                    d="M13.5 17.5C13.5 15.6144 13.5 14.6716 14.0858 14.0858C14.6716 13.5 15.6144 13.5 17.5 13.5C19.3856 13.5 20.3284 13.5 20.9142 14.0858C21.5 14.6716 21.5 15.6144 21.5 17.5C21.5 19.3856 21.5 20.3284 20.9142 20.9142C20.3284 21.5 19.3856 21.5 17.5 21.5C15.6144 21.5 14.6716 21.5 14.0858 20.9142C13.5 20.3284 13.5 19.3856 13.5 17.5Z"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                />
                                <path
                                    d="M2.5 17.5C2.5 15.6144 2.5 14.6716 3.08579 14.0858C3.67157 13.5 4.61438 13.5 6.5 13.5C8.38562 13.5 9.32843 13.5 9.91421 14.0858C10.5 14.6716 10.5 15.6144 10.5 17.5C10.5 19.3856 10.5 20.3284 9.91421 20.9142C9.32843 21.5 8.38562 21.5 6.5 21.5C4.61438 21.5 3.67157 21.5 3.08579 20.9142C2.5 20.3284 2.5 19.3856 2.5 17.5Z"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                />
                                <path
                                    d="M13.5 6.5C13.5 4.61438 13.5 3.67157 14.0858 3.08579C14.6716 2.5 15.6144 2.5 17.5 2.5C19.3856 2.5 20.3284 2.5 20.9142 3.08579C21.5 3.67157 21.5 4.61438 21.5 6.5C21.5 8.38562 21.5 9.32843 20.9142 9.91421C20.3284 10.5 19.3856 10.5 17.5 10.5C15.6144 10.5 14.6716 10.5 14.0858 9.91421C13.5 9.32843 13.5 8.38562 13.5 6.5Z"
                                    stroke="currentColor"
                                    stroke-width="1.5"
                                />
                            </svg>
                        </button>
                    </div> -->
                </div>

            </div>
        </div>
        <div class="mt-5 panel p-0 border-0 overflow-hidden">
            <template v-if="displayType === 'list'">
                <div class="table-responsive" v-if="contactList">
                    <table class="table-striped table-hover">
                        <tbody>
                            <tr>
                                <th>Kode Pemesanan</th>
                                <td>:</td>
                                <td>{{ contactList.nama }}</td>
                            </tr>
                            <tr>
                                <th>Lokasi</th>
                                <td>:</td>
                                <td>{{ contactList.lokasi }}</td>
                            </tr>
                            <tr>
                                <th>Nomor HP</th>
                                <td>:</td>
                                <td>{{ contactList.nohp }}</td>
                            </tr>
                            <tr>
                                <th>Pengemudi</th>
                                <td>:</td>
                                <td>
                                    <select id="ctnSelect1" v-model="params.sopir" v-if="role == 'operator'" class="form-select text-white-dark">
                                        <option value="">Pilih Pengemudi</option>
                                        <template v-for="item in sopir">
                                            <option :value="item.id">{{ item.nama }}</option>                                             
                                        </template>
                                    </select>
                                    <div v-else-if="verifikasi">
                                        {{ verifikasi.sopir.nama }}
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th>Kenderaan</th>
                                <td>:</td>
                                <td>
                                    <select v-if="role == 'operator'" id="ctnSelect1" v-model="params.mobil" class="form-select text-white-dark">
                                        <option value="">Pilih Kenderaan</option>
                                        <template v-for="item in mobil">
                                            <option :value="item.id">{{ item.nama }} - {{ item.no_plat }}</option>                                             
                                        </template>
                                    </select>
                                    <div v-else-if="verifikasi">
                                        {{ verifikasi.mobil.nama }} -  {{ verifikasi.mobil.no_plat }}
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </template>
        </div>
        <div class="flex">
            <div class="panel sm:w-1/2 m-6 max-w-lg w-full">
                <h2 class="font-bold text-2xl mb-5">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="w-7 h-7 inline-block ltr:mr-1 rtl:ml-1 text-primary" xmlns="http://www.w3.org/2000/svg"><path opacity="0.5" d="M16.755 2H7.24502C6.08614 2 5.50671 2 5.03939 2.16261C4.15322 2.47096 3.45748 3.18719 3.15795 4.09946C3 4.58055 3 5.17705 3 6.37006V20.3742C3 21.2324 3.985 21.6878 4.6081 21.1176C4.97417 20.7826 5.52583 20.7826 5.8919 21.1176L6.375 21.5597C7.01659 22.1468 7.98341 22.1468 8.625 21.5597C9.26659 20.9726 10.2334 20.9726 10.875 21.5597C11.5166 22.1468 12.4834 22.1468 13.125 21.5597C13.7666 20.9726 14.7334 20.9726 15.375 21.5597C16.0166 22.1468 16.9834 22.1468 17.625 21.5597L18.1081 21.1176C18.4742 20.7826 19.0258 20.7826 19.3919 21.1176C20.015 21.6878 21 21.2324 21 20.3742V6.37006C21 5.17705 21 4.58055 20.842 4.09946C20.5425 3.18719 19.8468 2.47096 18.9606 2.16261C18.4933 2 17.9139 2 16.755 2Z" stroke="currentColor" stroke-width="1.5"></path><path d="M10.5 11L17 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path><path d="M7 11H7.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path><path d="M7 7.5H7.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path><path d="M7 14.5H7.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path><path d="M10.5 7.5H17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path><path d="M10.5 14.5H17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path></svg>
                    Keterangan
                </h2>
                <p class="mb-7">Rekam suara anda dengan jelas dengan menekan tombol mic dibawah serta lengkapi nomor telepon agar dapat dihubungi oleh petugas.</p>
                <section id="example-audio">
                    <div class="columns">
                        <div class="column">
                            <div class="recorded-audio">
                            <div  class="recorded-item">
                                <div class="audio-container"><audio class=" w-full" :src="$backend + 'storage/audio/' + contactList.deskripsi" controls /></div>
                                
                            </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="panel sm:w-1/2 m-6 max-w-lg w-full">
                <h2 class="font-bold text-2xl mb-5">
                    <svg
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        fill="none"
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-7 h-7 inline-block ltr:mr-1 rtl:ml-1 text-primary"
                    >
                        <path
                            opacity="0.5"
                            d="M5 8.51464C5 4.9167 8.13401 2 12 2C15.866 2 19 4.9167 19 8.51464C19 12.0844 16.7658 16.2499 13.2801 17.7396C12.4675 18.0868 11.5325 18.0868 10.7199 17.7396C7.23416 16.2499 5 12.0844 5 8.51464Z"
                            stroke="currentColor"
                            stroke-width="1.5"
                        />
                        <path
                            d="M14 9C14 10.1046 13.1046 11 12 11C10.8954 11 10 10.1046 10 9C10 7.89543 10.8954 7 12 7C13.1046 7 14 7.89543 14 9Z"
                            stroke="currentColor"
                            stroke-width="1.5"
                        />
                        <path
                            d="M20.9605 15.5C21.6259 16.1025 22 16.7816 22 17.5C22 19.9853 17.5228 22 12 22C6.47715 22 2 19.9853 2 17.5C2 16.7816 2.37412 16.1025 3.03947 15.5"
                            stroke="currentColor"
                            stroke-width="1.5"
                            stroke-linecap="round"
                        />
                    </svg>
                    Lokasi
                </h2>
                <p class="mb-7 ">Pastikan lokasi anda sudah sesuai dengan titik yang ada dibawah</p>
                <!-- <div class="rounded bg-blue-100 p-3" v-if="coordinates">
                    Anda saat ini berada di {{ address }} ( {{ coordinates.lat }} - {{ coordinates.lng }} ).
                </div> -->
                <div class="map mt-3" v-if="coordinates">
                    <l-map 
                        ref="map" 
                        style="width: 100%; height:200px" 
                        :zoom="maps.zoom" 
                        :center="coordinates"
                        v-if="coordinates"
                        >
                        <l-tile-layer
                            url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
                        ></l-tile-layer>
                        <l-marker
                            visible
                            :icon="icon"
                            :lat-lng="coordinates"
                            
                            >
                        </l-marker>
                    </l-map>
                </div>
            </div>
        </div>
        
        

        <!-- add contact modal -->
        <TransitionRoot appear :show="addContactModal" as="template">
            <Dialog as="div" @close="addContactModal = false" class="relative z-50" style="width:500px">
                <TransitionChild
                    as="template"
                    enter="duration-300 ease-out"
                    enter-from="opacity-0"
                    enter-to="opacity-100"
                    leave="duration-200 ease-in"
                    leave-from="opacity-100"
                    leave-to="opacity-0"
                >
                    <DialogOverlay class="fixed inset-0 bg-[black]/60" />
                </TransitionChild>

                <div class="fixed inset-0 overflow-y-auto">
                    <div class="flex min-h-full items-center justify-center px-4 py-8">
                        <TransitionChild
                            as="template"
                            enter="duration-300 ease-out"
                            enter-from="opacity-0 scale-95"
                            enter-to="opacity-100 scale-100"
                            leave="duration-200 ease-in"
                            leave-from="opacity-100 scale-100"
                            leave-to="opacity-0 scale-95"
                        >
                            <DialogPanel class="panel border-0 p-0 rounded-lg overflow-hidden w-full max-w-lg text-black dark:text-white-dark">
                                <button
                                    type="button"
                                    class="absolute top-4 ltr:right-4 rtl:left-4 text-gray-400 hover:text-gray-800 dark:hover:text-gray-600 outline-none"
                                    @click="addContactModal = false"
                                >
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24px"
                                        height="24px"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        stroke-width="1.5"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="w-6 h-6"
                                    >
                                        <line x1="18" y1="6" x2="6" y2="18"></line>
                                        <line x1="6" y1="6" x2="18" y2="18"></line>
                                    </svg>
                                </button>
                                <div class="text-lg font-medium bg-[#fbfbfb] dark:bg-[#121c2c] ltr:pl-5 rtl:pr-5 py-3 ltr:pr-[50px] rtl:pl-[50px]">
                                    {{ params.id ? 'Perbarui Data' : 'Tambah Data' }}
                                </div>
                                <div class="p-5">
                                    <form @submit.prevent="saveUser">
                                        <div class="flex flex-row gap-2">
                                            <div class="basis-1/2">
                                                <div class="mb-5">
                                                    <label for="name">Nama</label>
                                                    <input id="name" type="text" placeholder="Masukkan Nama" class="form-input" v-model="params.nama" />
                                                </div>
                                            </div>
                                            <div class="basis-1/2">
                                                <div class="mb-5">
                                                    <label for="name">Username</label>
                                                    <input id="name" type="text" placeholder="Masukkan Username" class="form-input" v-model="params.username" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="flex flex-row gap-2">
                                            <div class="basis-1/2">
                                                <div class="mb-5">
                                                    <label for="name">Nomor HP</label>
                                                    <input id="name" type="text" placeholder="Masukkan Nomor HP" class="form-input" v-model="params.nohp" />
                                                </div>
                                            </div>
                                            <div class="basis-1/2">
                                                <div class="mb-5">
                                                    <label for="name">Alamat</label>
                                                    <input id="name" type="text" placeholder="Masukkan Alamat" class="form-input" v-model="params.alamat" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex flex-row gap-2">
                                            <div class="basis-1/2">
                                                <div class="mb-5">
                                                    <label for="email">Email</label>
                                                    <input id="email" type="email" placeholder="Masukkan Email" class="form-input" v-model="params.email" />
                                                </div>
                                            </div>
                                            <div class="basis-1/2">
                                                <div class="mb-5">
                                                    <label for="email">Password</label>
                                                    <input id="password" type="password" placeholder="Masukkan Password" class="form-input" v-model="params.password" />
                                                </div>
                                            </div>
                                        </div>
 
                                        <div class="mb-5">
                                            <label for="ctnFile">Foto Sopir</label>
                                            <input id="ctnFile" @change="onphoto" type="file" class="form-input file:py-2 file:px-4 file:border-0 file:font-semibold p-0 file:bg-primary/90 ltr:file:mr-5 rtl:file:ml-5 file:text-white file:hover:bg-primary"  />
                                        </div>
                                        
                                        
                                        <div class="flex justify-end items-center mt-8">
                                            <button type="button" class="btn btn-outline-danger" @click="addContactModal = false">Cancel</button>
                                            <button type="submit" class="btn btn-primary ltr:ml-4 rtl:mr-4">
                                                {{ params.id ? 'Update' : 'Add' }}
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </DialogPanel>
                        </TransitionChild>
                    </div>
                </div>
            </Dialog>
        </TransitionRoot>
    </div>
</template>
<script lang="ts" setup>
    import { mapState } from 'pinia'
    import { useAuth } from '@/stores/auth'
    import { ref, onMounted, watch, computed } from 'vue';
    import { TransitionRoot, TransitionChild, Dialog, DialogPanel, DialogOverlay } from '@headlessui/vue';
    import Swal from 'sweetalert2';
    import { useRoute, useRouter } from 'vue-router';
    import axios from 'axios'
    import { useMeta } from '@/composables/use-meta';
    useMeta({ title: 'Contacts' });
    
    const defaultParams = ref({
        id: null,
        sopir: '',
        mobil: '',
    });
    const route = useRoute();
    const router = useRouter();


    
    const position = ref({})
    const maps = ref({
        url: 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
        attribution:
            '&copy; <a target="_blank" href="http://osm.org/copyright">OpenStreetMap</a> contributors',
        zoom: 15,
        center: [0.58373246046969, 123.03820610046388],
        markerLatLng: [51.504, -0.159]
    })
    const coordinates = ref(null)
    const store = useAuth()
    const displayType = ref('list');
    const addContactModal = ref(false);
    const params = ref(JSON.parse(JSON.stringify(defaultParams.value)));
    const filterdContactsList: any = ref([]);
    const searchUser = ref('');
    const contactList = ref([]);
    const address = ref('')
    const theErrors = ref([])
    const url = ref('')
    const mobil = ref([])
    const sopir = ref([])
    const verifikasi = ref(null)
    const user:any = computed(() => store.$state.detail_user)
    const role:any = computed(() => store.$state.role)

    onMounted(async () => {
        searchContacts();
        getPemesanan();
       
        if(role.value == 'pengemudi') {
            getVerifikasiPemesanan()
        }else {
            getSopir()
            getMobil()
        }
    });

    watch(user, () => {
        getPemesanan()
    })

    const searchContacts = () => {
        filterdContactsList.value = contactList.value.filter((d) => d.name.toLowerCase().includes(searchUser.value.toLowerCase()));
    };

    const getVerifikasiPemesanan = async () => {
        let response = await axios.get('api/verifikasi/' + route.params.idPemesanan + '/byPemesanan')
        verifikasi.value = response.data.data
    }

    const getSopir = async () => {
        let response = await axios.get('api/sopir/' + user.value.rumah_sakit_id.id + '/byRumah_sakit')
        sopir.value = response.data.data
    }

    const getMobil = async () => {
        let response = await axios.get('api/mobil/' + user.value.rumah_sakit_id.id + '/byRumah_sakit')
        mobil.value = response.data.data
    }


    const getPemesanan = async () => {
        let response = await axios.get('api/pemesanan/' + route.params.idPemesanan)
        contactList.value = response.data.data
        coordinates.value = [response.data.data.lat,response.data.data.lng]
    }

    const editUser = (user: any = null) => {
        params.value = JSON.parse(JSON.stringify(defaultParams.value));
        if (user) {
            params.value = JSON.parse(JSON.stringify(user));
        }

        addContactModal.value = true;
    };

    const onphoto = (e: any) => {
        let type = ['image/jpe', 'image/jpeg', 'image/png', 'image/gif']
            let file = e.target.files[0];
            url.value = URL.createObjectURL(file);
            let reader = new FileReader();
            if (type.includes(file['type'])) {
                params.value.foto = e.target.files[0]
            } else {
                params.value.foto = ''; 
                
            }
    }

    const redirectTo = (path) => {
      router.replace(path);
    };

    const saveUser = () => {
        if(role.value == 'pengemudi') {
        
            //add user
            const form = new FormData;
            form.append('mobil', params.value.mobil)
            form.append('sopir', params.value.sopir)
            axios.post('api/pemesanan/' + route.params.idPemesanan + '/konfirmasi?_method=PUT', form).then(() => {
                showMessage('Data berhasil dikirim.');
                addContactModal.value = false;
                getPemesanan()
                const toast = Swal.mixin({
                    toast: true,
                    position: 'bottom-start',
                    showConfirmButton: false,
                    timer: 3000,
                    showCloseButton: true,
                    customClass: {
                        popup: `color-success`
                    },
                    target: document.getElementById('success-toast')
                });
                redirectTo('/konfirmasi-pemesanan')
                toast.fire({
                    title: 'Data berhasil diverifikasi',
                });
                }).catch((err) =>{
                    theErrors.value = err.response.data.errors
                    const toast = Swal.mixin({
                        toast: true,
                        position: 'bottom-start',
                        showConfirmButton: false,
                        timer: 3000,
                        showCloseButton: true,
                        customClass: {
                            popup: `color-danger`
                        },
                        target: document.getElementById('danger-toast')
                    });
                    toast.fire({
                        title: err,
                    });
                })
        }else {
            if (!params.value.mobil) {
                showMessage('Mobil is required.', 'error');
                return true; 
            }
            if (!params.value.sopir) {
                showMessage('Sopir is required.', 'error');
                return true;
            }
            
            //add user
            const form = new FormData;
            form.append('mobil', params.value.mobil)
            form.append('sopir', params.value.sopir)
            axios.post('api/pemesanan/' + route.params.idPemesanan + '?_method=PUT', form).then(() => {
                showMessage('Data berhasil dikirim.');
                addContactModal.value = false;
                getPemesanan()
                const toast = Swal.mixin({
                    toast: true,
                    position: 'bottom-start',
                    showConfirmButton: false,
                    timer: 3000,
                    showCloseButton: true,
                    customClass: {
                        popup: `color-success`
                    },
                    target: document.getElementById('success-toast')
                });
                redirectTo('/manajemen-pemesanan')
                toast.fire({
                    title: 'Data berhasil diverifikasi',
                });
                }).catch((err) =>{
                    theErrors.value = err.response.data.errors
                    const toast = Swal.mixin({
                        toast: true,
                        position: 'bottom-start',
                        showConfirmButton: false,
                        timer: 3000,
                        showCloseButton: true,
                        customClass: {
                            popup: `color-danger`
                        },
                        target: document.getElementById('danger-toast')
                    });
                    toast.fire({
                        title: err,
                    });
                })
        }
    };

    const deleteUser = (user: any = null) => {
        axios.delete(`api/sopir/${user.id}`, user).then(() => {
            getPemesanan()
            const toast = Swal.mixin({
                    toast: true,
                    position: 'bottom-start',
                    showConfirmButton: false,
                    timer: 3000,
                    showCloseButton: true,
                    customClass: {
                        popup: `color-success`
                    },
                    target: document.getElementById('success-toast')
                });
                toast.fire({
                    title: 'Data berhasil dihapus',
                });
        }).catch(() =>{
            const toast = Swal.mixin({
                    toast: true,
                    position: 'bottom-start',
                    showConfirmButton: false,
                    timer: 3000,
                    showCloseButton: true,
                    customClass: {
                        popup: `color-dasnger`
                    },
                    target: document.getElementById('success-toast')
                });
                toast.fire({
                    title: 'Terjadi Kesalahan',
                });
        })
        // contactList.value = contactList.value.filter((d) => d.id != user.id);
        // searchContacts();
        // showMessage('User has been deleted successfully.');
    };

    const showMessage = (msg = '', type = 'success') => {
        const toast: any = Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            timer: 3000,
            customClass: { container: 'toast' },
        });
        toast.fire({
            icon: type,
            title: msg,
            padding: '10px 20px',
        });
    };
</script>
