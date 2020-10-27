import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export const store = new Vuex.Store({
    state:{
        wishes:[
            {wish_name: 'loading', uuid: '0', url:'http://localhost:8000/wish', description: 'lorem ipsum' , wish_image: 'noimage.jpg'}
        ],
        wish:[
            {wish_name: 'loading', uuid: '0', url:'http://localhost:8000/wish', description: 'lorem ipsum' , wish_image: 'noimage.jpg'}
        ]
    }
})