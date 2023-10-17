<template>
    {{ props.data }}
    {{ props.message }}

    <form @submit.prevent="createRoom">
        <input type="text" v-model="form.room_number">
        <input type="text" v-model="form.capacity">
        <input type="submit" value="submit">
    </form>
</template>

<script setup>
import {onMounted, onUpdated,reactive} from 'vue';
import { useForm } from '@inertiajs/vue3';
import { okAlert,confirmation,multiAlert ,simpleAlert} from "@/notify";

const props = defineProps({
    data: {
        type: Object,
    },
    error:{
        type: String
    },
    message: {
        type: String
    }
});

let createRoom = ()=>{
    form.patch(route('room.update',props.data.id),{
        onSuccess:(res)=>{
            console.log(res);
            if(props.message!=null){
                simpleAlert('success',props.message)
            }
        },
        onError:(err)=>{
            console.log(err);
            multiAlert('error','oops!',err)
        }
    })
}

// variables
let form = useForm({
    room_number:props.data.room_number,
    capacity:props.data.capacity,
})
// onUpdated(()=>{

// })
onMounted(()=>{
    // console.log(props.message);

    if(props.error!=null){
        simpleAlert('error',props.error)
    }
})
</script>
