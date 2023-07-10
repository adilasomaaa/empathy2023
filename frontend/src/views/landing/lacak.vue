<template>
  <section id="lacak" style="border-top:1px solid #eee" class="min-h-screen bg-white dark:bg-[#0e1726] bg-cover bg-center">
        <div class="flex justify-center items-center my-6">
            <h1 class="mt-3 text-[3.5rem] font-bold leading-[4rem] tracking-tight text-black p-6 text-center dark:text-white-light">Lacak Ambulance</h1>
        </div>
        <div class="flex gap-6 mb-6 justify-center items-center md:flex-row flex-col"> 
            <div>
                <div
                class="w-[70px] h-[70px] sm:w-[100px] sm:h-[100px] shadow-[1px_2px_12px_0_rgba(31,45,61,0.10)] rounded-full border border-[#e0e6ed] dark:border-[#1b2e4b] flex justify-center flex-col"
                >
                <count-up class="text-primary text-xl sm:text-3xl text-center" :startVal="0" :end-val="105" :duration="7"></count-up>
                </div>
                <h4 class="text-[#3b3f5c] text-xs sm:text-[15px] mt-4 flex flex-col justify-center text-center dark:text-white-dark font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-8 flex mr-auto ml-auto" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M20 6L9 17l-5-5"></path>
                    </svg>
                Selesai
                </h4>
            </div>
            <div>
                <div
                class="w-[70px] h-[70px] sm:w-[100px] sm:h-[100px] shadow-[1px_2px_12px_0_rgba(31,45,61,0.10)] rounded-full border border-[#e0e6ed] dark:border-[#1b2e4b] flex justify-center flex-col"
                >
                <count-up class="text-primary text-xl sm:text-3xl text-center" :startVal="0" :end-val="105" :duration="7"></count-up>
                </div>
                <h4 class="text-[#3b3f5c] text-xs sm:text-[15px] mt-4 flex flex-col justify-center text-center dark:text-white-dark font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" class="w-8 flex mr-auto ml-auto" stroke="currentColor" stroke-width="2">
  <path d="M20 6.92V5c0-1.1-.9-2-2-2h-6.37a2 2 0 0 0-1.64.85l-1.74 2.61-3.26-.81a2 2 0 0 0-2.28 1.55l-1.4 6.61a2 2 0 0 0 .49 1.89l2.8 2.8M12 12l9 2-9 2-9-2 9-2zm-7 7l4 4 4-4M6 2v2"></path>
