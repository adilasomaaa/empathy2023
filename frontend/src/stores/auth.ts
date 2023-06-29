import axios from 'axios';
import { defineStore } from 'pinia';
import { reactive, ref } from 'vue';

export const useAuth = defineStore({
    id: 'auth',
    state: () => {
        return {
            user: null,
            authenticated: false,
            ability: null,
            role: null,
            detail_user:null,
        }
    },

    actions: {
        async getUser(){
            try {
                const response = await axios.get('api/auth');
                // const getAbility = await axios.get('api/auth-ability');
                const getRole = await axios.get('api/auth-role');
                this.role = getRole.data;
                // this.ability = getAbility.data;
                if(getRole.data == 'operator'){
                    const getDetail = await axios.get(`api/operator/${response.data.id}/byUser`);
                    this.detail_user = getDetail.data.data
                // }else if(getRole.data == 'student') {
                //     const getDetail = await axios.get(`api/student/get-user/${response.data.id}`);
                //     this.detail_user = getDetail.data.data
                }
                this.user = response.data;
                this.authenticated = true;
                return response.data;
            }catch (err){
                console.error('Error loading new arrivals', err);
                return err;
            }
        },

        async login(credentials){
            try {
                await axios.get('sanctum/csrf-cookie');
                await axios.post('login', credentials);
                await this.getUser(); 
                return this.authenticated;
            }catch (err) {
                this.user = null;
                this.authenticated = false;
                console.error('Error loading new arrivals: ', err);
                return this.authenticated;
            }
        },

        async logout(){
            try {
                await axios.post('logout');
                this.user = null;
                this.authenticated = false
            } catch(err) {
                console.error('Error loading new arrivals: ', err);
                return err;
            }
        }
    }
})