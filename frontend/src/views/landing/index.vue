<template>
    <div>

        <section id="pesan" style="border-top:1px solid #eee" class="min-h-screen bg-[url('/assets/images/map.svg')] dark:bg-[url('/assets/images/map-dark.svg')] bg-cover bg-center">
            <div class="flex justify-center items-center my-6">
                <h1 class="mt-3 text-[3.5rem] font-bold leading-[4rem] tracking-tight text-black p-6 text-center dark:text-white-light">Pesan Ambulance</h1>
            </div>
            <div
                class="flex justify-center items-center md:flex-row flex-col"
            >
            
                <!-- <div class="panel sm:w-[400px] m-6 max-w-lg w-full">
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
                        Keterangan
                    </h2>
                    <p class="mb-7">Submit your queries and we will get back to you as soon as possible.</p>
                    <form class="space-y-4" >
                            <ul class="mb-5">
                                <textarea :value="getTextAreaValue()" class="form-textarea" rows="10"  placeholder="Tuliskan Keterangan ..."></textarea>
                                
                            <li v-if="draft" class="text-gray-500">
                                {{ draft }}
                            </li>
                            </ul>
                            <div v-if="!listening">
                            <button
                                class="
                                bg-blue-500
                                hover:bg-blue-700
                                text-white
                                font-bold
                                py-2
                                px-4
                                rounded
                                "
                                @click="send()"
                            >
                                Send message
                            </button>
                            
                            </div>
                            <div v-else>
                            Speak your message...
                            <button
                                class="
                                border border-blue-500
                                hover:bg-blue-700
                                hover:text-white
                                py-2
                                px-4
                                rounded
                                "
                                @click="stop()"
                            >
                                Stop listening
                            </button>
                            </div>
                    </form>
                </div> -->
                <div class="panel sm:w-1/2 m-6 max-w-lg w-full">
                    <h2 class="font-bold text-2xl mb-5">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="w-7 h-7 inline-block ltr:mr-1 rtl:ml-1 text-primary" xmlns="http://www.w3.org/2000/svg"><path opacity="0.5" d="M16.755 2H7.24502C6.08614 2 5.50671 2 5.03939 2.16261C4.15322 2.47096 3.45748 3.18719 3.15795 4.09946C3 4.58055 3 5.17705 3 6.37006V20.3742C3 21.2324 3.985 21.6878 4.6081 21.1176C4.97417 20.7826 5.52583 20.7826 5.8919 21.1176L6.375 21.5597C7.01659 22.1468 7.98341 22.1468 8.625 21.5597C9.26659 20.9726 10.2334 20.9726 10.875 21.5597C11.5166 22.1468 12.4834 22.1468 13.125 21.5597C13.7666 20.9726 14.7334 20.9726 15.375 21.5597C16.0166 22.1468 16.9834 22.1468 17.625 21.5597L18.1081 21.1176C18.4742 20.7826 19.0258 20.7826 19.3919 21.1176C20.015 21.6878 21 21.2324 21 20.3742V6.37006C21 5.17705 21 4.58055 20.842 4.09946C20.5425 3.18719 19.8468 2.47096 18.9606 2.16261C18.4933 2 17.9139 2 16.755 2Z" stroke="currentColor" stroke-width="1.5"></path><path d="M10.5 11L17 11" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path><path d="M7 11H7.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path><path d="M7 7.5H7.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path><path d="M7 14.5H7.5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path><path d="M10.5 7.5H17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path><path d="M10.5 14.5H17" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path></svg>
                        Keterangan
                    </h2>
                    <p class="mb-7">Rekam suara anda dengan jelas dengan menekan tombol mic dibawah serta lengkapi nomor telepon agar dapat dihubungi oleh petugas.</p>
                    <section id="example-audio">
                        <div class="columns">
                            <div class="column">
                                <div class="mb-5">
                                    <label for="name">Nomor Handphone</label>
                                    <input id="name" type="text" placeholder="Masukkan Nomor Handphone ..." class="form-input" v-model="pemesan.nohp" />
                                </div>
                                <div class="record-settings flex">
                                    <vue-record-audio :mode="recordMode.audio" @stream="onStream" @result="onResult" />
                                    <div class="field">
                                        <label class="label">Mode</label>
                                        <div class="select">
                                        <select v-model="recordMode.audio">
                                            <option value="press">Tekan</option>
                                            <option value="hold">Tahan</option>
                                        </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="column">
                                <div class="recorded-audio" v-if="recordings[0]">
                                <div v-for="(record, index) in recordings" :key="index" class="recorded-item">
                                    <div class="audio-container"><audio :src="record.src" controls /></div>
                                    <div><button @click="removeRecord(index)" class="btn btn-outline-danger">delete</button></div>
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
                    <div class="rounded bg-blue-100 p-3" v-if="coordinates">
                        Anda saat ini berada di {{ address }} ( {{ coordinates.lat }} - {{ coordinates.lng }} ).
                    </div>
                    <div class="map mt-3" v-if="coordinates">
                        
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
                                :lat-lng.sync="coordinates"
                                @dragstart="dragging = true"
                                @dragend="dragging = false"
                                >
                                
                            </l-marker>
                        </l-map>
                    </div>
                </div>
            </div>
            
            <div class="flex justify-center m-6" v-if="modal19">
                <div class="max-w-[20rem] w-full bg-success-light shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-0 dark:bg-primary-dark-light dark:shadow-none p-5 rounded mb-5">
                    <div class="text-center font-semibold">
                        <h5 class="text-black text-l font-semibold mb-5 dark:text-black-light">Kode Pemesanan</h5>
                        <h1 class="text-black text-xl font-bold mb-5 dark:text-black-light">{{ token.data.data }}</h1>
                        <button type="button" class="mb-3 btn w-full btn-primary" @click="copy(token)">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ltr:mr-2 rtl:ml-2">
                                <path
                                d="M6 11C6 8.17157 6 6.75736 6.87868 5.87868C7.75736 5 9.17157 5 12 5H15C17.8284 5 19.2426 5 20.1213 5.87868C21 6.75736 21 8.17157 21 11V16C21 18.8284 21 20.2426 20.1213 21.1213C19.2426 22 17.8284 22 15 22H12C9.17157 22 7.75736 22 6.87868 21.1213C6 20.2426 6 18.8284 6 16V11Z"
                                stroke="currentColor"
                                stroke-width="1.5"
                                />
                                <path
                                opacity="0.5"
                                d="M6 19C4.34315 19 3 17.6569 3 16V10C3 6.22876 3 4.34315 4.17157 3.17157C5.34315 2 7.22876 2 11 2H15C16.6569 2 18 3.34315 18 5"
                                stroke="currentColor"
                                stroke-width="1.5"
                                />
                            </svg>
                            Salin Token
                        </button>
                        <p class="text-black dark:text-black-light">Gunakan kode ini untuk melacak perkembangan informasi terkait pemesanan ini.</p>
                    </div>
                </div>
            </div>
            <div class="flex justify-center m-6 ">
                
                <button @click.prevent="uploadAudio()" type="button" class="btn btn-primary w-80">
                    <span v-if="loadingData" class="animate-spin border-2 border-white border-l-transparent rounded-full w-5 h-5 ltr:mr-4 rtl:ml-4 inline-block align-middle"></span>
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3"><path d="M17.4975 18.4851L20.6281 9.09373C21.8764 5.34874 22.5006 3.47624 21.5122 2.48782C20.5237 1.49939 18.6511 2.12356 14.906 3.37189L5.57477 6.48218C3.49295 7.1761 2.45203 7.52305 2.13608 8.28637C2.06182 8.46577 2.01692 8.65596 2.00311 8.84963C1.94433 9.67365 2.72018 10.4495 4.27188 12.0011L4.55451 12.2837C4.80921 12.5384 4.93655 12.6658 5.03282 12.8075C5.22269 13.0871 5.33046 13.4143 5.34393 13.7519C5.35076 13.9232 5.32403 14.1013 5.27057 14.4574C5.07488 15.7612 4.97703 16.4131 5.0923 16.9147C5.32205 17.9146 6.09599 18.6995 7.09257 18.9433C7.59255 19.0656 8.24576 18.977 9.5522 18.7997L9.62363 18.79C9.99191 18.74 10.1761 18.715 10.3529 18.7257C10.6738 18.745 10.9838 18.8496 11.251 19.0285C11.3981 19.1271 11.5295 19.2585 11.7923 19.5213L12.0436 19.7725C13.5539 21.2828 14.309 22.0379 15.1101 21.9985C15.3309 21.9877 15.5479 21.9365 15.7503 21.8474C16.4844 21.5244 16.8221 20.5113 17.4975 18.4851Z" stroke="currentColor" stroke-width="1.5"></path><path opacity="0.5" d="M6 18L21 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"></path></svg>
                    Kirim</button>
            </div>
        </section>
        <Lacak></Lacak>
        
    </div>