</svg>

                Bertugas
                </h4>
            </div>
            <div>
                <div
                class="w-[70px] h-[70px] sm:w-[100px] sm:h-[100px] shadow-[1px_2px_12px_0_rgba(31,45,61,0.10)] rounded-full border border-[#e0e6ed] dark:border-[#1b2e4b] flex justify-center flex-col"
                >
                <count-up class="text-primary text-xl sm:text-3xl text-center" :startVal="0" :end-val="105" :duration="7"></count-up>
                </div>
                <h4 class="text-[#3b3f5c] text-xs sm:text-[15px] mt-4 flex flex-col justify-center text-center dark:text-white-dark font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-8 flex mr-auto ml-auto" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="8" y1="6" x2="21" y2="6"></line>
                    <line x1="8" y1="12" x2="21" y2="12"></line>
                    <line x1="8" y1="18" x2="21" y2="18"></line>
                    <line x1="3" y1="6" x2="3" y2="6"></line>
                    <line x1="3" y1="12" x2="3" y2="12"></line>
                    <line x1="3" y1="18" x2="3" y2="18"></line>
                    </svg>

                Dikonfirmasi
                </h4>
            </div>
            <div>
                <div
                class="w-[70px] h-[70px] sm:w-[100px] sm:h-[100px] shadow-[1px_2px_12px_0_rgba(31,45,61,0.10)] rounded-full border border-[#e0e6ed] dark:border-[#1b2e4b] flex justify-center flex-col"
                >
                <count-up class="text-primary text-xl sm:text-3xl text-center" :startVal="0" :end-val="105" :duration="7"></count-up>
                </div>
                <h4 class="text-[#3b3f5c] text-xs sm:text-[15px] mt-4 flex flex-col justify-center text-center dark:text-white-dark font-semibold">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-8 flex mr-auto ml-auto" fill="none" stroke="currentColor" stroke-width="2">
                    <circle cx="12" cy="12" r="10"></circle>
                    </svg>

                Menunggu
                </h4>
            </div>
        </div>
      
        <div
            class="flex justify-center items-center md:flex-col flex-col"
        >
            <div v-for="item in pemesanan" :key="item.id" class="mb-3 max-w-[45rem] w-full bg-white shadow-[4px_6px_10px_-3px_#bfc9d4] rounded border border-[#e0e6ed] dark:border-[#1b2e4b] dark:bg-[#191e3a] dark:shadow-none">
                <div class="py-7 px-6">
                    <div class="flex flex-row justify-between align-items-center">
                        <div>
                            <h5 class="text-[#3b3f5c] text-xl font-semibold mb-4 dark:text-white-light" v-if="item.status == 'selesai'">Telah selesai dari {{ item.lokasi }}</h5>
                            <h5 class="text-[#3b3f5c] text-xl font-semibold mb-4 dark:text-white-light" v-else-if="item.status == 'dikonfirmasi_sopir'">Menuju ke {{ item.lokasi }}</h5>
                            <p class="text-white-dark">Kendaraan dengan Nomor Polisi {{ item.mobil.no_plat }} dari {{ item.rumah_sakit.nama }}.</p>
                        </div>
                        <div class="align-items-center">
                            <button @click="lihatRute(item)"  type="button" v-tippy:button class="ml-5 btn btn-success">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-5 h-5"><path d="M20.9751 12.1852L20.2361 12.0574L20.9751 12.1852ZM20.2696 16.265L19.5306 16.1371L20.2696 16.265ZM6.93776 20.4771L6.19055 20.5417H6.19055L6.93776 20.4771ZM6.1256 11.0844L6.87281 11.0198L6.1256 11.0844ZM13.9949 5.22142L14.7351 5.34269V5.34269L13.9949 5.22142ZM13.3323 9.26598L14.0724 9.38725V9.38725L13.3323 9.26598ZM6.69813 9.67749L6.20854 9.10933H6.20854L6.69813 9.67749ZM8.13687 8.43769L8.62646 9.00585H8.62646L8.13687 8.43769ZM10.518 4.78374L9.79207 4.59542L10.518 4.78374ZM10.9938 2.94989L11.7197 3.13821L11.7197 3.13821L10.9938 2.94989ZM12.6676 2.06435L12.4382 2.77841L12.4382 2.77841L12.6676 2.06435ZM12.8126 2.11093L13.0419 1.39687L13.0419 1.39687L12.8126 2.11093ZM9.86194 6.46262L10.5235 6.81599V6.81599L9.86194 6.46262ZM13.9047 3.24752L13.1787 3.43584V3.43584L13.9047 3.24752ZM11.6742 2.13239L11.3486 1.45675L11.3486 1.45675L11.6742 2.13239ZM20.2361 12.0574L19.5306 16.1371L21.0086 16.3928L21.7142 12.313L20.2361 12.0574ZM13.245 21.25H8.59634V22.75H13.245V21.25ZM7.68497 20.4125L6.87281 11.0198L5.37839 11.149L6.19055 20.5417L7.68497 20.4125ZM19.5306 16.1371C19.0238 19.0677 16.3813 21.25 13.245 21.25V22.75C17.0712 22.75 20.3708 20.081 21.0086 16.3928L19.5306 16.1371ZM13.2548 5.10015L12.5921 9.14472L14.0724 9.38725L14.7351 5.34269L13.2548 5.10015ZM7.18772 10.2456L8.62646 9.00585L7.64728 7.86954L6.20854 9.10933L7.18772 10.2456ZM11.244 4.97206L11.7197 3.13821L10.2678 2.76157L9.79207 4.59542L11.244 4.97206ZM12.4382 2.77841L12.5832 2.82498L13.0419 1.39687L12.897 1.3503L12.4382 2.77841ZM10.5235 6.81599C10.8354 6.23198 11.0777 5.61339 11.244 4.97206L9.79207 4.59542C9.65572 5.12107 9.45698 5.62893 9.20041 6.10924L10.5235 6.81599ZM12.5832 2.82498C12.8896 2.92342 13.1072 3.16009 13.1787 3.43584L14.6306 3.05921C14.4252 2.26719 13.819 1.64648 13.0419 1.39687L12.5832 2.82498ZM11.7197 3.13821C11.7547 3.0032 11.8522 2.87913 11.9998 2.80804L11.3486 1.45675C10.8166 1.71309 10.417 2.18627 10.2678 2.76157L11.7197 3.13821ZM11.9998 2.80804C12.1345 2.74311 12.2931 2.73181 12.4382 2.77841L12.897 1.3503C12.3872 1.18655 11.8312 1.2242 11.3486 1.45675L11.9998 2.80804ZM14.1537 10.9842H19.3348V9.4842H14.1537V10.9842ZM14.7351 5.34269C14.8596 4.58256 14.824 3.80477 14.6306 3.0592L13.1787 3.43584C13.3197 3.97923 13.3456 4.54613 13.2548 5.10016L14.7351 5.34269ZM8.59634 21.25C8.12243 21.25 7.726 20.887 7.68497 20.4125L6.19055 20.5417C6.29851 21.7902 7.34269 22.75 8.59634 22.75V21.25ZM8.62646 9.00585C9.30632 8.42 10.0391 7.72267 10.5235 6.81599L9.20041 6.10924C8.85403 6.75767 8.30249 7.30493 7.64728 7.86954L8.62646 9.00585ZM21.7142 12.313C21.9695 10.8365 20.8341 9.4842 19.3348 9.4842V10.9842C19.9014 10.9842 20.3332 11.4959 20.2361 12.0574L21.7142 12.313ZM12.5921 9.14471C12.4344 10.1076 13.1766 10.9842 14.1537 10.9842V9.4842C14.1038 9.4842 14.0639 9.43901 14.0724 9.38725L12.5921 9.14471ZM6.87281 11.0198C6.84739 10.7258 6.96474 10.4378 7.18772 10.2456L6.20854 9.10933C5.62021 9.61631 5.31148 10.3753 5.37839 11.149L6.87281 11.0198Z" fill="currentColor"></path><path opacity="0.5" d="M3.9716 21.4709L3.22439 21.5355L3.9716 21.4709ZM3 10.2344L3.74721 10.1698C3.71261 9.76962 3.36893 9.46776 2.96767 9.48507C2.5664 9.50239 2.25 9.83274 2.25 10.2344L3 10.2344ZM4.71881 21.4063L3.74721 10.1698L2.25279 10.299L3.22439 21.5355L4.71881 21.4063ZM3.75 21.5129V10.2344H2.25V21.5129H3.75ZM3.22439 21.5355C3.2112 21.383 3.33146 21.2502 3.48671 21.2502V22.7502C4.21268 22.7502 4.78122 22.1281 4.71881 21.4063L3.22439 21.5355ZM3.48671 21.2502C3.63292 21.2502 3.75 21.3686 3.75 21.5129H2.25C2.25 22.1954 2.80289 22.7502 3.48671 22.7502V21.2502Z" fill="currentColor"></path></svg>
                            </button>
                            <tippy target="button">Lihat Rute</tippy>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mb-5">

            <!-- Modal -->
            <TransitionRoot appear :show="modalRute " as="template">
                <Dialog as="div" @close="modalRute  = false" class="relative z-50">
                <TransitionChild as="template" enter="duration-300 ease-out" enter-from="opacity-0" enter-to="opacity-100" leave="duration-200 ease-in" leave-from="opacity-100" leave-to="opacity-0">
                    <DialogOverlay class="fixed inset-0 bg-[black]/60" />
                </TransitionChild>

                <div class="fixed inset-0 overflow-y-auto">
                    <div class="flex min-h-full items-start justify-center px-4 py-8">
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
                        <button type="button" class="absolute top-4 ltr:right-4 rtl:left-4 text-gray-400 hover:text-gray-800 dark:hover:text-gray-600 outline-none" @click="modalRute  = false">
                            <svg> ... </svg>
                        </button>
                        <div class="text-lg font-bold bg-[#fbfbfb] dark:bg-[#121c2c] ltr:pl-5 rtl:pr-5 py-3 ltr:pr-[50px] rtl:pl-[50px]">Rute Perjalanan</div>
                        <div class="p-5">
                            <!-- <l-map 
                                ref="map" 
                                style="width: 100%; height:200px" 
                                :zoom="maps.zoom" 
                                :center="maps.center"
                                
                                >
                                <l-tile-layer
                                    url="https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png"
                                ></l-tile-layer>

                            </l-map> -->
                            <div ref="mapContainer" class="map-container"></div>
                            <div class="flex justify-end items-center mt-8">
                            <button type="button" @click="modalRute  = false" class="btn btn-outline-danger">Tutup</button>
                            <!-- <button type="button" @click="modalRute  = false" class="btn btn-primary ltr:ml-4 rtl:mr-4">Save</button> -->
                            </div>
                        </div>
                        </DialogPanel>
                    </TransitionChild>
                    </div>
                </div>
                </Dialog>
            </TransitionRoot>
            </div>
    </section>
