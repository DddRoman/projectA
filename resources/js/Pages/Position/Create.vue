<script setup>
import BreezeAuthenticatedLayout from "@/Layouts/Authenticated.vue";
import { Head } from "@inertiajs/inertia-vue3";
import Button from "@/Components/Button.vue";
import { Link } from "@inertiajs/inertia-vue3";
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
    industria: {
        type: Object,
        default: () => ({}),
    },
    structure: {
        type: Object,
        default: () => ({}),
    },
    deps: {
        type: Object,
        default: () => ({}),
    },
    dep: {
        type: Object,
        default: () => (0),
    },
});


const form = useForm({
    struct_id:props.structure.id,
    dependence:props.dep,
    name: '',
    abv: '',
    discription: '',


});

const submit = () => {
    form.post(route("positions.store"));
};


</script>

<template>
    <Head title="Position Create" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Position Create
            </h2>
        </template>

        <div class="py-12">
            <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit">
                            <div class="mb-6">
                                <label
                                    for="struct_id"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >Structure position</label
                                >
                                <input 
                                type="hidden"
                                v-model="form.struct_id"
                                name="struct_id"
                                 
                                />

                                <div>struct_id: {{ form.struct_id }} {{props.structure.name}}</div>
                                <div
                                    v-if="form.errors.struct_id"
                                    class="text-sm text-red-600"
                                >
                                    {{ form.errors.struct_id }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label
                                    for="Name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >Name</label
                                >
                                <input
                                    type="text"
                                    v-model="form.name"
                                    name="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="Name position"
                                />
                                <div
                                    v-if="form.errors.name"
                                    class="text-sm text-red-600"
                                >
                                    {{ form.errors.name }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label
                                    for="abv"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >ABV</label
                                >
                                <input
                                    type="text"
                                    v-model="form.abv"
                                    name="abv"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                    placeholder="abviature"
                                />
                                <div
                                    v-if="form.errors.abv"
                                    class="text-sm text-red-600"
                                >
                                    {{ form.errors.abv }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label
                                    for="discription"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >Discription</label
                                >
                                <textarea
                                    type="text"
                                    v-model="form.discription"
                                    name="discription"
                                    id=""
                                    placeholder="About position"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                ></textarea>

                                <div
                                    v-if="form.errors.discription"
                                    class="text-sm text-red-600"
                                >
                                    {{ form.errors.discription }}
                                </div>
                            </div>
                            <div class="mb-6">
                                <label
                                    for="dependence"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                                    >Dependence</label
                                >
                                <select
                                    type="text"
                                    v-model="form.dependence"
                                    name="dependence"
                                    id="dependence"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5"
                                >
                            <option value="0" id="dp_0">New</option>
                            <option v-for="dep in props.deps" :value="dep.id" :key="'dp_'+dep.id">
                                {{dep.name}}
                            </option>
                            </select>

                                <div
                                    v-if="form.errors.dependence"
                                    class="text-sm text-red-600"
                                >
                                    {{ form.errors.dependence }}
                                </div>
                            </div>
                            <div class="mb-6"> 
                               <button
                                type="submit"
                                class="text-black bg-blue-700  focus:outline-none  font-medium rounded-lg text-sm px-5 py-2.5 "

                            >
                                Submit
                            </button>  
                            </div>
                           
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>