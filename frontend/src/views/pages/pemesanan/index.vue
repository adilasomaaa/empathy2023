<template>
    <div>
        <div class="flex items-center justify-between flex-wrap gap-4">
            <h2 class="text-xl">Manajemen Pemesanan</h2>
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
                                                <button type="button" class="btn btn-sm btn-outline-warning" >Verifikasi</button>
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
        let response = await axios.get('api/pemesanan/' + user.value.rumah_sakit_id.id + '/byRumah_sakit')
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