</template>

<script lang="ts">
// import 'leaflet/dist/leaflet.css';
// import 'leaflet-routing-machine/dist/leaflet-routing-machine.css';
// import L from 'leaflet';
// import 'leaflet-routing-machine';
    import { ref, computed, onMounted, defineComponent } from 'vue';
    import axios from 'axios'
    import apexchart from 'vue3-apexcharts';
    import { useAppStore } from '@/stores/index';
    import { useMeta } from '@/composables/use-meta';
    import CountUp from 'vue-countup-v3';
    import { TransitionRoot, TransitionChild, Dialog, DialogPanel, DialogOverlay } from '@headlessui/vue';
    // useMeta({ title: 'Widgets' });

    export default defineComponent({
        components: {
            TransitionRoot, TransitionChild, Dialog, DialogPanel, DialogOverlay, apexchart, CountUp
        },
        setup () {
            const maps = ref({
                url: 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
                attribution:
                    '&copy; <a target="_blank" href="http://osm.org/copyright">OpenStreetMap</a> contributors',
                zoom: 15,
                center: [0.58373246046969, 123.03820610046388],
                markerLatLng: [51.504, -0.159]
            })
            const coordinates = ref(null)
            const store = useAppStore();
    
            const pemesanan = ref([])
            const modalRute = ref(false)
            const dataRute = ref({})
            // const mapContainer = ref('');
            // let map : any;
            // const modal1 = ref(false);

            
            
            onMounted(async () => {
                try {
                    getPemesanan()
                } catch (error) {
                    alert(error);
                }
            });
    
            // onMounted(() => {
            //     map = L.map(mapContainer.value).setView([0, 0], 13);
            //     L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png').addTo(map);
        
            //     const waypoints = [
            //         L.latLng(0.58373246046969, 123.03820610046388), // Ganti dengan koordinat titik awal
            //         L.latLng(0.5913113, 123.0346689),     // Ganti dengan koordinat titik tujuan
            //     ];
        
            //     L.Routing.control({
            //         waypoints,
            //     }).addTo(map);
            // });
    
            const getPemesanan = async () =>{
                let response = await axios.get('api/pemesanan')
                pemesanan.value = response.data.data
            }
    
            const lihatRute = (data) => {
                dataRute.value = data
                modalRute.value = true
            }
        // followers
        const isDark1: boolean = store.theme === 'dark' ? true : false;
            const followers = computed(() => {
                const isDark: boolean = store.theme === 'dark' ? true : false;
                return {
                    chart: {
                        height: 160,
                        type: 'area',
                        fontFamily: 'Nunito, sans-serif',
                        sparkline: {
                            enabled: true,
                        },
                    },
                    stroke: {
                        curve: 'smooth',
                        width: 2,
                    },
                    colors: ['#4361ee'],
                    grid: {
                        padding: {
                            top: 5,
                        },
                    },
                    yaxis: {
                        show: false,
                    },
                    tooltip: {
                        x: {
                            show: false,
                        },
                        y: {
                            title: {
                                formatter: (val: any) => {
                                    return '';
                                },
                            },
                        },
                    },
                    option: { fill: null },
    
                    if(isDark: boolean) {
                        option: {
                            fill: {
                                type: 'gradient';
                                gradient: {
                                    type: 'vertical';
                                    shadeIntensity: 1;
                                    inverseColors: !1;
                                    opacityFrom: 0.3;
                                    opacityTo: 0.05;
                                    stops: [100, 100];
                                }
                            }
                        }
                    },
                };
            });
    
            const followersSeries = ref([
                {
                    data: [38, 60, 38, 52, 36, 40, 28],
                },
            ]);
    
            // referral
            const referral = computed(() => {
                const isDark: boolean = store.theme === 'dark' ? true : false;
                return {
                    chart: {
                        height: 160,
                        type: 'area',
                        fontFamily: 'Nunito, sans-serif',
                        sparkline: {
                            enabled: true,
                        },
                    },
                    stroke: {
                        curve: 'smooth',
                        width: 2,
                    },
                    colors: ['#e7515a'],
                    grid: {
                        padding: {
                            top: 5,
                        },
                    },
                    yaxis: {
                        show: false,
                    },
                    tooltip: {
                        x: {
                            show: false,
                        },
                        y: {
                            title: {
                                formatter: (val: any) => {
                                    return '';
                                },
                            },
                        },
                    },
    
                    if(isDark: boolean) {
                        option: {
                            fill: {
                                type: 'gradient';
                                gradient: {
                                    type: 'vertical';
                                    shadeIntensity: 1;
                                    inverseColors: !1;
                                    opacityFrom: 0.3;
                                    opacityTo: 0.05;
                                    stops: [100, 100];
                                }
                            }
                        }
                    },
                };
            });
    
            const referralSeries = ref([
                {
                    data: [60, 28, 52, 38, 40, 36, 38],
                },
            ]);
    
            // engagement
            const engagement = computed(() => {
                const isDark: boolean = store.theme === 'dark' ? true : false;
                return {
                    chart: {
                        height: 160,
                        type: 'area',
                        fontFamily: 'Nunito, sans-serif',
                        sparkline: {
                            enabled: true,
                        },
                    },
                    stroke: {
                        curve: 'smooth',
                        width: 2,
                    },
                    colors: ['#1abc9c'],
                    grid: {
                        padding: {
                            top: 5,
                        },
                    },
                    yaxis: {
                        show: false,
                    },
                    tooltip: {
                        x: {
                            show: false,
                        },
                        y: {
                            title: {
                                formatter: (val: any) => {
                                    return '';
                                },
                            },
                        },
                    },
    
                    if(isDark: boolean) {
                        option: {
                            fill: {
                                type: 'gradient';
                                gradient: {
                                    type: 'vertical';
                                    shadeIntensity: 1;
                                    inverseColors: !1;
                                    opacityFrom: 0.3;
                                    opacityTo: 0.05;
                                    stops: [100, 100];
                                }
                            }
                        }
                    },
                };
            });
    
            const engagementSeries = ref([
                {
                    name: 'Sales',
                    data: [28, 50, 36, 60, 38, 52, 38],
                },
            ]);
            return {
                // mapContainer,
                pemesanan,
                modalRute,
                engagementSeries,
                engagement,
                lihatRute,
                followers,
                followersSeries,
                referral,
                referralSeries,
                dataRute,
                TransitionRoot, 
                TransitionChild, 
                Dialog, 
                DialogPanel, 
                DialogOverlay,
                CountUp,
                apexchart
            };
            }
            
        })
</script>

<style>
.map-container {
  height: 400px;
}
</style>