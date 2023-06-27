<template>
    <div>
        <div class="flex items-center justify-between flex-wrap gap-4">
            <h2 class="text-xl">Master Rumah Sakit</h2>
            <div class="flex sm:flex-row flex-col sm:items-center sm:gap-3 gap-4 w-full sm:w-auto">
                <div class="flex gap-3">
                    <div>
                        <button type="button" class="btn btn-primary" @click="editUser()">
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

                <div class="relative">
                    <input
                        type="text"
                        placeholder="Search Contacts"
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
                                <th>Nama</th>
                                <th>Lokasi</th>
                                <th>Dibuat pada</th>
                                
                                <th class="!text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <template v-for="contact in contactList" :key="contact.id">
                                <tr>
                                    <td>
                                        <div class="flex items-center w-max">
                                            <div v-show="contact.foto" class="w-max">
                                                <img
                                                    :src="$backend + `${contact.foto}`"
                                                    class="h-8 w-8 rounded-full object-cover ltr:mr-2 rtl:ml-2"
                                                    alt="avatar"
                                                />
                                            </div>
                                            <div
                                                v-show="!contact.foto && contact.nama"
                                                class="grid place-content-center h-8 w-8 ltr:mr-2 rtl:ml-2 rounded-full bg-primary text-white text-sm font-semibold"
                                            >
                                                {{ contact.nama.charAt(0) + '' + contact.nama.charAt(contact.nama.indexOf(' ') + 1) }}
                                            </div>
                                            <div
                                                v-show="!contact.foto && !contact.nama"
                                                class="border border-gray-300 dark:border-gray-800 rounded-full grid place-content-center h-8 w-8 ltr:mr-2 rtl:ml-2"
                                            >
                                                <svg
                                                    width="24"
                                                    height="24"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="w-4.5 h-4.5"
                                                >
                                                    <circle cx="12" cy="6" r="4" stroke="currentColor" stroke-width="1.5"></circle>
                                                    <ellipse opacity="0.5" cx="12" cy="17" rx="7" ry="4" stroke="currentColor" stroke-width="1.5"></ellipse>
                                                </svg>
                                            </div>
                                            <div>{{ contact.nama }}</div>
                                        </div>
                                    </td>
                                    <td>{{ contact.lokasi }}</td>
                                    
                                    <td class="whitespace-nowrap">{{ contact.created_at }}</td>
                                    <td>
                                        <div class="flex gap-4 items-center justify-center">
                                            <button type="button" class="btn btn-sm btn-outline-primary" @click="editUser(contact)">Edit</button>
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
        <template v-if="displayType === 'grid'">
            <div class="grid 2xl:grid-cols-4 xl:grid-cols-3 sm:grid-cols-2 grid-cols-1 gap-6 w-full">
                <template v-for="contact in filterdContactsList" :key="contact.id">
                    <div class="bg-white dark:bg-[#1c232f] rounded-md overflow-hidden text-center shadow relative">
                        <div class="bg-white/40 rounded-t-md bg-[url('/assets/images/notification-bg.png')] bg-center bg-cover p-6 pb-0">
                            <template v-if="contact.path">
                                <img class="object-contain w-4/5 max-h-40 mx-auto" :src="`/assets/images/${contact.path}`" />
                            </template>
                        </div>
                        <div class="px-6 pb-24 -mt-10 relative">
                            <div class="shadow-md bg-white dark:bg-gray-900 rounded-md px-2 py-4">
                                <div class="text-xl">{{ contact.name }}</div>
                                <div class="text-white-dark">{{ contact.role }}</div>
                                <div class="flex items-center justify-between flex-wrap mt-6 gap-3">
                                    <div class="flex-auto">
                                        <div class="text-info">{{ contact.posts }}</div>
                                        <div>Posts</div>
                                    </div>
                                    <div class="flex-auto">
                                        <div class="text-info">{{ contact.following }}</div>
                                        <div>Following</div>
                                    </div>
                                    <div class="flex-auto">
                                        <div class="text-info">{{ contact.followers }}</div>
                                        <div>Followers</div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <ul class="flex space-x-4 rtl:space-x-reverse items-center justify-center">
                                        <li>
                                            <a href="javascript:;" class="btn btn-outline-primary p-0 h-7 w-7 rounded-full">
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
                                                    class="w-4 h-4"
                                                >
                                                    <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;" class="btn btn-outline-primary p-0 h-7 w-7 rounded-full">
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
                                                    class="w-4 h-4"
                                                >
                                                    <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                                    <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                                    <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;" class="btn btn-outline-primary p-0 h-7 w-7 rounded-full">
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
                                                    class="w-4 h-4"
                                                >
                                                    <path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"></path>
                                                    <rect x="2" y="9" width="4" height="12"></rect>
                                                    <circle cx="4" cy="4" r="2"></circle>
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="javascript:;" class="btn btn-outline-primary p-0 h-7 w-7 rounded-full">
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
                                                    class="w-4 h-4"
                                                >
                                                    <path
                                                        d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"
                                                    ></path>
                                                </svg>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mt-6 grid grid-cols-1 gap-4 ltr:text-left rtl:text-right">
                                <div class="flex items-center">
                                    <div class="flex-none ltr:mr-2 rtl:ml-2">Email :</div>
                                    <div class="truncate text-white-dark">{{ contact.email }}</div>
                                </div>
                                <div class="flex items-center">
                                    <div class="flex-none ltr:mr-2 rtl:ml-2">Phone :</div>
                                    <div class="text-white-dark">{{ contact.phone }}</div>
                                </div>
                                <div class="flex items-center">
                                    <div class="flex-none ltr:mr-2 rtl:ml-2">Address :</div>
                                    <div class="text-white-dark">{{ contact.location }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-6 flex gap-4 absolute bottom-0 w-full ltr:left-0 rtl:right-0 p-6">
                            <button type="button" class="btn btn-outline-primary w-1/2" @click="editUser(contact)">Edit</button>
                            <button type="button" class="btn btn-outline-danger w-1/2" @click="deleteUser(contact)">Delete</button>
                        </div>
                    </div>
                </template>
            </div>
        </template>

        <!-- add contact modal -->
        <TransitionRoot appear :show="addContactModal" as="template">
            <Dialog as="div" @close="addContactModal = false" class="relative z-50">
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
                                        <div class="mb-5">
                                            <label for="name">Nama Rumah Sakit</label>
                                            <input id="name" type="text" placeholder="Masukkan Nama Rumah Sakit" class="form-input" v-model="params.nama" />
                                        </div>
                                        <div class="mb-5">
                                            <label for="email">Lokasi</label>
                                            <input id="email" type="text" placeholder="Masukkan Alamat Rumah Sakit" class="form-input" v-model="params.lokasi" />
                                        </div>
                                        <div class="mb-5">
                                            <label for="ctnFile">Foto Rumah Sakit</label>
                                            <input id="ctnFile" @change="onphoto" type="file" class="form-input file:py-2 file:px-4 file:border-0 file:font-semibold p-0 file:bg-primary/90 ltr:file:mr-5 rtl:file:ml-5 file:text-white file:hover:bg-primary" required />
                                        </div>
                                        <div class="flex">
                                            <div class="w-1/2">
                                                <div class="mb-5">
                                                    <label for="number">Latitude</label>
                                                    <input id="number" type="text" placeholder="Enter Latitude" disabled class="form-input" v-model="position.lat" />
                                                </div>
                                            </div>
                                            <div class="w-1/2">
                                                <div class="mb-5">
                                                    <label for="number">Longtitude</label>
                                                    <input id="number" type="text" placeholder="Enter Longtitude" disabled class="form-input" v-model="position.lng" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-5">
                                            {{ position }}
                                            <l-map 
                                                ref="map" 
                                                style="width: 100%; height:200px" 
                                                :zoom="maps.zoom" 
                                                :center="coordinates"
                                                @click="onMapClick"
                                                >
                                                <l-tile-layer
                                                    url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
                                                ></l-tile-layer>
                                                <l-marker
                                                    visible
                                                    draggable
                                                    :icon="icon"
                                                    :lat-lng.sync="position"
                                                    @dragstart="dragging = true"
                                                    @dragend="dragging = false"
                                                    >
                                                </l-marker>
                                            </l-map>
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
    
    import { ref, onMounted, watch, computed } from 'vue';
    import { TransitionRoot, TransitionChild, Dialog, DialogPanel, DialogOverlay } from '@headlessui/vue';
    import Swal from 'sweetalert2';
    import axios from 'axios'
    import { useMeta } from '@/composables/use-meta';
    useMeta({ title: 'Contacts' });
    
    const defaultParams = ref({
        id: null,
        nama: '',
        lokasi: '',
        lat: '',
        lng: '',
        foto:''
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
    const coordinates = ref(null)
    const displayType = ref('list');
    const addContactModal = ref(false);
    const params = ref(JSON.parse(JSON.stringify(defaultParams.value)));
    const filterdContactsList: any = ref([]);
    const searchUser = ref('');
    const contactList = ref([]);
    const address = ref('')
    const theErrors = ref([])
    const url = ref('')

    onMounted(() => {
        searchContacts();
        getRumahSakit()
    });

    onMounted(async () => {
      try {
        const result = await getLocation();
        coordinates.value = result;
        position.value = result   
      } catch (error) {
        alert(error);
      }
    });

    async function getLocation() {
      try {
        const options = {
          enableHighAccuracy: true,
          timeout: Infinity,
          maximumAge: 0
        };

        const position : any = await new Promise((resolve, reject) => {
          navigator.geolocation.getCurrentPosition(resolve, reject, options);
        });
        
        return {
            lat: position.coords.latitude,
            lng: position.coords.longitude
        }

        
      } catch (error) {
        throw new Error(error);
      }
    }
    

    const searchContacts = () => {
        filterdContactsList.value = contactList.value.filter((d) => d.name.toLowerCase().includes(searchUser.value.toLowerCase()));
    };

    const onMapClick = (response :any) => {
        // place the marker on the clicked spot
            position.value = response.latlng;  
            params.value.lat = response.latlng.lat
            params.value.lng = response.latlng.lng          
    }      

    const getAddress = async () => { 
        let address = "Unresolved address";
        try {
            const { lat, lng } = position.value;
            const result = await fetch(
            `https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${lat}&lon=${lng}`
            );
            if (result.status === 200) {
            const body = await result.json();
            address = body.display_name;
            }
        } catch (e) {
            console.error("Reverse Geocode Error->", e);
        }
        
        return address;
    }

    const getRumahSakit = async () => {
        let response = await axios.get('api/rumah_sakit')
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
        if (!params.value.lokasi) {
            showMessage('Lokasi is required.', 'error');
            return true;
        }
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
            form.append('lokasi', params.value.lokasi)
            form.append('foto', params.value.foto)
            form.append('lat', params.value.lat)
            form.append('lng', params.value.lng)
            axios.post('api/rumah_sakit/' + params.value.id + '?_method=PUT', form).then(() => {
                showMessage('User has been saved successfully.');
                addContactModal.value = false;
                getRumahSakit()
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
                            popup: `color-success`
                        },
                        target: document.getElementById('success-toast')
                    });
                    toast.fire({
                        title: err,
                    });
                })
        } else {
            //add user
            const form = new FormData;
            form.append('nama', params.value.nama)
            form.append('lokasi', params.value.lokasi)
            form.append('foto', params.value.foto)
            form.append('lat', params.value.lat)
            form.append('lng', params.value.lng)
            axios.post('api/rumah_sakit', form).then(() => {
                showMessage('User has been saved successfully.');
                addContactModal.value = false;
                getRumahSakit()
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
                            popup: `color-success`
                        },
                        target: document.getElementById('success-toast')
                    });
                    toast.fire({
                        title: err,
                    });
                })
            
        }

        
    };

    const deleteUser = (user: any = null) => {
        contactList.value = contactList.value.filter((d) => d.id != user.id);
        searchContacts();
        showMessage('User has been deleted successfully.');
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
