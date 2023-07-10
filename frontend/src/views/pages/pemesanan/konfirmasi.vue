<template>
    <div>
        <div class="flex items-center justify-between flex-wrap gap-4">
            <h2 class="text-xl">Konfirmasi Pemesanan</h2>
            <div class="flex sm:flex-row flex-col sm:items-center sm:gap-3 gap-4 w-full sm:w-auto">
                <div class="flex gap-3">
                    <div>
                        <!-- <button type="button" class="btn btn-primary" @click="editUser()">
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

                            Tambah Data
                        </button> -->
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

                <div class="relative">
                    <input
                        type="text"
                        placeholder="Search Data"
                        class="form-input py-2 ltr:pr-11 rtl:pl-11 peer"
                        v-model="searchUser"
                        @keyup="searchContacts"
                    />
                    <div class="absolute ltr:right-[11px] rtl:left-[11px] top-1/2 -translate-y-1/2 peer-focus:text-primary">
                        <svg class="mx-auto" width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="11.5" cy="11.5" r="9.5" stroke="currentColor" stroke-width="1.5" opacity="0.5"></circle>
                            <path d="M18.5 18.5L22 22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-5 panel p-0 border-0 overflow-hidden">

            <template v-if="displayType === 'list'">
                <div class="table-responsive">
                    <table class="table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Kode Pemesanan</th>
                                <th>Alamat</th>
                                <th>Nomor HP</th>
                                <th>Status</th>
                                <th>Dibuat pada</th>
                                
                                <th class="!text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="contact in contactList" :key="contact.id">
                                <tr>
                                <td>
                                        <div class="flex items-center justify-center">
                                            <button @click="setStatus(contact)" :disabled="contact.status == 'dikonfirmasi_sopir' ? false : true" type="button" v-tippy:button class="mr-2 btn btn-success btn-sm">
                                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"><path d="M20.9751 12.1852L20.2361 12.0574L20.9751 12.1852ZM20.2696 16.265L19.5306 16.1371L20.2696 16.265ZM6.93776 20.4771L6.19055 20.5417H6.19055L6.93776 20.4771ZM6.1256 11.0844L6.87281 11.0198L6.1256 11.0844ZM13.9949 5.22142L14.7351 5.34269V5.34269L13.9949 5.22142ZM13.3323 9.26598L14.0724 9.38725V9.38725L13.3323 9.26598ZM6.69813 9.67749L6.20854 9.10933H6.20854L6.69813 9.67749ZM8.13687 8.43769L8.62646 9.00585H8.62646L8.13687 8.43769ZM10.518 4.78374L9.79207 4.59542L10.518 4.78374ZM10.9938 2.94989L11.7197 3.13821L11.7197 3.13821L10.9938 2.94989ZM12.6676 2.06435L12.4382 2.77841L12.4382 2.77841L12.6676 2.06435ZM12.8126 2.11093L13.0419 1.39687L13.0419 1.39687L12.8126 2.11093ZM9.86194 6.46262L10.5235 6.81599V6.81599L9.86194 6.46262ZM13.9047 3.24752L13.1787 3.43584V3.43584L13.9047 3.24752ZM11.6742 2.13239L11.3486 1.45675L11.3486 1.45675L11.6742 2.13239ZM20.2361 12.0574L19.5306 16.1371L21.0086 16.3928L21.7142 12.313L20.2361 12.0574ZM13.245 21.25H8.59634V22.75H13.245V21.25ZM7.68497 20.4125L6.87281 11.0198L5.37839 11.149L6.19055 20.5417L7.68497 20.4125ZM19.5306 16.1371C19.0238 19.0677 16.3813 21.25 13.245 21.25V22.75C17.0712 22.75 20.3708 20.081 21.0086 16.3928L19.5306 16.1371ZM13.2548 5.10015L12.5921 9.14472L14.0724 9.38725L14.7351 5.34269L13.2548 5.10015ZM7.18772 10.2456L8.62646 9.00585L7.64728 7.86954L6.20854 9.10933L7.18772 10.2456ZM11.244 4.97206L11.7197 3.13821L10.2678 2.76157L9.79207 4.59542L11.244 4.97206ZM12.4382 2.77841L12.5832 2.82498L13.0419 1.39687L12.897 1.3503L12.4382 2.77841ZM10.5235 6.81599C10.8354 6.23198 11.0777 5.61339 11.244 4.97206L9.79207 4.59542C9.65572 5.12107 9.45698 5.62893 9.20041 6.10924L10.5235 6.81599ZM12.5832 2.82498C12.8896 2.92342 13.1072 3.16009 13.1787 3.43584L14.6306 3.05921C14.4252 2.26719 13.819 1.64648 13.0419 1.39687L12.5832 2.82498ZM11.7197 3.13821C11.7547 3.0032 11.8522 2.87913 11.9998 2.80804L11.3486 1.45675C10.8166 1.71309 10.417 2.18627 10.2678 2.76157L11.7197 3.13821ZM11.9998 2.80804C12.1345 2.74311 12.2931 2.73181 12.4382 2.77841L12.897 1.3503C12.3872 1.18655 11.8312 1.2242 11.3486 1.45675L11.9998 2.80804ZM14.1537 10.9842H19.3348V9.4842H14.1537V10.9842ZM14.7351 5.34269C14.8596 4.58256 14.824 3.80477 14.6306 3.0592L13.1787 3.43584C13.3197 3.97923 13.3456 4.54613 13.2548 5.10016L14.7351 5.34269ZM8.59634 21.25C8.12243 21.25 7.726 20.887 7.68497 20.4125L6.19055 20.5417C6.29851 21.7902 7.34269 22.75 8.59634 22.75V21.25ZM8.62646 9.00585C9.30632 8.42 10.0391 7.72267 10.5235 6.81599L9.20041 6.10924C8.85403 6.75767 8.30249 7.30493 7.64728 7.86954L8.62646 9.00585ZM21.7142 12.313C21.9695 10.8365 20.8341 9.4842 19.3348 9.4842V10.9842C19.9014 10.9842 20.3332 11.4959 20.2361 12.0574L21.7142 12.313ZM12.5921 9.14471C12.4344 10.1076 13.1766 10.9842 14.1537 10.9842V9.4842C14.1038 9.4842 14.0639 9.43901 14.0724 9.38725L12.5921 9.14471ZM6.87281 11.0198C6.84739 10.7258 6.96474 10.4378 7.18772 10.2456L6.20854 9.10933C5.62021 9.61631 5.31148 10.3753 5.37839 11.149L6.87281 11.0198Z" fill="currentColor"></path><path opacity="0.5" d="M3.9716 21.4709L3.22439 21.5355L3.9716 21.4709ZM3 10.2344L3.74721 10.1698C3.71261 9.76962 3.36893 9.46776 2.96767 9.48507C2.5664 9.50239 2.25 9.83274 2.25 10.2344L3 10.2344ZM4.71881 21.4063L3.74721 10.1698L2.25279 10.299L3.22439 21.5355L4.71881 21.4063ZM3.75 21.5129V10.2344H2.25V21.5129H3.75ZM3.22439 21.5355C3.2112 21.383 3.33146 21.2502 3.48671 21.2502V22.7502C4.21268 22.7502 4.78122 22.1281 4.71881 21.4063L3.22439 21.5355ZM3.48671 21.2502C3.63292 21.2502 3.75 21.3686 3.75 21.5129H2.25C2.25 22.1954 2.80289 22.7502 3.48671 22.7502V21.2502Z" fill="currentColor"></path></svg>
                                            </button>
                                            <tippy target="button">Pemesanan Selesai?</tippy>
                                            <div
                                               
                                                class="grid place-content-center p-1 ltr:mr-2 rtl:ml-2 rounded-full bg-primary text-white text-sm font-semibold"
                                            >
                                                {{ contact.nama }}
                                            </div>
                                            
                                        </div>
                                    </td>
                                    <td>{{ contact.lokasi }}</td>
                                    <td>{{ contact.nohp }}</td>
                                    <td>
                                        <div
                                            class="grid place-content-center p-1 ltr:mr-2 rtl:ml-2 rounded-full bg-success text-white text-sm font-semibold"
                                            >
                                            {{ contact.status }}
                                        </div>
                                    </td>
                                    
                                    <td class="whitespace-nowrap">{{ contact.created_at }}</td>
                                    <td>
                                        <div class="flex gap-4 items-center justify-center">
                                            <!-- <button type="button" class="btn btn-sm btn-outline-primary" @click="editUser(contact)">Edit</button> -->
                                            <router-link :to="{name:'verifikasi-pemesanan',params:{idPemesanan :contact.id}}">
                                                <button type="button" class="btn btn-sm btn-outline-warning" >Konfirmasi</button>
                                            </router-link>
                                            <button type="button" class="btn btn-sm btn-outline-danger" @click="deleteUser(contact)">Delete</button>
                                        </div>
                                    </td>
                                </tr>
                            </template>
                        </tbody>
                    </table>
                </div>
            </template>
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
    import axios from 'axios'
    import { useMeta } from '@/composables/use-meta';
    useMeta({ title: 'Contacts' });
    
    const defaultParams = ref({
        id: null,
        nama: '',
        username: '',
        email: '',
        password: '',
        alamat: '',
        nohp: '',
        foto: '',
        rumah_sakit_id:'',
    });

    const position = ref({})
    const maps = ref({
        url: 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
        attribution:
            '&copy; <a target="_blank" href="http://osm.org/copyright">OpenStreetMap</a> contributors',
        zoom: 15,
        center: [0.78566373548599999, 122.865568821],
        markerLatLng: [51.504, -0.159]
    })
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
    const user:any = computed(() => store.$state.detail_user)

    onMounted(async () => {
        searchContacts();
        getPemesanan();
        
    });

    watch(user, () => {
        getPemesanan()
    })

    const searchContacts = () => {
        filterdContactsList.value = contactList.value.filter((d) => d.name.toLowerCase().includes(searchUser.value.toLowerCase()));
    };


    const getPemesanan = async () => {
        let response = await axios.get('api/pemesanan/' + user.value.id + '/bySopir')
        contactList.value = response.data.data
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

    const setStatus = (data) => {
        const form = new FormData;
        form.append('status','selesai')
        axios.post('api/pemesanan/' + data.id + '/setStatus?_method=PUT', form).then(() => {
            showMessage('Pemesanan telah berhasil dikonfirmasi berhasil.');
            getPemesanan()
        })
    }

    const saveUser = () => {
        if (!params.value.nama) {
            showMessage('Nama is required.', 'error');
            return true;
        }
        // if (!params.value.lokasi) {
        //     showMessage('Lokasi is required.', 'error');
        //     return true;
        // }
        // if (!params.value.lat) {
        //     showMessage('Latitude is required.', 'error');
        //     return true;
        // }
        // if (!params.value.lng) {
        //     showMessage('Longitude is required.', 'error');
        //     return true;
        // }

        if (params.value.id) {
            //update user
            //add user
            const form = new FormData;
            form.append('nama', params.value.nama)
            form.append('username', params.value.username)
            form.append('email', params.value.email)
            form.append('rumah_sakit_id', user.value.rumah_sakit_id.id)
            form.append('alamat', params.value.alamat)
            form.append('foto', params.value.foto)
            form.append('nohp', params.value.nohp)
            form.append('password', params.value.password)
            axios.post('api/sopir/' + params.value.id + '?_method=PUT', form).then(() => {
                showMessage('User has been saved successfully.');
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
                toast.fire({
                    title: 'Data berhasil diperbarui',
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
                            popup: `color-success`
                        },
                        target: document.getElementById('danger-toast')
                    });
                    toast.fire({
                        title: err,
                    });
                })
        } else {
            //add user
            const form = new FormData;
            form.append('nama', params.value.nama)
            form.append('username', params.value.username)
            form.append('email', params.value.email)
            form.append('rumah_sakit_id', user.value.rumah_sakit_id.id)
            form.append('alamat', params.value.alamat)
            form.append('nohp', params.value.nohp)
            form.append('foto', params.value.foto)
            form.append('password', params.value.password)
            axios.post('api/sopir', form).then(() => {
                showMessage('User has been saved successfully.');
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
                toast.fire({
                    title: 'Data berhasil ditambahkan',
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