</template>
<script lang="ts">
    import { computed,defineComponent, onUpdated, onMounted, reactive, ref } from 'vue'
    import { sharedMessages } from '@/doc';
    import { useRouter } from 'vue-router';
    import { useMeta } from '@/composables/use-meta';
    import { TransitionRoot, TransitionChild, Dialog, DialogPanel, DialogOverlay } from '@headlessui/vue';
    import { lang, langIsSet } from '@/params';
    import { langs } from '@/langs'
    import Lacak from './lacak.vue'
    import useClipboard from 'vue-clipboard3';
    import axios from 'axios'
    import Swal from 'sweetalert2';
    
    const router = useRouter();
   

    declare var webkitSpeechRecognition: typeof SpeechRecognition;

    export default defineComponent({
        components: {
            Lacak
        },
        name: "landing",
        setup() {
            useMeta({ title: 'Contact Form' });
            const name = ref(localStorage.MISHEARD_NAME ?? "");
            const currentPrompt = ref("");
            const messages = ref(sharedMessages.toJSON());
            // const message = ref(sharedMessage.toJSON())
            const recordings = ref([])
            const { toClipboard } = useClipboard();
            const recordMode = ref({
                audio: 'hold',
                video: 'press'
            })
            const modal19 = ref(false);
            const pemesan = ref({
                id: null,
                nohp: '',
            });
            const token = ref(null)
            const loadingData = ref(false)
            const theErrors = ref([])
            const listening = ref(false);
            const draft = ref("");
            const coordinates : any = ref(null)
            const position : any = ref(null)
            const address : any = ref(null)
            const audioResult : any = ref(null)
            const sr = new webkitSpeechRecognition();
            sr.lang = lang;
            const sr2 = new webkitSpeechRecognition();
            sr2.lang = lang;
            sr2.continuous = true;
            sr2.interimResults = true;
            const maps = ref({
                url: 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
                attribution:
                    '&copy; <a target="_blank" href="http://osm.org/copyright">OpenStreetMap</a> contributors',
                zoom: 15,
                center: [0.78566373548599999, 122.865568821],
                markerLatLng: [51.504, -0.159]
            })
            
            let lastMessageCreatedAt: string | undefined;
            sharedMessages.observe(() => {
            messages.value = sharedMessages.toJSON();

            const lastMessage = messages.value[messages.value.length - 1];
            if (lastMessage) {
                if (lastMessageCreatedAt !== lastMessage.createdAt) {
                lastMessageCreatedAt = lastMessage.createdAt;
                (window as any).handleNewMessage?.(lastMessage);
                }
            }
            });

            onMounted(async () => {
                try {
                    const result = await getLocation();
                    coordinates.value = result;
                    position.value = result
                    await getAddress()   
                } catch (error) {
                    alert(error);
                }
            });

            const onMapClick = (response :any) => {
                // place the marker on the clicked spot
                coordinates.value = response.latlng;    
                getAddress()    
            };      

            const copy = async (msg :any) => {
                let stringMsg = msg.data.data.toString()
                if (msg) {
                    await toClipboard(stringMsg);
                    // console.log(msg);
                    
                    showMessage('Copied successfully.');
                }
            };

            const removeRecord = (index :any) => {
                recordings.value.splice(index, 1)
            };
            const onStream = (stream :any) => {
                console.log('Got a stream object:', stream);
            };
            
            const onResult = (data :any) => {
                // const reader = new FileReader();

                // // let audioFile = data

                // reader.onload = () => {
                //     const audioData = reader.result
                //     const blob = new Blob([data], '.webm')
                //     recordings.value.push({
                //         src: window.URL.createObjectURL(data),
                //         result: blob
                //     })
                //     // Kirim objek Blob ke server
                //     // audioResult.value = blob
                // }

                // reader.readAsArrayBuffer(data);
                // audioResult.value = data[0]

                recordings.value.push({
                    src: window.URL.createObjectURL(data),
                    result: data
                })
                console.log(data);
                
            }

            const uploadAudio = () => {
                if(recordings.value[0]){
                    const reader = new FileReader();
    
                    reader.onload = () => {
                        const audioData = reader.result;
                        const blob = new Blob([audioData], { type: recordings.value[0].result.type });
    
                        // Kirim objek Blob ke server
                        sendData(blob);
                    };
    
                    reader.readAsArrayBuffer(recordings.value[0].result);
                }else {
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
                        title: 'Silahkan mengisi keterangan terlebih dahulu',
                    });
                }
            };

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
            };

            const getAddress = async () => { 
                try {
                    const { lat, lng } = coordinates.value;
                    const result = await fetch(
                    `https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${lat}&lon=${lng}`
                    );
                    if (result.status === 200) {
                    const body = await result.json();
                    address.value = body.display_name;
                    }
                } catch (e) {
                    console.error("Reverse Geocode Error->", e);
                }
                
            }

            const sendData = async (blob) =>{
                loadingData.value = true
                const form = new FormData;
                form.append('lokasi', address.value)
                
                
                form.append('deskrpsi', blob)
                
                
                // form.append('deskrpsi', new File([new Blob([recordings.value[0].result])], 'audio.mp3'))
                form.append('lat', coordinates.value.lat)
                form.append('lng', coordinates.value.lng)
                form.append('nohp', pemesan.value.nohp)
                form.append('rumah_sakit_id', 2)
                axios.post('api/pemesanan', form).then((response) => {
                    showMessage('Data has been saved successfully.');
                    getToken(response)
                    loadingData.value = false
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
                        loadingData.value = true
                        const toast = Swal.mixin({
                            toast: true,
                            position: 'bottom-start',
                            showConfirmButton: false,
                            timer: 3000,
                            showCloseButton: true,
                            customClass: {
                                popup: `color-danger`
                            },
                            target: document.getElementById('success-toast')
                        });
                        toast.fire({
                            title: err,
                        });
                    })
            }

            const ask = async (prompt: string): Promise<string> => {
            try {
                currentPrompt.value = prompt;
                return await new Promise((resolve, reject) => {
                sr.onresult = (event) => {
                    const text = Array.from(event.results)
                    .map((alts) => alts[0].transcript)
                    .join("");
                    resolve(text);
                };
                sr.onerror = (e) => {
                    reject(new Error("Unable to recognize text: " + e.error));
                };
                sr.start();
                });
            } finally {
                currentPrompt.value = "";
            }
            };
            const login = async () => {
            localStorage.MISHEARD_NAME = name.value = await ask(
                "Say your name out loud"
            );
            };
            const changeName = async () => {
            localStorage.MISHEARD_NAME = name.value = "";
            };
            const send = async () => {
            listening.value = true;
            sr2.onresult = function (event) {
                var finalTranscript = "";
                var interimTranscript = "";
                for (var i = event.resultIndex; i < event.results.length; ++i) {
                if (event.results[i].isFinal) {
                    finalTranscript += event.results[i][0].transcript;
                } else {
                    interimTranscript += event.results[i][0].transcript;
                }
                }
                draft.value = interimTranscript;
                if (finalTranscript) {
                sharedMessages.push([
                    {
                    text: finalTranscript,
                    name: name.value,
                    createdAt: new Date().toJSON(),
                    },
                ]);
                }
            };
            sr2.onerror = () => {
                listening.value = false;
            };
            sr2.onend = () => {
                listening.value = false;
            };
            sr2.start();
            };
            const stop = () => {
            sr2.stop();
            listening.value = false;
            };
            // let scrollIsAtBottom = true;
            // window.onscroll = () => {
            // scrollIsAtBottom =
            //     window.scrollY >
            //     document.documentElement.scrollHeight - window.innerHeight - 16;
            // };
            const getTextAreaValue = () => {
                let message = messages.value.map((item) => {
                    return item.text
                })
                    return message.join(' ');
            };
            const updateTextAreaValue = (value) => {
                messages.value = value.split('\n');
            };
            const reset = () => {
                return messages.value = ''
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
            const getToken = (data) => {
                modal19.value = true
                token.value = data
            } 
            // onUpdated(() => {
            // if (scrollIsAtBottom) {
            //     window.scrollBy(0, 1000);
            // }
            // });
            const locales = computed(() => {
            return langs
                .flatMap(([l, ...lo]) => lo)
                .sort((a, b) => (a[0] < b[0] ? -1 : 1));
            });
            return {
                Lacak,
                name,
                login,
                draft,
                listening,
                currentPrompt,
                send,
                stop,
                messages,
                reset,
                langIsSet,
                showMessage,
                langs,
                locales,
                getTextAreaValue,
                updateTextAreaValue,
                getAddress,
                getLocation,
                coordinates,
                address,
                position,
                maps,
                uploadAudio,
                onMapClick,
                onResult,
                removeRecord,
                onStream,
                recordMode,
                recordings,
                pemesan,
                sendData,
                audioResult,
                loadingData,
                modal19,
                token,
                TransitionRoot, 
                TransitionChild, 
                Dialog, 
                DialogPanel, 
                copy,
                
            };
        }
    })

    
    
</script>
<style>
.vue-audio-recorder, .vue-video-recorder {
  margin-right: 16px;
}

.record-settings {
  margin-top: 16px;
  margin-bottom:15px;
  display: flex;
  justify-content: center;
}

.recorded-audio {
  margin: 0 auto;
  height: 100px;
  overflow: auto;
  border: thin solid #eee;
  background-color: #f7f7f7;
  padding: 10px 5px;
}

.recorded-audio .recorded-item {
  display: flex;
  align-items: center;
  justify-content: center;
  margin-bottom: 16px;
}

.recorded-audio .audio-container {
  display: flex;
  height: 54px;
  margin-right: 16px;
}

.recorded-video video {
  width: 100%;
  max-height: 400px;
}
</style>